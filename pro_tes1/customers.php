<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "pro_tes");

$result = $conn->query("SELECT * FROM member");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Name":"'  . $rs["member_name"] . '",';
    $outp .= '"Email":"'   . $rs["member_email"]        . '",';
    $outp .= '"Address":"'. $rs["member_address"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
