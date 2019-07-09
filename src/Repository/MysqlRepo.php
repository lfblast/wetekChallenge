<?php

namespace WetekChallenge\Repo;

class MysqlRepo implements Repository {

    private $con;

    public function __construct(\FaaPz\PDO\Database $con) {
        $this->con = $con;
    }

    public function insertData($data) {
        try {
            $this->con->prepare('INSERT INTO channel (channelId, display_name, icon_src, url) VALUES (?, ?, ?, ?)')->execute($data);
            $lastId = $this->con->lastInsertId();
            return $lastId;
        }
        catch (\Exception $e) {
            throw new \Exception('Error inserting data in MYSQL DB: ' . $e->getMessage(), (int) $e->getCode());
        }
    }

    public function getCon() {
        return $this->con;
    }
}