<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> --> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
<style>
    form{
        margin: 20px 0;
    }
    form input, button{
        padding: 5px;
    }
    table{
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }


    .fixed-sidebar .app-main .app-main__outer .modal-backdrop .show, show.blockOverlay {
        z-index: 9;
        padding-left: 280px;
        opacity: 0.3;
    }

    .modal-backdrop.show, .show.blockOverlay {
        opacity: 0;
        z-index: 999 !important;
        display: none;
        opacity: 0.3;
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
                    <div>Manage Multiple Choice Question
                        <div class="page-title-subheading">
                            This is an example dashboard created using build-in elements and components.
                        </div>
                    </div>
                </div><!--end of page-title-heading -->
            </div><!--end of page-title-wrapper-->
        </div><!--end of page title-->
        <div class="card-body">
            <div class="dropdown d-inline-block">
                <!-- <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#myModal">New Question</button> -->
                <button  type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-primary">New Question</button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                    <div class="container">
                        <div class="radio">
                            <input id="radio-1" name="question_type" value="Single" type="radio" checked>
                            <label for="radio-1" class="radio-label">Single Choice</label>
                        </div>

                        <div class="radio">
                            <input id="radio-2" name="question_type" value="Multiple" type="radio">
                            <label  for="radio-2" class="radio-label">Multiple Choice</label>
                        </div>

                        <div class="radio">
                            <input id="radio-3" name="question_type" value="Extended" type="radio">
                            <label  for="radio-3" class="radio-label">Extended Text</label>
                        </div>

                        <div class="radio">
                            <input id="radio-4" name="question_type" value="Text Entry" type="radio">
                            <label  for="radio-4" class="radio-label">Text Entry</label>
                        </div>

                        <li class="nav-item-divider nav-item"></li>
                        <li class="nav-item-btn nav-item">
                            <!-- <button class="btn-wide btn-shadow btn btn-primary btn-sm">GO</button> -->
                            <button type="button" class="btn btn-primary mb-2 mr-2" onclick="show_modal()" data-toggle="modal" data-target="#myModal">GO</button>
                            <!-- <button type="button" class="btn btn-primary mb-2 mr-2" onclick="show_modal()" >GO</button> -->
                            <!-- <button type="button" class="btn btn-primary mb-2 mr-2"  >GO</button> -->
                        </li>

                    </div>
                </div>
            </div>


            <hr class="new2">


            <!--START OF TABLE-->
            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sl. No.</th>
                        <th>Question</th>
                        <th>Category</th>
                        <th>Score</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($mcq)
                    @foreach($mcq as $key=>$value)
                    <tr>
                        <?php $id=$value['id']; ?>
                        <td>{{++$key}}</td>
                        <td>{{$value['question']}}</td>
                        <td>{{$value['category']}}</td>
                        <td>{{$value['score']}}</td>
                        <td>{{$value['type']}}</td>
                        <td>
                            
                            <a href="#" id="{{$value['id']}}" onclick="show_details(this.id, '<?php echo $value['type']; ?>')"> <i class="fas fa-eye"></i></a>&nbsp;&nbsp;&nbsp;

                            <a href="#" id="{{$value['id']}}" onclick="edit_details(this.id, '<?php echo $value['type']; ?>')"> <i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;

                          <!-- 
                           <input type="checkbox" class="toggle-class" checked data-plugin="switchery"
                           {{$value['status']}} data-id="{{$value['id']}}"
                            data-toggle="toggle"  data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger" data-size="mini">&nbsp;&nbsp;&nbsp;
                           -->
                           <input type="checkbox" class="toggle-class" checked data-plugin="switchery" 
                            {{$value['status']}} data-id="{{$value['id']}}"
                           data-color="#64b0f2" data-size="small" />&nbsp;&nbsp;&nbsp;
                           
                            <a href="{{url('/'.Auth::user()->name.'/company/instructor/learning-object/manage-mcq/delete_mcq/'.$value['id'])}}" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                           
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
</div>



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
                                <div>  <span class="question_type_show"></span>  Choice Question
                                
                                    <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                                    </div>
                                </div>
                            </div><!--end of page-title-heading -->
                        </div><!--end of page-title-wrapper-->
                    </div><!--end of page title-->
                </div>
                <button type="button" class="close "  data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body"  id="reset_model">
                <div class="pull-right" style="padding: 20px;">
                     <a href="#" id="{{@$value['id']}}" onclick="edit_details(this.id, '<?php echo @$value['type']; ?>')"> <i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="card-body" id="apple">
           
                   
                    <h6><strong>Question</strong></h6>
                    <p id="question_show"></p><br>
                    <h6><strong>Question Category</strong></h6>
                    <p id="question_category_show"></p><br>
                    <h6><strong>Score</strong></h6>
                    <p id="score_show"></p><br>
                    <h6><strong>Course</strong></h6>
                    <p id="course_name_show"></p><br>
                    <h6><strong>Type</strong></h6>
                    <p id="question_type_show"></p><br>
                    <h6 class="hide_table_element"><strong>Correct Answer</strong></h6>
                    <p class="correct_answer_show"></p><br>
                    <h6 class="hide_table_element"><strong>Answer</strong></h6>
                    <p id="answer_show"></p><br>
                    

                    <table class="hide_table_element">
                        <thead>
                            <tr>
                              
                                <th>Answer</th>
                            </tr>
                        </thead>
                       
                        <tbody id="table_element_show" > 
                    
                        </tbody>
                    </table>
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
    function show_details(id, type_tmp) {
        // document.getElementById("#reset_model").html();
        // reset_model
      
        
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
    
        url: "{{url('/'.Auth::user()->name.'/company/instructor/learning-object/manage-mcq/edit_mcq')}}"+"/"+id ,
            method: "GET",
            contentType: 'application/json',
            dataType: "json",
            success: function (data) {
                console.log(data);
                    $(".hide_table_element").show();
                    $(".correct_answer_show").show();
                    $("#my_show_Modal").modal("show");
                    $("#question_show").html(data.mcq_questions.question);
                    $("#question_category_show").html(data.mcq_questions.category);
                    $("#score_show").html(data.mcq_questions.score);
                    $("#course_id_show").html(data.mcq_questions.course_id);
                    $("#course_name_show").html(data.mcq_questions.course_name);
                    $("#question_type_show").html(data.mcq_questions.type);

                    $(".question_type_show").html(data.mcq_questions.type);

                    var answer = $("#answer_show").html(data.mcq_answer.answer);

                    // $("#question_type_sho").html(data.mcq_questions.type);
                    


                    
                    var markup_show = "";
                    $(".add_new_row_x").show();
                    $(".xoc").show();
                    $(".text_area_long_answer").show();
                    console.log(data.mcq_answer.length);
                    if(data.mcq_answer.length>1)
                    {
                        // alert("G");
                        
                        var append=[];
                        for(i=0; i<data.mcq_answer.length; i++)
                        {
                            if(data.mcq_answer[i].correct_answer=="1"){
                                append+=data.mcq_answer[i].answer+",";
                            }
                                $(".correct_answer_show").html(append);
                            // markup_show += "<tr><td> <input type='text' id='rabbit' name='record_value[]' value=" + data.mcq_answer[i].answer + " > <input type='text' hidden name='record_value_id[]' value=" + data.mcq_answer[i].id + "></td>";
                            markup_show += "<tr><td>"+data.mcq_answer[i].answer+"</td>";
                            markup_show += "</tr>";
                          
                        }
                        $(".text_area_long_answer").hide();
                        $("#table_element_show").html(markup_show);
                    }
                    else if(data.mcq_answer.length== 0)
                    {
                        // $(".add_new_row_x").hide();
                        //     $(".xoc").hide();
                        //     $(".hide_section").hide();
                            $(".hide_table_element").hide();
                            $(".correct_answer_show").hide();
                           

                            // $("#reset_model").reset();
                            // alert("extended");
                            // for(i=0; i<data.mcq_answer.length; i++)
                            // {
                            //     $(".add_new_row_x").hide();
                            //     $(".xoc").hide();
                            //     $(".hide_section").hide();
                            //     markup_show +="></td><td> <textarea name='record_value[]'  value=" + data.mcq_answer[i].answer + " >"+ data.mcq_answer[i].answer +"</textarea> <input type='text' hidden name='record_value_id[]' value=" + data.mcq_answer[i].id + "></td>";
                            //     markup_show += "</tr>";
                            // }
                            //  $(".text_area_long_answer").html(markup_show);
                    }
                    // else
                    // {
                    //     // alert("s");
                    //     for(i=0; i<data.mcq_answer.length; i++)
                    //     {
                    //         // $(".hide_table_element").hide();
                    //         $(".xoc").hide();
                            
                    //         markup_show +="></td><td> <textarea name='record_value[]'  value=" + data.mcq_answer[i].answer + " >"+ data.mcq_answer[i].answer +"</textarea> <input type='text' hidden name='record_value_id[]' value=" + data.mcq_answer[i].id + "></td>";
                    //         markup_show += "</tr>";
                    //     }
                    //      $(".text_area_long_answer").html(markup_show);
                    // }
                    
             }
    });
}


</script>


























































<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal" role="dialog" style="top:10%;">
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
                                <div> <span id="type_question"></span>  <span id="question_type_edit"></span>  Choice Question
                                
                                    <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                                    </div>
                                </div>
                            </div><!--end of page-title-heading -->
                        </div><!--end of page-title-wrapper-->
                    </div><!--end of page title-->
                </div>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                <form id="question-answer-form" action="{{url(('/'.Auth::user()->name.'/company/instructor/learning-object/manage-mcq/add'))}}" method="post" enctype='multipart/form-data'> 
                    @csrf
                    <input type="text" name="mcq_id" id="mcq_id" hidden>
                    <h6><strong>Question</strong></h6>
                    <textarea name="question" id="question" cols="20" rows="10" required></textarea><br>
                    <div class="position-relative form-group">
                        <label for="exampleSelect" class="">Set Level Of Difficulty</label>
                        <select name="question_category" id="question_category" class="form-control" required style="width: 20%;">
                            <option>Easy</option>
                            <option>Medium</option>
                            <option>Difficult</option>
                        </select>
                    </div>

                    <div class="position-relative form-group">
                        <label for="exampleSelect" class="">Select Course</label>
                        <select class="form-control" name="course_id" id="course_id" required style="width: 20%;">
                            <option>-- Choose --</option>
                            @foreach($course as $value)
                            <option value="{{$value['id']}}" >{{$value['course_name']}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="position-relative form-group">
                        <label for="exampleSelect" class="">Marks</label>
                        <input name="score" id="score" placeholder="Enter Marks" type="number" class="mr-2 form-control" required style="width: 20%;">
                        <h6 id="score_val"></h6>
                    </div>


                    <hr class="new2 hide_section">
                    <h6 class="hide_section"><strong >Answer</strong></h6>

                    <div class="form-inline add_new_row_x" >
                        <div class="position-relative form-group">
                            <!-- <label for="" class="sr-only">Email</label> -->
                            <input name="" id="name" placeholder="" type="text" class="mr-2 form-control">
                        </div>
                        <input type="button" class="btn btn-primary add-roww" value="Add Answer">
                        
                        <h6 id="answer_val"></h6>
                    </div>


                    <div class="text_area_long_answer"></div>
                    <table class="xoc">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                       
                        <tbody id="table_element" > 
                    
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-danger delete-row xoc">Delete Row</button>
                    <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info xoc" data-style="expand-right" style="margin-top: 10px;">
                        <span class="ladda-label">Save Answer</span><span class="ladda-spinner"></span>
                    </button>

                    <hr class="new2">

                    <div  style="float: right;">
                        <input type="text" id="hidden_type" name="question_type" value="" hidden>
                        <button data-dismiss="modal" onclick="resetUserForm()" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-danger" data-style="slide-up">
                            <span class="ladda-label" >Cancel</span><span class="ladda-spinner"></span>
                        </button>

                        <button type="" id="" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                            <span class="ladda-label">Save Changes</span><span class="ladda-spinner"></span>
                        </button>
                    </div>
                </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<!-- type  -->
<script>
    var type = "";
    function show_modal(){
        $("#table_element").html(""); // reset table_element
        CKEDITOR.instances['question'].setData(""); // ck editor question reset to null
        document.getElementById('question-answer-form').reset();
        
        type = $("input[name='question_type']:checked").val();
        var type_abc = $("input[name='question_type']:checked").val();
        
            $(".add_new_row_x").show();
            $(".xoc").show();
            $(".text_area_long_answer").show();
            if(type=="Extended")
            {
                var to_append = `<tr><td> <textarea  name='record_value[]' value=" + name + " ></textarea></td></tr>`;
                $(".add_new_row_x").hide();
                $(".xoc").hide();
                $(".hide_section").hide();
                // $(".text_area_long_answer").html(to_append);
            }
            // else if((type=="Text Entry"))
            // {
            //     var to_append = `<tr><td> <textarea  name='record_value[]' value=" + name + " ></textarea></td></tr>`;
            //     $(".add_new_row_x").hide();
            //     $(".xoc").hide();
            //     $(".text_area_long_answer").html(to_append);
            // }
            else{
                $(".text_area_long_answer").hide();
            }
            // deciding type
            $("#hidden_type").val(type);
            $("#type_question").html(type_abc);
       }
</script>


<!-- edit  -->
<script>
    function edit_details(id, type_tmp) {
        type = type_tmp; // replace global variable
        $("#table_element").html(""); // reset table_element
        
        
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
    
        url: "{{url('/'.Auth::user()->name.'/company/instructor/learning-object/manage-mcq/edit_mcq')}}"+"/"+id ,
            method: "GET",
            contentType: 'application/json',
            dataType: "json",
            success: function (data) {
                console.log(data);
              
                    $("#myModal").modal("show");
                    $("#mcq_id").val(data.mcq_questions.id);
                    CKEDITOR.instances['question'].setData(data.mcq_questions.question);
                    
                    $("#question_category").val(data.mcq_questions.category);
                    $("#course_id").val(data.mcq_questions.course_id);
                    $("#score").val(data.mcq_questions.score);

                    var answer = $("#answer").val(data.mcq_answer.answer);

                    $("#question_type_edit").html(data.mcq_questions.type);
                    
                    var markup = "";
                    $(".add_new_row_x").show();
                    $(".xoc").show();
                    $(".text_area_long_answer").show();
                    if(data.mcq_answer.length>1)
                    {
                        // alert("G");
                        for(i=0; i<data.mcq_answer.length; i++)
                        {
                            markup += "<tr><td><input type='checkbox' value='1"+data.mcq_answer[i].answer+"' name='correct_answer[]'";
                            if(data.mcq_answer[i].correct_answer=="1"){
                                markup+= " checked";
                            }
                            markup +="></td><td> <input type='text' id='rabbit' name='record_value[]' value=" + data.mcq_answer[i].answer + " > <input type='text' hidden name='record_value_id[]' value=" + data.mcq_answer[i].id + "></td>";
                            markup += "</tr>";
                        }
                        $(".text_area_long_answer").hide();
                        $("#table_element").html(markup);
                    }
                    else if(data.mcq_answer.length==0)
                    {
                        $(".add_new_row_x").hide();
                            $(".xoc").hide();
                            $(".hide_section").hide();
                            
                            // alert("extended");
                            // for(i=0; i<data.mcq_answer.length; i++)
                            // {
                            //     $(".add_new_row_x").hide();
                            //     $(".xoc").hide();
                            //     $(".hide_section").hide();
                            //     markup +="></td><td> <textarea name='record_value[]'  value=" + data.mcq_answer[i].answer + " >"+ data.mcq_answer[i].answer +"</textarea> <input type='text' hidden name='record_value_id[]' value=" + data.mcq_answer[i].id + "></td>";
                            //     markup += "</tr>";
                            // }
                            //  $(".text_area_long_answer").html(markup);
                    }
                    else
                    {
                        // alert("s");
                        for(i=0; i<data.mcq_answer.length; i++)
                        {
                            $(".add_new_row_x").hide();
                            $(".xoc").hide();
                            
                            markup +="></td><td> <textarea name='record_value[]'  value=" + data.mcq_answer[i].answer + " >"+ data.mcq_answer[i].answer +"</textarea> <input type='text' hidden name='record_value_id[]' value=" + data.mcq_answer[i].id + "></td>";
                            markup += "</tr>";
                        }
                         $(".text_area_long_answer").html(markup);
                    }
             }
    });
}


</script>

<!-- add new row -->
<script>
    $(document).ready(function () {
        // $("#name").val("");
        $(".add-roww").click(function () { 
            var name = $("#name").val();
            var email = $("#email").val();
            var markup = "<tr><td><input type='checkbox' value='1"+name+"' name='correct_answer[]'></td><td> <input type='text' name='record_value[]' value=" + name + " ></td></tr>";
            $("#table_element").append(markup);
        });

        // Find and remove selected table rows
        $(".delete-row").click(function () {
            $("#table_element").find('input[name="record[]"]').each(function () {
                if ($(this).is(":checked")) {
                    $(this).parents("tr").remove();
                }
            });
        });
        
        $( "#table_element" ).on( "click", "input[name='correct_answer[]']", function() {
            if(type=="Single")
            {
                if($(this).prop("checked")){
                    $("#table_element").find("input[name='correct_answer[]']").prop("checked",false);
                    $(this).prop("checked", true);
                }
            }
        });
    });
</script>

<!-- ckeditor -->
<script>
    CKEDITOR.replace('question', {
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

<!-- Active Deactive -->
<script>
    $(function() {
      $('.toggle-class').change(function() {
          var live_status = $(this).prop('checked') == true ? 1 : 0; 
          var user_id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: "{{url('/'.Auth::user()->name.'/company/instructor/learning-object/manage-mcq/changeStatus')}}" ,
              data: {'live_status': live_status, 'id': user_id},
              success: function(data){
                console.log(data);
                
              }
          });
      })
    })
</script>


<!-- validation -->

<script>
// validation for score text box 

$(document).ready(function()
 {
    $("#answer_val").hide();
   err_new_name=true;

           $("#name").blur(function(){
            username1();
        });


        function username1(){
          var k = $("#name").val();
        
          if(k.length==""){
            $("#answer_val").show();
            $("#answer_val").html("Please input answer");
            $("#answer_val").focus();
            $("#answer_val").css("color","red");

                err_new_name=false;
                    return false;
          }
          else{
                err_new_name=true;
              $("#answer_val").hide();
              
          }
        }


// validation for number 

   $("#score_val").hide();
   err_new_number=true;

           $("#score").blur(function(){
            username2();
        });
      
       
        function username2(){
          var k = $("#score").val();
          var regexOnlyNumbers=/^[0-9]+$/;
          if(k.length==""||regexOnlyNumbers.test(k) != true){
            $("#score_val").show();
            $("#score_val").html("Please input marks");
            $("#score_val").focus();
            $("#score_val").css("color","red");

                err_new_number=false;
                    return false;
          }
          else{
                err_new_number=true;
              $("#score_val").hide();
              
          }
        }



// validation for submit button 

        $("#btnSubmit").click(function(){

        err_new_name=true;
        err_new_number=true;

        username1();
        username2();

        if((err_new_name==true)&&(err_new_number==true))
        {
            return true;
        }
        else{
            return false;
            
        }

        });
   

  });
</script>






























