<?php
//the proxy is to bypass captcha of the site
$vinageturl = "http://dali.synology.me/PHProxy/index.php?q=http%3A%2F%2Ftout-debrid.eu%2F";
$proxybase = "http://dali.synology.me/PHProxy/index.php?q=";
$host = "dali.synology.me";
$email = "";
$password = "";
$emailencode = urlencode($email);
$passwordencode = urlencode($password);


$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, "" . $vinageturl . "&hl=c1");
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0");
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch1, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch1, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch1, CURLOPT_HEADER, 1);
$headers1[] = 'Host: ' . $host . '';
$headers1[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0';
$headers1[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
$headers1[] = 'Accept-Language: fr-FR,fr;q=0.5';
$headers1[] = 'Connection: keep-alive';
$headers1[] = 'Upgrade-Insecure-Requests: 1';
curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers1);
$res1 = curl_exec($ch1);
curl_close($ch1);



$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, "" . $vinageturl . "login&hl=c1");
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0");
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch2, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch2, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch2, CURLOPT_HEADER, 1);
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_POSTFIELDS, "txtEmail=" . $emailencode . "&txtMdp=" . $passwordencode . "&btnSubmited=Se+connecter");
$headers2[] = 'Host: ' . $host . '';
$headers2[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0';
$headers2[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
$headers2[] = 'Accept-Language: fr-FR,fr;q=0.5';
$headers2[] = 'Connection: keep-alive';
$headers2[] = 'Upgrade-Insecure-Requests: 1';
$headers2[] = 'Content-Type: application/x-www-form-urlencoded';
$headers2[] = 'Content-Length: 73';
$headers2[] = 'Referer: ' . $vinageturl . 'login&hl=c1';
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
$res2 = curl_exec($ch2);
curl_close($ch2);



$ch3 = curl_init();
curl_setopt($ch3, CURLOPT_URL, "" . $vinageturl . "debrideur");
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch3, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0");
curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch3, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch3, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch3, CURLOPT_HEADER, 0);
curl_setopt($ch3, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch3, CURLOPT_COOKIEFILE, 'cookie.txt');
$headers3[] = 'Referer: ' . $vinageturl . 'login&hl=c1';
curl_setopt($ch3, CURLOPT_HTTPHEADER, $headers3);
$res3 = curl_exec($ch3);
curl_close($ch3);


if (empty($_GET['url'])) {
echo "Link is invalid";
exit;
}


$url = $_GET['url'];
$debridlinkurlencode = urlencode($url);
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
$url = "" . $vinageturl . "generateur-all.php?rand=" . $chainefinal . "&hl=c1";
curl_setopt($ch, CURLOPT_URL, $url);
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
$headers[] = 'Referer: ' . $vinageturl . 'debrideur';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$res = curl_exec($ch);
curl_close($ch);

preg_match('/title="click here to download" href="(.*?)"/', $res, $matches);

$link = $matches[1];
// remove proxy of url not proxy juste use $link on header location
$link1 = str_replace('' . $proxybase . '', '', $link);
$link2 = urldecode($link1);



header("Location: " . $link2 . "");
