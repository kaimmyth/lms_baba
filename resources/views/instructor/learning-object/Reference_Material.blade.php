<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
    .green{}
</style>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"><i class="lnr-map text-info"></i></div>
                    <div>
                        Course Management
                        <div class="page-title-subheading">Customize the course Changing it's Name, Description & Thumbnail.
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="col-lg-12 col-xl-12">
            <div class="card-body">
                <h6><strong>General</strong></h6>
                <p>Customize the course changing its name, thumbnail and description.</p>
                <hr class="new2">
                <div class="card-header card-header-tab-animation">
                    <ul class="nav nav-justified">
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-0" class="nav-link active show">PROPERTIES</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-1" class="nav-link show">ADVANCE PROPERTIES</a></li>
                    </ul>
                </div>
                <div style="padding:2em;">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-eg115-0" role="tabpanel">
                            <form method="POST" id="updateCourseProperties" enctype='multipart/form-data'>
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="" class="">Course&nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                            <input type="hidden" name="course_id" value="0" id="course_id"/>
                                            <select name="course_list" id="course_list" class="form-control" required="" onchange="courseList(this.value);">
                                                <option value="">--Select Course--</option>
                                                @if(@$courseList)
                                                @foreach($courseList AS $key=>$value)
                                                <option value="{{json_encode($value)}}">{{$value->course_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="" class="">Code&nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                            <input name="code_id" id="code" value="" required="" class="form-control"/>
<!--                                            <span id="code">
                                                <select name="code_id"  class="form-control" required="">
                                                    <option value="">--Select Code--</option>
                                                </select>  
                                            </span>-->
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="" class="">Category &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                            <span id="category" >
                                                <select name="category_id" class="form-control" required="">
                                                    <option value="">--Select Category--</option>
                                                </select>
                                            </span>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" class="">Description &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                        <textarea name="descriptionData" id="editor1" cols="10" rows="5"></textarea>
                                    </div>

                                    <div class="col-md-4" style="margin-top: 1em;">
                                        <label for="" class=""><strong>Thumbnail:</strong></label>
                                        <div class="background-wrapper">
                                            <div>
                                                <img id="imgviwer" src="https://saiviraj.docebosaas.com/themes/spt/images/certificate_sample.jpg" alt="" style="height: 65px;"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4" style="margin-top: 1em;">
                                        <input name="file" id="selectThumnail" name="file" type="file" class="form-control-file">
                                        <small class="form-text text-muted">The minimum suggested image dimension is 800x400px. The maximum file size is 4MB.</small>
                                    </div>
                                    <div class="col-md-4" style="margin-top: 1em;"></div>

                                    <div class="col-md-12" style="margin-top: 1em;">
                                        <div class="position-relative form-group" style="width: 20%;">
                                            <label for="exampleSelect" class="">Status</label>
                                            <span id="live_status">
                                                <select name="live_status" class="form-control">
                                                    <option value="Published">Published</option>
                                                    <option value="Under-Maintenance">Under Maintenance</option>
                                                </select>
                                            </span>
                                        </div>
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

                        <!----------------------------------starting of inner tab--------------------------------------------->
                        <div class="tab-pane show" id="tab-eg115-1" role="tabpanel">
                            <div class="btn-actions-pane-right">
                                <div class="nav">
                                    <a data-toggle="tab" href="#tab-eg2-0" class="btn-pill btn-wide active btn btn-outline-alternate btn-sm">Detail</a>
                                    <a data-toggle="tab" href="#tab-eg2-1" class="btn-pill btn-wide mr-1 ml-1  btn btn-outline-alternate btn-sm">Catalogue Option</a>
                                    <a data-toggle="tab" href="#tab-eg2-2" class="btn-pill btn-wide  btn btn-outline-alternate btn-sm">Time option</a>
                                    <a data-toggle="tab" href="#tab-eg2-3" class="btn-pill btn-wide  btn btn-outline-alternate btn-sm">Certificate</a>
                                </div>
                            </div>
                            <hr class="new2">

                            <div class="tab-content">
                                <!-----------------------------------------------------------------------detail tab--------------------------------------------------->
                                <div class="tab-pane active" id="tab-eg2-0" role="tabpanel">
                                    <form method="POST" id="updatePropertiesDetail" enctype='multipart/form-data'>
                                        @csrf
                                        <input type="hidden" name="course_id" value="0" id="course_idd"/>
                                        <!--select cat-->
                                        <!--                                        <div class="position-relative row form-group">
                                                                                    <label for="exampleSelect" class="col-sm-2 col-form-label">Select Category</label>
                                                                                    <div class="col-sm-6">
                                                                                        <select name="select" id="exampleSelect" class="form-control">
                                                                                            <option value=""></option>
                                                                                            <option value="1">Docebo</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>-->
                                        <!--end of select cat-->
                                        <!--select language-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Select Language</label>
                                            <div class="col-sm-6">
                                                <span  id="languageViewer">
                                                    <select name="language_id" class="form-control">
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                        <!--end of select language-->
                                        <!--credit-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Credit</label>
                                            <div class="col-sm-6">
                                                <input name="credit" id="creditViewer" placeholder="0" type="" class="form-control">
                                            </div>
                                        </div>
                                        <!--end of credit-->

                                        <!--Navigation Policy-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Navigation Policy</label>
                                            <div class="col-sm-10">
                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="navigationPolicy" type="radio" id="navigationPolicy1" value="1" class="form-check-input">
                                                        Free Navigation: Learners can navigate freely among the course’s learning objects
                                                    </label>
                                                </div><br>
                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="navigationPolicy" type="radio" id="navigationPolicy2" value="2" class="form-check-input">
                                                        Sequential Navigation: Learners must complete and pass the learning objects in the sequential order set in the Training Material Tab
                                                    </label>
                                                </div><br>

                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="navigationPolicy" type="radio" id="navigationPolicy3" value="3" class="form-check-input">
                                                        Final Learning Object Locked: Learners must complete all of the learning objects in the course in order to unlock the last learning object
                                                    </label>
                                                </div><br>

                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="navigationPolicy" type="radio" id="navigationPolicy4" value="4" class="form-check-input">
                                                        Completion of the first mandatory learning object: Learners can access the training materials of the course only after they have completed and passed the first learning object in the list. They will be then able to view the other learning objects either in their preferred order or in the sequential order set for the course.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end of Navigation Policy-->


                                        <!--Self-Unenrollment-->
                                        <div class="position-relative row form-group">
                                            <label for="checkbox2" class="col-sm-2 col-form-label">Self-Unenrollment</label>
                                            <div class="col-sm-10">
                                                <div class="position-relative form-check"><label class="form-check-label">
                                                        <input id="checkbox2" type="checkbox" class="form-check-input">Allow self-unenrollment from this course.</label>
                                                </div>
                                            </div>
                                            <label for="checkbox2" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <div class="position-relative form-check"><label class="form-check-label">
                                                        <input id="checkbox3" type="checkbox" class="form-check-input"> Allow self-unenrollment from the course even if the learner has completed it</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end of Self-Unenrollment-->

                                        <!--Maximum Attempts-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Maximum Attempts</label>
                                            <div class="col-sm-6">
                                                <input name="attempts" id="attemptViewer" placeholder="0" type="" class="form-control">
                                                <small>Leave empty or set to 0 to allow unlimited attempts for this course's training material.</small>
                                            </div>
                                        </div>
                                        <!--end of credit-->


                                        <hr class="new2">
                                        <button type="submit" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                                            <span class="ladda-label">Save Changes</span><span class="ladda-spinner"></span>
                                        </button> 
                                    </form>
                                </div>
                                <!---------------------------------------------end of detail tab---------------------------------------------------------------->

                                <!---------------------------------------------------Catalogue Option--------------------------------------------------->
                                <div class="tab-pane" id="tab-eg2-1" role="tabpanel">
                                    <form method="POST" id="updateCatalogue" enctype='multipart/form-data'>
                                        @csrf
                                        <input type="hidden" name="course_id" value="0" id="course_idc"/>
                                        <!--Course Catalogue-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Show Course To</label>
                                            <div class="col-sm-10">
                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="show_course_to" id="show_course_to1" value="1" type="radio" class="form-check-input">
                                                        Everyone, and show on home page
                                                    </label>
                                                </div><br>
                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="show_course_to" id="show_course_to2" value="2" type="radio" class="form-check-input">
                                                        Only for Logged In Users
                                                    </label>
                                                </div><br>

                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="show_course_to" id="show_course_to3" type="radio" value="3" class="form-check-input">
                                                        Only users subscribed to the course
                                                    </label>
                                                </div><br>
                                            </div>
                                        </div>
                                        <!--end of Course Catalogue-->
                                        <!--Demo Material-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Credit</label>
                                            <div class="col-sm-6">
                                                <input name="file" id="creditFile" placeholder="0" type="file" class="form-control">
                                            </div>
                                            <div class="col-sm-2">
                                                <img src="" id="creditFileViewer" height="100px" width="100px">
                                            </div>
                                        </div>

                                        <!--end of demo material-->

                                        <!--Course subscription-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Course subscription</label>
                                            <div class="col-sm-10">
                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="subscription_status" id="subscription_status1" value="1" type="radio" class="form-check-input">
                                                        Subscriptions are closed
                                                    </label>
                                                </div><br>
                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="subscription_status" id="subscription_status2" value="2" type="radio" class="form-check-input">
                                                        Subscriptions are open
                                                    </label>
                                                </div><br>

                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="subscription_status" id="subscription_status3" value="3" type="radio" class="form-check-input" value="green">
                                                        Subscription is available during the following period
                                                    </label>
                                                </div>

                                                <div class="position-relative form-group"  style="width:50%;">
                                                    <label for="" class="" style="color: #000;">Select Date<font style="color:red">*</font></label>
                                                    <input type="text" class="form-control" name="daterange" id="duration" value="01/01/2018 - 01/15/2018"/>
                                                </div>

                                                <br>
                                            </div>
                                        </div>
                                        <!--end of Course subscription-->

                                        <!--Enrollment Policy-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Course subscription</label>
                                            <div class="col-sm-10">
                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="subscription_for" id="subscription_for1" value="1" type="radio" class="form-check-input">
                                                        Only Admin can subscribe users
                                                    </label>
                                                </div><br>
                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="subscription_for" id="subscription_for2" value="2" type="radio" class="form-check-input">
                                                        Pending Admin Approval
                                                    </label>
                                                </div><br>

                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="subscription_for" id="subscription_for3" value="3" type="radio" class="form-check-input">
                                                        Free
                                                    </label>
                                                </div><br>
                                            </div>
                                        </div>
                                        <!--end of Enrollment Policy-->
                                        <hr class="new2">
                                        <button type="submit" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                                            <span class="ladda-label">Save Changes</span><span class="ladda-spinner"></span>
                                        </button> 
                                    </form>
                                </div>

                                <!-----------------------------------------------------end of Catalogue Option--------------------------------------------------->

                                <!---------------------------------------------------Time Option--------------------------------------------------->
                                <div class="tab-pane" id="tab-eg2-2" role="tabpanel">
                                    <form method="POST" id="updateTimeOption" enctype='multipart/form-data'>
                                        @csrf
                                        <input type="hidden" name="course_id" value="0" id="course_idt"/>
                                        <!--Start Date-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Start Date</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" name="start_data" id="start_data" value="10/24/1984"/>
                                            </div>
                                        </div>
                                        <!--end of Start Date-->

                                        <!--Start Date-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">End Date</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" name="end_date" id="end_date" value="10/24/1984"/>
                                            </div>
                                        </div>
                                        <!--end of Start Date-->
                                        <!--Days of Validity-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Days of Validity</label>
                                            <div class="col-sm-6">
                                                <input name="day_validity" id="day_validity" placeholder="0" type="number" class="form-control">
                                                <small>This setting allows users to access this course for only a specific number of days after first access.</small>


                                                <!--Days of Validity-->
                                                <div class="position-relative row form-group">
                                                    <div class="col-sm-12">
                                                        <div class="position-relative form-check">
                                                            <label class="form-check-label">
                                                                <input name="access_by" id="access_by1" value="1" type="radio" class="form-check-input">
                                                                After first course access
                                                            </label>
                                                        </div>
                                                        <div class="position-relative form-check">
                                                            <label class="form-check-label">
                                                                <input name="access_by" id="access_by2" value="2" type="radio" class="form-check-input">
                                                                After being enrolled in the course
                                                            </label>
                                                        </div>
                                                        <div class="position-relative form-check"><label class="form-check-label">
                                                                <input id="expiration_status" name="expiration_status" value="1" type="checkbox" class="form-check-input"> 
                                                                Update the expiration date for any users already enrolled in the course
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>                              
                                            </div>
                                        </div>
                                        <!--end of Days of Validity-->

                                        <!--Average Time for Course-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Average Time for Course</label>
                                            <div class="col-sm-10">
                                                <div class="form-inline">
                                                    <div class="position-relative form-group">
                                                        <label for="" class="sr-only">Hour</label>
                                                        <input name="hour" id="hour" placeholder="0" type="" class="mr-2 form-control">
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label for="" class="sr-only">Minute</label>
                                                        <input name="minute" id="minute" placeholder="0" type="" class="mr-2 form-control">
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label for="" class="sr-only">Second</label>
                                                        <input name="second" id="second" placeholder="0" type="" class="mr-2 form-control">
                                                    </div>
                                                    <small>Define the time in which a user is expected (but not required) to complete the course. Setting this parameter gives Admins and Instructors the possibility to run reports of the actual completion time verses the expected time set here.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end of Average Time for Course-->
                                        <hr class="new2">
                                        <button type="submit" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                                            <span class="ladda-label">Save Changes</span><span class="ladda-spinner"></span>
                                        </button>
                                    </form>
                                </div><!--end of time option tag-->
                                <!---------------------------------------------------End of Time Option--------------------------------------------------->

                                <!---------------------------------------------------Certificate--------------------------------------------------->

                                <div class="tab-pane show" id="tab-eg2-3" role="tabpanel">
                                    <!--Select Certificate Template-->
                                    <form method="POST" id="updateCertificateTemplate" enctype='multipart/form-data'>
                                        @csrf
                                        <div class="position-relative row form-group">
                                            <input type="hidden" name="course_id" value="0" id="course_idtem"/>
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Select Certificate Template</label>
                                            <div class="col-sm-10">

                                                <div class="position-relative form-group">
                                                    <label for="" class="sr-only">Template</label>
                                                    <span id="certificateViewer">
                                                        <select name="select" id="" class="form-control" required="">
                                                            <option value="">--Select Certificate Template--</option>
                                                        </select>
                                                    </span>
                                                    <small>The selected certificate will be available to a user after he or she completes the course</small>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Create Certificate</button>

                                            </div>

                                        </div>
                                    </form>
                                    <!--end of Select Certificate Template-->
                                </div>
                                <!---------------------------------------------------End of Certificate--------------------------------------------------->

                            </div><!--end of tab-content-->  
                        </div> <!--end of tab-pane show-->
                        <!----------------------------------end of inner tab--------------------------------------------->
                    </div>
                </div>
                <input type="hidden" id="getCategories" value="{{json_encode($allcategory)}}">
                <!--<input type="hidden" id="getCode" value="{{json_encode(@$allcode)}}">-->
                <input type="hidden" id="getLanguage" value="{{json_encode($languageList)}}">
                <input type="hidden" id="getCertificate" value="{{json_encode($certificateList)}}">
            </div>                         
        </div>
    </div>
</div>
<script type="text/javascript">
    function courseList(e) {
        if (e) {
            var courseData = JSON.parse(e);
            $('#course_id').val(courseData.id);
            $('#code').val(courseData.course_code);
            var allCategory = JSON.parse($("#getCategories").val());
//            var allCode = JSON.parse($("#getCode").val());
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

//            codeHtml += '<select name="code_id"class="form-control" required="">';
//            codeHtml += '<option value="' + courseData.code.id + '">' + courseData.code.code + '</option>';
//            if (Array.isArray(allCode)) {
//                for (j = 0; j < allCode.length; j++) {
//                    if (allCode[j].id != courseData.code.id) {
//                        codeHtml += '<option value="' + allCode[j].id + '">' + allCode[j].code + '</option>';
//                    }
//                }
//            }
//            codeHtml += '</select>';
//            $('#code').html(codeHtml);
            CKEDITOR.instances['editor1'].setData(courseData.course_description);
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
            advanceProperties(e);
        } else {
            $('#code').val('');
            $('#category').html('<select name="category_id" class="form-control" required=""><option value="">--Select Category--</option></select>');
            CKEDITOR.instances['editor1'].setData('');
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
        var newData = JSON.parse(data);
        $('#course_idd').val(newData.id);
        var allLanguage = JSON.parse($("#getLanguage").val());
        var lanHtml = '';
        lanHtml = '<select name="language_id" class="form-control" required="">';
        if (newData.language_id > 0) {

            lanHtml += '<option value="' + newData.language.id + '">' + newData.language.name + '</option>';
            if (Array.isArray(allLanguage)) {
                for (i = 0; i < allLanguage.length; i++) {
                    if (allLanguage[i].id != newData.language.id) {
                        lanHtml += '<option value="' + allLanguage[i].id + '">' + allLanguage[i].name + '</option>';
                    }
                }
            }
        } else {
            lanHtml += '<option value="">--Select Language--</option>';
            if (Array.isArray(allLanguage)) {
                for (j = 0; j < allLanguage.length; j++) {
                    lanHtml += '<option value="' + allLanguage[j].id + '">' + allLanguage[j].name + '</option>';
                }
            }
        }
        lanHtml += '</select>';
        $('#languageViewer').html(lanHtml);
        if (newData.navigation_policy == 1) {
            document.getElementById("navigationPolicy1").checked = true;
            document.getElementById("navigationPolicy2").checked = false;
            document.getElementById("navigationPolicy3").checked = false;
            document.getElementById("navigationPolicy4").checked = false;
        }
        if (newData.navigation_policy == 2) {
            document.getElementById("navigationPolicy1").checked = false;
            document.getElementById("navigationPolicy2").checked = true;
            document.getElementById("navigationPolicy3").checked = false;
            document.getElementById("navigationPolicy4").checked = false;
        }
        if (newData.navigation_policy == 3) {
            document.getElementById("navigationPolicy1").checked = false;
            document.getElementById("navigationPolicy2").checked = false;
            document.getElementById("navigationPolicy3").checked = true;
            document.getElementById("navigationPolicy4").checked = false;
        }
        if (newData.navigation_policy == 4) {
            document.getElementById("navigationPolicy1").checked = false;
            document.getElementById("navigationPolicy2").checked = false;
            document.getElementById("navigationPolicy3").checked = false;
            document.getElementById("navigationPolicy4").checked = true;
        }
        $('#creditViewer').val(newData.course_credit);
        $('#attemptViewer').val(newData.attempts);
        advancePropertiesCatalogueOption(data);
    }

    function advancePropertiesCatalogueOption(data) {
        var newData = JSON.parse(data);
        $('#course_idc').val(newData.id);
        if (newData.show_course_to == 1) {
            document.getElementById("show_course_to1").checked = true;
            document.getElementById("show_course_to2").checked = false;
            document.getElementById("show_course_to3").checked = false;
        }
        if (newData.show_course_to == 2) {
            document.getElementById("show_course_to1").checked = false;
            document.getElementById("show_course_to2").checked = true;
            document.getElementById("show_course_to3").checked = false;
        }
        if (newData.show_course_to == 3) {
            document.getElementById("show_course_to1").checked = false;
            document.getElementById("show_course_to2").checked = false;
            document.getElementById("show_course_to3").checked = true;
        }
        if (newData.credit_file !== null && newData.credit_file !== '') {
            $('#creditFileViewer').attr("src", "{{ asset('public/upload') }}/" + newData.credit_file);
        }
        if (newData.subscription_status == 1) {
            document.getElementById("subscription_status1").checked = true;
            document.getElementById("subscription_status2").checked = false;
            document.getElementById("subscription_status3").checked = false;
        }
        if (newData.subscription_status == 2) {
            document.getElementById("subscription_status1").checked = false;
            document.getElementById("subscription_status2").checked = true;
            document.getElementById("subscription_status3").checked = false;
        }
        if (newData.subscription_status == 3) {
            document.getElementById("subscription_status1").checked = false;
            document.getElementById("subscription_status2").checked = false;
            document.getElementById("subscription_status3").checked = true;
        }
        $('#duration').val(newData.subscription_during_date);

        if (newData.subscription_for == 1) {
            document.getElementById("subscription_for1").checked = true;
            document.getElementById("subscription_for2").checked = false;
            document.getElementById("subscription_for3").checked = false;
        }
        if (newData.subscription_for == 2) {
            document.getElementById("subscription_for1").checked = false;
            document.getElementById("subscription_for2").checked = true;
            document.getElementById("subscription_for3").checked = false;
        }
        if (newData.subscription_for == 3) {
            document.getElementById("subscription_for1").checked = false;
            document.getElementById("subscription_for2").checked = false;
            document.getElementById("subscription_for3").checked = true;
        }
        advancePropertiesTimeOption(data);
    }
    $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#creditFileViewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#creditFile").change(function () {
            readURL(this);
        });
    });

    function advancePropertiesTimeOption(data) {
        var newData = JSON.parse(data);
        $('#course_idt').val(newData.id);
        $('#start_data').val(newData.start_data);
        $('#end_date').val(newData.end_date);
        $('#day_validity').val(newData.day_validity);
        if (newData.access_by == 1) {
            document.getElementById("access_by1").checked = true;
            document.getElementById("access_by2").checked = false;
        }
        if (newData.access_by == 2) {
            document.getElementById("access_by1").checked = false;
            document.getElementById("access_by2").checked = true;
        }
        if (newData.expiration_status == 1) {
            document.getElementById("expiration_status").checked = true;
        }
        var res = newData.average_time.split(":");
        $('#hour').val(res[0]);
        $('#minute').val(res[1]);
        $('#second').val(res[2]);
        Cetificate(data);
    }

    function Cetificate(data) {
        var newData = JSON.parse(data);
        var allCertificate = JSON.parse($("#getCertificate").val());
        $('#course_idtem').val(newData.id);
        var certificateHtml = '';
        certificateHtml = '<select name="certificate_template" class="form-control" required="">';
        if (newData.certificate_template > 0) {

            certificateHtml += '<option value="' + newData.certificate.id + '">' + newData.certificate.name + '</option>';
            if (Array.isArray(allCertificate)) {
                for (i = 0; i < allCertificate.length; i++) {
                    if (allCertificate[i].id != newData.certificate_template) {
                        certificateHtml += '<option value="' + allCertificate[i].id + '">' + allCertificate[i].name + '</option>';
                    }
                }
            }
        } else {
            certificateHtml += '<option value="">--Select Certificate--</option>';
            if (Array.isArray(allCertificate)) {
                for (j = 0; j < allCertificate.length; j++) {
                    certificateHtml += '<option value="' + allCertificate[j].id + '">' + allCertificate[j].name + '</option>';
                }
            }
        }
        certificateHtml += '</select>';
        $('#certificateViewer').html(certificateHtml);
    }

    $(document).ready(function (e) {
        $("#updatePropertiesDetail").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{url(Session::get('form_url').'/updatePropertiesDetail')}}",
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
                        $('#tab-eg2-1').addClass('active');
                        $('a[href="#tab-eg2-1"]').addClass('active');
                        $('#tab-eg2-0').removeClass('active');
                        $('a[href="#tab-eg2-0"]').removeClass('active');
                        advanceProperties(newData.data);
                    }
                },
                error: function (data) {
                    toastr.error('Error : Somthing Wrong...!');
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


    $(document).ready(function (e) {
        $("#updateCatalogue").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{url(Session::get('form_url').'/updateCatalogue')}}",
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
                        $('#tab-eg2-2').addClass('active');
                        $('a[href="#tab-eg2-2"]').addClass('active');
                        $('#tab-eg2-1').removeClass('active');
                        $('a[href="#tab-eg2-1"]').removeClass('active');
                        advanceProperties(newData.data);
                    }
                },
                error: function (data) {
                    toastr.error('Error : Somthing Wrong...!');
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


    $(document).ready(function (e) {
        $("#updateTimeOption").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{url(Session::get('form_url').'/updateTimeOption')}}",
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
                        $('#tab-eg2-3').addClass('active');
                        $('a[href="#tab-eg2-3"]').addClass('active');
                        $('#tab-eg2-2').removeClass('active');
                        $('a[href="#tab-eg2-2"]').removeClass('active');
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


    $(document).ready(function (e) {
        $("#updateCertificateTemplate").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{url(Session::get('form_url').'/updateCertificateTemplate')}}",
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
                        $('#tab-eg115-1').removeClass('active');
                        $('a[href="#tab-eg115-1"]').removeClass('active');
                        $('#tab-eg115-0').addClass('active');
                        $('a[href="#tab-eg115-0"]').addClass('active');
                        $('#code').val('');
                        $('#creditFile').val('');
                        $('#category').html('<select name="category_id" class="form-control" required=""><option value="">--Select Category--</option></select>');
                        CKEDITOR.instances['editor1'].setData('');
                        $('#editor1').val('');
                        location.reload();
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
</script>