function courseList(e) {
    if (e) {
        var courseData = JSON.parse(e);
        $('#course_id').val(courseData.id);
        var allCategory = JSON.parse($("#getCategories").val());
        var allCode = JSON.parse($("#getCode").val());
        var catHtml = '';
        var codeHtml = '';
        catHtml += '<select name="category_id" class="form-control" required="">';
        catHtml += '<option value="' + courseData.category.id + '">' + courseData.category.cate_name + '</option>';
        if (Array.isArray(allCategory)) {
            for (i = 0; i < allCategory.length; i++) {
                if (allCategory[i].id != courseData.category.id) {
                    catHtml += '<option value="' + allCategory[i].id + '">' + allCategory[i].cate_name + '</option>';
                }
            }
        }
        catHtml += '</select>';
        $('#category').html(catHtml);

        codeHtml += '<select name="code_id"class="form-control" required="">';
        codeHtml += '<option value="' + courseData.code.id + '">' + courseData.code.code + '</option>';
        if (Array.isArray(allCode)) {
            for (j = 0; j < allCode.length; j++) {
                if (allCode[j].id != courseData.code.id) {
                    codeHtml += '<option value="' + allCode[j].id + '">' + allCode[j].code + '</option>';
                }
            }
        }
        codeHtml += '</select>';
        $('#code').html(codeHtml);

        $('#editor1').val(courseData.course_description);
        $('#imgviwer').attr("src", "{{ asset('public/upload') }}/" + courseData.course_document_file);
        if (courseData.live_status != 'Published') {
            $('#live_status').html('<select name="live_status" class="form-control">' +
                    '<option value="Under-Maintenance">Under Maintenance</option>' +
                    '<option value="Published">Published</option>' +
                    '</select>');
        } else {
            $('#live_status').html('<select name="live_status" class="form-control">' +
                    '<option value="Published">Published</option>' +
                    '<option value="Under-Maintenance">Under Maintenance</option>' +
                    '</select>');
        }
        advanceProperties(courseData);
    } else {
        $('#code').html('<select name="code_id"class="form-control" required=""><option value="">--Select code--</option></select>');
        $('#category').html('<select name="category_id" class="form-control" required=""><option value="">--Select Category--</option></select>');
        $('#editor1').val('');
    }
//        location.reload();
}
$(document).ready(function () {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgviwer').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#selectThumnail").change(function () {
        readURL(this);
    });
});

$(document).ready(function (e) {
    $("#updateCourseProperties").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{url(Session::get('form_url').'/update')}}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                var newData = JSON.parse(data);
                if (newData.status != 1) {
                    toastr.error(newData.sms);
                } else {
                    toastr.success(newData.sms);
                    $('#tab-eg115-1').addClass('active');
                    $('a[href="#tab-eg115-1"]').addClass('active');
                    $('#tab-eg115-0').removeClass('active');
                    $('a[href="#tab-eg115-0"]').removeClass('active');
                    advanceProperties(newData.data);
                }
            },
            error: function (data) {
                alert('Error : Somthing Wrong...!');
            }
        });
    });
    function printErrorMsg(msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display', 'block');
        $.each(msg, function (key, value) {
            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
        });
    }
});

function advanceProperties(data) {
    var allLanguage = JSON.parse($("#getLanguage").val());
}