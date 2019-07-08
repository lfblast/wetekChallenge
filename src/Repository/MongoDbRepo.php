<?php

namespace WetekChallenge\Repo;

class MongoDbRepo implements Repository {

    private $con;

    public function __construct(\MongoDB\Client $con) {
        $this->con = $con;
    }

    public function insertData($data) {
        $collection = $this->con->wetekChallengeDB->programme;
        $collection->insertOne($data);
    }

    public function getCon() {
        return $this->con;
    }
    
    public function removeWhenDataStartLessThan($date) {
        $collection = $this->con->wetekChallengeDB->programme;
        $condition = ['start' => ['$lt' => new \MongoDB\BSON\UTCDateTime($date)]];
        $collection->deleteMany($condition);
    }
}