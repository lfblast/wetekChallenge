<?php

declare(strict_types=1);

namespace WetekChallenge\Controller\Cli;

final class Import extends BaseController {

    private $importEPGService;

    public function __construct(\Slim\Container $ci) {
        $this->importEPGService = $ci->get('importEPGService');
    }

    public function command(array $aArgs) {
        $this->importEPGService->importEPGDefault();
    }
}
