var wrong=$('<div class="alert alert-danger" role="alert">Wrong username or password!</div>');
var success=$('<div class="alert alert-success" role="alert">Successful!</div>');
$('#stud_button').click(function(e){
    e.preventDefault();
    if(($('#stud_user').val()!="username")||($('#stud_pass').val()!="password")){
    $('#stud_feedback').empty();
    $('#stud_feedback').append(wrong);
    setTimeout(function(){ 
        $('#stud_feedback').empty();
    }, 3000);
    }
    if(($('#stud_user').val()=="username")&&($('#stud_pass').val()=="password")){
    $('#stud_feedback').empty();
    $('#stud_feedback').append(success);
    setTimeout(function(){ 
        $('#stud_feedback').empty();
    }, 3000);
    url = "https://docs.google.com/spreadsheets/d/1X_ExfTu0i81_QbuhP6BqkUn29B_zVumqU4aLcIQn59k/edit?usp=sharing";
    window.open(url,'_blank');
    }
    
});
$('#ment_button').click(function(e){
    e.preventDefault();
    if(($('#ment_user').val()!="username")||($('#ment_pass').val()!="password")){
    $('#ment_feedback').empty();
    $('#ment_feedback').append(wrong);
    setTimeout(function(){ 
        $('#ment_feedback').empty();
    }, 3000);
    }
    if(($('#ment_user').val()=="username")&&($('#ment_pass').val()=="password")){
    $('#ment_feedback').empty();
    $('#ment_feedback').append(success);
    url = "https://docs.google.com/spreadsheets/d/1X_ExfTu0i81_QbuhP6BqkUn29B_zVumqU4aLcIQn59k/edit?usp=sharing";
    window.open(url,'_blank');
    setTimeout(function(){ 
        $('#ment_feedback').empty();
    }, 3000);
    }
})