<?php require "DataBase.php";
$db = new DataBase();
header("content-type: application/json");
if (isset($_POST['username'])) {

    $FindUserId = mysqli_query($db->dbConnect(), "SELECT id FROM users WHERE username='$username'");
    $userData = mysqli_fetch_assoc($FindUserId);
    $userid = $userData['id'];


    $SelectDataQuery = mysqli_query($db->dbConnect(), "SELECT gameID, purchDate, playTime, (SELECT gameName FROM games WHERE `id`=`gameID`) AS gameName, (SELECT bannerUrl FROM games WHERE `id`=`gameID`) AS banner, (SELECT gameDesc FROM games WHERE `id`=`gameID`) AS `desc` FROM ownedgames WHERE `userID`='$userid'");
    $jsonData = array();

    while($row = mysqli_fetch_array($SelectDataQuery)) {
        $jsonData[] = $row;
    }
    echo json_encode($jsonData);
}

?>
