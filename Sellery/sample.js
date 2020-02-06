function changeSkill(skillElement,newBucket){
    var skillid_ = skillElement.attr("skillid");
    var bucketid = $(newBucket).closest(".skillBucketWrapper").attr("bucket");
    var currDate  = $(".skillDate",skillElement).text();
    
    skillElement.appendTo(newBucket);
    
    var requestChangeSkill = $.ajax({
        url: "php/queries.php",
        type: "POST",
        data: {action:'changeSkill', userid:loadedStudentId, skillid:skillid_, newbucket:bucketid,date:currDate},
        dataType: "text"
    });

    requestChangeSkill.done(function(success){
        if(success==="1"){
            console.log(success);
            loadSkills(loadedStudentId);
        }
        else{
            console.log(success);
        }
    });

    requestChangeSkill.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus + " " + jqXHR.responseText);
    });
}


function populateTeamRoster(teamid_){
    console.log("populating teamid:" + teamid_);
    $('.playerContainer').html('');
    
    var requestRoster = $.ajax({
        url: "php/queries.php",
        type: "POST",
        data: {action:'getRoster',teamid:teamid_},
        dataType: "xml"
    });

    requestRoster.done(function(teamXML){
        allPlayers = $(teamXML).find('player');
        console.log("total players:" + allPlayers.length);
        
        allPlayers.each(
            function(){
                var playerId = $(this).find('id').text();
                var playerName = $(this).find('name').text();
                var playerStatus = $(this).find('status').text();
                var playerPlays = $(this).find('plays').text();
                
                $('[container=' + playerStatus + ']').append(
                    "<div class='playerWrapper' playerid='" + playerId + "'>" + 
                        "<div class='playerName'>" + playerName + "</div>" +
                        "<div class='numPlays'>" + playerPlays + "</div>" +
                        "<div class='buttonTransparent add'></div>" +
                        "<div class='buttonTransparent remove'></div>" +
                    "</div>");
            }
        );
        activatePlayerButtons();
        updateNumPlayers();
    });

    requestRoster.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus + " " + jqXHR.responseText);
    });
}
