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
        $result = query($check, $dbHandle);
        if($curResult = $result->fetch_array()){
            echo $curResult['Gender'];
            
        }else{
           
            echo -1;
        }

    break;

    case 'insert':
        $firstname = $_POST['first'];
        $lastname = $_POST['last'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
            
        echo "$firstname $lastname";
        $insertName = 
                    "INSERT INTO users (First, Last, Gender, Email) 
                    VALUES ('$firstname','$lastname','$gender', '$email')";

        query($insertName, $dbHandle);

        echo 1;
    break;

    case 'waitingListInsert':
        $stall = $_POST['stall'];
        $insertWaitingList =
                            "INSERT INTO waiting_list (First, Last, Gender, Email) 
                            VALUES ('$firstname','$lastname','$gender', '$email')";


    case 'showerInfo':
        $gender = $_POST['gender'];
        $infoString = "<users>";
        $getInfo =  "SELECT users.First, users.Last,
                    waiting_list.Stall, waiting_list.Start_Time, waiting_list.End_Time FROM `users` 
                    INNER JOIN waiting_list ON users.User_ID = waiting_list.User_ID
                    WHERE Gender = $gender";
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
