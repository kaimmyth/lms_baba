<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
    ul{
        list-style: none;
        display: inline-block;
    }

    #filter-options li{
        float: left;
        margin-left: 20px;
    }

    #product-list{
        display: block;
    }

</style>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Student Course Catalog
                        <div class="page-title-subheading">Create a new catalog by assigning a number of pre-existing course and user to view it.
                        </div>
                    </div>
                </div><!--end of page-title-heading -->
            </div><!--end of page-title-wrapper-->
        </div><!--end of page title-->

        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="card-hover-shadow-2x mb-3 card" style="border-top: 2px solid #3986c9;">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                            <i class="header-icon lnr-database icon-gradient bg-malibu-beach"> </i>Course Filter
                        </div>
                    </div>
                    <div class="scroll-area-lg">
                        <div class="scrollbar-container ps ps--active-y">
                            <div class="p-2">
                                <ul id="filter-options" class="todo-list-wrapper list-group list-group-flush">                                             
                                    <li class="list-group-item">
                                        <div class="todo-indicator bg-warning"></div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2">

                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Catalog</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            @if(@$catalog)
                                            @foreach($catalog AS $key => $value)
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2"  style="margin-left: -2em;">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" class="filter_course" name="filter_course" id="catlog{{$key}}" value="catalog:{{$value->id}}" data-filter_id="one"> 
                                                    </div>
                                                </div>
                                                <div class="widget-heading" for="catlog{{$key}}">{{$value->catalogue_name}}</div>                                                          
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </li>
                                </ul>

                                <ul class="todo-list-wrapper list-group list-group-flush">                                             
                                    <li class="list-group-item">
                                        <div class="todo-indicator bg-warning"></div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2">

                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Category</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            @if(@$category)
                                            @foreach($category AS $key => $value)
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2"  style="margin-left: -2em;">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" class="filter_course" name="filter_course"  id="category{{$key}}" value="category:{{$value->id}}" data-filter_id="one"> 
                                                    </div>
                                                </div>
                                                <div class="widget-heading" for="category{{$key}}">{{$value->cate_name}}</div>                                                          
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </li>
                                </ul>

                                <ul class="todo-list-wrapper list-group list-group-flush">                                             
                                    <li class="list-group-item">
                                        <div class="todo-indicator bg-warning"></div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2">

                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Type</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2"  style="margin-left: -2em;">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" class="filter_course"  name="filter_course"  id="type1" value="type:e-learning" data-filter_id="one"> 
                                                    </div>
                                                </div>
                                                <div class="widget-heading" for="type1">E-Learning</div>                                                          
                                            </div>
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-2"  style="margin-left: -2em;">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" class="filter_course" name="filter_course"  id="type2" value="type:classroom" data-filter_id="one"> 
                                                    </div>
                                                </div>
                                                <div class="widget-heading" for="type2">Class Room</div>                                                          
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end of col md 4-->

            <div class="col-md-8" style="margin-left: -2em;">
                <div id="filterData"></div>
                <div class="row" id="fixedData"  style="margin-left: 2em;">
                    @if(@$course)
                    @foreach($course AS $key => $value)
                    <div class="col-md-4">
                        <div class="mb-3 profile-responsive card">
                            <img class="img img-thumbnail" src="{{asset('public/upload/'.$value->course_document_file)}}">
                            <div class="dropdown-menu-header">
                                <div class="dropdown-menu-header-inner bg-dark">
                                    <!--<div class="menu-header-image opacity-2" style="background-image: url('assets/images/dropdown-header/abstract2.jpg');"></div>-->
                                    <div class="menu-header-content btn-pane-right">
                                        <div>
                                            <h5 class="menu-header-title">{{$value->course_name}}</h5>
                                            <h6 class="menu-header-subtitle">English</h6>
                                        </div>
                                        <div class="menu-header-btn-pane">
                                            <a href="{{url('course_detail')}}"><button class="btn btn-success">ENROLL</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div><!--end of col md 8-->
        </div><!--end of row-->
    </div><!--end of main inner-->
</div>
<script>
$(document).ready(function () {
    $(".filter_course").change(function () {
        var catalog = [];
        var category = [];
        var type = [];
        $.each($("input[name='filter_course']:checked"), function () {
            var str = $(this).val();
            var value = str.split(':');
            if (value[0] == 'catalog') {
                catalog.push(value[1]);
            }
            if (value[0] == 'category') {
                category.push(value[1]);
            }
            if (value[0] == 'type') {
                type.push(value[1]);
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url(Session::get('form_url').'/filter')}}",
            type: 'POST',
            data: {
                catalog: JSON.stringify(catalog),
                category: JSON.stringify(category),
                type: JSON.stringify(type)
            },
            success: function (data) {
                var newData=JSON.parse(data);
                if (Array.isArray(newData) && newData.length) {
                    var viewhtml='<div class="row"   style="margin-left: 2em;">';
                    for (var i = 0; i < newData.length; i++) {
                        var imgUrl="{{asset('public/upload')}}/"+newData[i].course_document_file;
                        var detailUrl='{{url("course_detail")}}';
                         viewhtml +='<div class="col-md-4">'+
                                        '<div class="mb-3 profile-responsive card">'+
                                            '<img class="img img-thumbnail" src="'+imgUrl+'">'+
                                            '<div class="dropdown-menu-header">'+
                                                '<div class="dropdown-menu-header-inner bg-dark">'+
                                                    '<div class="menu-header-content btn-pane-right">'+
                                                        '<div>'+
                                                            '<h5 class="menu-header-title">'+newData[i].course_name+'</h5>'+
                                                            '<h6 class="menu-header-subtitle">English</h6>'+
                                                        '</div>'+
                                                        '<div class="menu-header-btn-pane">'+
                                                            '<a href="'+detailUrl+'"><button class="btn btn-success">ENROLL</button></a>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>';
                    }
                    viewhtml+='</div>';
                    $('#filterData').html(viewhtml);
                    $("#fixedData").hide();
                }else{
                    $('#filterData').html('');
                     $("#fixedData").show();
                }
            },
            error: function (data) {
                alert('error: ' + data);
            }
        });
    });
});
</script>