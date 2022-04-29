<?php
require_once "dbconfig.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
//only put requests are approved
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

$pid = $data["id"];
$pname = $data["name"];
$pprice = $data["price"];

echo $query = "UPDATE tbl_product SET product_name='".$pname."',
                                    product_price='".$pprice."'
                                    WHERE  product_id='".$pid."' ";


if(mysqli_query($conn, $query) or die("Update Query failed")){
    echo json_encode(array("messahe" => "Product Update Successfully", "Status" => true));
}else{
    echo json_encode(array("messahe" => "Update Failed", "Status" => false));
}

?>