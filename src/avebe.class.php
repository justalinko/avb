<?php
/*
@ Auto Visitor Blog v3
@ c0ded by shutdown57
@ indonesianpeople.shutdown57@gmail.com
*/
Class Avebe_s57{
	public $userAgent;
	public $Referrer;
	public function __construct()
	{if(strtolower(substr(PHP_OS,0,3)) == "win"){$os = 'win';}else{$os = 'nix';}
	if($os=="win"){echo "Your Operating System Not Supported this software \n Try using linux :* \n\n\n"; exit();}
	}
	public function GrabProxy57($page=NULL)
{
	$head=array();
	$head[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8";
    $head[] = "Accept-Language: en-US,en;q=0.8";
    $head[] = "Referer: http://free-proxy.cz/en";
    $head[] = "Upgrade-Insecure-Requests: 1";
	$c=curl_init("http://free-proxy.cz/en/proxylist/country/all/socks5/speed/all/".$page);
	$s=array(
		CURLOPT_USERAGENT=>"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0",
		CURLOPT_HEADER=>false,
		CURLOPT_RETURNTRANSFER=>true,
		CURLOPT_HTTPHEADER=>$head,
		CURLOPT_FOLLOWLOCATION=>true);
	curl_setopt_array($c,$s);
	$e=curl_exec($c);
	curl_close($c);
	return $e;
}

	public function CekSocks57($socks)
	{
		$s=array(
			CURLOPT_URL=>"http://www.linuxcode.org",
			CURLOPT_RETURNTRANSFER=>true,
			CURLOPT_HTTPPROXYTUNNEL=>true,
			CURLOPT_PROXY=>$socks,
			CURLOPT_PROXYTYPE=>CURLPROXY_SOCKS5,
			CURLOPT_TIMEOUT=>10);
		$c=curl_init();
		curl_setopt_array($c,$s);
		curl_exec($c);
		return curl_getinfo($c,CURLINFO_HTTP_CODE);
	}
	public function visit57($uri,$ua,$ref,$socks=0)
	{
		@mkdir("/tmp/avb/",0755);
		$cookie="/tmp/avb/avebe-cookieID".time().".txt";
		$c=curl_init();
		$s=array(
			CURLOPT_URL=>$uri,
			CURLOPT_RETURNTRANSFER=>true,
			CURLOPT_REFERER=>$ref,
			CURLOPT_USERAGENT=>$ua,
			CURLOPT_FOLLOWLOCATION=>true,
			CURLOPT_COOKIEJAR=>$cookie,
			CURLOPT_COOKIEFILE=>$cookie);
		if($socks):
			curl_setopt($c,CURLOPT_HTTPPROXYTUNNEL,true);
			curl_setopt($c,CURLOPT_PROXY,$socks);
			curl_setopt($c,CURLOPT_PROXYTYPE,CURLPROXY_SOCKS5);
		endif;
		curl_setopt_array($c,$s);
		$x=curl_exec($c);
		return curl_getinfo($c,CURLINFO_HTTP_CODE);//200 OK
	}
	public function sLog57($content)
	{
		$dirlog="/var/log/avb";
		if(!@file_exists($dirlog."/file-exists-.shutdown57"))
			@mkdir($dirlog); file_put_contents($dirlog."/file-exists-.shutdown57","AvEbe SystEm By shutdown57 \n -Installed : ".date('d m Y H:i:s')."\n\n");
			$f="[ ".date('D , d m Y - H:i:s ')." | Visiting : ".$content[0]." | Status : ".$content[1]." | Referer : ".$content[2]." | UserAgent : ".$content[3]." | Socks : ".$content[4]."] \n";
			$fp=fopen($dirlog."/".date('d-m-y').".avblog","a"); 
			fwrite($fp,$f);
			fclose($fp);
	}
	public function GetSrc57($file)
	{
		$fgc=file_get_contents(__DIR__."/".$file);
		$e=explode("\n",$fgc);
		return $e;
	}
	public function BeautyRes57($c,$num,$site,$status)
	{
		$m="\033[1;31m";
		$h="\033[1;32m";
		$k="\033[1;33m";
		$n="\033[0m";
		if($c=="1")
		{
			echo "|$k AVeBe $n| ".$this->NoPad57($status,3," ")."$h OK $n| ".$this->NoPad57($num,4,"0")." | ".$this->NoPad57($site,53," ",STR_PAD_BOTH)." |\n";
		}elseif($c=="0")
		{
			echo "|$k AVeBe $n| ".$this->NoPad57($status,3," ")."$m KO $n| ".$this->NoPad57($num,4,"0")." | ".$this->NoPad57($site,53," ",STR_PAD_BOTH)." |\n";
		}
	}
	public function NoPad57($number,$n,$str,$t=STR_PAD_LEFT) {
	return str_pad($number,$n,$str,$t);
	}
	public function JdlUrl57($url)
   {
   	preg_match("/http:\/\/(.*)\/[0-9]{4}\/[0-9]{2}/",$url,$m);
   	$s=str_replace($m,"",$url);
   	$s=str_replace("-"," ",$s);
   	$s=str_replace(".html","",$s);
   	$s=str_replace("/","",$s);
   	return strtolower($s);
   }
		public function getinfo_s57($u,$i,$t)
	{
		$b = "\033[1;34m"."[i]"."\033[1;37m";
		echo $b." URL / File      : ".$u."\n";
		echo $b." Type            : ".$t."\n";
		echo $b." Request visitor : ".$i."\n";
		echo $b." Starting time   : ".date('H:i:s | d m Y')."\n";
	}
	public function GrabUrl_s57($url){
		$c = curl_init();
		$setopt = array(
			CURLOPT_URL=>$url,
			CURLOPT_RETURNTRANSFER=>1,
			CURLOPT_FOLLOWLOCATION=>1,
			CURLOPT_BINARYTRANSFER=>1,
			CURLOPT_SSL_VERIFYPEER=>0,
			CURLOPT_HEADER=>1,);
		curl_setopt_array($c,$setopt);
		$exec = curl_exec($c);
		preg_match_all("/http:\/\/".$url."\/[0-9]{4}\/[0-9]{2}(.*)\.html/",$exec,$u,PREG_PATTERN_ORDER);
		return $u;
	}
	public function getBlogInfo_s57($url,$regex)
	{
				$c = curl_init();
		$setopt = array(
			CURLOPT_URL=>$url,
			CURLOPT_RETURNTRANSFER=>1,
			CURLOPT_FOLLOWLOCATION=>1,
			CURLOPT_BINARYTRANSFER=>1,
			CURLOPT_SSL_VERIFYPEER=>0);
		curl_setopt_array($c,$setopt);
		$exec = curl_exec($c);
		preg_match_all("/".$regex."/",$exec,$u,PREG_PATTERN_ORDER);
		return $u;
	}
	public function judul($url){
		$r = "<title>(.*)<\/title>";
		$k= $this->getBlogInfo_s57($url,$r);
		return $k[1][0];
	}
	public function profile($url)
	{
		$r="plus.google.com\/[0-9]{21}";
		$k = $this->getBlogInfo_s57($url,$r);
		$a = array_unique($k[0]);
		return $a;
	}
	public function blogger($url)
	{
		$r = "www.blogger.com\/profile\/[0-9]{20}";
		$k = $this->getBlogInfo_s57($url,$r);
		$a = array_unique($k[0]);
		return $a;
	}
	public function Save_s57($nama,$isi)
	{
		$fp = fopen($nama,'a');
		return fwrite($fp,$isi);
		fclose($fp);
	}
	public function Banner57()
	{
		$banner = "                           
> |  _____ _____     _____      | v3 (c) 2017
< | |  _  |  |  |___| __  |___  | VisitorBlog v3.0
> | |     |  |  | -_| __ -| -_| | @github : alintamvanz
< | |__|__|\___/|___|_____|___| | c0ded by shutdown57
> x ----------------------------+
";
		printf($banner);
	}
	public function Help57()
	{$avb="avebe";
		$help = "
$avb -u  <Value> : Masukan URL / Link blogMu, untuk single visitor link.
$avb -l  <Value> : Masukan File .txt yang berisi daftar link blog mu.
$avb -m  <Value> : Masukan Seberapa banyak visitor yang kamu butuhkan untuk blogmu.
$avb -o  <Value> : Membuat file output.
$avb -g  <Value> : Mendapatkan URL Artikel yang ada di blog. ( Grab URL)
$avb -s  <Value> : Masukan List Socks Proxy.
$avb -z  <Value> : Mendapatkan Socks Proxy (Grab Socks)
$avb -h          : Memunculkan Pusat Bantuan

Contoh Penggunaan :

$avb -u http://www.alinko.jp -m 100
$avb -l list_url.txt -m 690
$avb -g http://www.alinko.jp -o output_list_url.txt
$avb -u http://www.alinko.jp -m 100 -s socks.txt
$avb -z output_socks.txt -m 10
";
print_r($help);
	}
}
