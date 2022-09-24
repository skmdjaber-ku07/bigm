// Laravel CSRF token for ajax request
$.ajaxSetup({
    headers : {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready( function () {
    $('#datatable').DataTable({
        processing : true,
        serverSide : true,
        ajax : {
            'url' : $('#datatable').data('url'),
            'type' : 'POST',
        },
        columns : [
            {data : 'name'},
            {data : 'email'},
            {data : 'division_name'},
            {data : 'district_name'},
            {data : 'upazila_name'},
            {data : 'insert_date'},
            {data : 'action'},
        ],
    });

    $("select[name='exam[]']").on('change', function (e) {
        var institute = $(this).closest('tr').find("select[name='institute[]']");
        var board = $("select[name='board']").html();
        var university = $("select[name='university']").html();

        if ($(this).val() == '') {
            institute.html("<option value=''>--</option>");
            institute.attr('disabled', true);
        } else {
            institute.html($(this).find('option:selected').attr('level') == 'university' ? university : board);
            institute.attr('disabled', false);
        }
    });

    $("input[name='training']").on('change', function (e) {
        $(this).val() == 1 ?
        $('#training-container').slideDown() :
        $('#training-container').slideUp();
    });
});
