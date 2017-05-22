<?php
$db_user = "root";
$db_host = "127.0.0.1";
$db_password = "";
$db_name = "";
function checksExist($connection)
{
    $selectAllQuery = "SELECT * FROM username";
    $data = mysqli_query($connection, $selectAllQuery);
    if (empty($data)) {
        mysqli_query($connection,"CREATE DATABASE accounts");
        mysqli_select_db($connection,'accounts');
        createTable($connection);
        createData($connection);
    }
}
//Checks if the table useraccounts is created, if not it creates it.
function createTable($connection)
{
    $createQuery = "CREATE TABLE userAccounts(username VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255),
    email VARCHAR(255))";

    mysqli_query($connection, $createQuery);
}

//Create data inputs dummy data for testing.
function createData($connection){
    $dataQuery = "INSERT INTO userAccounts(username, password, email)
    VALUES ('user1', 'pass1', 'email@1.com'),
    ('user2', 'pass2', 'email@2.com'),
    ('user3', 'pass3', 'email@3.com'),
    ('user4', 'pass4', 'email@4.com'),
    ('user5', 'pass5', 'email@5.com')";

    mysqli_query($connection, $dataQuery);
}
?>


