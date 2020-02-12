<?php
require "connect.php";

$action = $_POST['action'];


switch($action){
    case 'check':
        $first = $_POST['firstCheck'];
        $last = $_POST['lastCheck'];
        $email = $_POST['emailCheck'];
        $gender = -1;
        $userID = -1;
        
        //echo "$first $last $email";
        
        $check = "SELECT * FROM users
        WHERE First='$first' AND Last='$last' AND Email='$email'";
        
        
        $infoQuery = query($check, $dbHandle);
        
        if($infoResult=$infoQuery->fetch_array()){
            $userID = $infoResult['User_ID'];
            $gender = $infoResult['Gender'];
        }
        
        echo
                "<user>
                    <userID>$userID</userID>
                    <gender>$gender</gender>
                </user>";

    break;

    case 'insert':
        $firstname = $_POST['first'];
        $lastname = $_POST['last'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
            
        $insertName = 
                    "INSERT INTO users (First, Last, Gender, Email) 
                    VALUES ('$firstname','$lastname','$gender', '$email')";

        query($insertName, $dbHandle);

        echo 1;
    break;

    case 'waitingListInsert':
        $stall = $_POST['stall'];
        $userID = $_POST['userID'];
        
        $start = date('Y-m-d H:i:s',strtotime($_POST['start']));
        $duration = $_POST['duration'];
        
        $end = date('Y-m-d H:i:s', strtotime($start) + $duration*60);
        

        $insertWaitingList =
                            "INSERT INTO waiting_list (Stall, User_ID, Start_Time, End_Time) 
                            VALUES ('$stall', '$userID', '$start', '$end')";

        query($insertWaitingList, $dbHandle);
        
        echo 1;
    break;

    case 'showerInfo':
        $gender = $_POST['gender'];
        $infoString = "<users>";
        $getInfo =  "SELECT users.First, users.Last,
                    waiting_list.Stall, waiting_list.Start_Time, waiting_list.End_Time FROM `users` 
                    INNER JOIN waiting_list ON users.User_ID = waiting_list.User_ID
                    WHERE Gender = $gender ORDER By Start_Time";
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
