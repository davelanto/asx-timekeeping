$(document).ready(function (){
    $('#modalEmployee').on('hidden.bs.modal', function () {
        $(this).find("input").val('').end();
        $(this).find("select").prop('selectedIndex',0).end();
    });
    $('#modalEmployee').on('shown.bs.modal', function () {
        $('input[name="altID"]').focus();
    });

    $("table tbody tr").click(function (){
        $('table tr').removeClass('table-active');
        $(this).addClass('table-active');
        $('input[name="EmID"]').val(
            $(this).find('td:first-child').text()
        );
    });

    $('#btnAddEmployee').click(function (){
        $('#modalEmployee').find("input").val('').end();
        $('#modalEmployee').find("select").prop('selectedIndex',0).end();
    });

    $('#btnEditEmployee').click(function (){
        if($('table tbody tr.table-active').length === 1){
            $('input[name="altID"]').val(
                $('.table-active').find('td:nth-child(2)').text()
            );

            $('input[name="firstname"]').val(
                $('.table-active').find('td:nth-child(3)').text()
            );

            $('input[name="lastname"]').val(
                $('.table-active').find('td:nth-child(4)').text()
            );

            $('select[name="branch"] option').filter(function() {
                return $(this).text() === $('.table-active').
                find('td:nth-child(5)').text();
            }).prop('selected', true);

            $('select[name="department"] option').filter(function() {
                return $(this).text() === $('.table-active').
                find('td:nth-child(6)').text();
            }).prop('selected', true);

            $('select[name="designation"] option').filter(function() {
                return $(this).text() === $('.table-active').
                find('td:nth-child(7)').text();
            }).prop('selected', true);

            $('#modalEmployee').modal('toggle');
        }
    });

    $('#btnDeleteEmployee').click(function (){
        var id = $('.table-active').find('td:nth-child(1)').text();
        if($('table tbody tr.table-active').length === 1){
            $.post( "/delete-employee",  { id: id }, function( data ) {
                location.reload();
            });
        }
    });

});