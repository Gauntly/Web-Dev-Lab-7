<?php
require_once "configureDB.php";
$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (!$connection) {
    echo "There is an error connecting to the database!";
    exit;
} else {
    checksExist($connection);
}
?>

<?php
$userFlag = false;
$passFlag = false;
mysqli_select_db($connection,'accounts');
$name = $_POST["namefield"];
$pwd = $_POST["pwdfield"];
$userQuery = "SELECT * FROM userAccounts WHERE username = '".$name."'";
$userResult = mysqli_query($connection,$userQuery);
$row = $userResult->fetch_assoc();

if($name == $row["username"]){
    $userFlag = true;
}if($pwd == $row["password"]) {
    $passFlag = true;
}

if($userFlag == true && $passFlag == true){
    $userEmail = $row["email"];
    echo ("User found: " . $userEmail);
}
else if(($userFlag == true && $passFlag == false)){
echo "user was found, but bad password.";
}else {
    echo "No user found.";
}
?>