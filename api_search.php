<?php
require_once "dbconfig.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$data = json_decode(file_get_contents("php://input"), true);

$psearch = $data["search"];

echo $query = "SELECT * FROM tbl_product WHERE product_name LIKE'%".$psearch."%' ";

$result = mysqli_query($conn, $query) or die ("Search failed");

$count = mysqli_num_rows($result);

if($count > 0){
    $row = mysqli_fetch_all($result);
    echo json_encode($row);
}else{
    echo json_encode(array("message" => "no search found", "status" => false));
}