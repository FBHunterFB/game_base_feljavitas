<?php require "DataBase.php";
$db = new DataBase();
header("content-type: application/json");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $SelectDataQuery = mysqli_query($db->dbConnect(), "SELECT * FROM games WHERE id='$id'");

    if (mysqli_num_rows($SelectDataQuery) == 1) {
        echo 'Siker';
    } else {
        echo 'error';
    }

}

?>
