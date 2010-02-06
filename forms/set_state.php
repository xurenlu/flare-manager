<?php
global $data,$config,$addon;

?>
<style type="text/css">
p{
    display:block;
}
</style>
<h1>State setting</h1>
<div class="codediv">
<form method="POST" action="?act=save_state&<?php echo $addon;?>">
<input name="HTTP_REFERER" value="<?php echo $_SERVER["HTTP_REFERER"];?>" type="hidden">
<p>
Current Flare node's IP/host: <input name="ip" value="<?php echo $data["ip"]; ?>" readonly>
</p>
<p>
Current Flare node's Port:<input name="port" value="<?php echo $data["port"]; ?>" readonly>
</p>
<p>
new State:<select name="state">
<?php foreach($config["states"] as $s) { 
    if($s==$data["hosts"][$data["node"]]["state"])
        echo '<option value="'.$s.'" selected>'.$s.'</option>';
    else
        echo '<option value="'.$s.'">'.$s.'</option>';
}
?>
</select>
</p>
<input name="submit" value="submit" type="submit">
</form>
</div>


<h1>Role setting</h1>
<div class="codediv">
<form method="POST" action="?act=save_role&<?php echo $addon;?>">
<input name="HTTP_REFERER" value="<?php echo $_SERVER["HTTP_REFERER"];?>" type="hidden">
<p>
Current Flare node's IP/host: <input name="ip" value="<?php echo $data["ip"]; ?>" readonly>
</p>
<p>
Current Flare node's Port:<input name="port" value="<?php echo $data["port"]; ?>" readonly>
</p>
<p>
new role:<select name="role">
<?php foreach($config["roles"] as $r) { 
    if($r==$data["hosts"][$data["node"]]["role"])
        echo '<option value="'.$r.'" selected>'.$r.'</option>';
    else
        echo '<option value="'.$r.'">'.$r.'</option>';
}
?>
</select>
</p>
<p>
new balance:
<input  name="balance" value="">(numeric);
</p>
<p>
new partition:
<input name="partition" value="">(numeric);
</p>
<p>
<input name="submit" value="submit" type="submit">
</p>
</form>
</div>
