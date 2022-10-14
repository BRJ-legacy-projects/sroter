<?php
error_reporting(0);
session_start();

$a = htmlspecialchars($_POST[a]);
$b = htmlspecialchars($_POST[b]);
$c = htmlspecialchars($_POST[c]);
$a = htmlspecialchars($_GET[a]);
$b = htmlspecialchars($_GET[b]);
$c = htmlspecialchars($_GET[c]);

if ($b == "") {
?>
<html>
<head>
<title>Baraja Šroter 2.0 - Systém nové generace</title>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
<style type="text/css">
body {background-image: url("data_sroter/tapeta.png"); background-attachment: fixed}
#okno_1 { position:absolute; left:350px;  top:150px  }
.infobox    { width: 500px;  
              border: 1px #000000 solid; 
              cursor: default;
              text-align: left;
              cursor: pointer;
              background-color: #ffffff;  
            } 
#horni {position: fixed;} #horni {position: "absolute";} #horni {top: 0px; left: 0px; width:100%} </style>
<script> function fixedEl(id){ if(document.all){ document.all[id].style.pixelTop = document.body.scrollTop + ; }} </script>
</head>
<body onload="init();adsize();">
<body>
<?php if($_SESSION['user'] == "") { ?>
<div id="horni">
<table border="1" cellpadding="3" width="100%" height="35" style="border-collapse: collapse" background="data_sroter/pruh2.png">
<tr><td>
<table width="100%" cellpadding="3">
<tr><td></td><td width="70"><font color="#FFFFFF"><div id="local-time"><?php echo date("H:i:s"); ?></div></font>
<script type="text/javascript">
var time_offset = 1000 * <?php echo time(); ?> - (new Date()).getTime();
window.setInterval(function () {
    var local_time = new Date();
    local_time.setTime(local_time.getTime() + time_offset);
    var min = local_time.getMinutes();
    var sec = local_time.getSeconds();
    document.getElementById('local-time').innerHTML = local_time.getHours() + ':' + (min < 10 ? '0' : '') + min + ':' + (sec < 10 ? '0' : '') + sec;
}, 1000);
</script></td></tr>
</table>
</td></tr>
</table>
</div>
<!-- rozdelovac panelu a okna -->
<?php $filename = 'data_sroter/admin.txt'; if (file_exists($filename)) { ?>
<div id="okno_1" class="infobox" onmousedown="grab(this)">
<form action="sroter.php" method="post"><input type="hidden" name="b" value="login"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td background="data_sroter/pruh.png" height="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font color="#FFFFFF">Vítá vás systém Baraja Šroter 2.0</font></b></td></tr><tr><td bgcolor="white" valign="top">
<table><tr><td width="15"></td><td><br><table>
        <tr><td height="15"></td><td width="450"></td><td></td></tr>
        <tr><td></td><td><b><font size="2" face="Arial">Přihlašovací jméno:</font></b></td><td></td></tr>
        <tr><td width="20">&nbsp;</td><td valign="top" height="55"><input type="text" value="admin" style="height:30px; padding: 3px; border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px; border: 1px; border-style: solid; border-color: #3079ed; width:100%;" name="a"></td><td width="20">&nbsp;</td></tr>
        <tr><td></td><td><b><font size="2" face="Arial">Heslo:</font></b></td><td></td></tr>
        <tr><td width="20">&nbsp;</td><td valign="top" height="55"><input type="password" value="" style="height:30px; padding: 3px; border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px; border: 1px; border-style: solid; border-color: #3079ed; width:100%;" name="c"></td><td width="20">&nbsp;</td></tr>
        <tr><td width="20">&nbsp;</td><td><input type="submit" style="height:35px; padding: 1px; border-radius: 1px; -moz-border-radius: 1px; -webkit-border-radius: 1px; background-color:#4c8ffb; border: 1px; border-style: solid; border-color: #3079ed" value="   Přihlásit se   "></td><td width="20">&nbsp;</td></tr>
        <tr><td height="15"></td><td></td><td></td></tr>
</table><br></td></tr></table></td></tr></table></form></div>
<?php } else { ?>
<div id="okno_1" class="infobox" onmousedown="grab(this)">
<form action="sroter.php" method="post"><input type="hidden" name="b" value="reg"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td background="data_sroter/pruh.png" height="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font color="#FFFFFF">Instalace systému</font></b></td></tr><tr><td bgcolor="white" valign="top">
<br><table><tr><td width="15"></td><td>Vítá vás webový správce souborů a serverů.<br><br>Zvolte si dostatečně silné heslo a vyčkejte několik okamžiků, systém se nainstaluje a připravý do plného chodu.</td></tr></table>
<table>
        <tr><td height="15"></td><td width="450"></td><td></td></tr>
        <tr><td></td><td><b><font size="2" face="Arial">Heslo:</font></b></td><td></td></tr>
        <tr><td width="20">&nbsp;</td><td valign="top" height="55"><input type="password" value="" style="height:30px; padding: 3px; border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px; border: 1px; border-style: solid; border-color: #3079ed; width:100%;" name="c"></td><td width="20">&nbsp;</td></tr>
        <tr><td width="20">&nbsp;</td><td><input type="submit" style="height:35px; padding: 1px; border-radius: 1px; -moz-border-radius: 1px; -webkit-border-radius: 1px; background-color:#4c8ffb; border: 1px; border-style: solid; border-color: #3079ed" value="  Zvolit heslo a nainstalovat   "></td><td width="20">&nbsp;</td></tr>
        <tr><td height="15"></td><td></td><td></td></tr>
</table><br></td></tr></table></td></tr></table></form></div>
<?php } ?>
<?php } else { ?>
<div id="horni">
<table border="1" cellpadding="3" width="100%" height="35" style="border-collapse: collapse" background="data_sroter/pruh2.png">
<tr><td>
<table width="100%" cellpadding="3">
<tr><td></td>
<td width="150"><p style="text-align: right; color: #FFFFFF;"><?php echo $_SESSION['user']; ?> | </p></td>
<td width="70"><font color="#FFFFFF"><div id="local-time"><?php echo date("H:i:s"); ?></div></font>
<script type="text/javascript">
var time_offset = 1000 * <?php echo time(); ?> - (new Date()).getTime();
window.setInterval(function () {
    var local_time = new Date();
    local_time.setTime(local_time.getTime() + time_offset);
    var min = local_time.getMinutes();
    var sec = local_time.getSeconds();
    document.getElementById('local-time').innerHTML = local_time.getHours() + ':' + (min < 10 ? '0' : '') + min + ':' + (sec < 10 ? '0' : '') + sec;
}, 1000);
</script></td></tr>
</table>
</td></tr>
</table>
</div>
<!-- rozdelovac panelu a okna -->
<br><br>
<?php

if ($a != "" and $b != "terminal") { echo '<br><table border="1" cellpadding="0" width="100%" style="border-collapse: collapse" bgcolor="#FFFFFF">
   <tr><td background="data_sroter/pruh.png"><table width="100%" cellpadding="0"><tr><td width="22" valign="top"><a href="sroter.php"><img src="data_sroter/krizek.png" border="0"></a></td><td width="10"></td><td><font color="white">'.$a.'</font></td></tr></table></td></tr>	
	<tr>
		<td height="50">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td width="15"></td>
				<td width="200" valign="top"><br>
<table width="100%">
<tr><td width="15"><img src="data_sroter/folder_link.gif"></td><td>'; echo '<a href="sroter.php?a='; $posouvani_slozek = explode('/', $a);
if ($posouvani_slozek[0] == "") { echo $posouvani_slozek[0].'/'; }
if ($posouvani_slozek[0] != "" and $posouvani_slozek[1] != "" and $posouvani_slozek[2] == "") { echo $posouvani_slozek[0]; }
if ($posouvani_slozek[0] != "" and $posouvani_slozek[1] != "" and $posouvani_slozek[2] != "" and $posouvani_slozek[3] == "") { echo $posouvani_slozek[0].'/'.$posouvani_slozek[1]; }
if ($posouvani_slozek[0] != "" and $posouvani_slozek[1] != "" and $posouvani_slozek[2] != "" and $posouvani_slozek[3] != "" and $posouvani_slozek[4] == "") { echo $posouvani_slozek[0].'/'.$posouvani_slozek[1].'/'.$posouvani_slozek[2]; }
if ($posouvani_slozek[0] != "" and $posouvani_slozek[1] != "" and $posouvani_slozek[2] != "" and $posouvani_slozek[3] != "" and $posouvani_slozek[4] != "" and $posouvani_slozek[5] == "") { echo $posouvani_slozek[0].'/'.$posouvani_slozek[1].'/'.$posouvani_slozek[2].'/'.$posouvani_slozek[3]; }
if ($posouvani_slozek[0] != "" and $posouvani_slozek[1] != "" and $posouvani_slozek[2] != "" and $posouvani_slozek[3] != "" and $posouvani_slozek[4] != "" and $posouvani_slozek[5] != "" and $posouvani_slozek[6] == "") { echo $posouvani_slozek[0].'/'.$posouvani_slozek[1].'/'.$posouvani_slozek[2].'/'.$posouvani_slozek[3].'/'.$posouvani_slozek[4]; }
echo '">O nadřazený adresář výš</a></td></tr>
<tr><td width="15"><img src="data_sroter/reload.gif"></td><td><a href="sroter.php?a='.$a.'">Aktualizovat adresář</a></td></tr>
<tr><td width="15"><img src="data_sroter/list_tree.gif"></td><td>Vypsat jako seznam</td></tr>
<tr><td width="15"><img src="data_sroter/not.png"></td><td>Smazat soubory, adresář</td></tr>
<tr><td width="15"> </td><td>Nastavení adresáře</td></tr>
</table><br><br>';
				echo '<table border="1" cellpadding="0" width="100%" style="border-collapse: collapse" height="172">
					<tr>
						<td valign="top" bgcolor="#929CFE">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td width="10">&nbsp;</td>
								<td><br><font size="2"><b>Upozornění:</b><br><br>Názvy dlouhých souborů se nemusejí zobrazit celé. Pokud chcete překopírovat jméno souboru přesně, tak ho nejprve otevřete kliknutím.</font></td>
								<td width="10">&nbsp;</td>
							</tr>
						</table>
						</td>
					</tr>
				</table><br>
				</td>
				<td width="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
				<td valign="top" bgcolor="#FFFFFF">&nbsp;'; }		
if ($a == "") { $open_slozka = '.'; } else { $open_slozka = $a; } 		
$nas_sou = 'sroter.php';
$handle=opendir($open_slozka); 
$i=0;                                               
$j=0;
while (false!==($file = readdir($handle))) 
{ 
    if ($file!="."&&$file!=".."&&!is_dir($file)&&$file!=$nas_sou) 
    { 
        $soubor[$i]="$file";
        $velikost[$i]=filesize ($file);
        $zmena[$i]=date("H:i:s d.m.Y ",filemtime($file));
        $i++;
    } 
    if ($file != "." && is_dir($file))
    {
       $adresar[$j]="$file";
        $j++;
    }
}
function vypis($s,$v,$z)
{
       for($i=0;$i<count($s);$i++)
       { $data_typ = $s[$i]; $data_typ = explode('.', $data_typ); if ($data_typ[1] != "") { echo '<div style="float:left; width: 96px; margin-right: auto; top: 100;"><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="8" height="8"></td>
				<td width="80" height="8"></td>
				<td width="8" height="8"></td>
			</tr>
			<tr>
				<td width="8">&nbsp;</td>
				<td width="80">
				<p align="center">
				<a href="'; $a = htmlspecialchars($_GET[a]); if ($a != "") { echo $a.'/'; } echo $s[$i].'"><img border="0" src="'; if ($data_typ[1] == "png" or $data_typ[1] == "PNG" or $data_typ[1] == "gif" or $data_typ[1] == "cz" or $data_typ[1] == "GIF" or $data_typ[1] == "jpg" or $data_typ[1] == "JPG" or $data_typ[1] == "jpeg" or $data_typ[1] == "JPEG" or $data_typ[1] == "bmp" or $data_typ[1] == "BMP" or $data_typ[1] == "tif" or $data_typ[1] == "TIF") { if ($a == "") { echo $s[$i]; } else { echo $a.'/'.$s[$i]; } } else { echo 'http://www.sroter.baraja.cz/dokument.gif'; } echo '" width="32" height="32"></a></td>
				<td width="8">&nbsp;</td>
			</tr>
			<tr>
				<td width="8">&nbsp;</td>
				<td width="80" bgcolor="#FFFFFF">
				<p align="center"><font size="1" face="Arial"><a href="'; if ($a != "") { echo $a.'/'; } echo $s[$i].'">'; $pocets = mb_strlen($s[$i]); if ($pocets > 14) { $delka = mb_substr($s[$i], 0, 13); echo $delka.'...'; } else { echo $s[$i]; } echo '</a></font></td>
				<td width="8">&nbsp;</td>
			</tr>
		</table></div>'."\n"; } else { echo '<div style="float:left; width: 96px; margin-right: auto; top: 100;"><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="8" height="8"></td>
				<td width="80" height="8"></td>
				<td width="8" height="8"></td>
			</tr>
			<tr>
				<td width="8">&nbsp;</td>
				<td width="80">
				<p align="center">
					<a href="sroter.php?a='; $a = htmlspecialchars($_GET[a]); if ($a != "") { echo $a.'/'; } echo $s[$i].'"><img border="0" src="http://www.sroter.baraja.cz/slozka.png" width="32" height="32"></a></td>
				<td width="8">&nbsp;</td>
			</tr>
			<tr>
				<td width="8">&nbsp;</td>
				<td width="80" bgcolor="#FFFFFF">
				<p align="center"><font size="1" face="Arial"><a href="sroter.php?a='; $a = htmlspecialchars($_GET[a]); if ($a != "") { echo $a.'/'; } echo $s[$i].'">'.$s[$i].'</a></font></td>
				<td width="8">&nbsp;</td>
			</tr>
		</table></div>'."\n"; }
       }                          
}
function vypis_slozek($s,$v,$z)
{ for($i=0;$i<count($s);$i++)
       { if ($s[$i] != ".." and $s[$i] != "data_sroter") {
        echo '<div style="float:left; width: 96px; margin-right: auto; top: 100;"><table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="8" height="8"></td>
				<td width="80" height="8"></td>
				<td width="8" height="8"></td>
			</tr>
			<tr>
				<td width="8">&nbsp;</td>
				<td width="80">
				<p align="center">
					<a href="sroter.php?a='; $a = htmlspecialchars($_GET[a]); if ($a != "") { echo $a.'/'; } echo $s[$i].'"><img border="0" src="http://www.sroter.baraja.cz/slozka.png" width="32" height="32"></a></td>
				<td width="8">&nbsp;</td>
			</tr>
			<tr>
				<td width="8">&nbsp;</td>
				<td width="80" bgcolor="#FFFFFF">
				<p align="center"><font size="1" face="Arial"><a href="sroter.php?a='; $a = htmlspecialchars($_GET[a]); if ($a != "") { echo $a.'/'; } echo $s[$i].'">'.$s[$i].'</a></font></td>
				<td width="8">&nbsp;</td>
			</tr>
		</table></div>'."\n";
       } }                          
}
vypis_slozek($adresar,"","");
vypis($soubor, $velikost, $zmena);
if ($a != "" and $b == "") { echo '</td>
			</tr>
		</table>
		</td>
	</tr>
</table>'; }
 } ?>
</body>
</html>

<?php } else { // mimo aplikaci
if ($b == "login") {
$heslo = file_get_contents('data_sroter/admin.txt');
$hh = MD5($c);
if ($heslo == $hh) { $_SESSION['user']=$a; }
}
if ($b == "reg" and $c != "") {
$heslo = MD5($c);
file_put_contents('data_sroter/admin.txt', $heslo);
}

echo 'Čekejte prosím... <meta http-equiv="refresh" content="0;url=sroter.php">';
} ?>