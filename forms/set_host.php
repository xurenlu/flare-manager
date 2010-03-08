<?php
global $data;
$hosts=$data["hosts"];
?><link rel="stylesheet" type="text/css" href="./css/main.css" /> 
<p></p>
<div class='codediv'>
<form method="POST" action="?act=save_host">
hostname/IP of  flarei node :
<input name="host" value="<?php echo $_GET["flarei_ip"];?>">
Port of flarei node:
<input name="port" value="<?php echo $_GET["flarei_port"];?>">
<input name="submit" value='submit' type='submit'>
</form>
</div>
