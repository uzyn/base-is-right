$(document).ready(function(){
    $("#QuizSearch").focus();
    
    $('#searchForm').ajaxForm({ 
		beforeSubmit: showLoading,
		success: searchComplete
    });    
    
    $('#guessForm').submit(function(){
    });    
});

function searchComplete(responseText, statusText){
    hideLoading();
    $("#quiz").slideDown();
    
}

function showLoading(){
    $('#loading').show();
}

function hideLoading(){
    $('#loading').hide();
}

function stripComment(msg){
    msg = msg.replace(/<!--.*-->/, "");
    return msg;
}
