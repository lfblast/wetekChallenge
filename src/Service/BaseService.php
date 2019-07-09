<?php

namespace WetekChallenge\Service;

abstract class BaseService {

    protected function writeln(string $aText = '') {
        print($aText . PHP_EOL);
    }
}