<?php
require_once "dbconfig.php";

//tells request is a json 
header("Content-Type: application/json");

//request is approved from any origin
header("Access-Control-Allow-Origin: *");

//only post requests are approved
header("Access-Control-Allow-Methods: POST");

//this header have security purposes
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization");

/*php://input allows you to read raw data from the request body (php.net)
*file_get_contents() is the way to read the contents of a file and make it a string 
*json_decode() gets a json string and transfers to a php variable that can be an array or an object
*["name"] and ["price"]are the array used to create a new data or value in json
*/
$data = json_decode(file_get_contents("php://input"), true);

$pname = $data["name"];
$pprice = $data["price"];

//uses sql to try insert the new value or data in the database
$query = "INSERT INTO tbl_product(product_name, product_price) 
                        VALUES ('".$pname."','".$pprice."')";

if(mysqli_query($conn, $query) or die ("Insert Query Failed")){
    echo json_encode(array("message" => "Product Insert Successfully", "status" => true));
}else{
    echo json_encode(array("message" => "Product Not Insert", "status" => false));
}

?>