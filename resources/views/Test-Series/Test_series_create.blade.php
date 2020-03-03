<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-default pull-left"><h3>Test Series List</h3></button>
                    <button type="button" class="btn btn-primary pull-right" onclick="addTestSeries()" >Add Test Series</button>
                </div>
            </div>
            <hr>
            <div class="card-body d-none" id="testSeriesFormLayout">
                <!-- <div class="card-header" style="background: none;margin-top:-19px;">
                    <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Header with Tabs
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm nav btn-group">
                            <a data-toggle="tab" href="#tab-eg1-0" class="btn-shadow btn btn-primary show active">Test Series Setting</a>
                            <a data-toggle="tab" href="#tab-eg1-1" class="btn-shadow btn btn-primary show">Set Question</a>
                        </div>
                    </div>
                </div> -->

                <div class="tab-content" style="padding:2em;">
                    <div class="tab-pane show active" id="tab-eg1-0" role="tabpanel">
                        <form action="{{url(Session::get('form_url').'/add')}}" id="testSeriesForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="id" type="hidden" id="testSeries_id" value="0" required/>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Title &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                        <input name="title" id="title_show_details"  placeholder="Test Series Title" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Category&nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                        <span id="editcategory">
                                            <select class="form-control" name="category_id" id="category_show" required="">
                                                <option value="">--Select Category--</option>
                                                @if(@$categoryData)
                                                @foreach($categoryData AS $key=>$value)
                                                <option value="{{$value->id}}">{{$value->title}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Time Limit &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                        <input name="time_limit" id="time_limit_show" placeholder="60" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Maximum Tries &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                        <input name="max_tries" id="max_tries_show" placeholder="1" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="" class="">No of Question &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                        <input name="no_of_question" id="no_of_question_show" placeholder="60" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="">Instruction&nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                    <textarea name="instruction" id="instruction" cols="20" rows="10"></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="">Description &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                    <textarea name="description" id="description" cols="20" rows="10"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Total Marks &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                        <input name="total_marks" id="total_marks_show" placeholder="100" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Passing Marks&nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                        <input name="passing_marks" id="passing_marks_show" placeholder="30" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="exampleSelect" class="">Select status&nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                        <span id="status">
                                            <select name="status" id="codeStatus" class="form-control" required>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>                      
                                            </select>
                                        </span>
                                    </div>
                                </div>
                        
                           
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Course Name&nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                        <span id="course">
                                            <select class="form-control" name="course_id" id="course_id" onchange="fetch_question_details(this.value)" >
                                                <option value="">--Select Course--</option>
                                                @if(@$courseList)
                                                @foreach($courseList AS $key=>$value)
                                                <option value="{{$value->id}}">{{$value->course_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="mb-0 table table-sm">
                                        <thead style="width: 100%;"> 
                                            <tr>
                                                <th id="message_show">Select Questions</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody id="table_element_show" > 
                                    
                                        </tbody>
                                        
                                        <tbody id="table_questin_edit" > 
                                         
                                        </tbody>
                                        <!-- <tbody id="table_questin_edit_all" > 
                                    
                                        </tbody> -->
                                    </table>
                                </div>
                                <br>
                              

                            </div>   
                            <hr class="new2">
                            <div  style="float: right;">
                                <a onclick="closeForm()" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-danger" data-style="slide-up">
                                    <span class="ladda-label">Cancel</span><span class="ladda-spinner"></span>
                                </a>

                                <button type="submit" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                                    <span class="ladda-label">Save Changes</span><span class="ladda-spinner"></span>
                                </button> 
                            </div>                                   
                        </form>
                    </div>


                    <div class="tab-pane show" id="tab-eg1-1" role="tabpanel">

                    </div>
                </div>
            </div><!--end of card-->
            <div class="card-body">
                <table class="mb-0 table table-sm">
                    <thead>
                        <tr>
                            <th>SR. NO.</th>
                            <th>TITLE</th>
                            <th>CATEGORY</th>
                            <th>TIME LIMIT</th>
                            <th>MAX TRIES</th>
                            <th>NO OF QUESTION</th>
                            <th>TOTAL MARKS</th>
                            <th>PASSING MARKS</th>
                            <th>INSTRUCTION</th>
                            <th>DESCRIPTION</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(@$seriesData)
                        @foreach($seriesData as $key=>$value)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$value->title}}</td>
                            <td>{{$value->category->title}}</td>
                            <td>{{$value->time_limit}}</td>
                            <td>{{$value->max_tries}}</td>
                            <td>{{$value->no_of_question}}</td>
                            <td>{{$value->total_marks}}</td>
                            <td>{{$value->passing_marks}}</td>
                            <td>{{$value->instruction}}</td>
                            <td>{{$value->description}}</td>
                            <td>{{$value->status}}</td>
                            <td>
                                <a href="#" id="{{$value['id']}}" onclick="show_details(this.id, '<?php echo $value['type']; ?>')"> <i class="fas fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                                <a href="#" id="{{$value['id']}}" onclick="edit_details(this.id, '<?php echo $value['type']; ?>')"> <i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;

                                <!-- <a onclick="editTestSeries('{{json_encode($value)}}')"><i class="fas fa-edit"></i></a> -->
                                <a href="{{url(Session::get('form_url').'/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete this test Series ?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5">Data not found in our database</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <input type="hidden" value="{{json_encode($categoryData)}}" id="getcategoryList">
        </div><!--end of main inner-->
    </div>
    <script>
        function editTestSeries(data){
        if (data){
        $('#testSeriesFormLayout').removeClass('d-none');
        var newData = JSON.parse(data);
        $('#test_series_id').val(newData.id);
        $('#title').val(newData.title);
        $('#no_of_question').val(newData.no_of_question);
        $('#max_tries').val(newData.max_tries);
        $('#time_limit').val(newData.time_limit);
        $('#total_marks').val(newData.total_marks);
        $('#passing_marks').val(newData.passing_marks);
        var categoryList = JSON.parse($("#getcategoryList").val());
        var categoryHtml = '';
        categoryHtml += '<select name="category_id" class="form-control" required="">';
        categoryHtml += '<option value="' + newData.category.id + '">' + newData.category.title + '</option>';
        if (Array.isArray(categoryList)) {
        for (i = 0; i < categoryList.length; i++) {
        if (categoryList[i].id != newData.category_id) {
        categoryHtml += '<option value="' + categoryList[i].id + '">' + categoryList[i].title + '</option>';
        }
        }
        }
        categoryHtml += '</select>';
        $('#editcategory').html(categoryHtml);
        var statusHtml = '';
        statusHtml += '<select name="status" id="exampleSelect" class="form-control" required>';
        if (newData.status == 'Active') {
        statusHtml += '<option value="Active">Active</option>';
        statusHtml += '<option value="Inactive">Inactive</option>';
        } else{
        statusHtml += '<option value="Inactive">Inactive</option>';
        statusHtml += '<option value="Active">Active</option>';
        }
        statusHtml += '</select>';
        $('#status').html(statusHtml);
        CKEDITOR.instances['editor'].setData(newData.instruction);
        CKEDITOR.instances['editor1'].setData(newData.description);
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

        } else{
        toastr.error('Someting Wrong...!');
        }
        }
    </script>

    <script>
        function addTestSeries() {
        document.getElementById("testSeriesForm").reset();
        CKEDITOR.instances['instruction'].setData('');
        CKEDITOR.instances['description'].setData('');
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0;
        $('#testSeriesFormLayout').removeClass('d-none');
        }
        function closeForm() {
        $('#testSeriesFormLayout').addClass('d-none');
        }
    </script>

    <!-- ============================================= 5th ================================== -->
    <script>
        function fetch_question_details(id) {
            $('#umo_for_subscription').empty();
        // alert(id);
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
            url: "{{url('/'.Auth::user()->name.'/company/instructor/learning-object/manage-mcq/fetch_mcq_question')}}"+"/"+id ,
                method: "GET",
                contentType: 'application/json',
                dataType: "json",
                success: function (data) {
                
                console.log(data);
                console.log(data.mcq_questions);
                var markup_show = ``;
                if(data.mcq_questions)
                        {
                            for(i=0; i<data.mcq_questions.length; i++)
                            {
                                markup_show += `<tr><td><input type='checkbox' value=`+data.mcq_questions[i].id+` name='test_series_question[]'></td><td>`+data.mcq_questions[i].question+`</td>`;
                                markup_show += `</tr>`;
                            }
                        
                            $("#table_element_show").append(markup_show);
                        }
                }
        });
    }
    </script>






<!-- ================================================== edit Test series =================================== -->
<script>
    function edit_details(id, type_tmp) {
        // alert(id);
        $("#message_show").html('Select To Remove');
      
        
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
    
        url: "{{url(Session::get('form_url').'/edit_show')}}"+"/"+id ,
            method: "GET",
            contentType: 'application/json',
            dataType: "json",
            success: function (data) {
                console.log(data);
              
                    // $("#myModal").modal("show");

                    $("#testSeries_id").val(data.TestSeries.id);
                    $("#title_show_details").val(data.TestSeries.title);
                    $("#category_show").html('<option value="'+data.TestSeries.category_id+'">'+data.TestSeries.title_for_categories+'</option>');
                    $("#time_limit_show").val(data.TestSeries.time_limit);
                    $("#max_tries_show").val(data.TestSeries.max_tries);
                    $("#no_of_question_show").val(data.TestSeries.no_of_question);
                    CKEDITOR.instances['instruction'].setData(data.TestSeries.instruction);
                    CKEDITOR.instances['description'].setData(data.TestSeries.description);
                    $("#total_marks_show").val(data.TestSeries.total_marks);
                    $("#passing_marks_show").val(data.TestSeries.passing_marks);
                    $("#codeStatus").val(data.TestSeries.status);
        
                    var markup_shown = ``;
                    if(data.test_series_questions)
                    {
                        for(i=0;i<data.test_series_questions.length; i++)
                        {
                           
                            // markup_shown += `<tr><td><input type='checkbox'  value=`+data.test_series_questions[i].id+` name='quizz_question[]'></td><td>`+data.test_series_questions[i].question+`</td><td>`+data.test_series_questions[i].id+`</td></tr>`;
                            markup_shown += `<tr><td><input type='checkbox'  value=`+data.test_series_questions[i].id+` name='quizz_question_remove[]'></td><td>`+data.test_series_questions[i].question+`</td></tr>`;
                        }
                        $("#table_questin_edit").append(markup_shown);
                    }
                    // var markup_shown = ``;
                    // if(data.test_series_questions)
                    // {
                    //     for(i=0;i<data.mcq_questions.length; i++)
                    //     {
                            
                    //         markup_shown += `<tr><td><input type='checkbox'  value=`+data.test_series_questions[i].id+` name='quizz_question[]'></td><td>`+data.test_series_questions[i].question+`</td><td>`+data.test_series_questions[i].id+`</td></tr>`;
                    //     }
                    //     $("#table_questin_edit_all").append(markup_shown);
                    // }

                   
             }
    });

    document.getElementById("testSeriesForm").reset();
        CKEDITOR.instances['instruction'].setData('');
        CKEDITOR.instances['description'].setData('');
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0;
        $('#testSeriesFormLayout').removeClass('d-none');
  
    
}


</script>


<!-- ckeditor -->
<script>
    CKEDITOR.replace('instruction', {
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
<!-- ckeditor -->
<script>
    CKEDITOR.replace('description', {
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
















































<!-- show modal -->
<div class="modal fade bd-example-modal-lg" id="my_show_Modal" data-backdrop="false" role="dialog" style="top:10%;">
    <div class="modal-dialog modal-lg" style=" max-width: 1284px;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <!--<h4 class="modal-title">Question</h4>-->
                <div class="modal-title">
                    <div class="app-page-title" style="padding: 11px; margin: 4px 5px 23px; position: relative;">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div>  <span></span>  View Test Series
                                
                                    <div class="page-title-subheading">
                                    </div>
                                </div>
                            </div><!--end of page-title-heading -->
                        </div><!--end of page-title-wrapper-->
                    </div><!--end of page title-->
                </div>
                <button type="button" class="close"  data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="pull-right" style="padding: 20px;">
                   
                </div>
                <div class="card-body">
                    
                    <table class="table table-borderless">
                      
                        <tbody>
                          <tr>
                            <td><p><strong>TITLE : </strong></p></td>
                            <td><p  id="test_series_title_show" style="float: left;"></p></td>
                            <td><p><strong>CATEGORY : </strong></p></td>
                            <td><p id="title_showW"></p></td>
                            <td>  <p><strong>TIME LIMIT : </strong></p></td>
                            <td> <p id="time_limit_view"></p></td>
                          </tr>
                          <tr>
                            <td><p><strong>MAX TRIES : </strong></p></td>
                            <td> <p id="max_tries_view"></p></td>
                            <td><p><strong>NO OF QUESTION : </strong></p></td>
                            <td> <p id="no_of_question_view"></p></td>
                            
                            <td><p ><strong>TOTAL MARKS  : </strong></p></td>
                            <td> <p id="total_marks_view"></p></td>
                          </tr>
                          <tr>
                            <td><p><strong>PASSING MARKS : </strong></p></td>
                            <td> <p id="passing_marks_view"></p></td>
                            <td><p ><strong>STATUS : </strong></p></td>
                            <td> <p id="status_show"></p></td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row">
                          <div class="col-2"><p><strong>INSTRUCTION : </strong></p></div>
                          <div class="col-8"><p id="instructio_shown"></p></div>

                      </div>
                      <div class="row">
                          <div class="col-2"><p><strong>DESCRIPTION : </strong></p></div>
                          <div class="col-8"><p id="description_show"></p></div>

                      </div>
                      

                    <div class="col-md-12">
                        <table class="mb-0 table table-sm">
                            <thead style="width: 100%;"> 
                                <tr>
                                    <th>Questions</th>
                                </tr>
                            </thead>
                            <tbody id="table_questin_show" > 
                        
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="col-md-12"> 
                    </div> -->
                    
                </div>
            </div>
           
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div> -->
          
        </div>

    </div>
</div>
<!-- end show modal -->


<!-- show script  -->
<script>
    function show_details(id) {
    // alert(id);
    // $("#message_show").html('Select Questions');
        
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
    
        url: "{{url(Session::get('form_url').'/fetch_details')}}"+"/"+id ,
            method: "GET",
            contentType: 'application/json',
            dataType: "json",
            success: function (data) {
                console.log(data);
            // console.log(data.quizz);
            // console.log(data.quizz_questions.length);
               

            $("#my_show_Modal").modal("show");
            $("#test_series_title_show").html(data.TestSeries.test_series_title);
            $("#title_showW").html(data.TestSeries.title);
            $("#time_limit_view").html(data.TestSeries.time_limit);
            $("#max_tries_view").html(data.TestSeries.max_tries);
            $("#no_of_question_view").html(data.TestSeries.no_of_question);
            $("#total_marks_view").html(data.TestSeries.total_marks);
            $("#passing_marks_view").html(data.TestSeries.passing_marks);
            $("#status_show").html(data.TestSeries.status);
            $("#instructio_shown").html(data.TestSeries.instruction);
            $("#description_show").html(data.TestSeries.description);
     

            var markup_shown = ``;
            if(data.test_series_questions)
                    {
                        for(i=0;i<data.test_series_questions.length; i++)
                        {
                            markup_shown += `<tr><td>`+data.test_series_questions[i].question+`</td></tr>`;
                        }
                        $("#table_questin_show").html(markup_shown);
                    }   
                    
             }
    });
}


</script>
