<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
return [
    'settings' => [
        'debug' => true,
        'displayErrorDetails' => true,
        'addContentLengthHeader' => true,
        
        'mysqlDb' => [
            'host' => 'localhost:3306',
            'dbname' => 'wetekchallenge',
            'user' => 'root',
            'pass' => ''
        ],
        
        'mongoDb' => [
            'host' => 'mongodb://localhost:27017',
            'user' => '',
            'pass' => ''
        ]
    ],
    // CLI config
    'commands' => [
        '__default' => \WetekChallenge\Controller\Cli\Help::class,
        'help' => \WetekChallenge\Controller\Cli\Help::class,
        'test' => \WetekChallenge\Controller\Cli\Test::class,
        'import' => \WetekChallenge\Controller\Cli\Import::class
    ]
];
