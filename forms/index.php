<?php
global $data;
$hosts=$data["hosts"];
global $addon;
?>
<table> <thead><tr> <th> host </th> <th> role </th> <th> partition </th> <th> balance </th> <th> state </th> <th> operation </th> </tr></thead>

<?php
foreach($hosts as $k=>$host){
    echo '<tr>';
    echo '<td>'.$host["addr"].'</td>';
    echo '<td>'.$host["role"].'</td>';
    echo '<td>'.$host["partition"].'</td>';
    echo '<td>'.$host["balance"].'</td>';
    echo '<td><span class="state_'.$host["state"].'">'.$host["state"].'</span></td>';
    echo '<td><a href="?act=set_state&host='.$host["addr"].'&'.$addon.'">new State</span></td>';
    echo '</tr>';
}
?>
</table>
