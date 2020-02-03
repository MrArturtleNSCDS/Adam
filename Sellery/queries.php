<?php

$userid = $_POST['userid'];
        $skillid = $_POST['skillid'];
        $newbucket = $_POST['newbucket'];
        
        $getCurrentSkillString = 
            "SELECT bucket,date FROM skillsusermatch
            WHERE userid=$userid AND skillid=$skillid";
        
        $getCurrentSkillQuery = query($getCurrentSkillString, $dbHandle);
        
        
        $updateSkillString = 
            "INSERT INTO skillsusermatch (userid,skillid,bucket,date) 
            VALUES ($userid,$skillid,$newbucket,NOW())";
        
        if($getSkillResult=$getCurrentSkillQuery->fetch_array()){
            $oldBucket = $getSkillResult['bucket'];
            $oldDate = $getSkillResult['date'];
            
            $updateSkillString = 
                "UPDATE skillsusermatch SET bucket=$newbucket,date=NOW()
                WHERE userid=$userid AND skillid=$skillid";
            
            $insertHistoryString = 
                "INSERT INTO skillshistory (userid,skillid,bucket,date) 
                VALUES ($userid,$skillid,$oldBucket,'$oldDate')";
            
                $insertHistoryQuery = query($insertHistoryString, $dbHandle);
        }

        $updateSkillQuery = query($updateSkillString,$dbHandle);
        
        echo 1;


function query($queryString, $handle){
	$tempQuery = $handle->query($queryString) or die($queryString." ".$handle->error);
	return $tempQuery;
}
?>
