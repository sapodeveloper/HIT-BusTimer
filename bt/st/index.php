<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=emulateIE7" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes,maximum-scale=3.0" />

<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
    
<title>Bus Timer</title>

<script type="text/javascript">
<?php
require "../state/state.php";
echo "var week = $s\n";
?>
</script>

<script type="text/javascript" src="./sta_config.js"></script>
<script type="text/javascript" src="./sta_disp.js"></script>
<script type="text/javascript">
// 初期設定
function startup(){
	time_table();
	time_count();
}
</script>
// analyticsIPタグの読み込み
<script type="text/javascript" src="//www.analyticsip.net/getIP/public_html/ra/script.php"></script><noscript><p><img src="//www.analyticsip.net/getIP/public_html/ra/track.php" alt="" width="1" height="1" /></p></noscript>

// google analytics
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-32108224-2', 'auto');

// IP,Cookie,AccessTime取得
ga('set', 'dimension1', trackCommonMethod.getIP());
ga('set', 'dimension2', trackCommonMethod.getCookie());
ga('set', 'dimension3', trackCommonMethod.getAccessTime());

ga('send', 'pageview');
</script>
</head>

<body onload="startup()">
    <div data-role="page">
    <div style="font-size:13pt" data-role="header">
        <center>Hiroshima Institute of Techonology<br>－Bus Timer－
        <a rel="external" href="../ac/" data-role="button">広工大発に切替</a></center>
    </div>
    <div align="center">
    <div data-role="content" data-theme="e" data-content-theme="e">
        <font face="HG丸ｺﾞｼｯｸM-PRO" size=2>
        <table border=0 width="1px" >
		<tr>
			<td align=center bgcolor="#FBF5EF">
				<?php
					if($s=='1')echo "<img src=\"../img/itukaiti_tuujou.jpg\" />";
					if($s=='2')echo "<img src=\"../img/itukaiti_rinji.jpg\" />";
					if($s=='4')echo "<img src=\"../img/itukaiti_kyuusi.jpg\" />";
				?>
			</td>
		</tr>
		<tr>
			<td align=center>
				<form name="time_table">
					<input type="text" name="table1" size="30" readonly style="width: 238px; height: 50px; font-size: 50px; text-align: center;">
			</td>
		</tr>
	</table>
	<div style="font-size: 5px"><br></div>
	<table border=0 cellspacing=0 cellpadding=0 width="1px">
		<tr>
		<td align=center width="0px">時刻表<br>
			<textarea name="table2" rows=3 cols=10 style="overflow:hidden; width: 100px; height: 140px; font-size:25px; text-align: right;"></textarea>
			</form>
		</td>
		<td align="center" valign="top"><br>
            <a href="http://www.jim.it-hiroshima.ac.jp/bus/bus.asp" data-icon="arrow-r" data-role="button">工大バス時刻表</a>
            <a href="http://www.jr-odekake.net/eki/timetable.php?id=0800616" data-role="button" data-icon="arrow-r">JR時刻表</a>
            <a href="http://www.hiroden.co.jp/cgi-bin/psearch.cgi?di=013" data-role="button" data-icon="arrow-r">広電時刻表</a>
		</td>
		</tr>
	</table>
	</table>
	<div style="font-size: 5px"><br></div>
    </div>
    <div style="font-size:13pt" data-role="footer">
    <center>
    <p>&copy;2013 HIT Solution
    <a rel="external" data-icon="star" data-inline=“true” href="https://sites.google.com/site/hitsolu/" data-role="button">HP</a></p></p>
    </center>
    </div>
    </div>
</font>
</body>
</html>
