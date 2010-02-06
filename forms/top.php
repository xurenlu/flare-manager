<?php global $addon;?><html>
<head >
 <title>flare nodes manager </title> 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<link rel="stylesheet" type="text/css" href="./css/main.css" /> 
</head>
<body>
<h1 style="text-align:center;"> flare nodes setting</h1>
<div class="codediv">
    current flarei host:<?php echo $_GET["flarei_ip"];?>:<?php echo $_GET["flarei_port"];?>
&nbsp;&nbsp;

</div>
<a href="?act=nodes&<?php echo $addon;?>">nodes</a>
&nbsp;&nbsp;
<a href="?act=set_host&<?php echo $addon;?>">flarei node setting</a>
<br>
