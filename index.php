<?php
//tells request is a json 
header("Content-Type: application/json");

//request is approved from any origin
header("Access-Control-Allow-Origin: *");

require_once "dbconfig.php";

$query = "SELECT * FROM tbl_product";

$result = mysqli_query($conn, $query) or die ("Select query failed");

$count = mysqli_num_rows($result);

if($count > 0){
    $row = mysqli_fetch_all($result, MYSQL_ASSOC);

    echo json_encode($row);
}else{
    echo json_encode(array("message" => "no product found.", "status" => false));
}

?>