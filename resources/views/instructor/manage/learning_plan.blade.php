<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"><i class="lnr-map text-info"></i></div>
                    <div>
                        New Learning Plan
                        <div class="page-title-subheading">Easily create beautiful form multi step wizards!
                        </div>
                    </div>
                </div>
            </div>
        </div>            
        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a role="tab" class="nav-link show active" id="tab-0" data-toggle="tab" href="#tab-content-0" aria-selected="true">
                    <span>Detail</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link show" id="tab-1" data-toggle="tab" href="#tab-content-1" aria-selected="false">
                    <span>Setting</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link show" id="tab-2" data-toggle="tab" href="#tab-content-2" aria-selected="false">
                    <span>Share</span>
                </a>
            </li>
        </ul>
        <form action="{{url(('/'.Auth::user()->name.'/company/instructor/manage/learning_plan/add'))}}" method="post" enctype='multipart/form-data'> 
            @csrf
            <input name="id" id="plan_id" type="hidden" value="0"> 
            <div class="tab-content">
                <div class="tab-pane tabs-animation fade active show" id="tab-content-0" role="tabpanel">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Name<font style="color:red;">*</font></label>
                                        <input name="planName" id="planName" placeholder="Learning plan Name" type="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Course<font style="color:red;">*</font></label>
                                        <span id="course">
                                            <select name="course_id" class="form-control" required>
                                                <option value="">--Select Course--</option>
                                                @if(@$courseList)
                                                @foreach($courseList as $key=>$value)
                                                <option value="{{$value->id}}">{{$value->course_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Upload Your File<font style="color:red;">*</font></label>
                                        <input name="file" id="editFile" placeholder="" type="file" class="form-control" required>
                                        <input name="old_file" id="old_file" placeholder="" value="" type="hidden" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="" class="">Code<font style="color:red;">*</font></label>
                                        <input type="text" name="plan_code" id="plan_code" required class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="exampleText" class="">Descriprion</label>
                                        <textarea id="editor" name="plan_description" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr class="new2">
                             <a onclick="next1()" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-primary" data-style="expand-left">
                                    <span class="ladda-label text-white">Next</span>
                                    <span class="ladda-spinner"></span>
                                    <div class="ladda-progress" style="width: 0px;">
                                    </div>
                             </a>
                        </div>
                    </div>
                </div><!--end of tab1-->
                <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <div class="position-relative form-check form-check-inline">
                                                <input type="checkbox" id="plan_catalog" name="plan_catalog" value="Yes" class="form-check-input">
                                                <label class="form-check-label" for="plan_catalog">Show this learning plan in the course catalog</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="" class="">Days of Validity</label>
                                            <input name="plan_validity" id="plan_validity" placeholder="" type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                                <div class="position-relative form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="plan_after_access" id="plan_after_access" value="Yes" class="form-check-input"> After first course access</label>
                                                </div>
                                                <div class="position-relative form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="plan_after_enrollment" id="plan_after_enrollment" value="Yes" class="form-check-input">After being enrolled in the learning plan</label>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="" class="">Channel</label>
                                            <input name="plan_channel" id="plan_channel" placeholder="" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Certificate</label>
                                            <span id="certificate">
                                                <select name="plan_Certificate" id="exampleSelect" class="form-control">
                                                    <option value="None">None</option>
                                                    <option value="Sample">Certificate Sample</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="" class="">Credit</label>
                                            <input name="plan_credit" id="plan_credit" placeholder="" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                             <hr class="new2">
                            <a onclick="back1()" class="ladda-button mb-2 mr-2 btn-square btn btn-dark" data-style="expand-left">
                                    <span class="ladda-label text-white">Back</span>
                                    <span class="ladda-spinner"></span>
                                    <div class="ladda-progress" style="width: 0px;">
                                    </div>
                                </a>
                            <a onclick="next2()" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-primary" data-style="expand-left">
                                    <span class="ladda-label text-white">Next</span>
                                    <span class="ladda-spinner"></span>
                                    <div class="ladda-progress" style="width: 0px;">
                                    </div>
                             </a>
                        </div>
                    </div>
                </div><!--end of tab2-->
                <div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <div class="custom-checkbox custom-control">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="plan_inrollment_link" value="Yes" id="plan_inrollment_link" class="form-check-input">
                                            Enable enrollment links for this learning plan
                                        </label>
                                        <br/>
                                        <p>Create and share a link from within the learning plan. Users are automatically enrolled by accessing the link.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="position-relative form-group"><label for="exampleSelect" class="">Select status</label>
                                    <span id="status">
                                        <select name="status" id="exampleSelect" class="form-control" required>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>                      
                                        </select>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <hr class="new2">
                        <a onclick="back2()" class="ladda-button mb-2 mr-2 btn-square btn btn-dark" data-style="expand-left">
                                    <span class="ladda-label text-white">Back</span>
                                    <span class="ladda-spinner"></span>
                                    <div class="ladda-progress" style="width: 0px;">
                                    </div>
                        </a>
                        <button type="submit" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-primary" data-style="expand-left">
                            <span class="ladda-label">Confirm</span>
                            <span class="ladda-spinner"></span>
                            <div class="ladda-progress" style="width: 0px;">
                            </div>
                        </button>

                        <button class="ladda-button mb-2 mr-2 btn-square btn btn-dashed btn-outline-dark" data-style="slide-right">
                            <span class="ladda-label">Cancel</span>
                            <span class="ladda-spinner"></span>
                            <div class="ladda-progress" style="width: 0px;">
                            </div>
                        </button> 
                    </div>
                </div><!--end of tab3-->
            </div>
        </form>
        <div class="card-body">
            <table class="mb-0 table table-sm">
                <thead>
                    <tr>
                        <th>SR. NO.</th>
                        <th>Plan name</th>
                        <th>Course Name</th>
                        <th>File</th>
                        <th>Code</th>
                        <th>Course Catalog</th>
                        <th>Validate</th>
                        <th>first Course</th>
                        <th>enrollment</th>
                        <th>Channel</th>
                        <th>Certificate</th>
                        <th>Credit</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$learningPlanList)
                    @foreach($learningPlanList as $key=>$value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->plan_name}}</td>
                        <td>{{$value->course->course_name}}</td>
                        <td><img src="{{asset('public/upload')}}/{{$value->plan_file}}" height="100px" width="100px"></td>
                        <td>{{$value->plan_code}}</td>
                        <td>{{$value->plan_catalog}}</td>
                        <td>{{$value->plan_validity}}</td>
                        <td>{{$value->plan_after_access}}</td>
                        <td>{{$value->plan_after_enrollment}}</td>
                        <td>{{$value->plan_channel}}</td>
                        <td>{{$value->plan_Certificate}}</td>
                        <td>{{$value->plan_credit}}</td>
                        <td>{{$value->plan_inrollment_link}}</td>
                        <td>{{$value->plan_status}}</td>
                        <td>{{$value->plan_description}}</td>
                        <td>
<!--                            <i class="fa fa-download" aria-hidden="true"></i>
                            <a href="http://baba.software/lms_baba/edit_certificate"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <i class="fa fa-certificate"></i>-->
                            <a onclick="editLearningPlan('{{json_encode($value)}}')"><i class="fas fa-edit"></i></a>
                            <a href="{{url(Session::get('form_url').'/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete this Lerning plan ?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="12">Data not found in our database</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <input type="hidden" id="courseList" value="{{json_encode($courseList)}}">                
    </div>
</div>                                 

<script type="text/javascript">
    function editLearningPlan(data){
        if(data){
            document.getElementById("editFile").required = false;
            var newData=JSON.parse(data);
            var courseList = JSON.parse($("#courseList").val());
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
            $('#old_file').val(newData.plan_file);
            $('#plan_id').val(newData.id);
            $('#plan_code').val(newData.plan_code);
            $('#planName').val(newData.plan_name);
            $('#plan_validity').val(newData.plan_validity);
            $('#plan_credit').val(newData.plan_credit);
            $('#plan_channel').val(newData.plan_channel);
            $('#editor').val(newData.plan_description);
            CKEDITOR.instances['editor'].setData(newData.plan_description);
            
            if(newData.plan_catalog=='Yes'){
                document.getElementById("plan_catalog").checked = true;
            }else{
                document.getElementById("plan_catalog").checked = false;
            }
            
            if(newData.plan_after_access=='Yes'){
                document.getElementById("plan_after_access").checked = true;
            }else{
                document.getElementById("plan_after_access").checked = false;
            }
            
            if(newData.plan_after_enrollment=='Yes'){
                document.getElementById("plan_after_enrollment").checked = true;
            }else{
                document.getElementById("plan_after_enrollment").checked = false;
            }
            
            if(newData.plan_inrollment_link=='Yes'){
                document.getElementById("plan_inrollment_link").checked = true;
            }else{
                document.getElementById("plan_inrollment_link").checked = false;
            }
            
            var certificateHtml = '';
            certificateHtml += '<select name="plan_Certificate" id="exampleSelect" class="form-control">';
            if (newData.plan_Certificate=='None') {
                certificateHtml += '<option value="None">None</option>';
                certificateHtml += '<option value="Sample">Certificate Sample</option>';
            }else{
               certificateHtml += '<option value="Sample">Certificate Sample</option>';
               certificateHtml += '<option value="None">None</option>';
            }
            statusHtml += '</select>';
            
            $('#certificate').html(statusHtml);
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
            
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            
        }else{
           toastr.error('Someting Wrong...!'); 
        }
    }
    
    function back1(){
        $('#tab-content-2').removeClass('active');
        $('a[href="#tab-content-2"]').removeClass('active');
        $('#tab-content-1').removeClass('active');
        $('a[href="#tab-content-1"]').removeClass('active');
        $('#tab-content-0').addClass('active show');
        $('a[href="#tab-content-0"]').addClass('active show');
    }
    function back2(){
        $('#tab-content-2').removeClass('active');
        $('a[href="#tab-content-2"]').removeClass('active');
        $('#tab-content-0').removeClass('active');
        $('a[href="#tab-content-0"]').removeClass('active');
        $('#tab-content-1').addClass('active show');
        $('a[href="#tab-content-1"]').addClass('active show');
    }
    function next1(){
        $('#tab-content-2').removeClass('active');
        $('a[href="#tab-content-2"]').removeClass('active');
        $('#tab-content-0').removeClass('active');
        $('a[href="#tab-content-0"]').removeClass('active');
        $('#tab-content-1').addClass('active show');
        $('a[href="#tab-content-1"]').addClass('active show');
    }
    function next2(){
        $('#tab-content-1').removeClass('active');
        $('a[href="#tab-content-1"]').removeClass('active');
        $('#tab-content-0').removeClass('active');
        $('a[href="#tab-content-0"]').removeClass('active');
        $('#tab-content-2').addClass('active show');
        $('a[href="#tab-content-2"]').addClass('active show');
    }
</script>