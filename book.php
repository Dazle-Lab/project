<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>myxaru.ru</title>
<meta charset="utf-8"><link rel='stylesheet' type='text/css'>


<script src="jQuery/jquery-1.7.2.js"></script>


<script src="1.js"></script>
	


	
		<style type="text/css">
		



 </style>
 



           </head>
           <body>	
		   
	<div class="tverd">
<?php
include("shablon/allchat.php");
?>
</div>	 


<div class="contback2">
</div>		 




<div class="content16">

<img src="img/342.png" class="ranran4" />
<div class="toggler16">


<p68>Добавить вашу книгу за 2 голоса</p68><br><br>

<table class="myztabniz"><tr><td colspan="2">

<form name="formaniz" action="shablon/polzbook.php" method="post" enctype="multipart/form-data">
<textarea type="text" id="mess_fil" name="mess_name" placeholder="Название книги"></textarea>
<textarea type="text" id="mess_fil2" name="mess_aft" placeholder="Аффтор"></textarea>
<textarea type="text" id="mess_fil2" name="mess_zanr" minlength="4" placeholder="Жанр"></textarea>
<textarea type="text" id="mess_fil2" name="mess_str" placeholder="Кол-во страниц"></textarea>

<br><br>
<button type="submit" class="bott2">Добавить</button></form>

</td></tr></table>


</div></div>





		   

<div class="go-up" title="Вверх" id='ToTop'><a href="#" class="button33" tabindex="0"></a></div>
<div class="go-down" title="Вниз" id='OnBottom'><a href="#" class="button33" tabindex="0"></a></div>
		   
		   
		   
	   
		   
<table class="tabbody">
<tr><td valign="top" width="344px" rowspan="2" align="center">

<?php
include("shablon/meny.php");
?>

<div class="frazy2 effect10">
<?php
include("shablon/filosof.php");
?></div><br>
<?php
include("shablon/pogoda.php");
?>


</td><td colspan="2" height="10px"></td>
</tr><tr>
<td valign="top">

<div class="mes effect15">
<div id="messages">
</div></div>

</td>
<td width="198px" valign="top">
<?php
include("shablon/saytname.php");
include("shablon/avtorizaciya.php");
?>
</td></tr><tr>

<td colspan="3" valign="top">





<table>
<tr>
<td valign="top" class="wees">


<div id="sticky" class="sticky-element">
    <div class="sticky-anchor"></div>
    <div class="sticky-content">
      <div class="ho effect25"></div>
    </div></div>



<div class="effect132"></div><div class="effect132"></div>
<div class="effect31"></div><div class="effect31"></div>



<div id="toggler" href="#"><a href="#" class="button32" tabindex="0" title="список пользователей"></a></div>
<div id="box">



	
<div class="form-wrapper1">

<?php
include("shablon/polzovateli.php");
?></div>
 
 

<div class="form-wrapper3">
<?php
include("shablon/polzovatelifrend.php");
?></div>


<div class="form-wrapper2">
<?php
include("shablon/polzovatelicity.php");
?></div>

<div class="form-wrapper4">
<?php
include("shablon/polzovateliban.php");
?></div>



</div>









</td><td valign="top" width="88%">
		   
<div class="fon"></div>

<div class="oblp effect23">
<h2>Лучшие книги сезона Осень 2019</h2></div>
<div class="content">

<div class="go-up" title="Вверх" id='ToTop'><a href="#" class="button33" tabindex="0"></a></div>
<div class="go-down" title="Вниз" id='OnBottom'><a href="#" class="button33" tabindex="0"></a></div>


<div class=pp><p7>Голосуя и оставляя комментарии за книгу вы подымаете её рейтинг. В конце вы можите
добавить свою любимую книгу в список книг. Ей даётся неделя, по истечению этого времени если её рейтинг не будет попадать в топ 30 она удалится.
В конце сезона пользователи чьи книги заняли призовые места получат существенный плюс к рейтингу пользователя. 
По мере развития сайта возможны денежные призы.</p7></div>





<br>
<div class="jTabs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li class="thead select"><p7>По рейтингу</p7></li>
    <li class="thead"><p7>По дате добавления</p7></li>


<ul>
    <li class="tbody select">

<?php

include("bd.php");


function rdate($param, $time=0) {
if(intval($time)==0)$time=time();
$MonthNames=array("Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
if(strpos($param,'M')===false) return date($param, $time);
else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
	}

	
	function RusEnding($n, $n1, $n2, $n5) {
 if($n >= 11 and $n <= 19) return $n5;
 $n = $n % 10;
 if($n == 1) return $n1;
 if($n >= 2 and $n <= 4) return $n2;
 return $n5;
 }
 
 

$id=1;
mysqli_query($bd, "SET NAMES utf8 COLLATE utf8_unicode_ci");
session_start();


$qurkom=mysqli_query($bd, "SELECT idbook FROM `book` WHERE `orderdate` < CURDATE() AND `idbook` IN (SELECT * FROM (SELECT `idbook` FROM `book` ORDER BY `reyting` DESC LIMIT 30,1) AS t3)");
$hj=mysqli_fetch_array($qurkom);




 $dell=mysqli_prepare($bd, "DELETE FROM kommentbook WHERE idbook=?");
 mysqli_stmt_bind_param($dell, 'i', $hy ); 
  $hy=$hj['idbook'];
 mysqli_stmt_execute($dell);


$qur="DELETE FROM `book` WHERE `orderdate` < CURDATE() AND `idbook` IN (SELECT * FROM (SELECT `idbook` FROM `book` ORDER BY `reyting` DESC LIMIT 30,1) AS t3)";
mysqli_query($bd, $qur);





$res = mysqli_query($bd, "SELECT * FROM users INNER JOIN book ON book.idpolz=users.id ORDER BY book.reyting DESC");
while($row = mysqli_fetch_array($res))
{
	
	
	
	

	
	echo '<br><table class="myztab"><tr>
<td width="37px" height="50px"><div class="namfil5">';


echo'<p285 title="место">'.$id.'</p285></div></td>';


echo '<td height="50px"><div class="namfil6" id="ss'.$row['idbook'].'">
<div style=float:left;><marquee scrollamount=1 behavior=alternate><p178 title="название книги">'.$row['namebook'].'</p178>
</marquee></div>

</div></td>

<td height="50px" width="165px">';


echo '<div class="rey">

 <div class="summabook" title="рейтинг" data-summabook="' . $row['idbook'] . '">';
  if($row['reyting']<0)
{
echo "<p903 class=colorrey4>".$row['reyting']."</p903>";
}

else if($row['reyting']==0)
{
	echo "<p904 class=colorrey2>".$row['reyting']."</p904>";
}	
else
{
	if($id==1)
{echo "<div class=onebook><p903 class=colorrey15>+".$row['reyting']."</p903></div>";}
else if($id==2)
{echo "<div class=twobook><p903 class=colorrey15>+".$row['reyting']."</p903></div>";}
else if($id==3)
{echo "<div class=threebook><p903 class=colorrey15>+".$row['reyting']."</p903></div>";}
else 
{echo "<p903 class=colorrey15>+".$row['reyting']."</p903>";}
}
echo '</div>

 <div class="minusbook" data-minusbook="' . $row['idbook'] . '"><img src="img/p13.png" style="margin-top:1px;" /></div>

 <div class="plusbook" data-plusbook="' . $row['idbook'] . '"><img src="img/p14.png" style="margin-top:1px;" /></div></div></td></tr>';
 
 
echo "<tr><td valign=top colspan=3><div class=opisbook style=margin-right:7px;>";

echo "<div class=dobavbk3>Добавил:<br><img src=img/avatar/".$row['avatar']." style=padding-top:1px;padding-right:2px;float:left;width:27px;height:27px; />
<div class=dobavbk2><p161>".$row['name']."</p161><lo id=d23>&#9734;</lo>";

if($row['rey']>0)
  {echo "<p223>".$row['rey']."</p223>";}
else if($row['rey']<0)
{echo "<p223 class=colorrey>".$row['rey']."</p223>";}
else if($row['rey']==0)
{echo "<p223 class=colorrey2>".$row['rey']."</p223>";}

echo "<br>".rdate('j M Y', strtotime($row['data']))."</div></div>";




echo "<table><tr><td class=datatd valign=top>Автор:</td><td>".$row['afftor']."</td></tr>
<tr><td class=datatd valign=top>Лит.&nbsp;жанр:</td><td>".$row['zanr']."</td></tr>
<tr><td class=datatd valign=top>Страниц:</td><td>".$row['str']." cтр.</td></tr></table>";



echo '<div class="arrow-5" style=padding-bottom:4px;margin-left:3px;>';



 $stm=$bd -> prepare("SELECT * FROM users INNER JOIN kommentbook ON kommentbook.idpolz=users.id WHERE idbook=? ORDER BY kommentbook.id ");
 $stm -> bind_param('i', $idfilm );
 $idfilm=$row['idbook'];
 $stm -> execute();
 $com=$stm -> get_result();

$n=mysqli_num_rows($com);

if($n==0)
{echo "<p230 class=colorrey2>".$n."</p230>";}
else
{echo "<p230 class=colorrey>".$n."</p230>";}



echo " <div class=obl8></div><p230 class=blcom> ";




echo RusEnding($n, "Комментарий", "Комментария", "Комментариев");


echo "</p230><span class=arrow-4-left></span><span class=arrow-4-right></span></div>";





echo "<div class=spoiler-body style=display:none;margin-top:10px;>";
while($cow = mysqli_fetch_array($com))
{
	
		$arr1 = array("#1#","#2#","#3#","#4#","#5#","#6#","#7#","#21#","#9#","#10#","#11#","#12#","#13#","#14#","#15#","#16#","#17#","#18#","#19#","#20#","#158#","#130#",
 "#60#","#122#","#123#","#65#","#24#","#25#","#26#","#28#","#29#","#30#","#31#","#32#","#33#","#34#","#35#","#36#","#37#","#38#","#39#","#40#","#42#","#43#","#44#",
 "#45#","#46#","#47#","#48#","#49#","#50#","#51#","#52#","#53#","#54#","#55#","#56#","#57#","#58#","#59#","#23#",
 
 "#61#","#63#","#64#","#66#","#67#","#126#","#68#","#69#","#70#","#71#","#75#","#77#","#78#","#79#","#80#","#81#","#82#","#83#","#85#",
 "#86#","#87#","#88#","#89#","#90#","#125#","#153#","#195#","#196#","#201#","#202#",
 
  "#92#","#96#","#97#","#91#","#98#","#99#","#101#","#102#","#103#","#104#","#105#","#107#","#108#","#109#","#110#","#111#","#112#","#114#","#160#",
 "#116#","#117#","#118#",
 
  "#120#","#124#","#128#","#129#","#132#","#134#","#139#","#140#","#142#","#143#","#144#","#145#","#146#","#147#","#149#","#154#","#156#","#159#","#161#",
 "#169#","#170#","#171#",
 
  "#172#","#173#","#174#","#175#","#176#","#177#","#178#","#179#","#180#","#181#","#182#","#183#","#184#","#185#","#186#","#187#","#188#","#189#","#190#",
 "#191#","#192#","#193#","#194#","#197#","#198#","#199#","#200#","#203#","#204#");
$arr2 = array(
"<img src='img/gif/1.gif' class=gif>","<img src='img/gif/2.gif' class=gif>","<img src='img/gif/3.gif' class=gif>","<img src='img/gif/4.gif' class=gif>"
,"<img src='img/gif/5.gif' class=gif>","<img src='img/gif/6.gif' class=gif>","<img src='img/gif/7.gif' class=gif>","<img src='img/gif/21.gif' class=gif>"
,"<img src='img/gif/9.gif' class=gif>","<img src='img/gif/10.gif' class=gif>","<img src='img/gif/11.gif' class=gif>","<img src='img/gif/12.gif' class=gif>"
,"<img src='img/gif/13.gif' class=gif>","<img src='img/gif/14.gif' class=gif>","<img src='img/gif/15.gif' class=gif>","<img src='img/gif/16.gif' class=gif>"
,"<img src='img/gif/17.gif' class=gif>","<img src='img/gif/18.gif' class=gif>","<img src='img/gif/19.gif' class=gif>","<img src='img/gif/20.gif' class=gif>"
,"<img src='img/gif/158.gif' class=gif>","<img src='img/gif/130.gif' class=gif>","<img src='img/gif/60.gif' class=gif>","<img src='img/gif/122.gif' class=gif>"
,"<img src='img/gif/123.gif' class=gif>","<img src='img/gif/65.gif' class=gif>","<img src='img/gif/24.gif' class=gif>","<img src='img/gif/25.gif' class=gif>"
,"<img src='img/gif/26.gif' class=gif>","<img src='img/gif/28.gif' class=gif>","<img src='img/gif/29.gif' class=gif>","<img src='img/gif/30.gif' class=gif>"
,"<img src='img/gif/31.gif' class=gif>","<img src='img/gif/32.gif' class=gif>","<img src='img/gif/33.gif' class=gif>","<img src='img/gif/34.gif' class=gif>"
,"<img src='img/gif/35.gif' class=gif>","<img src='img/gif/36.gif' class=gif>","<img src='img/gif/37.gif' class=gif>","<img src='img/gif/38.gif' class=gif>"
,"<img src='img/gif/39.gif' class=gif>","<img src='img/gif/40.gif' class=gif>","<img src='img/gif/42.gif' class=gif>","<img src='img/gif/43.gif' class=gif>"
,"<img src='img/gif/44.gif' class=gif>","<img src='img/gif/45.gif' class=gif>","<img src='img/gif/46.gif' class=gif>","<img src='img/gif/47.gif' class=gif>"
,"<img src='img/gif/48.gif' class=gif>","<img src='img/gif/49.gif' class=gif>","<img src='img/gif/50.gif' class=gif>","<img src='img/gif/51.gif' class=gif>"
,"<img src='img/gif/52.gif' class=gif>","<img src='img/gif/53.gif' class=gif>","<img src='img/gif/54.gif' class=gif>","<img src='img/gif/55.gif' class=gif>"
,"<img src='img/gif/56.gif' class=gif>","<img src='img/gif/57.gif' class=gif>","<img src='img/gif/58.gif' class=gif>","<img src='img/gif/59.gif' class=gif>"
,"<img src='img/gif/23.gif' class=gif>"

,"<img src='img/gif/61.gif' class=gif>","<img src='img/gif/63.gif' class=gif>","<img src='img/gif/64.gif' class=gif>","<img src='img/gif/66.gif' class=gif>"
,"<img src='img/gif/67.gif' class=gif>","<img src='img/gif/126.gif' class=gif>","<img src='img/gif/68.gif' class=gif>","<img src='img/gif/69.gif' class=gif>"
,"<img src='img/gif/70.gif' class=gif>","<img src='img/gif/71.gif' class=gif>","<img src='img/gif/75.gif' class=gif>","<img src='img/gif/77.gif' class=gif>"
,"<img src='img/gif/78.gif' class=gif>","<img src='img/gif/79.gif' class=gif>","<img src='img/gif/80.gif' class=gif>","<img src='img/gif/81.gif' class=gif>"
,"<img src='img/gif/82.gif' class=gif>","<img src='img/gif/83.gif' class=gif>","<img src='img/gif/85.gif' class=gif>","<img src='img/gif/86.gif' class=gif>"
,"<img src='img/gif/87.gif' class=gif>","<img src='img/gif/88.gif' class=gif>","<img src='img/gif/89.gif' class=gif>","<img src='img/gif/90.gif' class=gif>"
,"<img src='img/gif/125.gif' class=gif>","<img src='img/gif/153.gif' class=gif>","<img src='img/gif/195.gif' class=gif>","<img src='img/gif/196.gif' class=gif>"
,"<img src='img/gif/201.gif' class=gif>","<img src='img/gif/202.gif' class=gif>"

,"<img src='img/gif/92.gif' class=gif>","<img src='img/gif/96.gif' class=gif>","<img src='img/gif/97.gif' class=gif>","<img src='img/gif/91.gif' class=gif>"
,"<img src='img/gif/98.gif' class=gif>","<img src='img/gif/99.gif' class=gif>","<img src='img/gif/101.gif' class=gif>","<img src='img/gif/102.gif' class=gif>"
,"<img src='img/gif/103.gif' class=gif>","<img src='img/gif/104.gif' class=gif>","<img src='img/gif/105.gif' class=gif>","<img src='img/gif/107.gif' class=gif>"
,"<img src='img/gif/108.gif' class=gif>","<img src='img/gif/109.gif' class=gif>","<img src='img/gif/110.gif' class=gif>","<img src='img/gif/111.gif' class=gif>"
,"<img src='img/gif/112.gif' class=gif>","<img src='img/gif/114.gif' class=gif>","<img src='img/gif/160.gif' class=gif>","<img src='img/gif/116.gif' class=gif>"
,"<img src='img/gif/117.gif' class=gif>","<img src='img/gif/118.gif' class=gif>"

,"<img src='img/gif/120.gif' class=gif>","<img src='img/gif/124.gif' class=gif>","<img src='img/gif/128.gif' class=gif>","<img src='img/gif/129.gif' class=gif>"
,"<img src='img/gif/132.gif' class=gif>","<img src='img/gif/134.gif' class=gif>","<img src='img/gif/139.gif' class=gif>","<img src='img/gif/140.gif' class=gif>"
,"<img src='img/gif/142.gif' class=gif>","<img src='img/gif/143.gif' class=gif>","<img src='img/gif/144.gif' class=gif>","<img src='img/gif/145.gif' class=gif>"
,"<img src='img/gif/146.gif' class=gif>","<img src='img/gif/147.gif' class=gif>","<img src='img/gif/149.gif' class=gif>","<img src='img/gif/154.gif' class=gif>"
,"<img src='img/gif/156.gif' class=gif>","<img src='img/gif/159.gif' class=gif>","<img src='img/gif/161.gif' class=gif>","<img src='img/gif/169.gif' class=gif>"
,"<img src='img/gif/170.gif' class=gif>","<img src='img/gif/171.gif' class=gif>"

,"<img src='img/gif/172.gif' class=gif>","<img src='img/gif/173.gif' class=gif>","<img src='img/gif/174.gif' class=gif>","<img src='img/gif/175.gif' class=gif>"
,"<img src='img/gif/176.gif' class=gif>","<img src='img/gif/177.gif' class=gif>","<img src='img/gif/178.gif' class=gif>","<img src='img/gif/179.gif' class=gif>"
,"<img src='img/gif/180.gif' class=gif>","<img src='img/gif/181.gif' class=gif>","<img src='img/gif/182.gif' class=gif>","<img src='img/gif/183.gif' class=gif>"
,"<img src='img/gif/184.gif' class=gif>","<img src='img/gif/185.gif' class=gif>","<img src='img/gif/186.gif' class=gif>","<img src='img/gif/187.gif' class=gif>"
,"<img src='img/gif/188.gif' class=gif>","<img src='img/gif/189.gif' class=gif>","<img src='img/gif/190.gif' class=gif>","<img src='img/gif/191.gif' class=gif>"
,"<img src='img/gif/192.gif' class=gif>","<img src='img/gif/193.gif' class=gif>","<img src='img/gif/194.gif' class=gif>","<img src='img/gif/197.gif' class=gif>"
,"<img src='img/gif/198.gif' class=gif>","<img src='img/gif/199.gif' class=gif>","<img src='img/gif/200.gif' class=gif>","<img src='img/gif/203.gif' class=gif>"
,"<img src='img/gif/204.gif' class=gif>");



 
 $temp=$cow['bookkom'];
 $mess=str_replace ($arr1, $arr2, $temp);	
	
	
echo "<table style='border:0px solid red;' class=tybb>";
echo "<tr><td valign=top><img src=img/avatar/".$cow['avatar']." style=width:33px;height:33px;margin-top:0px; /></td><td class=cls><p260>";

 echo '<a href="darkchat.php?user='.$cow['name'].'">';

echo $cow['name']."</a></p260><lo id=d22>&#9734;</lo>";

 if($cow['rey']>0)
  {echo "<p123>".$cow['rey']."</p123><p134>".rdate('j M H:i', strtotime($cow['data']))."</p134>";}
else if($cow['rey']<0)
{echo "<p123 class=colorrey>".$cow['rey']."</p123><p134>".rdate('j M H:i', strtotime($cow['data']))."</p134>";}
else if($cow['rey']==0)
{echo "<p123 class=colorrey2>&nbsp;".$cow['rey']."</p123><p134>".rdate('j M H:i', strtotime($cow['data']))."</p134>";}

echo "<br><div class=obl><p122>".$mess."</p122></div></td><td>";


if($_SESSION['id']==2)
{echo '<div class="dekombook" data-kom="' . $cow['id'] . '">&#10006</div>';}



echo "</td></tr></table>";



}

echo '<br><form name="formaniz9" action="shablon/polzkommentbook.php" method="post" style=margin-top:0px;>
<table class=komet><tr><td class=komet1><textarea type="text" id="'.$idfilm.'" class="mess_fil7" name="mess_name" placeholder="Ваш комментарий"></textarea>
<input type="hidden" name="idfilm" value="'.$idfilm.'">
</td></tr></table>
</form>';



 
echo <<<END

<table class=smil6 valign=top><tr><td>

<div class="hat6">
<img src="img/gif/2.gif">&nbsp;
 <li>&nbsp;
<img src="img/gif/1.gif" onclick="insertSmile2('$idfilm','#1#')">
<img src="img/gif/2.gif" onclick="insertSmile2('$idfilm','#2#')">
<img src="img/gif/3.gif" onclick="insertSmile2('$idfilm','#3#')">
<img src="img/gif/4.gif" onclick="insertSmile2('$idfilm','#4#')">
<img src="img/gif/5.gif" onclick="insertSmile2('$idfilm','#5#')">
<img src="img/gif/6.gif" onclick="insertSmile2('$idfilm','#6#')">
<img src="img/gif/7.gif" onclick="insertSmile2('$idfilm','#7#')">
<img src="img/gif/21.gif" onclick="insertSmile2('$idfilm','#21#')">
<img src="img/gif/9.gif" onclick="insertSmile2('$idfilm','#9#')">
<img src="img/gif/10.gif" onclick="insertSmile2('$idfilm','#10#')">
<img src="img/gif/11.gif" onclick="insertSmile2('$idfilm','#11#')">
<img src="img/gif/12.gif" onclick="insertSmile2('$idfilm','#12#')">
<img src="img/gif/13.gif" onclick="insertSmile2('$idfilm','#13#')">
<img src="img/gif/15.gif" onclick="insertSmile2('$idfilm','#15#')">
<img src="img/gif/16.gif" onclick="insertSmile2('$idfilm','#16#')">
<img src="img/gif/17.gif" onclick="insertSmile2('$idfilm','#17#')">
<img src="img/gif/18.gif" onclick="insertSmile2('$idfilm','#18#')">
<img src="img/gif/19.gif" onclick="insertSmile2('$idfilm','#19#')">
<img src="img/gif/20.gif" onclick="insertSmile2('$idfilm','#20#')">
<img src="img/gif/158.gif" onclick="insertSmile2('$idfilm','#158#')">
<img src="img/gif/130.gif" onclick="insertSmile2('$idfilm','#130#')">
<img src="img/gif/60.gif" onclick="insertSmile2('$idfilm','#60#')">
<img src="img/gif/122.gif" onclick="insertSmile2('$idfilm','#122#')">
<img src="img/gif/123.gif" onclick="insertSmile2('$idfilm','#123#')">
<img src="img/gif/65.gif" onclick="insertSmile2('$idfilm','#65#')">&nbsp;
</li>
</div>

</td><td>

<div class="hat6">
<img src="img/gif/28.gif">&nbsp;
 <li>&nbsp;
<img src="img/gif/24.gif" onclick="insertSmile2('$idfilm','#24#')">
<img src="img/gif/25.gif" onclick="insertSmile2('$idfilm','#25#')">
<img src="img/gif/26.gif" onclick="insertSmile2('$idfilm','#26#')">
<img src="img/gif/28.gif" onclick="insertSmile2('$idfilm','#28#')">
<img src="img/gif/29.gif" onclick="insertSmile2('$idfilm','#29#')">
<img src="img/gif/30.gif" onclick="insertSmile2('$idfilm','#30#')">
<img src="img/gif/31.gif" onclick="insertSmile2('$idfilm','#31#')">
<img src="img/gif/32.gif" onclick="insertSmile2('$idfilm','#32#')">
<img src="img/gif/33.gif" onclick="insertSmile2('$idfilm','#33#')">
<img src="img/gif/34.gif" onclick="insertSmile2('$idfilm','#34#')">
<img src="img/gif/35.gif" onclick="insertSmile2('$idfilm','#35#')">
<img src="img/gif/36.gif" onclick="insertSmile2('$idfilm','#36#')">
<img src="img/gif/37.gif" onclick="insertSmile2('$idfilm','#37#')">
<img src="img/gif/38.gif" onclick="insertSmile2('$idfilm','#38#')">
<img src="img/gif/39.gif" onclick="insertSmile2('$idfilm','#39#')">
<img src="img/gif/40.gif" onclick="insertSmile2('$idfilm','#40#')">
<img src="img/gif/42.gif" onclick="insertSmile2('$idfilm','#42#')">
<img src="img/gif/43.gif" onclick="insertSmile2('$idfilm','#43#')">
<img src="img/gif/44.gif" onclick="insertSmile2('$idfilm','#44#')">
<img src="img/gif/45.gif" onclick="insertSmile2('$idfilm','#45#')">
<img src="img/gif/46.gif" onclick="insertSmile2('$idfilm','#46#')">
<img src="img/gif/47.gif" onclick="insertSmile2('$idfilm','#47#')">
<img src="img/gif/48.gif" onclick="insertSmile2('$idfilm','#48#')">
<img src="img/gif/49.gif" onclick="insertSmile2('$idfilm','#49#')">
<img src="img/gif/50.gif" onclick="insertSmile2('$idfilm','#50#')">
<img src="img/gif/51.gif" onclick="insertSmile2('$idfilm','#51#')">
<img src="img/gif/52.gif" onclick="insertSmile2('$idfilm','#52#')">
<img src="img/gif/53.gif" onclick="insertSmile2('$idfilm','#53#')">
<img src="img/gif/54.gif" onclick="insertSmile2('$idfilm','#54#')">
<img src="img/gif/55.gif" onclick="insertSmile2('$idfilm','#55#')">
<img src="img/gif/56.gif" onclick="insertSmile2('$idfilm','#56#')">
<img src="img/gif/57.gif" onclick="insertSmile2('$idfilm','#57#')">
<img src="img/gif/58.gif" onclick="insertSmile2('$idfilm','#58#')">
<img src="img/gif/59.gif" onclick="insertSmile2('$idfilm','#59#')">
<img src="img/gif/23.gif" onclick="insertSmile2('$idfilm','#23#')">&nbsp;
</li>
</div>

</td><td>

<div class="hat6">
<img src="img/gif/63.gif">&nbsp;&nbsp;
 <li>&nbsp;
<img src="img/gif/61.gif" onclick="insertSmile2('$idfilm','#61#')">
<img src="img/gif/63.gif" onclick="insertSmile2('$idfilm','#63#')">
<img src="img/gif/64.gif" onclick="insertSmile2('$idfilm','#64#')">
<img src="img/gif/66.gif" onclick="insertSmile2('$idfilm','#66#')">
<img src="img/gif/67.gif" onclick="insertSmile2('$idfilm','#67#')">
<img src="img/gif/126.gif" onclick="insertSmile2('$idfilm','#126#')">
<img src="img/gif/68.gif" onclick="insertSmile2('$idfilm','#68#')">
<img src="img/gif/69.gif" onclick="insertSmile2('$idfilm','#69#')">
<img src="img/gif/70.gif" onclick="insertSmile2('$idfilm','#70#')">
<img src="img/gif/71.gif" onclick="insertSmile2('$idfilm','#71#')">
<img src="img/gif/75.gif" onclick="insertSmile2('$idfilm','#75#')">
<img src="img/gif/77.gif" onclick="insertSmile2('$idfilm','#77#')">
<img src="img/gif/78.gif" onclick="insertSmile2('$idfilm','#78#')">
<img src="img/gif/79.gif" onclick="insertSmile2('$idfilm','#79#')">
<img src="img/gif/80.gif" onclick="insertSmile2('$idfilm','#80#')">
<img src="img/gif/81.gif" onclick="insertSmile2('$idfilm','#81#')">
<img src="img/gif/82.gif" onclick="insertSmile2('$idfilm','#82#')">
<img src="img/gif/83.gif" onclick="insertSmile2('$idfilm','#83#')">
<img src="img/gif/85.gif" onclick="insertSmile2('$idfilm','#85#')">
<img src="img/gif/86.gif" onclick="insertSmile2('$idfilm','#86#')">
<img src="img/gif/87.gif" onclick="insertSmile2('$idfilm','#87#')">
<img src="img/gif/88.gif" onclick="insertSmile2('$idfilm','#88#')">
<img src="img/gif/89.gif" onclick="insertSmile2('$idfilm','#89#')">
<img src="img/gif/90.gif" onclick="insertSmile2('$idfilm','#90#')">
<img src="img/gif/125.gif" onclick="insertSmile2('$idfilm','#125#')">
<img src="img/gif/153.gif" onclick="insertSmile2('$idfilm','#153#')">
<img src="img/gif/195.gif" onclick="insertSmile2('$idfilm','#195#')">
<img src="img/gif/196.gif" onclick="insertSmile2('$idfilm','#196#')">
<img src="img/gif/201.gif" onclick="insertSmile2('$idfilm','#201#')">
<img src="img/gif/202.gif" onclick="insertSmile2('$idfilm','#202#')">&nbsp;
</li>
</div>

</td><td>

<div class="hat6">
<img src="img/gif/91.gif">
 <li>&nbsp;
<img src="img/gif/92.gif" onclick="insertSmile2('$idfilm','#92#')">
<img src="img/gif/96.gif" onclick="insertSmile2('$idfilm','#96#')">
<img src="img/gif/97.gif" onclick="insertSmile2('$idfilm','#97#')">
<img src="img/gif/91.gif" onclick="insertSmile2('$idfilm','#91#')">
<img src="img/gif/98.gif" onclick="insertSmile2('$idfilm','#98#')">
<img src="img/gif/99.gif" onclick="insertSmile2('$idfilm','#99#')">
<img src="img/gif/101.gif" onclick="insertSmile2('$idfilm','#101#')">
<img src="img/gif/102.gif" onclick="insertSmile2('$idfilm','#102#')">
<img src="img/gif/103.gif" onclick="insertSmile2('$idfilm','#103#')">
<img src="img/gif/104.gif" onclick="insertSmile2('$idfilm','#104#')">
<img src="img/gif/105.gif" onclick="insertSmile2('$idfilm','#105#')">
<img src="img/gif/107.gif" onclick="insertSmile2('$idfilm','#107#')">
<img src="img/gif/108.gif" onclick="insertSmile2('$idfilm','#108#')">
<img src="img/gif/109.gif" onclick="insertSmile2('$idfilm','#109#')">
<img src="img/gif/110.gif" onclick="insertSmile2('$idfilm','#110#')">
<img src="img/gif/111.gif" onclick="insertSmile2('$idfilm','#111#')">
<img src="img/gif/112.gif" onclick="insertSmile2('$idfilm','#112#')">
<img src="img/gif/114.gif" onclick="insertSmile2('$idfilm','#114#')">
<img src="img/gif/160.gif" onclick="insertSmile2('$idfilm','#160#')">
<img src="img/gif/116.gif" onclick="insertSmile2('$idfilm','#116#')">
<img src="img/gif/117.gif" onclick="insertSmile2('$idfilm','#117#')">
<img src="img/gif/118.gif" onclick="insertSmile2('$idfilm','#118#')">&nbsp;
</li>
</div>


</td><td>

<div class="hat6">
<img src="img/gif/128.gif">&nbsp;&nbsp;
 <li>&nbsp;
<img src="img/gif/120.gif" onclick="insertSmile2('$idfilm','#120#')">
<img src="img/gif/124.gif" onclick="insertSmile2('$idfilm','#124#')">
<img src="img/gif/128.gif" onclick="insertSmile2('$idfilm','#128#')">
<img src="img/gif/129.gif" onclick="insertSmile2('$idfilm','#129#')">
<img src="img/gif/132.gif" onclick="insertSmile2('$idfilm','#132#')">
<img src="img/gif/134.gif" onclick="insertSmile2('$idfilm','#134#')">
<img src="img/gif/139.gif" onclick="insertSmile2('$idfilm','#139#')">
<img src="img/gif/140.gif" onclick="insertSmile2('$idfilm','#140#')">
<img src="img/gif/142.gif" onclick="insertSmile2('$idfilm','#142#')">
<img src="img/gif/143.gif" onclick="insertSmile2('$idfilm','#143#')">
<img src="img/gif/144.gif" onclick="insertSmile2('$idfilm','#144#')">
<img src="img/gif/145.gif" onclick="insertSmile2('$idfilm','#145#')">
<img src="img/gif/146.gif" onclick="insertSmile2('$idfilm','#146#')">
<img src="img/gif/147.gif" onclick="insertSmile2('$idfilm','#147#')">
<img src="img/gif/149.gif" onclick="insertSmile2('$idfilm','#149#')">
<img src="img/gif/154.gif" onclick="insertSmile2('$idfilm','#154#')">
<img src="img/gif/156.gif" onclick="insertSmile2('$idfilm','#156#')">
<img src="img/gif/159.gif" onclick="insertSmile2('$idfilm','#159#')">
<img src="img/gif/161.gif" onclick="insertSmile2('$idfilm','#161#')">
<img src="img/gif/169.gif" onclick="insertSmile2('$idfilm','#169#')">
<img src="img/gif/170.gif" onclick="insertSmile2('$idfilm','#170#')">
<img src="img/gif/171.gif" onclick="insertSmile2('$idfilm','#171#')">&nbsp;
</li>
</div>

</td><td>

<div class="hat6">
<img src="img/gif/185.gif">
 <li>&nbsp;
<img src="img/gif/172.gif" onclick="insertSmile2('$idfilm','#172#')">
<img src="img/gif/173.gif" onclick="insertSmile2('$idfilm','#173#')">
<img src="img/gif/174.gif" onclick="insertSmile2('$idfilm','#174#')">
<img src="img/gif/175.gif" onclick="insertSmile2('$idfilm','#175#')">
<img src="img/gif/176.gif" onclick="insertSmile2('$idfilm','#176#')">
<img src="img/gif/177.gif" onclick="insertSmile2('$idfilm','#177#')">
<img src="img/gif/178.gif" onclick="insertSmile2('$idfilm','#178#')">
<img src="img/gif/179.gif" onclick="insertSmile2('$idfilm','#179#')">
<img src="img/gif/180.gif" onclick="insertSmile2('$idfilm','#180#')">
<img src="img/gif/181.gif" onclick="insertSmile2('$idfilm','#181#')">
<img src="img/gif/182.gif" onclick="insertSmile2('$idfilm','#182#')">
<img src="img/gif/183.gif" onclick="insertSmile2('$idfilm','#183#')">
<img src="img/gif/184.gif" onclick="insertSmile2('$idfilm','#184#')">
<img src="img/gif/185.gif" onclick="insertSmile2('$idfilm','#185#')">
<img src="img/gif/186.gif" onclick="insertSmile2('$idfilm','#186#')">
<img src="img/gif/187.gif" onclick="insertSmile2('$idfilm','#187#')">
<img src="img/gif/188.gif" onclick="insertSmile2('$idfilm','#188#')">
<img src="img/gif/189.gif" onclick="insertSmile2('$idfilm','#189#')">
<img src="img/gif/190.gif" onclick="insertSmile2('$idfilm','#190#')">
<img src="img/gif/191.gif" onclick="insertSmile2('$idfilm','#191#')">
<img src="img/gif/192.gif" onclick="insertSmile2('$idfilm','#192#')">
<img src="img/gif/193.gif" onclick="insertSmile2('$idfilm','#193#')">
<img src="img/gif/194.gif" onclick="insertSmile2('$idfilm','#194#')">
<img src="img/gif/197.gif" onclick="insertSmile2('$idfilm','#197#')">
<img src="img/gif/198.gif" onclick="insertSmile2('$idfilm','#198#')">
<img src="img/gif/199.gif" onclick="insertSmile2('$idfilm','#199#')">
<img src="img/gif/200.gif" onclick="insertSmile2('$idfilm','#200#')">
<img src="img/gif/203.gif" onclick="insertSmile2('$idfilm','#203#')">
<img src="img/gif/204.gif" onclick="insertSmile2('$idfilm','#204#')">&nbsp;
</li>
</div>


</td></tr></table>

END;

 
 


echo "</div></td></tr>";



echo '<tr><td colspan="3"><br></div></td></tr></table>';

$id++;

}

?>


</li>
   
	
	 <li class="tbody"><br>
	 
	 
	 
	 <?php

include("bd.php");



$id=1;
mysqli_query($bd, "SET NAMES utf8 COLLATE utf8_unicode_ci");
session_start();



$res = mysqli_query($bd, "SELECT * FROM users INNER JOIN book ON book.idpolz=users.id ORDER BY book.data DESC");
while($row = mysqli_fetch_array($res))
{
	
	
		

	
	echo '<table class="myztab"><tr>
<td width="37px" height="50px"><div class="namfil5">';


echo'<p285 title="место">'.$id.'</p285></div></td>';


echo '<td height="50px"><div class="namfil6" id="ss'.$row['idbook'].'">
<div style=float:left;><marquee scrollamount=1 behavior=alternate><p178 title="название книги">'.$row['namebook'].'</p178>
</marquee></div>

</div></td>

<td height="50px" width="165px">';


echo '<div class="rey">

 <div class="summabook" title="рейтинг" data-summabook="' . $row['idbook'] . '">';
  if($row['reyting']<0)
{
echo "<p903 class=colorrey4>".$row['reyting']."</p903>";
}

else if($row['reyting']==0)
{
	echo "<p904 class=colorrey2>".$row['reyting']."</p904>";
}	

else 
{echo "<p903 class=colorrey15>+".$row['reyting']."</p903>";}

echo '</div>

 <div class="minusbook" data-minusbook="' . $row['idbook'] . '"><img src="img/p13.png" style="margin-top:1px;" /></div>

 <div class="plusbook" data-plusbook="' . $row['idbook'] . '"><img src="img/p14.png" style="margin-top:1px;" /></div></div></td></tr>';
 
 
echo "<tr><td valign=top colspan=3><div class=opisbook style=margin-right:7px;>";

echo "<div class=dobavbk3>Добавил:<br><img src=img/avatar/".$row['avatar']." style=padding-top:1px;padding-right:2px;float:left;width:27px;height:27px; />
<div class=dobavbk2><p161>".$row['name']."</p161><lo id=d23>&#9734;</lo>";

if($row['rey']>0)
  {echo "<p223>".$row['rey']."</p223>";}
else if($row['rey']<0)
{echo "<p223 class=colorrey>".$row['rey']."</p223>";}
else if($row['rey']==0)
{echo "<p223 class=colorrey2>".$row['rey']."</p223>";}

echo "<br>".rdate('j M Y', strtotime($row['data']))."</div></div>";




echo "<table><tr><td class=datatd valign=top>Автор:</td><td class=datatd4>".$row['afftor']."</td></tr>
<tr><td class=datatd valign=top>Лит.&nbsp;жанр:</td><td class=datatd4>".$row['zanr']."</td></tr>
<tr><td class=datatd valign=top>Страниц:</td><td class=datatd4>".$row['str']." cтр.</td></tr></table>";



echo '<div class="arrow-5" style=padding-bottom:4px;margin-left:3px;>';



 $stm=$bd -> prepare("SELECT * FROM users INNER JOIN kommentbook ON kommentbook.idpolz=users.id WHERE idbook=? ORDER BY kommentbook.id ");
 $stm -> bind_param('i', $idfilm );
 $idfilm=$row['idbook'];
 $stm -> execute();
 $com=$stm -> get_result();

$n=mysqli_num_rows($com);

if($n==0)
{echo "<p230 class=colorrey2>".$n."</p230>";}
else
{echo "<p230 class=colorrey>".$n."</p230>";}



echo " <div class=obl8></div><p230 class=blcom> ";




echo RusEnding($n, "Комментарий", "Комментария", "Комментариев");


echo "</p230><span class=arrow-4-left></span><span class=arrow-4-right></span></div>";





echo "<div class=spoiler-body style=display:none;margin-top:10px;>";
while($cow = mysqli_fetch_array($com))
{
	
		$arr1 = array("#1#","#2#","#3#","#4#","#5#","#6#","#7#","#21#","#9#","#10#","#11#","#12#","#13#","#14#","#15#","#16#","#17#","#18#","#19#","#20#","#158#","#130#",
 "#60#","#122#","#123#","#65#","#24#","#25#","#26#","#28#","#29#","#30#","#31#","#32#","#33#","#34#","#35#","#36#","#37#","#38#","#39#","#40#","#42#","#43#","#44#",
 "#45#","#46#","#47#","#48#","#49#","#50#","#51#","#52#","#53#","#54#","#55#","#56#","#57#","#58#","#59#","#23#",
 
 "#61#","#63#","#64#","#66#","#67#","#126#","#68#","#69#","#70#","#71#","#75#","#77#","#78#","#79#","#80#","#81#","#82#","#83#","#85#",
 "#86#","#87#","#88#","#89#","#90#","#125#","#153#","#195#","#196#","#201#","#202#",
 
  "#92#","#96#","#97#","#91#","#98#","#99#","#101#","#102#","#103#","#104#","#105#","#107#","#108#","#109#","#110#","#111#","#112#","#114#","#160#",
 "#116#","#117#","#118#",
 
  "#120#","#124#","#128#","#129#","#132#","#134#","#139#","#140#","#142#","#143#","#144#","#145#","#146#","#147#","#149#","#154#","#156#","#159#","#161#",
 "#169#","#170#","#171#",
 
  "#172#","#173#","#174#","#175#","#176#","#177#","#178#","#179#","#180#","#181#","#182#","#183#","#184#","#185#","#186#","#187#","#188#","#189#","#190#",
 "#191#","#192#","#193#","#194#","#197#","#198#","#199#","#200#","#203#","#204#");
$arr2 = array(
"<img src='img/gif/1.gif' class=gif>","<img src='img/gif/2.gif' class=gif>","<img src='img/gif/3.gif' class=gif>","<img src='img/gif/4.gif' class=gif>"
,"<img src='img/gif/5.gif' class=gif>","<img src='img/gif/6.gif' class=gif>","<img src='img/gif/7.gif' class=gif>","<img src='img/gif/21.gif' class=gif>"
,"<img src='img/gif/9.gif' class=gif>","<img src='img/gif/10.gif' class=gif>","<img src='img/gif/11.gif' class=gif>","<img src='img/gif/12.gif' class=gif>"
,"<img src='img/gif/13.gif' class=gif>","<img src='img/gif/14.gif' class=gif>","<img src='img/gif/15.gif' class=gif>","<img src='img/gif/16.gif' class=gif>"
,"<img src='img/gif/17.gif' class=gif>","<img src='img/gif/18.gif' class=gif>","<img src='img/gif/19.gif' class=gif>","<img src='img/gif/20.gif' class=gif>"
,"<img src='img/gif/158.gif' class=gif>","<img src='img/gif/130.gif' class=gif>","<img src='img/gif/60.gif' class=gif>","<img src='img/gif/122.gif' class=gif>"
,"<img src='img/gif/123.gif' class=gif>","<img src='img/gif/65.gif' class=gif>","<img src='img/gif/24.gif' class=gif>","<img src='img/gif/25.gif' class=gif>"
,"<img src='img/gif/26.gif' class=gif>","<img src='img/gif/28.gif' class=gif>","<img src='img/gif/29.gif' class=gif>","<img src='img/gif/30.gif' class=gif>"
,"<img src='img/gif/31.gif' class=gif>","<img src='img/gif/32.gif' class=gif>","<img src='img/gif/33.gif' class=gif>","<img src='img/gif/34.gif' class=gif>"
,"<img src='img/gif/35.gif' class=gif>","<img src='img/gif/36.gif' class=gif>","<img src='img/gif/37.gif' class=gif>","<img src='img/gif/38.gif' class=gif>"
,"<img src='img/gif/39.gif' class=gif>","<img src='img/gif/40.gif' class=gif>","<img src='img/gif/42.gif' class=gif>","<img src='img/gif/43.gif' class=gif>"
,"<img src='img/gif/44.gif' class=gif>","<img src='img/gif/45.gif' class=gif>","<img src='img/gif/46.gif' class=gif>","<img src='img/gif/47.gif' class=gif>"
,"<img src='img/gif/48.gif' class=gif>","<img src='img/gif/49.gif' class=gif>","<img src='img/gif/50.gif' class=gif>","<img src='img/gif/51.gif' class=gif>"
,"<img src='img/gif/52.gif' class=gif>","<img src='img/gif/53.gif' class=gif>","<img src='img/gif/54.gif' class=gif>","<img src='img/gif/55.gif' class=gif>"
,"<img src='img/gif/56.gif' class=gif>","<img src='img/gif/57.gif' class=gif>","<img src='img/gif/58.gif' class=gif>","<img src='img/gif/59.gif' class=gif>"
,"<img src='img/gif/23.gif' class=gif>"

,"<img src='img/gif/61.gif' class=gif>","<img src='img/gif/63.gif' class=gif>","<img src='img/gif/64.gif' class=gif>","<img src='img/gif/66.gif' class=gif>"
,"<img src='img/gif/67.gif' class=gif>","<img src='img/gif/126.gif' class=gif>","<img src='img/gif/68.gif' class=gif>","<img src='img/gif/69.gif' class=gif>"
,"<img src='img/gif/70.gif' class=gif>","<img src='img/gif/71.gif' class=gif>","<img src='img/gif/75.gif' class=gif>","<img src='img/gif/77.gif' class=gif>"
,"<img src='img/gif/78.gif' class=gif>","<img src='img/gif/79.gif' class=gif>","<img src='img/gif/80.gif' class=gif>","<img src='img/gif/81.gif' class=gif>"
,"<img src='img/gif/82.gif' class=gif>","<img src='img/gif/83.gif' class=gif>","<img src='img/gif/85.gif' class=gif>","<img src='img/gif/86.gif' class=gif>"
,"<img src='img/gif/87.gif' class=gif>","<img src='img/gif/88.gif' class=gif>","<img src='img/gif/89.gif' class=gif>","<img src='img/gif/90.gif' class=gif>"
,"<img src='img/gif/125.gif' class=gif>","<img src='img/gif/153.gif' class=gif>","<img src='img/gif/195.gif' class=gif>","<img src='img/gif/196.gif' class=gif>"
,"<img src='img/gif/201.gif' class=gif>","<img src='img/gif/202.gif' class=gif>"

,"<img src='img/gif/92.gif' class=gif>","<img src='img/gif/96.gif' class=gif>","<img src='img/gif/97.gif' class=gif>","<img src='img/gif/91.gif' class=gif>"
,"<img src='img/gif/98.gif' class=gif>","<img src='img/gif/99.gif' class=gif>","<img src='img/gif/101.gif' class=gif>","<img src='img/gif/102.gif' class=gif>"
,"<img src='img/gif/103.gif' class=gif>","<img src='img/gif/104.gif' class=gif>","<img src='img/gif/105.gif' class=gif>","<img src='img/gif/107.gif' class=gif>"
,"<img src='img/gif/108.gif' class=gif>","<img src='img/gif/109.gif' class=gif>","<img src='img/gif/110.gif' class=gif>","<img src='img/gif/111.gif' class=gif>"
,"<img src='img/gif/112.gif' class=gif>","<img src='img/gif/114.gif' class=gif>","<img src='img/gif/160.gif' class=gif>","<img src='img/gif/116.gif' class=gif>"
,"<img src='img/gif/117.gif' class=gif>","<img src='img/gif/118.gif' class=gif>"

,"<img src='img/gif/120.gif' class=gif>","<img src='img/gif/124.gif' class=gif>","<img src='img/gif/128.gif' class=gif>","<img src='img/gif/129.gif' class=gif>"
,"<img src='img/gif/132.gif' class=gif>","<img src='img/gif/134.gif' class=gif>","<img src='img/gif/139.gif' class=gif>","<img src='img/gif/140.gif' class=gif>"
,"<img src='img/gif/142.gif' class=gif>","<img src='img/gif/143.gif' class=gif>","<img src='img/gif/144.gif' class=gif>","<img src='img/gif/145.gif' class=gif>"
,"<img src='img/gif/146.gif' class=gif>","<img src='img/gif/147.gif' class=gif>","<img src='img/gif/149.gif' class=gif>","<img src='img/gif/154.gif' class=gif>"
,"<img src='img/gif/156.gif' class=gif>","<img src='img/gif/159.gif' class=gif>","<img src='img/gif/161.gif' class=gif>","<img src='img/gif/169.gif' class=gif>"
,"<img src='img/gif/170.gif' class=gif>","<img src='img/gif/171.gif' class=gif>"

,"<img src='img/gif/172.gif' class=gif>","<img src='img/gif/173.gif' class=gif>","<img src='img/gif/174.gif' class=gif>","<img src='img/gif/175.gif' class=gif>"
,"<img src='img/gif/176.gif' class=gif>","<img src='img/gif/177.gif' class=gif>","<img src='img/gif/178.gif' class=gif>","<img src='img/gif/179.gif' class=gif>"
,"<img src='img/gif/180.gif' class=gif>","<img src='img/gif/181.gif' class=gif>","<img src='img/gif/182.gif' class=gif>","<img src='img/gif/183.gif' class=gif>"
,"<img src='img/gif/184.gif' class=gif>","<img src='img/gif/185.gif' class=gif>","<img src='img/gif/186.gif' class=gif>","<img src='img/gif/187.gif' class=gif>"
,"<img src='img/gif/188.gif' class=gif>","<img src='img/gif/189.gif' class=gif>","<img src='img/gif/190.gif' class=gif>","<img src='img/gif/191.gif' class=gif>"
,"<img src='img/gif/192.gif' class=gif>","<img src='img/gif/193.gif' class=gif>","<img src='img/gif/194.gif' class=gif>","<img src='img/gif/197.gif' class=gif>"
,"<img src='img/gif/198.gif' class=gif>","<img src='img/gif/199.gif' class=gif>","<img src='img/gif/200.gif' class=gif>","<img src='img/gif/203.gif' class=gif>"
,"<img src='img/gif/204.gif' class=gif>");



 
 $temp=$cow['bookkom'];
 $mess=str_replace ($arr1, $arr2, $temp);	
	
	
echo "<table style='border:0px solid red;' class=tybb>";
echo "<tr><td valign=top><img src=img/avatar/".$cow['avatar']." style=width:33px;height:33px;margin-top:0px;/></td><td class=cls><p260>";

 echo '<a href="darkchat.php?user='.$cow['name'].'">';

echo $cow['name']."</a></p260><lo id=d22>&#9734;</lo>";

 if($cow['rey']>0)
  {echo "<p123>".$cow['rey']."</p123><p134>".rdate('j M H:i', strtotime($cow['data']))."</p134>";}
else if($cow['rey']<0)
{echo "<p123 class=colorrey>".$cow['rey']."</p123><p134>".rdate('j M H:i', strtotime($cow['data']))."</p134>";}
else if($cow['rey']==0)
{echo "<p123 class=colorrey2>&nbsp;".$cow['rey']."</p123><p134>".rdate('j M H:i', strtotime($cow['data']))."</p134>";}

echo "<br><div class=obl><p122>".$mess."</p122></div></td><td>";


if($_SESSION['id']==2)
{echo '<div class="dekombook" data-kom="' . $cow['id'] . '">&#10006</div>';}



echo "</td></tr></table>";



}

echo '<br><form name="formaniz9" action="shablon/polzkommentbook.php" method="post" style=margin-top:0px;>
<table class=komet><tr><td class=komet1><textarea type="text" id="'.$idfilm.'" class="mess_fil7" name="mess_name" placeholder="Ваш комментарий"></textarea>
<input type="hidden" name="idfilm" value="'.$idfilm.'">
</td></tr></table>
</form><br>';




echo "</div></td></tr>";



echo '<tr><td colspan="3"><br><br></div></td></tr></table>';

$id++;

}

?>
	
	 
	</li>
</ul>    
</div>
</div>


</td></tr></table> 

<br><br>

</td></tr></table>

</body>
</html>

