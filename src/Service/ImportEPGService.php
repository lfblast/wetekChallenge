<?php

namespace WetekChallenge\Service;

final class ImportEPGService extends BaseService {

    private $mySQLRepo;
    private $mongoDbRepo;

    public function __construct(\WetekChallenge\Repo\Repository $mySQLRepo, \WetekChallenge\Repo\Repository $mongoDbRepo) {
        $this->mySQLRepo = $mySQLRepo;
        $this->mongoDbRepo = $mongoDbRepo;        
    }

    public function importEPGDefault() {
        $this->writeln('Importing EPG files from defaul location...');
        $this->convertFileAndInsert();
    }

    private function convertFileAndInsert() {
        foreach (new \DirectoryIterator('./EPGFiles') as $file) {
            if ($file->isFile()) {
                $xmlData = simplexml_load_file("./EPGFiles/" . $file->getFilename()) or die("Failed to load");
                $this->writeln('Inserting Channel data from ' . $file->getFilename());
                $idChannel = $this->insertChannelData($xmlData);
                $this->writeln('Data inserted!');
                $this->writeln('Inserting Programmes data from ' . $file->getFilename());
                $this->insertProgrammeData($idChannel, $xmlData);
                $this->writeln('Data inserted!');
            }
        }
        $this->mySQLRepo->getCon = null;
    }

    private function insertChannelData($xmlData) {
        $data = EPGDataRecover::getChannelData($xmlData);
        return $this->mySQLRepo->insertData($data);
    }

    private function insertProgrammeData($idChannel, $xmlData) {
        
        $date = new \DateTime();
        $date->modify('-7 day');
        $this->mongoDbRepo->removeWhenDataStartLessThan($date);
        
        foreach ($xmlData->programme as $value) {           
            $data = EPGDataRecover::getProgrammeData($idChannel, $value);
            $this->mongoDbRepo->insertData($data);
        }
    }
}
