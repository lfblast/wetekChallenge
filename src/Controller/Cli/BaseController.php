<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
declare(strict_types = 1);
namespace WetekChallenge\Controller\Cli;

abstract class BaseController
{
    abstract protected function command(array $aArgs);

    protected function writeln(string $aText = '') {
        print($aText . PHP_EOL);
    }
}
