<?php

namespace WetekChallenge\Service;

final class ImportEPGService extends BaseService {

    private $mySQLRepo;
    private $mongoDbRepo;

    public function __construct(\WetekChallenge\Repo\Repository $mySQLRepo, \WetekChallenge\Repo\Repository $mongoDbRepo) {
        $this->mySQLRepo = $mySQLRepo;
        $this->mongoDbRepo = $mongoDbRepo;
    }

    public function importEPGFiles($fileDir) {
        if ($this->isDirEmpty($fileDir)) {
            throw new \Exception("No files were found in the directory... \n");
        }

        foreach (new \DirectoryIterator($fileDir) as $file) {
            if ($file->isFile()) {
                $xmlData = EPGXmlOperations::getSimpleXmlFromEPGFile($fileDir, $file->getFilename());
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
        $data = EPGXmlOperations::getChannelData($xmlData);
        return $this->mySQLRepo->insertData($data);
    }

    private function insertProgrammeData($idChannel, $xmlData) {

        $date = new \DateTime();
        $date->modify('-7 day');
        $this->mongoDbRepo->removeWhenDataStartLessThan($date);

        foreach ($xmlData->programme as $value) {
            $data = EPGXmlOperations::getProgrammeData($idChannel, $value);
            $this->mongoDbRepo->insertData($data);
        }
    }

    function isDirEmpty($dir) {
        if (!is_readable($dir)) {
            throw new \Exception("The folder does not exist: Invalid argument \n");
        }
        $handle = opendir($dir);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                return FALSE;
            }
        }
        return TRUE;
    }
}
