<?php
$data = [];
$TopGames = [];
$userData = [];
$gameData = [];
$userGames = [];
$publishers = [];
$userList = [];

$connect = new mysqli("mysql.nethely.hu","gamebase","+2FmEgAdUNfk76+B","gamebase");
if ($connect -> connect_errno) {
  echo "Nem sikerült csatlakozni az adatbázishoz!" . $connect -> connect_error;
  exit();
}


$received_data = json_decode(file_get_contents("php://input"));
if ($received_data->action == "fetchall") {
    $query = mysqli_query($connect, "SELECT * FROM games");
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
    echo json_encode($data);
}
elseif ($received_data->action == "fetchTopGames") {
    $query = mysqli_query($connect, "SELECT * FROM `games` ORDER BY downloadCount DESC LIMIT 5");
    while ($row = mysqli_fetch_assoc($query)) {
        $TopGames[] = $row;
    }
    echo json_encode($TopGames);
}
elseif($received_data->action == "loginUser") {

    $username = e($received_data->username);
    $password = e($received_data->password);

    // Jelszó titkosítása
    $password = hash("sha256", $password);
    // Felhasználó megkeresése az adatbázisból a felh.név és jelszó alapján
    $runSelectQuery = mysqli_query($connect, "SELECT * FROM users WHERE `username`='$username' AND `password`='$password' LIMIT 1");   
    // Sikeres találat esetén belépteti a felhasználót
    if (mysqli_num_rows($runSelectQuery) == 1) {
        echo 'true';
    } else {
        echo 'false';
    }
} 
elseif ($received_data->action == "fetchUserData") {
    $username = e($received_data->username);
    $query = mysqli_query($connect, "SELECT * FROM users WHERE `username`='$username'");
    while ($row = mysqli_fetch_assoc($query)) {
        $userData[] = $row;
    }
    echo json_encode($userData);
}
elseif ($received_data->action == "fetchSelectedGame") {
    $gameid = e($received_data->buttonValue);
    $username = e($received_data->username);

    $selectUserID = mysqli_query($connect, "SELECT id FROM users WHERE `username`='$username'"); // Felhasználó id
    $accountInfo = mysqli_fetch_array($selectUserID);
    $userid = $accountInfo['id'];

    $SelectUserGame = mysqli_query($connect, "SELECT * FROM ownedgames WHERE `gameID`='$gameid' AND `userID`='$userid'");
    if (mysqli_num_rows($SelectUserGame) == 0) {
        $query = mysqli_query($connect, "SELECT * FROM games WHERE `id`='$gameid'");
        while ($row = mysqli_fetch_assoc($query)) {
            $gameData[] = $row;
        }
        echo json_encode($gameData);
    } else {
        echo 'owned';
    }


}
elseif ($received_data->action == "buyCurrentGame") {

    $gameid = e($received_data->buttonValue);
    $username = e($received_data->username);
    $today = date("Y-m-d H:i");

    $selectUserAndGameQuery = mysqli_query($connect, "SELECT `id`, `money`, (SELECT gamePrice FROM games WHERE id='$gameid') AS gameAr FROM users WHERE `username`='$username'"); // Fontosabb adatok lekérése az adatbázisból
    $accountdata = mysqli_fetch_array($selectUserAndGameQuery);
    $userid = $accountdata['id'];
    $userMoney = $accountdata['money'];
    $gamePrice = $accountdata['gameAr'];

    if ($userMoney >= $gamePrice) {


        $runInsertQuery = mysqli_query($connect, "INSERT INTO `ownedgames`(`userID`, `gameID`, `purchDate`, `playTime`) VALUES ('$userid', '$gameid', '$today', '0')"); // Játék hozzáadása a felhasználó könyvtárához
        $runPlusDownload = mysqli_query($connect, "UPDATE `games` SET `downloadCount`=`downloadCount`+1 WHERE `id`='$gameid'"); // A játék letöltéseinek számának növelése
        $runUpdateUser = mysqli_query($connect, "UPDATE `users` SET `money`=`money`-'$gamePrice' WHERE `id`='$userid'"); //A felhasználó egyenlegének frissitése
        if ($runPlusDownload && $runInsertQuery && $runUpdateUser) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'no';
    }

}
elseif ($received_data->action == "fetchUserGames") {
    $username = e($received_data->username);
    $selectUserID = mysqli_query($connect, "SELECT id FROM users WHERE `username`='$username'"); // Felhasználó id
    $accountInfo = mysqli_fetch_array($selectUserID);
    $userid = $accountInfo['id'];
    $query = mysqli_query($connect, "SELECT gameID, purchDate, playTime, (SELECT gameName FROM games WHERE `id`=`gameID`) AS gameName, (SELECT bannerUrl FROM games WHERE `id`=`gameID`) AS banner, (SELECT gameDesc FROM games WHERE `id`=`gameID`) AS `desc` FROM ownedgames WHERE `userID`='$userid'");
    while ($row = mysqli_fetch_assoc($query)) {
        $userGames[] = $row;
    }
    echo json_encode($userGames);
}
elseif ($received_data->action == "registerUser") {
    $username = e($received_data->username);
    $password = e($received_data->password);
    $email = e($received_data->email);
    $orszag = e($received_data->orszag);

    $password = hash("sha256", $password);
    // Felhasználó már létezik ellenőrzés
    $SelectQuery = mysqli_query($connect, "SELECT * FROM users WHERE `username`='$username' AND `password`='$password' LIMIT 1");
    if (mysqli_num_rows($SelectQuery) == '0' || mysqli_num_rows($SelectQuery) == '') {

        $today = date("Y-m-d H:i");
        $runInsertQuery = mysqli_query($connect, "INSERT INTO `users`(`username`, `password`, `permission`, `emailAddress`, `regDate`, `money`) VALUES ('$username', '$password', 'user', '$email', '$today', '0')");
        if ($runInsertQuery) {
            echo 'ok';
        } else {
            echo 'error';
        }

    } else {
        echo 'found';
    }
} 
elseif ($received_data->action == "fetchPublishers") {
    $query = mysqli_query($connect, "SELECT * FROM publishers");
    while ($row = mysqli_fetch_assoc($query)) {
        $publishers[] = $row;
    }
    echo json_encode($publishers);
}
elseif ($received_data->action == "addGameToBase") {
    $gameName = e($received_data->gameName);
    $gameDesc = e($received_data->gameDesc);
    $gamePrice = e($received_data->gamePrice);
    $category = e($received_data->category);
    $pegi = e($received_data->pegi);
    $releaseDate = e($received_data->releaseDate);
    $banner = e($received_data->banner);
    $publisher = e($received_data->publisher);

    $runInsert = mysqli_query($connect, "INSERT INTO `games`(`gameName`, `gameDesc`, `gamePrice`, `pegi`, `category`, `downloadCount`, `releaseDate`, `publisherId`, `bannerUrl`) VALUES ('$gameName', '$gameDesc', '$gamePrice', '$pegi', '$category', '0', '$releaseDate', '$publisher', '$banner')");

    if ($runInsert) {
        echo 'OK';
    } else {
        echo 'error';
    }

} elseif ($received_data->action == "fetchAll") {
    $query = mysqli_query($connect, "SELECT * FROM `users` ORDER BY id DESC");
    while ($row = mysqli_fetch_assoc($query)) {
        $userList[] = $row;
    }
    echo json_encode($userList);
} elseif ($received_data->action == "updateUserBalance") {
    $userid = e($received_data->user);
    $money = e($received_data->money);

    $updateQuery = mysqli_query($connect, "UPDATE users SET `money`='$money' WHERE id='$userid'");

    if ($updateQuery) {
        echo 'OK';
    } else {
        echo 'error';
    }
} elseif ($received_data->action == "updateMyData") {

    $password = e($received_data->password);
    $password_2 = e($received_data->password_2);
    $Currentpassword = e($received_data->Currentpassword);
    $username = e($received_data->username);

    $selectUserID = mysqli_query($connect, "SELECT id, password FROM users WHERE `username`='$username'"); // Felhasználó id
    $accountInfo = mysqli_fetch_array($selectUserID);
    $userid = $accountInfo['id'];
    $userpassword = $accountInfo['password'];

    $Currentpassword = hash("sha256", $Currentpassword);

    if ($userpassword != $Currentpassword) {
        echo 'passError';
    } else {
        $password = hash("sha256", $password);

        $updateUserQuery = mysqli_query($connect, "UPDATE users SET `password`='$password' WHERE id='$userid'");

        if ($updateUserQuery) {
            echo 'OK';
        } else {
            echo 'error';
        }

    }


}


// mysqli escape MySql Injection ellen //
function e($val)
{
  global $connect;
  return mysqli_real_escape_string($connect, trim($val));
}
?>