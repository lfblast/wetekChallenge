<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    //MySQL Database
    $container['mysqlDb'] = function($c) {
        $db = $c['settings']['mysqlDb'];
        try {
            $pdo = new \FaaPz\PDO\Database("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'], $db['user'], $db['pass']);
            return $pdo;
        } catch (\PDOException $e) {
            throw new \PDOException('Error trying to create MySQL connection: ' . $e->getMessage(), (int) $e->getCode());
        }
    };
    
    //MongoDB Database
    $container['mongoDb'] = function($c) {
        $db = $c['settings']['mongoDb'];
        try {
            $con = new \MongoDB\Client($db['host']);
            return $con;
        } catch (\PDOException $e) {
            throw new \PDOException('Error trying to create MongoDB connection: ' . $e->getMessage(), (int) $e->getCode());
        }
    };

    $container['importEPGService'] = function ($c) {
        $mySQLRepo = new \WetekChallenge\Repo\MysqlRepo($c['mysqlDb']);
        $mongoDbRepo = new \WetekChallenge\Repo\MongoDbRepo($c['mongoDb']);
        $importEPGService = new \WetekChallenge\Service\ImportEPGService($mySQLRepo, $mongoDbRepo);
        return $importEPGService;
    };
};
