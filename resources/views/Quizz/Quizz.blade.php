<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Quizz
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                        </div>
                    </div>
                </div><!--end of page-title-heading -->
            </div><!--end of page-title-wrapper-->
        </div><!--end of page title-->
        <div class="card-body">
            <div class="card-header" style="background: none;margin-top:-19px;">
                <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Header with Tabs
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm nav btn-group">
                        <a data-toggle="tab" href="#tab-eg1-0" class="btn-shadow btn btn-primary show active">Quizz Setting</a>
                        <a data-toggle="tab" href="#tab-eg1-1" class="btn-shadow btn btn-primary show">Set Question</a>
                    </div>
                </div>
            </div>

            <div class="tab-content" style="padding:2em;">
                <div class="tab-pane show active" id="tab-eg1-0" role="tabpanel">
                    <form action="{{url(Session::get('form_url').'/add')}}" method="POST" enctype="multipart/form-data">
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
                                        <select class="form-control" name="course_id" required="" onchange="fetch_question_details(this.value)" >
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
                                <textarea name="instruction" id="editor" cols="20" rows="10"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="" class="">Description &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                <textarea name="description" id="editor1" cols="20" rows="10"></textarea>
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
                                            <th>Select Questions</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody id="table_element_show" > 
                                
                                    </tbody>
                                </table>
                            </div>
                            <br>

                        </div>   
                        <hr class="new2">
                        <div  style="float: right;">
                            <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-danger" data-style="slide-up">
                                <span class="ladda-label">Cancel</span><span class="ladda-spinner"></span>
                            </button>

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

                            <a onclick="editQuizz('{{json_encode($value)}}')"><i class="fas fa-edit"></i></a>
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
        <input type="hidden" value="{{json_encode($courseList)}}" id="getCourseList">
    </div><!--end of main inner-->
</div>
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

<div class="modal fade bd-example-modal-lg" id="my_show_Modal" role="dialog" style="top:10%;">
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
                     <a href="#" id="{{@$value['id']}}" onclick="edit_details(this.id, '<?php echo @$value['type']; ?>')"> <i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="card-body">
           
                   
                    <h6><strong>TITLE</strong></h6>
                    <p id="quizz_title_show"></p><br>
                    <h6><strong>COURSE</strong></h6>
                    <p id="quizz_course_name_show"></p><br>
                    <h6><strong>TIME LIMIT</strong></h6>
                    <p id="quizz_time_limit_show"></p><br>
                    <h6><strong>MAX TRIES</strong></h6>
                    <p id="quizz_max_tries_show"></p><br>
                    <h6><strong>NO OF QUESTION</strong></h6>
                    <p id="quizz_no_of_question_show"></p><br>
                    <h6><strong>INSTRUCTION</strong></h6>
                    <p id="quizz_instruction_show"></p><br>
                    <h6><strong>DESCRIPTION</strong></h6><br>
                    <p id="quizz_description_show"></p><br>
                    <h6 ><strong>STATUS</strong></h6>
                    <p id="quizz_status_show"></p><br>
                    

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
                            markup_shown += `<tr><td>`+data.quizz_questions[i].question_id+`</td></tr>`;
                        }
                        $("#table_questin_show").html(markup_shown);
                    }
                    


                 
                    
             }
    });
}


</script>
