<?php
/*
@ Auto Visitor Blog v3
@ c0ded by shutdown57
@ indonesianpeople.shutdown57@gmail.com
*/

@require "src/avebe.class.php";

$avb=new Avebe_s57();
$avb->UserAgent = $avb->GetSrc57("UserAgent.avebe.list");
$avb->Referrer  = $avb->GetSrc57("Referrer.avebe.list");
$lo="u:";$lo.="l:";$lo.="s:";$lo.="m:";$lo.="g:";$lo.="o:";$lo.="z:";
$o=getopt($lo);
//$ua=$avb->UserAgent[rand(0,count($avb->UserAgent))];

$warn = "\033[1;33m"."[!] "."\033[1;37m";
$dang = "\033[1;31m"."[-] "."\033[1;37m";
$succ = "\033[1;32m"."[+] "."\033[1;37m";
$info = "\033[1;34m"."[i] "."\033[1;37m";

if(empty($o)||@$o['h'])
{
$avb->Banner57();
$avb->Help57();
}else{
	if(isset($o['u'])&&isset($o['m'])||isset($o['u'])&&isset($o['m'])&&isset($o['s']))
	{$socks=(empty($o['s'])) ? "" : explode("\n",file_get_contents($o['s']));
		for ($i=1; $i <=ceil($o['m']); $i++) { 
			$j=count($avb->UserAgent);$j2=count($avb->Referrer);$j3=count($socks);
			$r=rand(0,$j);$r2=rand(0,$j2);$r3=rand(0,$j3);
			@$au=$avb->UserAgent[$r]; @$ref=$avb->Referrer[$r2]; @$sock=$socks[$r3];
			$visit=$avb->visit57($o['u'],$au,$ref,$sock);
			if($visit=="200")
			{
				$avb->BeautyRes57(1,$i,substr($o['u'],0,50),$visit);
			}else{
				$avb->BeautyRes57(0,$i,substr($o['u'],0,50),$visit);
			}
			$slog=array($o['u'],$visit,$ref,$au,$sock);
			$avb->sLog57($slog);
		}
	}
	if(isset($o['g'])&&isset($o['o']))
	{
	//system('clear');
	$avb->Banner57();
	echo "\n\n";
	echo "Please Wait ... \n\n";
	$url=$o['g'];
	$fil=$o['o'];
	$pg=(empty($avb->profile($url))) ? "Not Found" : $avb->profile($url)[0];
	$pb=(empty($avb->blogger($url))) ? "Not Found" : $avb->blogger($url)[0];
	$jdl=(empty($avb->judul($url))) ? "Unknown - avebe3" : $avb->judul($url);
	@system('clear');
	$avb->Banner57();
	echo "\n\n";
	echo $info."Judul Blog : ".$jdl."\n";
	echo $info."URL Blog   : ".$url."\n";
	echo $info."Profile G+ : ".$pg."\n";
	echo $info."Blogger    : ".$pb."\n";
	sleep(1);
	echo "Membuat file \"".$fil."\" ... \n";
	touch($fil);sleep(1);
	echo "Mendapatkan URL List dari \"".$url."\" ... \n";
	if(preg_match("/^https:/",$url)){
	echo $dang."Maaf, tapi tools ini tidak support protokol HTTPS, \n";
    echo $warn."Contact : indonesianpeople.shutdown57@gmail.com untuk support protokol https :) \n\n";
    exit;}
    $urli=str_replace("http://","",$url);
    $grb=$avb->GrabUrl_s57($urli);
    $grb=array_unique($grb[0]);
    foreach($grb as $lurl)
    {
    if($avb->Save_s57($fil,$lurl."\n")){
		echo $succ.$lurl." -> saved to $fil OK ! \n";
	}else{
		echo $dang.$lurl." -> can't save \n";
	}
    }
	$info."Output Grab URL tersimpan di : ".$fil." !! \n";
	}
	if(isset($o['z'])&&isset($o['m']))
	{
		for($i=0;$i<=$o['m'];$i++){
		$grb=$avb->GrabProxy57($i);
		@preg_match_all("/(?<=.decode\(\")[^\"]*/",$grb,$ip);
		@preg_match_all("/(?<=''>)[0-9]*/",$grb,$port);
		$n=0;
		foreach($ip[0] as $ip)
		{
		$socks=base64_decode($ip).":".$port[0][$n++];
		//echo "Ceking ... \n";
		//echo $socks."-> ".$avb->CekSocks57($socks)."\n";
		$ceksok=$avb->CekSocks57($socks);
		$avb->Save_s57($o['z'],$socks."\n");
		if($ceksok=="200")
		{
			//echo "LIVE ".$socks."\n";
			$avb->BeautyRes57(1,$n,$socks,$ceksok);
			$avb->Save_s57("live-".$o['z'],$socks."\n");
		}else{
			//echo "DEAD ".$socks."\n";
			$avb->BeautyRes57(0,$n,$socks,$ceksok);
			$avb->Save_s57("dead-".$o['z'],$socks."\n");
		}
		}
		}
	}
	if(isset($o['l'])&&isset($o['m'])||isset($o['l'])&&isset($o['m'])&&isset($o['s']))
	{
	$socks=(empty($o['s'])) ? "" : explode("\n",file_get_contents($o['s']));
		for ($i=1; $i <=ceil($o['m']); $i++) { 
			$j=count($avb->UserAgent);$j2=count($avb->Referrer);$j3=count($socks);
			$r=rand(0,$j);$r2=rand(0,$j2);$r3=rand(0,$j3);
			@$au=$avb->UserAgent[$r]; @$ref=$avb->Referrer[$r2]; @$sock=$socks[$r3];
			$lu=explode("\n",file_get_contents($o['l']));
			foreach($lu as $u){
			$visit=$avb->visit57($u,$au,$ref,@$sock);
			system('clear');
				$avb->Banner57();
				echo "\n\n";
				echo "R u n n i n g . . . \n\n";
				echo "+".$avb->NoPad57("---",79,"-",STR_PAD_BOTH)."+\n";
				echo "| AVeBe | STATUS | MUCH | ".$avb->NoPad57("T I T L E",53," ",STR_PAD_BOTH)." |\n";
				echo "+".$avb->NoPad57("---",79,"-",STR_PAD_BOTH)."+\n";
			if($visit=="200")
			{
				$avb->BeautyRes57(1,$i,$avb->JdlUrl57($u),$visit);
				//echo "[$i] ".$avb->JdlUrl57($u);
			}else{
				$avb->BeautyRes57(0,$i,$avb->JdlUrl57($u),$visit);
			}
			$slog=array($u,$visit,$ref,$au,$sock);
			$avb->sLog57($slog);
			echo "+".$avb->NoPad57("---",79,"-",STR_PAD_BOTH)."+\n";
			echo "| URL : ".$avb->NoPad57(substr($u,0,50)."..",71," ",STR_PAD_BOTH)." |\n";
			echo "+".$avb->NoPad57("---",79,"-",STR_PAD_BOTH)."+\n";
		}
		}		
	}
}
