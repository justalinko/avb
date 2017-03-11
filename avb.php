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


class Avb{
	public $UserAgent;
	public $Alamat;
	public $Url;
	public $random;
	public $pisahUrl;
	public function visit($url,$ua){
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_USERAGENT,$ua);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
		$e=curl_exec($ch);
		curl_close($ch);
		return $e;
	}
	public function pisahUrl($list){
		$fgt = file_get_contents($list);
		$exp = explode("\n",$fgt);
		return $exp;
	}
	public function GrabUrl($url){
		@define(ch,curl_init());
		curl_setopt(ch,CURLOPT_URL,"http://".$url);
		curl_setopt(ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt(ch,CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
		curl_setopt(ch,CURLOPT_FOLLOWLOCATION,1);
		curl_setopt(ch,CURLOPT_BINARYTRANSFER,1);
		$exec = curl_exec(ch);
		preg_match_all("/http:\/\/".$url."\/[0-9]{4}\/[0-9]{2}(.*)\.html/",$exec,$u,PREG_PATTERN_ORDER);
		return $u;
	}
	public function SimpanX($link){
		if(!file_exists('/opt/avb/url')){
			@mkdir('/opt/avb/url');
		}
		$tgl =date('dmY');
		$fp = fopen("/opt/avb/url/".$tgl.".txt","a");
		return fwrite($fp,$link."\n");
		fclose($fp);
	}
	public function bannerX(){
		@system('clear');
	
echo "    ___     ______          ____    \n";
echo "   / \ \   / / __ )  __   _|___ \   \n";
echo "  / _ \ \ / /|  _ \  \ \ / / __) |  \n";
echo " / ___ \ V / | |_) |  \ V / / __/   \n";
echo "/_/   \_\_/  |____/    \_/ |_____|  \n";
echo "                                    \n";
echo "+-----------------------------------+\n";
echo "|   Auto Visitor Blog Version 2.0   |\n";
echo "| Codename        : MakanBang!      |\n";
echo "|  Version        : 2.1             |\n";
echo "|   Author        : shutdown57      |\n";
echo "+-----------------------------------+\n";
echo "[ 1 ] Grab URL Blog ~ \n";
echo "[ 2 ] Run AutoVisitor ~ \n";
	}
}

$avb = new Avb();
$avb->UserAgent=array(
	"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)",
	"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:50.0) Gecko/20100101 Firefox/50.0");
$avb->random=rand(0,1);
$avb->bannerX();
echo "optionz >> :"; $makan = trim(fgets(STDIN));


if($makan == "1"){
@system('clear');
echo "url blog <GakUsahPakeHttp> : "; $xurl = trim(fgets(STDIN));
$url = $avb->GrabUrl($xurl);
$urls = array_unique($url[0]);
foreach($urls as $u){
if($avb->SimpanX($u)){
	echo "$u \n";
}
}
}elseif($makan == "2"){
@system('clear');
if(!file_exists('/opt/avb/url/'.date('dmY').'.txt')){
echo "list url blog  : "; $l = trim(fgets(STDIN));
}
echo "berapa banyak  : "; $b = trim(fgets(STDIN));
$lub = (empty($l)) ? "/opt/avb/url/".date('dmY').".txt" : $l ;
$avb->Alamat=$avb->pisahUrl($lub);
$i=1;
foreach($avb->Alamat as $avb->Url){
		for($x=1;$x<=$b;$x++){
	if($avb->visit($avb->Url,$avb->UserAgent[$avb->random])){
		@system('clear');
		echo "[ ".$x." ] ".$avb->Url."\n";
		echo "Waiting For You ...";
	}
	}
}
}
