<div class="app-wrapper-footer">
    <div class="app-footer">

    </div>
</div>



<script src="{{ asset('public/assets/js/main.js')}}"></script>
<script>
CKEDITOR.replace('editor', {
    skin: 'moono',
    enterMode: CKEDITOR.ENTER_BR,
    shiftEnterMode: CKEDITOR.ENTER_P,
    toolbar: [{name: 'basicstyles', groups: ['basicstyles'], items: ['Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor']},
        {name: 'styles', items: ['Format', 'Font', 'FontSize']},
        {name: 'scripts', items: ['Subscript', 'Superscript']},
        {name: 'justify', groups: ['blocks', 'align'], items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']},
        {name: 'paragraph', groups: ['list', 'indent'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent']},
        {name: 'links', items: ['Link', 'Unlink']},
        {name: 'insert', items: ['Image']},
        {name: 'spell', items: ['jQuerySpellChecker']},
        {name: 'table', items: ['Table']}
    ],
});

</script>

<script>
    CKEDITOR.replace('editor1', {
        skin: 'moono',
        enterMode: CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        toolbar: [{name: 'basicstyles', groups: ['basicstyles'], items: ['Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor']},
            {name: 'styles', items: ['Format', 'Font', 'FontSize']},
            {name: 'scripts', items: ['Subscript', 'Superscript']},
            {name: 'justify', groups: ['blocks', 'align'], items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']},
            {name: 'paragraph', groups: ['list', 'indent'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent']},
            {name: 'links', items: ['Link', 'Unlink']},
            {name: 'insert', items: ['Image']},
            {name: 'spell', items: ['jQuerySpellChecker']},
            {name: 'table', items: ['Table']}
        ],
    });

</script>

<script>
    $(document).ready(function () {
        $(".add-row").click(function () {
            var name = $("#name").val();
            var email = $("#email").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td></tr>";
            $("table tbody").append(markup);
        });

        // Find and remove selected table rows
        $(".delete-row").click(function () {
            $("table tbody").find('input[name="record"]').each(function () {
                if ($(this).is(":checked")) {
                    $(this).parents("tr").remove();
                }
            });
        });
    });
</script>
</body>
</html>
