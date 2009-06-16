$(document).ready(function(){
    $("#QuizSearch").focus();
    
    $('#searchForm').ajaxForm({ 
		beforeSubmit: showLoading,
		success: searchComplete
    });    
});

function searchComplete(){
    hideLoading();
}

function showLoading(){
    $('#loading').show();
}

function hideLoading(){
    $('#loading').hide();
}