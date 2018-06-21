<?php
    
    require __DIR__.'/vendor/autoload.php';
    
    if($_GET['address'] ?? '') {
        
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
    
    $hasCoords = ($_GET['lat'] ?? '') && ($_GET['lng'] ?? '');
    $mapLat = $_GET['lat'] ?? 55.751999;
    $mapLng = $_GET['lng'] ?? 37.617734;
    $mapAddress = $_GET['pureAddress'] ?? '';
    
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 20.06.2018
     * Time: 14:54
     */