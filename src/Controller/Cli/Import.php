<?php

declare(strict_types=1);

namespace WetekChallenge\Controller\Cli;

final class Import extends BaseController {

    private $importEPGService;
    private $filesDir;

    public function __construct(\Slim\Container $ci) {
        $this->importEPGService = $ci->get('importEPGService');
        $this->filesDir = $ci['settings']['filesDir'];
    }

    public function command(array $aArgs) {
        $aArgs = array_filter($aArgs);
        $this->writeln('Importing EPG files from defaul location...');
        try {
            if (!empty($aArgs)) {
                $dir = $aArgs[0];
            } else {
                $dir = $this->filesDir;
            }
            $this->importEPGService->importEPGFiles($dir);
        } catch (\Exception $e) {
            throw new \Exception('Error trying to ingest EPG files: ' . $e->getMessage(), (int) $e->getCode());
        }
    }

}
