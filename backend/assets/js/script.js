$(document).ready(function() {
    $('.tip').tooltip()
});

function deletechecked(link)
{
    var answer = confirm('Delete item?')
    if (answer){
        window.location = link;
    }       
    return false;  
}

