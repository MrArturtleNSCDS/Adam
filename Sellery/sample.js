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
