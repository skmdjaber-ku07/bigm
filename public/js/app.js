// Laravel CSRF token for ajax request
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready( function () {
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            'url': $('#datatable').data('url'),
            'type': 'POST',
        },
        columns: [
            {data: 'name'},
            {data: 'email'},
            {data: 'division_name'},
            {data: 'district_name'},
            {data: 'upazila_name'},
            {data: 'insert_date'},
            {data: 'action'},
        ],
    });

    $('select[data-dropdown-child]').on('change', function (e) {
        var child = "select[name='" + $(this).data('dropdown-child') + "']";
        var optionIndex = $(child).prop('selectedIndex');

        $(child + " option").addClass('none');
        $(child + " option[data-parent='" + $(this).val() + "']").removeClass('none');
        $(child + " option[value='']").removeClass('none');
        $(child).val("").trigger('change');
    });

    // Dropdown exam list change event for proper options list (Board / University)
    $(document).on('change', "select[name='exam[]']", function (e) {
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

    // On change event of training table toggle show/hide
    $("input[name='training']").on('change', function (e) {
        $(this).val() == 1 ?
        $('#training-container').slideDown() :
        $('#training-container').slideUp();
    });

    // Add new row on exam and training tables
    $(".add-more").on('click', function (e) {
        e.preventDefault();

        var table = $('#' + $(this).data('table'));

        table.append(table.find('tr:last-child').clone()).html();
        table.find('tr:last-child button').attr('disabled', false);
        table.find('tr:last-child td:last-child button').addClass('remove-tr');
        table.find("tr:last-child select").val("").trigger('change');
        table.find("tr:last-child input").val("");
    });

    // Remove table tr
    $(document).on('click', '.remove-tr', function (e) {
        e.preventDefault();

        $(this).closest('tr').remove();
    });

    $("#page-form *[type='submit']").on('click', function (e) {
        e.preventDefault();

        var form = $(this).closest('form');
        var formUrl = form.prop('action');
        var enctype = (typeof form.attr('enctype') != 'undefined');
        var formData = enctype ? new FormData($('#page-form').get(0)) : form.serialize();

        var ajaxArg = {
            type: 'POST',
            url: formUrl,
            data: formData,
            dataType: 'JSON',
            success: function (data) {
                if (data.status === true) {

                } else {

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        };

        if (enctype) {
            ajaxArg.processData = false;
            ajaxArg.contentType = false;
        }

        $.ajax(ajaxArg);
    });
});
