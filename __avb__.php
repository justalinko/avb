<?php

/* AutoVisitor Blog v2.8
\* c0ded by : shutdown57 a.k.a alinko
/*----------------------------------
\*| Hargai karya orang kawand. :)  
/*| Jangan kaya BOCAH ganti nama author segala.
\*| Kalo cuma bisa "pake" ya, pake saja.. gak usah sok tau,
/*| Ganti Nama author segala, Emang situ dah Pro?
\*| Kalo dah "PRO" Bisa semua nya,buat sendiri lah bego.
/*| Nyadar kalo cuma bisa "pake" , hargai gan!
\*| NB : Setidaknya kalo recode tulis "recode by: " dan "Original code by:  "
/*|    - Biar apa? biar gak bego kayak bocah.
\*----------------------------------
*/

Class Avb_s57{
	public $UserAgent;

	public function visit_s57($url,$ua)
	{
		$c      = curl_init();
		$setopt = array(
			CURLOPT_URL=>$url,
			CURLOPT_USERAGENT=>$ua,
			CURLOPT_SSL_VERIFYPEER=>0,
			CURLOPT_HEADER=>0,
			CURLOPT_RETURNTRANSFER=>1,);
		curl_setopt_array($c,$setopt);
		$e=curl_exec($c);
		$hcode= curl_getinfo($c,CURLINFO_HTTP_CODE);
		return $e;
		curl_close($c);
	}
	public function getinfo_s57($u,$i,$t)
	{
		$b = "\033[1;34m"."[!]"."\033[1;37m";
		echo $b." URL / File      : ".$u."\n";
		echo $b." Type            : ".$t."\n";
		echo $b." Request visitor : ".$i."\n";
		echo $b." Starting time   : ".date('H:i:s | d m Y')."\n";
	}
	public function GrabUrl_s57($url,$ua){
		$c = curl_init();
		$setopt = array(
			CURLOPT_URL=>$url,
			CURLOPT_RETURNTRANSFER=>1,
			CURLOPT_USERAGENT=>$ua,
			CURLOPT_FOLLOWLOCATION=>1,
			CURLOPT_BINARYTRANSFER=>1,
			CURLOPT_SSL_VERIFYPEER=>0,
			CURLOPT_HEADER=>1,);
		curl_setopt_array($c,$setopt);
		$exec = curl_exec($c);
		preg_match_all("/http:\/\/".$url."\/[0-9]{4}\/[0-9]{2}(.*)\.html/",$exec,$u,PREG_PATTERN_ORDER);
		return $u;
	}
	public function getBlogInfo_s57($url,$ua,$regex)
	{
				$c = curl_init();
		$setopt = array(
			CURLOPT_URL=>$url,
			CURLOPT_RETURNTRANSFER=>1,
			CURLOPT_USERAGENT=>$ua,
			CURLOPT_FOLLOWLOCATION=>1,
			CURLOPT_BINARYTRANSFER=>1,
			CURLOPT_SSL_VERIFYPEER=>0,
			CURLOPT_HEADER=>1,);
		curl_setopt_array($c,$setopt);
		$exec = curl_exec($c);
		preg_match_all("/".$regex."/",$exec,$u,PREG_PATTERN_ORDER);
		return $u;
	}
	public function judul($url,$ua){
		$r = "<title>(.*)<\/title>";
		$k= $this->getBlogInfo_s57($url,$ua,$r);
		return $k[1][0];
	}
	public function profile($url,$ua)
	{
		$r="plus.google.com\/[0-9]{21}";
		$k = $this->getBlogInfo_s57($url,$ua,$r);
		$a = array_unique($k[0]);
		return $a;
	}
	public function blogger($url,$ua)
	{
		$r = "www.blogger.com\/profile\/[0-9]{20}";
		$k = $this->getBlogInfo_s57($url,$ua,$r);
		$a = array_unique($k[0]);
		return $a;
	}
	public function Save_s57($nama,$isi)
	{
		$fp = fopen($nama,'a');
		return fwrite($fp,$isi);
		fclose($fp);
	}
	public function Banner_s57()
	{
		$avb="avebe";
		$banner = "
   _________   ____    __________        
  /  _  \   \ /   /____\______   \ ____  
 /  /_\  \   Y   // __ \|    |  _// __ \ 
/    |    \     /\  ___/|    |   \  ___/ 
\____|__  /\___/  \___  >______  /\___  >
        \/            \/       \/     \/ 
+------------[[ AutoVisitor v2.8  ------------+
++-----------[[ by : shutdown57  -------------+
+--[[ indonesianpeople.shutdown57@gmail.com  -+
+---------------------------------------------+

$avb -u  <Value> : Masukan URL / Link blogMu, untuk single visitor link.
$avb -f  <Value> : Masukan File .txt yang berisi daftar link blog mu.
$avb -m  <Value> : Masukan Seberapa banyak visitor yang kamu butuhkan untuk blogmu.
$avb -o  <Value> : Membuat file output.
$avb -g  <Value> : Mendapatkan URL Artikel yang ada di blog.
$avb -h          : Memunculkan Pusat Bantuan

Contoh Penggunaan :

$avb -u http://www.alinko.jp -m 100
$avb -f list_url.txt -m 690
$avb -g http://www.alinko.jp -o output_list_url.txt

";
		printf($banner);
	}
}

$avb = new Avb_s57();
$avb->UserAgent = array("Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.1 Safari/537.36","Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36","Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2226.0 Safari/537.36","Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10; rv:33.0) Gecko/20100101 Firefox/33.0","Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:21.0) Gecko/20130331 Firefox/21.0","Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:21.0) Gecko/20100101 Firefox/21.0","Mozilla/5.0 (X11; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0","Mozilla/5.0 (Windows NT 6.2; WOW64; rv:21.0) Gecko/20130514 Firefox/21.0","Mozilla/5.0 (Windows NT 6.2; rv:21.0) Gecko/20130326 Firefox/21.0","Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20130401 Firefox/21.0","Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20130331 Firefox/21.0","Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20130330 Firefox/21.0","Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0","Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20130401 Firefox/21.0","Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20130328 Firefox/21.0","Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20100101 Firefox/21.0","Mozilla/5.0 (Windows NT 5.1; rv:21.0) Gecko/20130401 Firefox/21.0","Mozilla/5.0 (Windows NT 5.1; rv:21.0) Gecko/20130331 Firefox/21.0","Mozilla/5.0 (Windows NT 5.1; rv:21.0) Gecko/20100101 Firefox/21.0","Mozilla/5.0 (Windows NT 5.0; rv:21.0) Gecko/20100101 Firefox/21.0","Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:21.0) Gecko/20100101 Firefox/21.0","Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.75.14 (KHTML, like Gecko) Version/7.0.3 Safari/7046A194A","Mozilla/5.0 (iPad; CPU OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5355d Safari/8536.25","Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.13+ (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2","Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_3) AppleWebKit/534.55.3 (KHTML, like Gecko) Version/5.1.3 Safari/534.53.10","Mozilla/5.0 (iPad; CPU OS 5_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko ) Version/5.1 Mobile/9B176 Safari/7534.48.3","Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_8; de-at) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1","Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_7; da-dk) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1");
$warn = "\033[1;33m"."[!] "."\033[1;37m";
$dang = "\033[1;31m"."[-] "."\033[1;37m";
$succ = "\033[1;32m"."[+] "."\033[1;37m";
$info = "\033[1;34m"."[!] "."\033[1;37m";

$pdk = "u:";
$pdk.= "f:";
$pdk.= "m:";
$pdk.= "h:";
$pdk.= "g:";
$pdk.= "o:";

$JumlahUa = count($avb->UserAgent);
$au = rand(0,$JumlahUa);
$ua = $avb->UserAgent[$au];
$getopt = getopt($pdk);

if(!empty($getopt))
{
if(!empty($getopt['u'])&&!empty($getopt['m']))
{
	$avb->getinfo_s57($getopt['u'],$getopt['m'],"Single URL");
	$url = $getopt['u'];
	$byk = $getopt['m'];
	for($i=1;$i<=$byk;$i++)
	{
		if($avb->visit_s57($url,$ua)){
			echo $succ."[".$i."] ".$url."\n";
		}else{
			echo $dang."[".$i."] ".$url."\n";
		}
	}
}
if(!empty($getopt['f'])&&!empty($getopt['m']))
{
	if(file_exists($getopt['f']))
	{
		$url = $getopt['f'];
	}else{
		$url = "File ".$getopt['f']." tidak ada . \n";
		echo $url;
		exit;
	}
	$avb->getinfo_s57($getopt['f'],$getopt['m'],"Mass URL");
	$byk = $getopt['m'];
	$exp = explode("\n",file_get_contents($url));
	foreach($exp as $u)
	{
		for($i=1;$i<=$byk;$i++)
		{
			if($avb->visit_s57($u,$ua))
			{
				echo $succ."[".$i."] ".$u."\n";
			}else{
				echo $succ."[".$i."] ".$u."\n";
			}
		}
	}
}
if(!empty($getopt['g'])&&!empty($getopt['o']))
{
$url = $getopt['g'];
$fil = $getopt['o'];
$pg = (empty($avb->profile($url,$ua))) ? "Not Found" : $avb->profile($url,$ua)[0];
$pb = (empty($avb->blogger($url,$ua))) ? "Not Found" : $avb->blogger($url,$ua)[0];
echo $info."Judul Blog      : ".$avb->judul($url,$ua)."\n";
echo $info."URL Blog        : ".$url."\n";
echo $info."Profile G+      : ".$pg."\n";
echo $info."Profile Blogger : ".$pb."\n";
sleep(2);
echo $info."Membuat File ".$fil." ...\n";
echo $info."Mendapatkan URL dari ".$url.", Please Wait ...\n";
if(preg_match("/^https:/",$url)){
	echo $dang."Maaf, tapi tools ini tidak support protokol HTTPS, \n";
    echo $warn."Contact : indonesianpeople.shutdown57@gmail.com untuk support protokol https :) \n\n";
    exit;
}
$urli = str_replace("http://","",$url);
$grb=$avb->GrabUrl_s57($urli,$ua);
$uniq = array_unique($grb[0]);
echo $info."Mendapatkan [".count($uniq)."] Urls dari ".$url." ... \n\n";
foreach($uniq as $u)
{
	if($avb->Save_s57($fil,$u."\n")){
		echo $succ.$u."\n";
	}else{
		echo $dang.$u."\n";
	}
}
if(file_exists($fil)){
	$info."Output Grab URL tersimpan di : ".$fil." !! \n";
}
}

if(!empty($getopt['h'])){
	system('clear');
	sleep(1);
	$avb->Banner_s57();
}
}else{
	system('clear');
	sleep(1);
	$avb->Banner_s57();
}