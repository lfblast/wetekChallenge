<?php

namespace WetekChallenge\Repo;

class MysqlRepo implements Repository {

    private $con;

    public function __construct(\FaaPz\PDO\Database $con) {
        $this->con = $con;
    }

    public function insertData($data) {
//        var_dump($xmlData->channel->url);
        $this->con->prepare('INSERT INTO channel (channelId, display_name, icon_src, url) VALUES (?, ?, ?, ?)')->execute($data);
        $lastId = $this->con->lastInsertId();
        return $lastId;
    }

    public function getCon() {
        return $this->con;
    }
}
