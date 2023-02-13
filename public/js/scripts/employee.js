$(document).ready(function (){
    $('#modalEmployee').on('hidden.bs.modal', function () {
        $(this).find("input").val('').end();
    });
    $('#modalEmployee').on('shown.bs.modal', function () {
        $('input[name="altID"]').focus();
    });

});