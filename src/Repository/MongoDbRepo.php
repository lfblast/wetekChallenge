<?php

namespace WetekChallenge\Repo;

class MongoDbRepo implements Repository {

    private $con;

    public function __construct(\MongoDB\Client $con) {
        $this->con = $con;
    }

    public function insertData($data) {
        try {
            $collection = $this->con->wetekChallengeDB->programme;
            $collection->insertOne($data);
        } catch (\PDOException $e) {
            throw new \Exception('Error inserting data in MONGODB: ' . $e->getMessage(), (int) $e->getCode());
        }
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
