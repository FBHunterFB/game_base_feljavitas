<?php require "DataBase.php";
$db = new DataBase();
header("content-type: application/json");
$SelectDataQuery = mysqli_query($db->dbConnect(), "SELECT * FROM games");
$jsonData = array();

while($row = mysqli_fetch_array($SelectDataQuery)) {
    $jsonData[] = $row;
}
echo json_encode($jsonData);


?>
