<?php

namespace WetekChallenge\Service;

class EPGDataRecover {

    public static function getChannelData($xmlData) {
        $data = [$xmlData->channel['id'], 
                 $xmlData->channel->{'display-name'}, 
                 $xmlData->channel->icon['src'], 
                 $xmlData->channel->url
                ];
        return $data;
    }

    public static function getProgrammeData($idChannel, $xmlData) {

        $startTime = new \MongoDB\BSON\UTCDateTime(new \DateTime($xmlData['start']));
        $stopTime = new \MongoDB\BSON\UTCDateTime(new \DateTime($xmlData['stop']));

        $data = ['idChannel' => $idChannel,
            'channel' => $xmlData['channel']->__toString(),
            'start' => $startTime,
            'stop' => $stopTime,
            'title' => $xmlData->title->__toString(),
            'category' => $xmlData->category->__toString(),
            'desc' => $xmlData->desc->__toString()
        ];

//        $data = ['data' => new \DateTime('20190505002100 +200')];
        return $data;
    }
}