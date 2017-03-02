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
echo "|  Version        : 2.0             |\n";
echo "|   Author        : shutdown57      |\n";
echo "+-----------------------------------+\n";

	}
}

$avb = new Avb();
$avb->UserAgent=array(
	"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)",
	"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:50.0) Gecko/20100101 Firefox/50.0");
$avb->random=rand(0,1);
$avb->bannerX();

echo "list url blog  : "; $l = trim(fgets(STDIN));
echo "berapa banyak  : "; $b = trim(fgets(STDIN));
$avb->Alamat=$avb->pisahUrl($l);
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
