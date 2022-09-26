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

        // Validate class removed and set to default
        table.find("tr:last-child select").removeClass('is-valid');
        table.find("tr:last-child select").removeClass('is-invalid');
        table.find("tr:last-child input").removeClass('is-valid');
        table.find("tr:last-child input").removeClass('is-invalid');

        // All array field will have unique #ID
        $('#' + $(this).data('table') + ' tr').each(function(index, trEl) {
            $(trEl).find('select').each(function(selectIndex, selectEl) {
                $(selectEl).attr('id', $(selectEl).attr('name').replace('[]', '') + '-' + index);
            });

            $(trEl).find('input').each(function(inputIndex, inputEl) {
                $(inputEl).attr('id', $(inputEl).attr('name').replace('[]', '') + '-' + index);
            });
        });
    });

    // Remove table tr
    $(document).on('click', '.remove-tr', function (e) {
        e.preventDefault();

        $(this).closest('tr').remove();
    });

    $("#page-form").validate({
        // errorElement: "span class='invalid-feedback fw-bold' role='alert'",
        errorPlacement: function (error, element) {
            // errorInsert = "#" + element.attr("name") + "Error";
            // error.appendTo(errorInsert);
        },
        highlight: function (element) {
             $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        submitHandler: function (form) {
            $(form).ajaxSubmit();
            // // var form = $(this).closest('form');
            // var formUrl = form.prop('action');
            // var enctype = (typeof form.attr('enctype') != 'undefined');
            // var formData = enctype ? new FormData($(form).get(0)) : form.serialize();

            // var ajaxArg = {
            //     type: 'POST',
            //     url: formUrl,
            //     data: formData,
            //     dataType: 'JSON',
            //     success: function (data) {
            //         if (data.status === true) {

            //         } else {

            //         }
            //     },
            //     error: function (jqXHR, textStatus, errorThrown) {

            //     }
            // };

            // if (enctype) {
            //     ajaxArg.processData = false;
            //     ajaxArg.contentType = false;
            // }

            // $(form).ajaxSubmit(ajaxArg);
            // // $.ajax(ajaxArg);

            return false;
        },
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            email: {
                required: true,
                email: true,
                maxlength: 255
            },
            division_id: {
                required: true,
                digits: true
            },
            district_id: {
                required: true,
                digits: true
            },
            upazila_id: {
                required: true,
                digits: true
            },
            address_details: {
                maxlength: 255
            },
            "exam[]": {
                required: true,
                digits: true
            },
            "institute[]": {
                required: true,
                digits: true
            },
            "result[]": {
                required: true,
                number: true
            },
            training: {
                required: true,
                digits: true
            },
            "training_name": {
                required: {
                    depends: function (element) {
                        return $("input[name='training']").val() == 1;
                    }
                }
            },
            photo: {
                accept: "image/*"
            },
            cv: {
                accept: "application/pdf,application/doc,application/docx"
            }
        }
    });

    /*
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
    */
});

function previewImage (inputImgFile) {
    var imgFile = $(inputImgFile).get(0).files[0];

    if (imgFile) {
        var reader = new FileReader();

        reader.onload = function () {
            $(inputImgFile).closest('.row').find('.img-thumbnail').attr('src', reader.result);
        }

        reader.readAsDataURL(imgFile);
    }
}
