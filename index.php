<?php
    require_once 'Controller.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yandex-карты</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

</head>
<body>
<div class="container">
    <h1>Yandex-карты</h1>
    <hr>
    <form action="" method="get" accept-charset="utf-8">
        <input type="text" name="address" value="" placeholder="Введите адрес">
        <button type="submit">Найти</button>
        <?php if (isset($address) ? $address : ''): ?>
            <p><strong>Исходный запрос: </strong><?= $response->getQuery(); ?></p>
            <p><strong>Найдено точек: </strong><?= $response->getFoundCount(); ?></p>
            <p>Для отображения на карте кликните на координаты.</p>
            
            <?php if ($response->getFoundCount()): ?>
                <ol>
                    <?php foreach ($response->getList() as $item): ?>
                        <?php
                        $lat =  $item->getLatitude();
                        $lng = $item->getLongitude();
                        $adr =  $item->getAddress();
                        
                        $href = http_build_query([
                            'address' => $address,
                            'lat' => $lat,
                            'lng' => $lng,
                            'pureAddress' => $adr
                        ]);
                        ?>
                        <li><a href="?<?= $href ?>"><?= "$lng, $lat" ?></a> <em>(<?= $adr ?>)</em></li>
                    <?php endforeach ?>
                </ol>
                
                <a href="index.php">Сбросить результат</a>
                <br>
                
                <?php if($hasCoords): ?>
                    <div id="map"></div>
                <?php endif ?>
            
            <?php else: ?>
                <p><em>Объекты не найдены</em></p>
            <?php endif ?>
        
        <?php endif ?>
    </form>
</div>

<?php if ($hasCoords): ?>
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap;


        function init(){
            myMap = new ymaps.Map("map", {
                center: [<?= $mapLat ?>, <?= $mapLng ?>],
                zoom: 15
            });

            myMap.geoObjects.add(new ymaps.Placemark([<?= $mapLat ?>, <?= $mapLng ?>],{
                balloonContent: "<?= $mapAddress ?>",
            }));
        }
    </script>
<?php endif ?>
</body>
</html>
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 20.06.2018
     * Time: 14:47
     */