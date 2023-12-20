<?php
include_once(myCLASS."DB.php");
$DB=new DB();
$DBSettings=$DB->GetData("settings", "WHERE ID=?", array(1), "ORDER BY ID ASC", 1);
if($DBSettings!=false){
    $webTitle=$DBSettings[0]["set_title"];
    $webKey=$DBSettings[0]["set_key"];
    $webDescription=$DBSettings[0]["set_description"];
    $webURL=$DBSettings[0]["set_url"];
}
?>