<div class="app-main__outer">
    <div class="app-main__inner">
        
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <div>Quizz
                        
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <button type="button" class="btn btn-primary pull-right" onclick="addQuizz()" >Add Quizz</button>
                    </div>
                </div>   
             </div>
        </div><!--end of page title-->



    
    <div class="main-card mb-3 card d-none" id="courseForm">
        <div class="card-body">
                <form action="{{url(Session::get('form_url').'/add')}}" method="POST" id="coursesform" enctype="multipart/form-data">
                    @csrf
                    <input name="id" type="hidden" id="quizz_id" value="0" required/>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="" class="">Title &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                <input name="title" id="title"  placeholder="Quizz Title" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <label for="" class="">Course Name&nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                <span id="course">
                                    <select class="form-control" name="course_id" id="course_id" required="" onchange="fetch_question_details(this.value)" >
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
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <label for="" class="">Time Limit &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                <input name="time_limit" id="time_limit" placeholder="60" type="number" class="form-control">
                            </div>
                        </div>
    
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <label for="" class="">Maximim Tries &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                <input name="max_tries" id="max_tries" placeholder="1" type="number" class="form-control">
                            </div>
                        </div>
    
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <label for="" class="">No of Question &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                <input name="no_of_question" id="no_of_question" placeholder="60" type="number" class="form-control">
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
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="exampleSelect" class="">Select status</label>
                                <span id="status">
                                <select name="status" id="codeStatus" class="form-control" required>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>                      
                                </select>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                <tbody id="table_questin_edit_all" > 
                            
                                </tbody>
                            </table>
                        </div>
                        <br>
    
                    </div>   
                    <hr class="new2">
                    <div  style="float: right;">
                        <button type="button" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary" onclick="closeForm()">Close</button>
    
                        <button type="submit" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                            <span class="ladda-label">Save Changes</span><span class="ladda-spinner"></span>
                        </button> 
                    </div>                                   
                </form>
            </div>
    </div>
    <div class="card-body">
        <table class="mb-0 table table-sm">
            <thead>
                <tr>
                    <th>SR. NO.</th>
                    <th>TITLE</th>
                    <th>COURSE</th>
                    <th>TIME LIMIT</th>
                    <th>MAX TRIES</th>
                    <th>NO OF QUESTION</th>
                    <th>INSTRUCTION</th>
                    <th>DESCRIPTION</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @if(@$quizzList)
                @foreach($quizzList as $key=>$value)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$value->title}}</td>
                    <td>{{$value->course->course_name}}</td>
                    <td>{{$value->time_limit}}</td>
                    <td>{{$value->max_tries}}</td>
                    <td>{{$value->no_of_question}}</td>
                    <td>{{$value->instruction}}</td>
                    <td>{{$value->description}}</td>
                    <td>{{$value->status}}</td>
                    <td>
<!--                            <i class="fa fa-download" aria-hidden="true"></i>
                        <a href="http://baba.software/lms_baba/edit_certificate"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        <i class="fa fa-certificate"></i>-->
                        <a href="#" id="{{$value['id']}}" onclick="show_details(this.id, '<?php echo $value['type']; ?>')"> <i class="fas fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                        <a href="#" id="{{$value['id']}}" onclick="edit_details(this.id, '<?php echo $value['type']; ?>')"> <i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;

                        <!-- <a onclick="editQuizz('{{json_encode($value)}}')"><i class="fas fa-edit"></i></a> -->
                        <a href="{{url(Session::get('form_url').'/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete this Quizz ?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
</div><!--end of main inner-->






<!-- ---------------------------------------- old edit -------------------------------------------  -->
<script>
    function editQuizz(data){
        if(data){
            var newData=JSON.parse(data);
            $('#quizz_id').val(newData.id);
            $('#title').val(newData.title);
            $('#no_of_question').val(newData.no_of_question);
            $('#max_tries').val(newData.max_tries);
            $('#time_limit').val(newData.time_limit);
            var courseList = JSON.parse($("#getCourseList").val());
            var courseHtml = '';
            courseHtml += '<select name="course_id" class="form-control" required="">';
            courseHtml += '<option value="' + newData.course.id + '">' + newData.course.course_name + '</option>';
            if (Array.isArray(courseList)) {
                for (i = 0; i < courseList.length; i++) {
                    if (courseList[i].id != newData.course.id) {
                        courseHtml += '<option value="' + courseList[i].id + '">' + courseList[i].course_name + '</option>';
                    }
                }
            }
            courseHtml += '</select>';
            $('#course').html(courseHtml);
            
            var statusHtml = '';
            statusHtml += '<select name="status" id="exampleSelect" class="form-control" required>';
            if (newData.plan_status=='Active') {
                statusHtml += '<option value="Active">Active</option>';
                statusHtml += '<option value="Inactive">Inactive</option>';
            }else{
               statusHtml += '<option value="Inactive">Inactive</option>';
               statusHtml += '<option value="Active">Active</option>';
            }
            statusHtml += '</select>';
            $('#status').html(statusHtml);
            
            CKEDITOR.instances['editor'].setData(newData.instruction);
            CKEDITOR.instances['editor1'].setData(newData.description);
            
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            
        }else{
            toastr.error('Someting Wrong...!'); 
        }
    }
</script>
<!-- -------------------------------------------- end of old edit -------------------------------  -->

<!-- -------------------------------- add quizz ---------------------------------------------- -->
<script>
    function addQuizz() {
    document.getElementById("coursesform").reset();
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0;  
    CKEDITOR.instances['instruction'].setData();
    CKEDITOR.instances['description'].setData();
    $('#table_questin_edit').html("");
    $('#table_element_show').html("");
    $('#courseForm').removeClass('d-none');
    }
    function closeForm() {
    $('#courseForm').addClass('d-none');
    }
</script>
<!-- ------------------------------------- end of add quizz ---------------------------------- -->





























<!-- ================================================== edit quizz =================================== -->
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
                    $("#quizz_id").val(data.quizz.id);
                    $("#title").val(data.quizz.title);
                    $("#course_id").val(data.quizz.course_id);
                    $("#time_limit").val(data.quizz.time_limit);
                    $("#max_tries").val(data.quizz.max_tries);
                    $("#no_of_question").val(data.quizz.no_of_question);
                    // $("#instruction").val(data.quizz.instruction);
                    $("#description").val(data.quizz.description);
                    $("#status").val(data.quizz.status);
                    CKEDITOR.instances['instruction'].setData(data.quizz.instruction);
                    CKEDITOR.instances['description'].setData(data.quizz.description);
        
                    var markup_shown = ``;
                    if(data.quizz_questions)
                    {
                        for(i=0;i<data.quizz_questions.length; i++)
                        {
                            // markup_shown += `<tr><td>`+data.quizz_questions[i].question+`</td></tr>`;
                            // markup_shown += `<tr><td><input type='checkbox' value='1"`+data.quizz_questions[i].id+`"' name='quizz_question[]'></td><td>`+data.quizz_questions[i].question+`</td><td>`+data.quizz_questions[i].id+`</td></tr>`;
                            markup_shown += `<tr><td><input type='checkbox'  value=`+data.quizz_questions[i].id+` name='quizz_question_remove[]'></td><td>`+data.quizz_questions[i].question+`</td></tr>`;
                           
                           
                        }
                        $("#table_questin_edit").html(markup_shown);
                    }
                    var markup_shown = ``;
                    if(data.mcq_questions)
                    {
                        for(i=0;i<data.mcq_questions.length; i++)
                        {
                            
                            markup_shown += `<tr><td><input type='checkbox'  value=`+data.mcq_questions[i].id+` name='quizz_question[]'></td><td>`+data.mcq_questions[i].question+`</td><td>`+data.mcq_questions[i].id+`</td></tr>`;
                           
                           
                        }
                        $("#table_questin_edit_all").html(markup_shown);
                    }

                   
             }
    });
    document.getElementById("coursesform").reset();
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0;
    CKEDITOR.instances['instruction'].setData();
    CKEDITOR.instances['description'].setData();
    $('#table_questin_edit').html("");
    $('#table_element_show').html("");
    $('#courseForm').removeClass('d-none');
    }
    function closeForm() {
    $('#courseForm').addClass('d-none');
    
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

                            // markup_show += `<tr><td><input type='checkbox' value='1"+id+"' name='correct_answer[]'></td><td>`+data.mcq_questions[i].question+`</td><td>`+data.mcq_questions[i].id+`</td>`;
                            // markup_show += `</tr>`;
                            markup_show += `<tr><td><input type='checkbox' value=`+data.mcq_questions[i].id+` name='quizz_question[]'></td><td>`+data.mcq_questions[i].question+`</td><td>`+data.mcq_questions[i].id+`</td>`;
                             markup_show += `</tr>`;
                        }
                       
                        $("#table_element_show").html(markup_show);
                    }
             }
    });
}
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
                                <div>  <span></span>  Quizz
                                
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
                            <td><p  id="quizz_title_show" style="float: left;"></p></td>
                            <td><p><strong>COURSE : </strong></p></td>
                            <td><p id="quizz_course_name_show"></p></td>
                            <td>  <p><strong>TIME LIMIT : </strong></p></td>
                            <td> <p id="quizz_time_limit_show"></p></td>
                          </tr>
                          <tr>
                            <td><p><strong>MAX TRIES : </strong></p></td>
                            <td> <p id="quizz_max_tries_show"></p></td>
                            <td><p><strong>NO OF QUESTION : </strong></p></td>
                            <td> <p id="quizz_no_of_question_show"></p></td>
                            <td><p ><strong>STATUS : </strong></p></td>
                            <td> <p id="quizz_status_show"></p></td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row">
                          <div class="col-2"><p><strong>INSTRUCTION : </strong></p></div>
                          <div class="col-8"><p id="quizz_instruction_show"></p></div>

                      </div>
                      <div class="row">
                          <div class="col-2"><p><strong>DESCRIPTION : </strong></p></div>
                          <div class="col-8"><p id="quizz_description_show"></p></div>

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
    
        
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
    
        url: "{{url(Session::get('form_url').'/show')}}"+"/"+id ,
            method: "GET",
            contentType: 'application/json',
            dataType: "json",
            success: function (data) {
                console.log(data);
            // console.log(data.quizz);
            console.log(data.quizz_questions.length);
               

            $("#my_show_Modal").modal("show");
            $("#quizz_title_show").html(data.quizz.title);
            $("#quizz_course_id_show").html(data.quizz.course_id);
            $("#quizz_time_limit_show").html(data.quizz.time_limit);
            $("#quizz_max_tries_show").html(data.quizz.max_tries);
            $("#quizz_no_of_question_show").html(data.quizz.no_of_question);
            $("#quizz_instruction_show").html(data.quizz.instruction);
            $("#quizz_description_show").html(data.quizz.description);
            $("#quizz_status_show").html(data.quizz.status);
            $("#quizz_course_name_show").html(data.quizz.course_name);

            var markup_shown = ``;
            if(data.quizz_questions)
                    {
                        for(i=0;i<data.quizz_questions.length; i++)
                        {
                            markup_shown += `<tr><td>`+data.quizz_questions[i].question+`</td></tr>`;
                        }
                        $("#table_questin_show").html(markup_shown);
                    }
                    


                 
                    
             }
    });
}


</script>
