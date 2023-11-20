// final to show user data on the table need to call
$(document).ready(function() {
    // alert("yow");
    showVerifList('showVerifData');
})

function showVerifList(x) {
    // alert("yowaw");
    var action;
    var body;

    var id = $("#id").val();

    if (x === 'showVerifData') {
        action = 'showVerifData';
        body = '#verifTable';
    }

    $.ajax({
        url: '../functions/functionSelect.php',
        type: 'POST',
        data: {
            action: action,
            id: id
        },
        dataType: 'html',
        success: function(result) {
            // alert("yowawiwa");
            // alert(result);
            $(body).html(result);
        }
    });
}





