<?php

namespace WetekChallenge\Service;

class EPGDataRecover {

    public static function getChannelData($xmlData) {
        $data = [$xmlData->channel['id'], $xmlData->channel->{'display-name'}, $xmlData->channel->icon['src'], $xmlData->channel->url];
        return $data;
    }

    public static function getProgrammeData($idChannel, $xmlData) {
        
        $startTime = new \DateTime($xmlData['start']);
        $stopTime = new \DateTime($xmlData['stop']);

        $data = ['idChannel' => $idChannel,
            'channel' => $xmlData['channel'], 'start' => $startTime,
            'stop' => $stopTime, 'title' => $xmlData->title,
            'category' => $xmlData->category, 'desc' => $xmlData->desc];

//        $data = ['data' => new \DateTime('20190505002100 +200')];
        return $data;
    }

}
