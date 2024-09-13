<?php

$curl = curl_init();
$search_string = "Flash sale";
$url = "https://www.lazada.com.ph/?spm=a2o4l.searchlist.breadcrumb.1.6ba8525d1Flhif#?=" . urlencode($search_string);

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//https://img.lazcdn.com/g/p/ec02979be6af7291a412e6be6d5da346.jpg_720x720q80.jpg_.webp

$result = curl_exec($curl);

preg_match_all("!https://img\.lazcdn\.com/g/p/[^\s]+(\.jpg|\.webp)!", $result, $matches);

$images = array_unique($matches[0]);

for ($i = 0; $i < count ($images); $i++){
	echo "<div styles='float: left; margin: 10 0 0 0; '>";
	echo "<img src= '$images[$i]'><br />";
    echo "</div>";
	}

curl_close($curl);