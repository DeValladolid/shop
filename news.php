<?php

//	$subscription_key  ='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6Im5hY2hvYWxkYW1hdmljZW50ZUBnbWFpbC5jb20iLCJ1c2VySWQiOiI1YmMzMTQ3MzFlNmI5NjUxNzVkYzU4MDMifQ.Z3JQOqpF1AUkNJ9RG3po0EbL6g3Gnlv74QfpVlw4hGE';
//    $host = 'https://fortnite-api.tresmos.xyz/news';
//    $request_headers = array(
//                    "Authorization: " . $subscription_key,
//                    'Content-Type: application/json'
//                );
//
//	$url = "https://fortnite-api.tresmos.xyz/news";
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
//            'Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6Im5hY2hvYWxkYW1hdmljZW50ZUBnbWFpbC5jb20iLCJ1c2VySWQiOiI1YmMzMTQ3MzFlNmI5NjUxNzVkYzU4MDMifQ.Z3JQOqpF1AUkNJ9RG3po0EbL6g3Gnlv74QfpVlw4hGE',
//            'Host: fortnite-api.tresmos.xyz',
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


$subscription_key  ='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6Im5hY2hvYWxkYW1hdmljZW50ZUBnbWFpbC5jb20iLCJ1c2VySWQiOiI1YmMzMTQ3MzFlNmI5NjUxNzVkYzU4MDMifQ.Z3JQOqpF1AUkNJ9RG3po0EbL6g3Gnlv74QfpVlw4hGE';
$opts = array(
    'http'=>array(
        'method'=>"GET",
        'header'=>
            "Cookie: foo=bar\r\n" .
            "User-agent: BROWSER-DESCRIPTION-HERE\r\n".
            "Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6Im5hY2hvYWxkYW1hdmljZW50ZUBnbWFpbC5jb20iLCJ1c2VySWQiOiI1YmMzMTQ3MzFlNmI5NjUxNzVkYzU4MDMifQ.Z3JQOqpF1AUkNJ9RG3po0EbL6g3Gnlv74QfpVlw4hGE\r\n"
    )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('https://fortnite-api.tresmos.xyz/news', false, $context);
$rarity = file_get_contents('https://fortnite-api.tresmos.xyz/news', false, $context);
$news = file_get_contents('https://fortnite-api.tresmos.xyz/news', false, $context);

$image_data = json_decode($file, true);
$rarityid = json_decode($file, true);
$newsid = json_decode($file, true);

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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71246365-21"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-71246365-21');
    </script>


</head>
<body>

  <div class="title" style="text-align: center;"><h1><?php echo $rarityid ['br'][$i]['body']?></h1></div>


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
