<?php

namespace WetekChallenge\Repo;

class MongoDbRepo implements Repository {

    private $con;

    public function __construct(\MongoDB\Client $con) {
        $this->con = $con;
    }

    public function insertData($data) {

        $collection = $this->con->wetekChallengeDB->programme;
        $insertOneResult = $collection->insertOne($data);
    }

    public function getCon() {
        return $this->con;
    }

}
