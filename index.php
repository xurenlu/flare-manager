<?php
ob_start();
include "./flare.class.php";
/**
if(empty($_COOKIE["flarei_host"]))
{
    include "./forms/set_host.php";
    exit();
}
 */
function fetch_a_proxy($flare){
        $hosts=$flare->statsNodes();
        foreach($hosts as $host){
            if(strtolower($host["role"])=="proxy"){
                return $host['addr'];
            }
        }
}
global $config;
$config["states"]=array(
    "active",
    "down",
    "prepare"
);
$config["roles"]=array(
    "master",
    "slave",
    "proxy"
);
$config["flarei_ip"]="";   //Please change it.
$config["flarei_port"]=0;  //Please change it.

#$config["flared_ip"]="ksup4.search.cnb.yahoo.com";   //Please change it.
#$config["flared_port"]=12121;  //Please change it.


if(!empty($config["flarei_ip"])
    &&
    empty($_GET["flarei_ip"])
)
    $_GET["flarei_ip"]=$config["flarei_ip"];
if(!empty($config["flarei_port"])
    &&
    empty($_GET["flarei_port"]))
    $_GET["flarei_port"]=$config["flarei_port"];

global $addon;
$addon='flarei_ip='.$_GET["flarei_ip"].'&flarei_port='.$_GET["flarei_port"].'';

function v($file){
    include "./forms/top.php";
    include $file;
    include "./forms/foot.php";
}
function goto($act){
    global $addon;
    $addon='flarei_ip='.$_GET["flarei_ip"].'&flarei_port='.$_GET["flarei_port"].'';
    header("Location:?act=".$act."&".$addon);
}
function msg($title,$url=null,$time=2,$content=null,$level="message"){
    if(is_null($url)){
        if(!empty($_REQUEST["HTTP_REFERER"]))
            $url=$_REQUEST["HTTP_REFERER"];
        else
            $url=$_SERVER["HTTP_REFERER"];
    }
    if(is_null($content)) $content=$title;
    global $data;
    $data=array(
        "title"=>$title,
        "content"=>$content,
        "url"=>$url,
        "level"=>$level,
        "time"=>$time);
    v("./forms/msg.php");
}
function run($act=null){
    if(is_null($act))
       $act=$_GET["act"]; 
    switch($act){
    case 'help':
        v("./forms/help.php");
        break;
    case 'set_host':
        v("./forms/set_host.php");
        break;
    case "save_host":
        $_GET["flarei_ip"]=trim($_POST["host"]);
        $_GET["flarei_port"]=trim($_POST["port"]);
        goto("nodes");
        break;
    case "set_role_form":
    case "save_state":
        $flare=new FlareClient(array($_GET["flarei_ip"].":".$_GET["flarei_port"]));
        if($flare->setHostState(trim($_POST["ip"]),trim($_POST["port"]),trim($_POST["state"])))
            msg("State modified!");
        else
            msg("State modifying failed");
        break;
    case "save_role":
        $flare=new FlareClient(array($_GET["flarei_ip"].":".$_GET["flarei_port"]));
        if($flare->setHostRole(trim($_POST["ip"]),trim($_POST["port"]),trim($_POST["role"]), trim($_POST["balance"]),trim($_POST["partition"])))
            msg("State modified!");
        else
            msg("State modifying failed");
        break;

        break;
    case "set_state":
        global $data;
        $data["node"]=trim($_GET["host"]);
        $flare=new FlareClient(array($_GET["flarei_ip"].":".$_GET["flarei_port"]));
        $data["hosts"]=$flare->statsNodes();
        $hostinfo=explode(":",trim($_GET["host"]));
        $data["ip"]=$hostinfo[0];
        $data["port"]=$hostinfo[1];
        v("./forms/set_state.php");
        break;
    case "about":
        v("./forms/about.php");
        break;
    case "license":
        v("./forms/license.php");
        break;
    case "data":
        global $data;
        $flare=new FlareClient(array($_GET["flarei_ip"].":".$_GET["flarei_port"]));
        $data["hosts"]=$flare->statsNodes();
        v("./forms/data.php");
        break;
    case "data_get":
        global $data,$config;
        $flare=new FlareClient(array($_POST["addr"]));
        $data["value"]=$flare->get(trim($_POST["key"]));
        v("./forms/data_get.php");
        break;
    case "data_set":
        global $config,$addon;
        $flare=new FlareClient(array($_POST["addr"]));
        $ret=$flare->set(trim($_POST["key"]),trim($_POST["value"]),intval($_POST["expire"]));
        if($ret!=trim($_POST["key"])){
            msg("set failed","index.php?".$addon);
            exit();
        }
        goto("data");
        break;

    case "nodes":
        $flare=new FlareClient(array($_GET["flarei_ip"].":".$_GET["flarei_port"]));
        global $data;
        $data["hosts"]=$flare->statsNodes();
        v("./forms/index.php");
        break;
    default:
        if(empty($_GET["flarei_ip"]) || empty($_GET["flarei_port"]))
        {
            goto("set_host");
        }
        else{
            goto("nodes");
        }
    }
}

run();
