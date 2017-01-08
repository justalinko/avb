<?php
/**
---------------------------------------------------------------
# c0ded by  : alinko a.k.a shutdown57
# contact   : alinkokomansuby@gmail.com
# Thanks to :  
# indoXploit.or.id - stackoverflow.com - php.net - curl.haxx.se
---------------------------------------------------------------
# copyright (c) 2k17 linuXcode.org
---------------------------------------------------------------
**/

# warna
$a_m="\033[1;31m"; # merah
$a_k="\033[1;33m"; # kuning
$a_h="\033[1;32m"; # hijau
$a_n="\033[0m";    # netral
$a_b="\033[1;34m"; # biru

function a_xXx($url){
@define(ch,curl_init());
curl_setopt(ch,CURLOPT_URL,$url);
curl_setopt(ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt(ch,CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
curl_setopt(ch,CURLOPT_COOKIEJAR,"a_cookie-".time().".txt");
curl_setopt(ch,CURLOPT_COOKIEFILE,"a_cookie-".time().".txt");
curl_setopt(ch,CURLOPT_FOLLOWLOCATION,1);
curl_setopt(ch,CURLOPT_BINARYTRANSFER,1);
$r=curl_exec(ch);
$h=curl_getinfo(ch,CURLINFO_HTTP_CODE);
$valid['httpcode'] = $h;
    if ($h == 200) {
        $valid['result'] = true;
    } else {
        $valid['result'] = false;
    }
    return $valid;
curl_close(ch);
}
function a_banner(){
@system('clear');
echo "+------------------------------------+\n";
echo "|".$GLOBALS['a_m']."  ~ [ AutoVisitor Blog v1 CLI] ~ ".$GLOBALS['a_n']."   |\n";
echo "|------------------------------------|\n";
echo "| ".$GLOBALS['a_k']."c0ded by : alinko a.k.a shutdown57".$GLOBALS['a_n']." |\n";
echo "|------------------------------------|\n";
echo "| ".$GLOBALS['a_b']."linuXcode.org -".$GLOBALS['a_m']." dracos-linux.org ".$GLOBALS['a_n']."  |\n";
echo "+------------------------------------+\n";
}
a_banner();
echo $a_b."MASUKAN URL :".$a_n; $a_url=trim(fgets(STDIN));
echo $a_k."BERAPA?     :".$a_n; $a_brp=trim(fgets(STDIN));
	$u=(!preg_match("/^http:|^https:/",$a_url)) ? "http://".$a_url : $u=$a_url;
	for($i=1;$i<=$a_brp;$i++){
	if(a_xXx($u)){
		echo "[".$a_h."DONE".$a_n."][".$a_b."$i".$a_n."] ".$u."\n";
	}else{
		echo "[".$a_m."FAIL".$a_n."][".$a_b."$i".$a_n."] ".$u."\n";
	}
}
