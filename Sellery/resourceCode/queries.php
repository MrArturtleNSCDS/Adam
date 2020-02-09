<?php
if(!defined('INCLUDE_CHECK')) 
    die('You are not allowed to execute this file directly');

require "header.php";

$keychars = "abcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*()";
$keycharscount = strlen($keychars);

$action = $_POST['action'];

switch($action){
     case "getUserInfo":
        $email = $_POST['email'];
        $getUserString = 
            "SELECT coachid FROM coaches WHERE email = '$email'";
        $getUserQuery = query($getUserString,$dbHandle);
        if($getUserResult=$getUserQuery->fetch_array()){
            echo $getUserResult['coachid'];
        }
        else
            echo 0;
        break;
    case "getTeams":
        $coachid = $_POST['coachid'];
        $getTeamsString = 
            "SELECT teams.teamid,teams.name FROM teams
            LEFT JOIN coachteammatch ON coachteammatch.teamid=teams.teamid
            WHERE coachteammatch.coachid=$coachid";
        $getTeamsQuery = query($getTeamsString,$dbHandle);
        $allTeamsString = "<teams>";
        while($getTeamsResult=$getTeamsQuery->fetch_array()){
            $teamId = $getTeamsResult['teamid'];
            $teamName = $getTeamsResult['name'];
            $allTeamsString .= 
                "<team>
                    <id>$teamId</id>
                    <name>$teamName</name>
                </team>";
        }
        $allTeamsString.= "</teams>";
        echo $allTeamsString;
        break;
    case "getRoster":
        $teamid = $_POST['teamid'];
        $getTeamsString = 
            "SELECT playerid,name,status,numplays FROM players
            WHERE teamid=$teamid";
        $getTeamsQuery = query($getTeamsString,$dbHandle);
        $allTeamsString = "<players>";
        while($getTeamsResult=$getTeamsQuery->fetch_array()){
            $playerId = $getTeamsResult['playerid'];
            $playerName = $getTeamsResult['name'];
            $playerStatus = $getTeamsResult['status'];
            $playerPlays = $getTeamsResult['numplays'];
            $allTeamsString .= 
                "<player>
                    <id>$playerId</id>
                    <name>$playerName</name>
                    <status>$playerStatus</status>
                    <plays>$playerPlays</plays>
                </player>";
        }
        $allTeamsString.= "</players>";
        echo $allTeamsString;
        break;
    case 'updatePlayerStatus':
        $playerid = $_POST['playerid'];
        $status = $_POST['status'];
        $statusString = 
            "UPDATE players SET status=$status WHERE playerid=$playerid";
        $statusQuery = query($statusString,$dbHandle);
        echo 1;
        break;
    case 'updateNumPlays':
        $typePlay = $_POST['typePlay'];
        //$condition = $playType=='add'?'+1':'-1';
            
        $statusString = 
            "UPDATE players SET numplays=numplays $typePlay 1 WHERE status=2";
        $statusQuery = query($statusString,$dbHandle);
        echo 1;
        break;
     case 'clearPlays':
        $statusString = 
            "UPDATE players SET numplays=0";
        $statusQuery = query($statusString,$dbHandle);
        echo 1;
        break;
	default : 
		echo "bad command";
}

function query($queryString, $handle){
	$tempQuery = $handle->query($queryString) or die($queryString." ".$handle->error);
	return $tempQuery;
}
?>
