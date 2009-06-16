var price = 26;
//parseInt(Math.round(25.9));

$(document).ready(function(){
    $("#QuizSearch").focus();
    
    $('#searchForm').ajaxForm({ 
		beforeSubmit: showLoading,
		success: searchComplete
    });    
    
    $('#guessForm').submit(function(){
        guess($('#ProductPrice').val());
        return false;
    });    
});

function searchComplete(responseText, statusText){
    hideLoading();
    $("#quiz").slideDown();
    
    var product = eval('(' + responseText + ')');
    console.log(product);
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

function guess(x){
    $(".result").hide();
    x = parseInt(x);
    if (isNaN(x)){
        $("#error").show();
    }
    
    if (x == price){
        $("#right").show();
    }
    
    if (x < price){
        $("#toolow").show();
    }
    
    if (x > price){
        $("#toohigh").show();
    }   
}