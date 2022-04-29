<?php
require_once "dbconfig.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
//only delete requests are approved
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

$pid = $data["id"];

echo $query = "DELETE FROM tbl_product WHERE product_id='".$pid."' ";

if(mysqli_query($conn, $query) or die ("Delete Failed")){
    echo json_encode(array("Message" => "Product deleted successfully", "Status" => true));
}else{
    echo json_encode(array("Message" => "failed, product not deleted", "Status" => false));
}

?>