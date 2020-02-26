@guest
<script>
<?php Session::flash('warning', 'Your Session had been Expired..!'); ?>
    window.location = "{{ url('/') }}";
</script>
@if (Route::has('register'))
<script>
<?php Session::flash('warning', 'Your Session had been Expired..!'); ?>
    window.location = "{{url('/')}}";
</script>
@endif
@else
@if(Session::get('id'))
<!doctype html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="LMS Baba brings you end-to-end solutions in training delivery, employee engagement, workflow automation and impact measurement.">
        <meta name="keywords" content="learning management systems software, learning management systems software India, best lms software, lms software, lms software india, lms development company, LMS software, online LMS software india, cloud LMS software india, best LMS software india, best LMS software">

        <link href="{{asset('public/assets/plugins/sweetalert2/sweetalert2.css') }}" rel="stylesheet" type="text/css">

        <link href="{{asset('public/assets/plugins/modal-effect/css/component.css')}}" rel="stylesheet">
        <!--Form Wizard-->
        <link rel="stylesheet" type="text/css" href="{{asset('public/assets/plugins/jquery-steps/jquery.steps.css')}}">
        <!--calendar css-->
        <link href="{{asset('public/assets/plugins/fullcalendar/dist/fullcalendar.css')}}" rel="stylesheet">
        <link href="{{asset('public/assets/plugins/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css">

        <!-- Date And TimePicker -->
        <link href="{{ asset('public/assets/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
        <link href="{{ asset('public/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

        <!-- DataTables -->
        <link href="{{ asset('public/assets/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/plugins/datatables/fixedHeader.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/plugins/datatables/scroller.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Alert -->



        <link href="{{ asset('public/assets/css/main-style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/internal.css') }}" rel="stylesheet" type="text/css" />

        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://demo.dashboardpack.com/architectui-html-pro/main.87c0748b313a1dda75f5.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
        <!-- Alert -->
<!--        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
        <script src="{{ asset('public/assets/js/calendar.js') }}"></script>
        <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        -->
        
         <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
        <script src="{{ asset('public/assets/js/calendar.js') }}"></script>
        <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    </head>

    <style>
        .vertical-nav-menu li a {
            display: block;
            line-height: 2.4rem;
            height: 2.4rem;
            padding: 0 1.5rem 0 45px;
            position: relative;
            border-radius: .25rem;
            color: #ffffff;
            white-space: nowrap;
            transition: all .2s;
            margin: .1rem 0;
        }
        .app-sidebar__heading {
            text-transform: uppercase;
            font-size: .8rem;
            margin: .75rem 0;
            font-weight: bold;
            color: #CDDC39;
            white-space: nowrap;
            position: relative;
        }
        .vertical-nav-menu ul>li>a {
            color: #ffffff;
            height: 2rem;
            line-height: 2rem;
            padding: 0 1.5rem 0;
        }
        .vertical-nav-menu li a:hover {
            background: #e0f3ff47;
            text-decoration: none;
        }
        .app-sidebar.sidebar-shadow {
            box-shadow: 7px 0 60px rgba(0, 0, 0, 0.54);
        }
        .fixed-header .app-header {
            position: fixed;
            width: 100%;
            top: 0;
            box-shadow: 7px 0 60px rgba(0, 0, 0, 0.54);
        }
        .app-main .app-main__inner {
            padding: 30px 30px 0;
            flex: 1;
            background: #e7eaff;
        }
        label {
            display: inline-block;
            margin-bottom: .5rem;
            font-weight: 600;
            font-size: 14px;
        }
        .app-theme-white .app-footer .app-footer__inner,
        .app-theme-white .app-header {
            background-image: linear-gradient(120deg, #d9dfff 0%, #a5b3ff 100%) !important;
        }
        .app-theme-white .app-sidebar {
            background-image: linear-gradient(135deg, #667eea 30%, #0490a2 100%) !important;
        }
        .app-header__logo .logo-src {
            height: 23px;
            width: 97px;
            background: url();

        }
        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem;
            border-top: 2px solid #5377d1;
            background-image: linear-gradient(#ffffff, #edefff);
            box-shadow: 1px 1px 10px #00000054;
        }
        hr.new2 {
            border-top: 1px dashed #5377d1;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #bdbdbd;
        }
        .table th, .table td {
            padding: .55rem;
            vertical-align: top;
            border-top: 1px solid #e9ecef;
        }
        .table-bordered thead th, .table-bordered thead td {
            border-bottom-width: 1px;
            background: #e6eaff;
        }
        .table thead th {
            vertical-align: bottom;
            border: 1px solid #bbbbbb;
        }
        .widget-chart .widget-numbers {
            font-weight: bold;
            font-size: 17px;
            display: block;
            line-height: 1;
            margin: 1rem auto;
        }


    </style>

</head>
<body>
    @include('layouts.header')
    @include('layouts.sidebar')

    @yield('content')

    @include('layouts.footer')

    @include('layouts.alert')
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
@endif
@endguest