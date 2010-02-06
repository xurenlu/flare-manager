<?php
ob_end_clean();
global $data;
$msg=$data["title"];
$content=$data["content"];
$url=$data["url"];
$time=$data["time"];
$level=$data["level"];
?><html>
<meta http-equiv="refresh" content="<?php echo $time;?>;url=<? echo $url;?>">
<title>redirect </title>
<style type="text/css">
div.codediv{
    border:1px solid  #999;
    background:#efefef;
    padding:5px;
}
body { margin:50px;border:0px solid #e0e0e0; padding:50px;line-height:1.5em;}
body {font-family: Verdana;FONT-SIZE: 9pt;MARGIN: 0;color: #000000;background: #ffffff;}
td {FONT-SIZE: 9pt;}
a { TEXT-DECORATION: none;}
a:hover { text-decoration: underline; }
img {border:0;}
</style>
</head>
<body >
<br />
<table width="100%" cellspacing="0" cellpadding="0" height="90%" align="center" bgcolor="#ffffff">
<tr align="center" valign="middle"><td>

<table cellspacing="1" cellpadding="10" bgcolor="#cccccc" width="600">
<tr><td class="index_font" align="center" >
<div class="codediv">
<p>
&raquo; Message &nbsp;<br /><br />
<a href="<? echo $url?>">[ <? echo $content;?> ]</a><br /><br /><a href="<? echo $url?>">Click me if the browser didn't transfer to new URL automaticlly;</a></p>
</div>
</td></tr></table></td></tr></table></body></html>
