<?php
//you vinaget ulr
// exemple using
// http://exemple.com/
// http://exemple.com/folder/
// http://exemple.com/folder/folder/
// dot no use
// http://example.com
// http://example.com/folder
// http://example.com/folder/folder
// http://example.com/index.php
// http://example.com/index.php/
// http://example.com/folder/index.php
// http://example.com/folder/index.php/
// http://example.com/folder/folder/index.php
// http://example.com/folder/folder/index.php/
$vinageturl = "";
// if use password = "1";
// exemple
//$passwordenable = "1";


$passwordenable = "1";

if ($passwordenable == "1") {
	
	
if (empty($_GET['link']) || empty($_GET['password'])) {
    echo "error Link or Password is invalid";
	exit;
}
$password = $_GET['password'];
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, "" . $vinageturl . "login.php");
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0");
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch2, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch2, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch2, CURLOPT_HEADER, 1);
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_POSTFIELDS, "secure=" . $password . "");
$headers2[] = 'Referer: " . $vinageturl . "index.php';
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
$res2 = curl_exec($ch2);
curl_close($ch2);


$ch3 = curl_init();
curl_setopt($ch3, CURLOPT_URL, "" . $vinageturl . "index.php");
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch3, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0");
curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch3, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch3, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch3, CURLOPT_HEADER, 0);
curl_setopt($ch3, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch3, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($ch3, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch3, CURLOPT_COOKIEFILE, 'cookie.txt');
$headers3[] = 'Referer: " . $vinageturl . "login.php';
curl_setopt($ch3, CURLOPT_HTTPHEADER, $headers3);
$res3 = curl_exec($ch3);
curl_close($ch3);
} else {
if (empty($_GET['url'])) {
echo "Link is invalid";
exit;
}
}
$debridlink = $_GET['url'];
$debridlinkurlencode = urlencode($debridlink);
function random($car) {
$string = "";
$chaine = "123456789";
srand((double)microtime()*1000000);
for($i=0; $i<$car; $i++) {
$string .= $chaine[rand()%strlen($chaine)];
}
return $string;
}
$chaine = random(15);
$chainefinal = str_replace("" . $chaine . "", "0." . $chaine . "", $chaine);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "" . $vinageturl . "index.php?rand=" . $chainefinal . "");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "urllist=" . $debridlinkurlencode . "&captcha=none&proxy=&");
$headers[] = 'Referer: " . $vinageturl . "index.php';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$res = curl_exec($ch);
curl_close($ch);


preg_match('/title=\'click here to download\' href=\'(.*?)\'/', $res, $matches);

$link = $matches[1];
//echo $link;
$extention = substr(strrchr($link, "."), 1);
header("Location: " . $link . "");
