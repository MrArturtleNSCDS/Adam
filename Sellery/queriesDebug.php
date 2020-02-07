<?php
require "connect.php";

$action = $_POST['action'];

switch($action){

    case 'insert':
        $firstname = $_POST['first'];
        $lastname = $_POST['last'];
            
        echo "$firstname $lastname";
        $insertName = 
                    "INSERT INTO users (First, Last) 
                    VALUES ('$firstname','$lastname')";

        query($insertName, $dbHandle);

        echo 1;
    break;

    case 'recieve':
        $userId = $_POST['user'];
        $infoString = "";
        $getInfo =  "SELECT users.First, users.Last,
                    waiting_list.Stall, waiting_list.Start_Time, waiting_list.End_Time FROM `users` 
                    INNER JOIN waiting_list ON users.User_ID = waiting_list.User_ID";
        $infoQuery = query($getInfo, $dbHandle);
        while($infoString = $infoString->fetch_array()){
            $infoString .= 
                $first = $infoString['first'];
                $last = $infoString['last'];
                $stall = $infoString['stall'];
                $start = $infoString['start_time'];
                $end = $infoString['end_time'];
                $infoString .=;
        }

        echo userXML;
    break;
}

function query($queryString, $handle){
	$tempQuery = $handle->query($queryString) or die($queryString." ".$handle->error);
	return $tempQuery;
}
>?
