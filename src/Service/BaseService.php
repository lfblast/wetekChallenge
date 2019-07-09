<?php

namespace WetekChallenge\Service;

abstract class BaseService {

    protected function writeln(string $aText = '') {
        print($aText . PHP_EOL);
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
