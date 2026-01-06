
<?php
header("Content-Type: application/json");
function res($s,$m,$d=null){
 echo json_encode(["status"=>$s,"message"=>$m,"data"=>$d]); exit;
}
?>
