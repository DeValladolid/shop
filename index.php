<?php

//	$subscription_key  ='7a0ba247-ff23-4c94-b982-fe1c696d1051';
//    $host = 'http://fnbr.co/api/shop';
//    $request_headers = array(
//                    "x-api-key: " . $subscription_key,
//                    'Content-Type: application/json'
//                );
//
//	$url = "http://fnbr.co/api/shop";
//
//    $response = callAPI("GET", $host, "");
//
//
//    // Decode
//    $result = json_decode($response);
//
//	echo "OK";
//
//    function callAPI($method, $url, $data){
//        $curl = curl_init();
//
//        switch ($method){
//            case "POST":
//                curl_setopt($curl, CURLOPT_POST, 1);
//                if ($data)
//                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//                break;
//            case "PUT":
//                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
//                if ($data)
//                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//                break;
//            default:
//                if ($data)
//                    $url = sprintf("%s?%s", $url, http_build_query($data));
//        }
//
//        // OPTIONS:
//        curl_setopt($curl, CURLOPT_URL, $url);
//        curl_setopt($curl, CURLOPT_USERAGENT, $url);
//        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
//            'x-api-key: 7a0ba247-ff23-4c94-b982-fe1c696d1051',
//            'Host: fnbr.co',
//            'cache-control: no-cache'
//        ));
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);
//        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//
//        // EXECUTE:
//        $result = curl_exec($curl);
//        if(!$result){die("Connection Failure");}
//        curl_close($curl);
//        return $result;
//    }


$subscription_key  ='7a0ba247-ff23-4c94-b982-fe1c696d1051';
$opts = array(
    'http'=>array(
        'method'=>"GET",
        'header'=>"Accept-language: en\r\n" .
            "Cookie: foo=bar\r\n" .
            "User-agent: BROWSER-DESCRIPTION-HERE\r\n".
            "x-api-key: 7a0ba247-ff23-4c94-b982-fe1c696d1051\r\n"
    )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('https://fnbr.co/api/shop', false, $context);
$rarity = file_get_contents('https://fnbr.co/api/shop', false, $context);

$image_data = json_decode($file, true);
$rarityid = json_decode($file, true);

?>

<!doctype html>
<html lang="en">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fortnite Item Shop</title>
    <meta name="Description" content="Fortnite Battle Royale daily item shop.">
    <meta name="Keywords" content="fortnite, fnbr, lazy links, ghoul trooper">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@srdrabx">
    <meta name="twitter:title" content="Fortnite item shop">
    <meta name="twitter:description" content="Fortnite Battle Royale daily item shop.">
    <meta name="twitter:image" content="http://fortnitemares.fortnite-br.com/css/bg.jpg">

    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <script type="text/javascript" src="js/main.js" defer></script>

</head>
<body>
  <div class="title" style="text-align: center;"><h1>Fortnite Item Shop</h1></div>
  <div class="title" style="text-align: center;"><h1>API data by fnbr.co<?php $date ?> </h1></div>
<div class="content__inner">
  <div class="items items--shop">

    <ul class="items__list">
        <h3 class="item__list__title">Featured</h3>
            <?php
            for ($i = 0; $i < count($image_data['data']['featured']); $i ++) {
                ?>
                <li class="items__list__item">
					<a href="https://fnbr.co/<?php echo $rarityid['data']['featured'][$i]['type']?>/<?php echo $rarityid['data']['featured'][$i]['name']?>" target="about_blank"" class="items__list__item__link item__info__rarity legendary card splash-card rarity-<?php echo $rarityid['data']['featured'][$i]['rarity']?>"/><img src='<?php echo $image_data['data']['featured'][$i]['images']['icon'] ?>'/>
            <div class="card-img-overlay" style="padding-left: 0px; padding-right: 0px;">
              <div id="itemdesc" class="card-body">
                <h4 class="card-title itemname"><span><?php echo $rarityid['data']['featured'][$i]['name']?></span></h4>
                <p class="card-text itemprice">
                  <img style="width:25px;height:25px" src="https://image.fnbr.co/price/icon_vbucks.png">
                  <?php echo $rarityid['data']['featured'][$i]['price']?>
                </p>
              </div>
            </div>
          </a>
                </li>
                <?php
            }
            ?>

    </ul>

    <ul class="items__list">
        <h3 class="item__list__title">Daily</h3>

            <?php
            for ($i = 0; $i < count($image_data['data']['daily']); $i ++) {
                ?>
                <li class="items__list__item">
                    <a href="https://fnbr.co/<?php echo $rarityid['data']['daily'][$i]['type']?>/<?php echo $rarityid['data']['daily'][$i]['name']?>" target="about_blank" class="items__list__item__link item__info__rarity legendary card splash-card rarity-<?php echo $rarityid['data']['daily'][$i]['rarity']?>"><img src='<?php echo $image_data['data']['daily'][$i]['images']['icon'] ?>'/>
                      <div class="card-img-overlay" style="padding-left: 0px; padding-right: 0px;">
                        <div id="itemdesc" class="card-body">
                          <h4 class="card-title itemname"><span><?php echo $rarityid['data']['daily'][$i]['name']?></span></h4>
                          <p class="card-text itemprice">
                            <img style="width:25px;height:25px" src="https://image.fnbr.co/price/icon_vbucks.png">
                            <?php echo $rarityid['data']['daily'][$i]['price']?>
                          </p>
                        </div>
                      </div>
                    </a>
                </li>
                <?php
            }
            ?>


    </ul>

</div>

</body>
</html>
