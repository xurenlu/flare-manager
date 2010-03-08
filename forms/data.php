<?php
/**
 * data operation interfaces
 *
 * @author renlu <xurenlu@gmail.com>
 * @version $Id$
 * @copyright renlu <xurenlu@gmail.com>, 08 三月, 2010
 * @package default
 **/
global $addon,$data;
function listHosts($hosts){
    $str='<select name="addr">';
    foreach($hosts as $host){
        $str.= '<option value="'.$host["addr"].'">'.$host["addr"].'</option>';
    }
    $str.="</select>";
    return $str;
}
?>
<p></p>
<div class="codediv">
    <h2> Get value of key:</h2>
    <form method="POST" action="?act=data_get&<?php
    echo $addon;
?>">
<p>    choose host to connect:<?php echo listhosts($data["hosts"]);?></p>
       key: <input type="text" name="key" value="testkey">
        <input type="submit" name="submit" value="submit">
    </form>
</div>
<p></p>
<div id="name" class="codediv">
<h2>Set value </h2>
     <form action="?act=data_set&<?php echo $addon;?>" method="POST" accept-charset="utf-8">
<p>    choose host to connect:<?php echo listhosts($data["hosts"]);?></p>
<p> key:<input type="text" name="key" value=""></p>
<p> expire:<input type="text" name="expire" value="3600">(seconds)</p>
<p> value:<textarea name="value" rows="8" cols="40"></textarea></p>
     <p><input type="submit" value="Continue &rarr;"></p>
     </form>
</div>
