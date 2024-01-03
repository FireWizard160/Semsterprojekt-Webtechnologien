<?php

function getUserByEmailAndPassword(mysqli $db, $email, $password)
{
    $sql = "SELECT firstname, lastname, email FROM persons WHERE email = ? AND password = SHA1(?) ";
    $statement = $db->prepare($sql);
    $statement->bind_param("ss", $email, $password);
    $statement->execute();

    $result = $statement->get_result();

    if($result->num_rows < 1) {
        return null;
    } else {
        return $result->fetch_assoc();
    }
}

function getAllUsers($db)
{
    $sql = "SELECT * FROM persons";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->get_result();

    $users = [];
    while($row =$result->fetch_assoc()) {
        $users[] = $row;
    }

    return $users;

}