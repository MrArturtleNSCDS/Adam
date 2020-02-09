<?php
require "connect.php";

$action = $_POST['action'];


switch($action){
    case 'check':
        $first = $_POST['firstCheck'];
        $last = $_POST['lastCheck'];
        $email = $_POST['emailCheck'];

        $check = "SELECT * FROM `users` 
        WHERE First='$first' AND Last='$last' AND Email='$email'";
        $result = mysqli_query($dbHandle, $check);
        if(mysqli_num_rows($result)> 0){
            printf("This is an existing User");
        }else{
            printf("New user");
        }
    break;

    case 'insert':
        $firstname = $_POST['first'];
        $lastname = $_POST['last'];
        $gender = $_POST['gender'];
            
        echo "$firstname $lastname";
        $insertName = 
                    "INSERT INTO users (First, Last, Gender) 
                    VALUES ('$firstname','$lastname','$gender')";

        query($insertName, $dbHandle);

        echo 1;
    break;

    case 'recieve':
        $userId = $_POST['user'];
        $infoString = "<users>";
        $getInfo =  "SELECT users.First, users.Last,
                    waiting_list.Stall, waiting_list.Start_Time, waiting_list.End_Time FROM `users` 
                    INNER JOIN waiting_list ON users.User_ID = waiting_list.User_ID";
        $infoQuery = query($getInfo, $dbHandle);
        while($infoResult=$infoQuery->fetch_array()){ 
                $first = $infoResult['First'];
                $last = $infoResult['Last'];
                $stall = $infoResult['Stall'];
                $start = strtotime($infoResult ['Start_Time']);
                $start = date("l M jS h:i A", $start);
                $end = strtotime($infoResult['End_Time']);
                $end = date("l M jS h:i A", $end);
                $difference1 = strtotime($start);
                $difference2 = strtotime($end);
                $secs = $difference2 - $difference1;
                $minutes = $secs / 60;
            $infoString .=
                "<user>
                    <first>$first</first>
                    <last>$last</last>
                    <stall>$stall</stall>
                    <start>$start</start>
                    <end>$end</end>
                    <minutes>$minutes</minutes>
                </user>";
        }
        $infoString .= "</users>";

        echo $infoString;
    break;
}

function query($queryString, $handle){
	$tempQuery = $handle->query($queryString) or die($queryString." ".$handle->error);
	return $tempQuery;
}
?>
