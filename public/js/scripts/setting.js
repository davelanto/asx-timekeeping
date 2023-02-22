$(document).ready(function (){

    $('.modal').on('hidden.bs.modal', function () {
        $(this).find("input").val('').end();
        $(this).find('input').removeClass('is-invalid');
    });

    $('#modalBranch').on('shown.bs.modal', function () {
        $('#BrName').focus();
    })

    $(document).on('click', '#btnEditBranch',function (){
        $('#BrID').val($(this).closest('tr').find('td:eq(0)').text());
        $('#BrName').val($(this).closest('tr').find('td:eq(1)').text());
        $('#modalBranch').modal('toggle');
        $('#modalBranchTitle').text('Edit Branch');
    });

    $('#btnNewBranch').click(function (){
        $('#modalBranchTitle').text('New Branch');
    });

    $('#modalDepartment').on('shown.bs.modal', function () {
        $('#DeName').focus();
    })

    $(document).on('click', '#btnEditDepartment',function (){
        $('#DeID').val($(this).closest('tr').find('td:eq(0)').text());
        $('#DeName').val($(this).closest('tr').find('td:eq(1)').text());
        $('#modalDepartment').modal('toggle');
        $('#modalDepartmentTitle').text('Edit Department');
    });

    $('#btnNewDepartment').click(function (){
        $('#modalDepartmentTitle').text('New Department');
    });

    $('#modalDesignation').on('shown.bs.modal', function () {
        $('#EdName').focus();
    })

    $(document).on('click', '#btnEditDesignation',function (){
        $('#EdID').val($(this).closest('tr').find('td:eq(0)').text());
        $('#EdName').val($(this).closest('tr').find('td:eq(1)').text());
        $('#modalDesignation').modal('toggle');
        $('#modalDesignationTitle').text('Edit Designation');
    });

    $('#btnNewDesignation').click(function (){
        $('#modalDesignationTitle').text('New Designation');
    });

});
