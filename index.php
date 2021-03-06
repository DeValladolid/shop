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
    <title>Fortnite Item Shop | <?php echo date("Y-m-d") ?></title>
    <meta name="Description" content="Fortnite Battle Royale daily item shop.">
    <meta name="Keywords" content="fortnite, fnbr, lazy links, ghoul trooper">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@srdrabx">
    <meta name="twitter:title" content="Fortnite item shop">
    <meta name="twitter:description" content="Fortnite Battle Royale daily item shop.">
    <meta name="today-date" content="<?php echo date("Y-m-d") ?>">
    <meta name="twitter:image" content="https://cdn2.unrealengine.com/Fortnite%2Fblog%2Ffortnite-teams-up-with-the-nfl%2FBR06_News_Thumbnail_1_1_NFL_Announce-576x576-6b5f30c1a714e34c22dd40cc93aedf6476a5d220.jpg">

    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <script type="text/javascript" src="js/main.js" defer></script>
    <script type="text/javascript" src="js/timer.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js" type="text/javascript"></script>
    <script src="https://cdn.rawgit.com/mckamey/countdownjs/master/countdown.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71246365-21"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-71246365-21');
    </script>


</head>
<body class="trn-site">
<div class="trn-site__container">
<h1 class="trn-title trn-title--section">Fortnite Item Shop</h1>
   <div id="app">
      <div class="trn-card trn-card--ftr-yellow">
         <div class="trn-card__header">
            <h2 class="trn-card__header-title">Featured Items</h2>
            <span class="trn-card__header-subline">
            Refreshes {{ nextUpdateIn }}
            </span>
         </div>
         <div class="trn-card__content db-store-grid">

           <?php
           for ($i = 0; $i < count($image_data['data']['featured']); $i ++) {
               ?>

            <a href="#" class="fortnite-db-item fortnite-db-item--large-text fortnite-db-item--epic" style="grid-column: span 1 / auto;">
               <img src="<?php echo $image_data['data']['featured'][$i]['images']['icon'] ?>" class="fortnite-db-item__image">
               <div class="fortnite-db-item__details">
                  <div class="fortnite-db-item__name"><?php echo $rarityid['data']['featured'][$i]['name']?></div>
                  <div class="fortnite-db-item__price"><img src="https://cdn.thetrackernetwork.com/cdn/trackernetwork/3C7Avbucks.png">
                     <?php echo $rarityid['data']['featured'][$i]['price']?>
                  </div>
               </div>
            </a>
            <?php
        }
        ?>
         </div>
      </div>
    </div>
    <div id="app2">
      <div class="trn-card trn-card--ftr-blue">
         <div class="trn-card__header">
            <h2 class="trn-card__header-title">Daily Items</h2>
            <span id="app" class="trn-card__header-subline">
            Refreshes {{ nextUpdateInN }}
            </span>
         </div>
         <div class="trn-card__content db-store-grid">

           <?php
           for ($i = 0; $i < count($image_data['data']['daily']); $i ++) {
               ?>

            <a href="#" class="fortnite-db-item fortnite-db-item--large-text fortnite-db-item--<?php echo $rarityid['data']['daily'][$i]['rarity']?>" style="grid-column: span 1 / auto;">
               <img src="<?php echo $image_data['data']['daily'][$i]['images']['icon'] ?>" class="fortnite-db-item__image">
               <div class="fortnite-db-item__details">
                  <div class="fortnite-db-item__name"><?php echo $rarityid['data']['daily'][$i]['name']?></div>
                  <div class="fortnite-db-item__price"><img src="https://cdn.thetrackernetwork.com/cdn/trackernetwork/3C7Avbucks.png">
                     <?php echo $rarityid['data']['daily'][$i]['price']?>
                  </div>
               </div>
            </a>
            <?php
        }
        ?>
         </div>
      </div>
   </div>
   <div class="api" style="text-align: center;"><h1>API data by fnbr.co<?php $date ?> </h1></div>


   <script>
      var app = new Vue({
          el: '#app',
          data: {
              refreshIntervalHandle: null,
              nextUpdateIn: ''
          },
          created: function () {
              this.initRefresh();
          },
          methods:
              {
                  initRefresh: function () {
                      var self = this;

                      self.refreshIntervalHandle = setInterval(function () {
                          var now = new Date();
                          var midnight = new Date(Date.UTC(now.getFullYear(), now.getUTCMonth(), now.getUTCDate(), 24, 0, 0));

                          var dif = now.getTime() - midnight.getTime();

                          var Seconds_from_T1_to_T2 = Math.abs(dif / 1000);

                          self.nextUpdateIn = self.humanReadable(Seconds_from_T1_to_T2, 3);

                          //self.nextUpdateIn = moment.utc([now.getFullYear(), now.getMonth(), now.getDate(), 24, 0, 0]).fromNow()

                      }, 1000);
                  },
                  humanReadable: function (seconds, segments) {
                      var numdays = Math.floor((seconds % 31536000) / 86400);
                      var numhours = Math.floor(((seconds % 31536000) % 86400) / 3600);
                      var numminutes = Math.floor((((seconds % 31536000) % 86400) % 3600) / 60);
                      var numseconds = (((seconds % 31536000) % 86400) % 3600) % 60;

                      var parts = [];
                      if (numdays > 0) {
                          parts.push(numdays + (numdays === 1 ? " Day " : " Days "));
                      }
                      if (numhours > 0) {
                          parts.push(numhours + (numhours === 1 ? " Hour " : " Hours "));
                      }
                      if (numminutes > 0) {
                          parts.push(numminutes + "m");
                      }
                      if (numseconds > 0) {
                          parts.push(Math.round(numseconds, 0) + "s");
                      }

                      if (parts.length <= segments - 1)
                          return parts.join(' ');
                      else {
                          return parts.filter(function (item, i) {
                              return i <= segments - 1;
                          }).join(' ');
                      }

                  }
              }

      });
   </script>

   <script>
      var app = new Vue({
          el: '#app2',
          data: {
              refreshIntervalHandle: null,
              nextUpdateInN: ''
          },
          created: function () {
              this.initRefresh();
          },
          methods:
              {
                  initRefresh: function () {
                      var self = this;

                      self.refreshIntervalHandle = setInterval(function () {
                          var now = new Date();
                          var midnight = new Date(Date.UTC(now.getFullYear(), now.getUTCMonth(), now.getUTCDate(), 24, 0, 0));

                          var dif = now.getTime() - midnight.getTime();

                          var Seconds_from_T1_to_T2 = Math.abs(dif / 1000);

                          self.nextUpdateInN = self.humanReadable(Seconds_from_T1_to_T2, 3);

                          //self.nextUpdateInN = moment.utc([now.getFullYear(), now.getMonth(), now.getDate(), 24, 0, 0]).fromNow()

                      }, 1000);
                  },
                  humanReadable: function (seconds, segments) {
                      var numdays = Math.floor((seconds % 31536000) / 86400);
                      var numhours = Math.floor(((seconds % 31536000) % 86400) / 3600);
                      var numminutes = Math.floor((((seconds % 31536000) % 86400) % 3600) / 60);
                      var numseconds = (((seconds % 31536000) % 86400) % 3600) % 60;

                      var parts = [];
                      if (numdays > 0) {
                          parts.push(numdays + (numdays === 1 ? " Day " : " Days "));
                      }
                      if (numhours > 0) {
                          parts.push(numhours + (numhours === 1 ? " Hour " : " Hours "));
                      }
                      if (numminutes > 0) {
                          parts.push(numminutes + "m");
                      }
                      if (numseconds > 0) {
                          parts.push(Math.round(numseconds, 0) + "s");
                      }

                      if (parts.length <= segments - 1)
                          return parts.join(' ');
                      else {
                          return parts.filter(function (item, i) {
                              return i <= segments - 1;
                          }).join(' ');
                      }

                  }
              }

      });
   </script>


   <style>
      .db-store-grid {
      display: grid;
      grid-gap: 8px;
      grid-template-columns: repeat(4, 1fr);
      }
      @media(max-width: 780px) {
      .db-store-grid {
      grid-template-columns: repeat(2, 1fr);
      }
      }
      .db-rarity-background_common {
      border-width: 2px;
      border-style: solid;
      border-image-source: linear-gradient(25deg, #7E848A 15%, #CFCFCF);
      border-image-slice: 20;
      background-image: radial-gradient(#d0d0d0 0%, #6d7071 100%);
      padding: 8px;
      }
      .db-rarity-background_handmade {
      border-width: 2px;
      border-style: solid;
      border-image-source: linear-gradient(25deg, #008A09 15%, #9EEF00);
      border-image-slice: 20;
      background-image: radial-gradient(#5BAD03 0%, #01700a 100%);
      padding: 8px;
      }
      .db-rarity-background_sturdy {
      border-width: 2px;
      border-style: solid;
      border-image-source: linear-gradient(25deg, #0063C5 15%, #00EFEC);
      border-image-slice: 20;
      background-image: radial-gradient(#3dc7ff 0%, #0059a1 100%);
      padding: 8px;
      }
      .db-rarity-background_epic {
      border-width: 2px;
      border-style: solid;
      border-image-source: linear-gradient(25deg, #8037D7 15%, #DF2CEF);
      border-image-slice: 20;
      background-image: radial-gradient(#d27bf4 0%, #7907a5 100%);
      padding: 8px;
      }
      .db-rarity-background_fine {
      border-width: 2px;
      border-style: solid;
      border-image-source: linear-gradient(25deg, #df7241 15%, #F6C87C);
      border-image-slice: 20;
      background-image: radial-gradient(#fb9625 0%, #875134 100%);
      padding: 8px;
      }
   </style>
</div>

</body>
<script>
var target = new Date("<?php echo "" . date("Y/m/d") . ""; ?> 19:00 EST");
timeOffset = target.getTimezoneOffset() * 60000;
targetTime = target.getTime();
targetUTC = targetTime + timeOffset;

var today = new Date();
todayTime = today.getTime();
todayUTC = todayTime + timeOffset;

refreshTime = (targetUTC - todayUTC);
if (refreshTime > 1) {
  setTimeout(function() { window.location.reload(true); }, refreshTime);
}
</script>

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo "" . date("Y/m/d") . ""; ?> 19:00 EST").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = hours + ":"
  + minutes + ":" + seconds + "";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
</html>
