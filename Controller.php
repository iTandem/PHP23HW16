<?php
    
    require __DIR__.'/vendor/autoload.php';
    
    if(isset($_GET['address']) ? $_GET['address'] : '') {
        
        $address = $_GET['address'];
        $addressParam =
        
        $api = new \Yandex\Geo\Api();
        
        $api->setQuery($address);
        
        $api
            ->setLimit(10)
            ->setLang(\Yandex\Geo\Api::LANG_RU)
            ->load();
        
        $response = $api->getResponse();
        
    }
    
    $hasCoords = (isset($_GET['lat']) ? $_GET['lat'] : '') && (isset($_GET['lng']) ? $_GET['lng'] : '');
    $mapLat = isset($_GET['lat']) ? $_GET['lat'] : 55.751999;
    $mapLng = isset($_GET['lng']) ? $_GET['lng'] : 37.617734;
    $mapAddress = isset($_GET['pureAddress']) ? $_GET['pureAddress'] : '';
    
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 20.06.2018
     * Time: 14:54
     */