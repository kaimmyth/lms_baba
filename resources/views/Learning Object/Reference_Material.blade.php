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

                            <form>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="" class="">Code&nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                            <input name="" id="" placeholder="" type="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="" class="">ID&nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                            <input name="password" id="" placeholder="" type="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="" class="">Type &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                            <input name="password" id="" placeholder="" type="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" class="">Description &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                        <textarea name="" id="editor1" cols="10" rows="5"></textarea>
                                    </div>

                                    <div class="col-md-4" style="margin-top: 1em;">
                                        <label for="" class=""><strong>Thumbnail:</strong></label>
                                        <div class="background-wrapper">
                                            <div>
                                                <img src="https://saiviraj.docebosaas.com/themes/spt/images/certificate_sample.jpg" alt="" style="height: 65px;"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4" style="margin-top: 1em;">
                                        <input name="file" id="exampleFile" type="file" class="form-control-file">
                                        <small class="form-text text-muted">The minimum suggested image dimension is 800x400px. The maximum file size is 4MB.</small>
                                    </div>
                                    <div class="col-md-4" style="margin-top: 1em;"></div>

                                    <div class="col-md-12" style="margin-top: 1em;">
                                        <div class="position-relative form-group" style="width: 20%;">
                                            <label for="exampleSelect" class="">Status</label>
                                            <select name="select" id="exampleSelect" class="form-control">
                                                <option>Published</option>
                                                <option>Undermaintainance</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                </div>   
                                <hr class="new2">
                                <div  style="float: right;">
                                    <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-danger" data-style="slide-up">
                                        <span class="ladda-label">Cancel</span><span class="ladda-spinner"></span>
                                    </button>

                                    <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
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
                                    <form class="">

                                        <!--select cat-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Select Category</label>
                                            <div class="col-sm-6">
                                                <select name="select" id="exampleSelect" class="form-control">
                                                    <option value=""></option>
                                                    <option value="1">Docebo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end of select cat-->
                                        <!--select language-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Select Language</label>
                                            <div class="col-sm-6">
                                                <select name="select" id="exampleSelect" class="form-control">
                                                    <option value="">English</option>
                                                    <option value="1">Arebic</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end of select language-->
                                        <!--credit-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Credit</label>
                                            <div class="col-sm-6">
                                                <input name="" id="" placeholder="0" type="" class="form-control">
                                            </div>
                                        </div>
                                        <!--end of credit-->

                                        <!--Navigation Policy-->
                                        <div class="position-relative row form-group">
                                            <label for="exampleSelect" class="col-sm-2 col-form-label">Navigation Policy</label>
                                            <div class="col-sm-10">
                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="radio2" type="radio" class="form-check-input">
                                                        Free Navigation: Learners can navigate freely among the course’s learning objects
                                                    </label>
                                                </div><br>
                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="radio3" type="radio" class="form-check-input">
                                                        Sequential Navigation: Learners must complete and pass the learning objects in the sequential order set in the Training Material Tab
                                                    </label>
                                                </div><br>

                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="radio4" type="radio" class="form-check-input">
                                                        Final Learning Object Locked: Learners must complete all of the learning objects in the course in order to unlock the last learning object
                                                    </label>
                                                </div><br>

                                                <div class="position-relative form-check">
                                                    <label class="form-check-label">
                                                        <input name="radio5" type="radio" class="form-check-input">
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
                                                <input name="" id="" placeholder="0" type="" class="form-control">
                                                <small>Leave empty or set to 0 to allow unlimited attempts for this course's training material.</small>
                                            </div>
                                        </div>
                                        <!--end of credit-->
                                    </form>

                                    <hr class="new2">
                                    <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                                        <span class="ladda-label">Save Changes</span><span class="ladda-spinner"></span>
                                    </button> 

                                </div>
                                <!---------------------------------------------end of detail tab---------------------------------------------------------------->

                                <!---------------------------------------------------Catalogue Option--------------------------------------------------->
                                <div class="tab-pane" id="tab-eg2-1" role="tabpanel">
                                    <!--Course Catalogue-->
                                    <div class="position-relative row form-group">
                                        <label for="exampleSelect" class="col-sm-2 col-form-label">Show Course To</label>
                                        <div class="col-sm-10">
                                            <div class="position-relative form-check">
                                                <label class="form-check-label">
                                                    <input name="radio2" type="radio" class="form-check-input">
                                                    Everyone, and show on home page
                                                </label>
                                            </div><br>
                                            <div class="position-relative form-check">
                                                <label class="form-check-label">
                                                    <input name="radio3" type="radio" class="form-check-input">
                                                    Only for Logged In Users
                                                </label>
                                            </div><br>

                                            <div class="position-relative form-check">
                                                <label class="form-check-label">
                                                    <input name="radio4" type="radio" class="form-check-input">
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
                                            <input name="" id="" placeholder="0" type="file" class="form-control">
                                        </div>
                                    </div>

                                    <!--end of demo material-->

                                    <!--Course subscription-->
                                    <div class="position-relative row form-group">
                                        <label for="exampleSelect" class="col-sm-2 col-form-label">Course subscription</label>
                                        <div class="col-sm-10">
                                            <div class="position-relative form-check">
                                                <label class="form-check-label">
                                                    <input name="radio2" type="radio" class="form-check-input">
                                                    Subscriptions are closed
                                                </label>
                                            </div><br>
                                            <div class="position-relative form-check">
                                                <label class="form-check-label">
                                                    <input name="radio3" type="radio" class="form-check-input">
                                                    Subscriptions are open
                                                </label>
                                            </div><br>

                                            <div class="position-relative form-check">
                                                <label class="form-check-label">
                                                    <input name="radio4" type="radio" class="form-check-input" value="green">
                                                    Subscription is available during the following period
                                                </label>
                                            </div>

                                            <div class="position-relative form-group" style="width:50%;">
                                                <label for="" class="" style="color: #000;">Select Date<font style="color:red">*</font></label>
                                                <input type="text" class="form-control" name="daterange" value="01/01/2018 - 01/15/2018"/>
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
                                                    <input name="radio2" type="radio" class="form-check-input">
                                                    Only Admin can subscribe users
                                                </label>
                                            </div><br>
                                            <div class="position-relative form-check">
                                                <label class="form-check-label">
                                                    <input name="radio3" type="radio" class="form-check-input">
                                                    Pending Admin Approval
                                                </label>
                                            </div><br>

                                            <div class="position-relative form-check">
                                                <label class="form-check-label">
                                                    <input name="radio4" type="radio" class="form-check-input">
                                                    Free
                                                </label>
                                            </div><br>
                                        </div>
                                    </div>
                                    <!--end of Enrollment Policy-->
                                    <hr class="new2">
                                    <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                                        <span class="ladda-label">Save Changes</span><span class="ladda-spinner"></span>
                                    </button> 

                                </div>

                                <!-----------------------------------------------------end of Catalogue Option--------------------------------------------------->

                                <!---------------------------------------------------Time Option--------------------------------------------------->
                                <div class="tab-pane" id="tab-eg2-2" role="tabpanel">
                                    <!--Start Date-->
                                    <div class="position-relative row form-group">
                                        <label for="exampleSelect" class="col-sm-2 col-form-label">Start Date</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="birthday" value="10/24/1984"/>
                                        </div>
                                    </div>
                                    <!--end of Start Date-->

                                    <!--Start Date-->
                                    <div class="position-relative row form-group">
                                        <label for="exampleSelect" class="col-sm-2 col-form-label">End Date</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="birthday" value="10/24/1984"/>
                                        </div>
                                    </div>
                                    <!--end of Start Date-->
                                    <!--Days of Validity-->
                                    <div class="position-relative row form-group">
                                        <label for="exampleSelect" class="col-sm-2 col-form-label">Days of Validity</label>
                                        <div class="col-sm-6">
                                            <input name="" id="" placeholder="0" type="" class="form-control">
                                            <small>This setting allows users to access this course for only a specific number of days after first access.</small>


                                            <!--Days of Validity-->
                                            <div class="position-relative row form-group">
                                                <div class="col-sm-12">
                                                    <div class="position-relative form-check">
                                                        <label class="form-check-label">
                                                            <input name="radio2" type="radio" class="form-check-input">
                                                            After first course access
                                                        </label>
                                                    </div>
                                                    <div class="position-relative form-check">
                                                        <label class="form-check-label">
                                                            <input name="radio3" type="radio" class="form-check-input">
                                                            After being enrolled in the course
                                                        </label>
                                                    </div>
                                                    <div class="position-relative form-check"><label class="form-check-label">
                                                            <input id="checkbox3" type="checkbox" class="form-check-input"> 
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
                                            <form class="form-inline">
                                                <div class="position-relative form-group">
                                                    <label for="" class="sr-only">Hour</label>
                                                    <input name="" id="" placeholder="0" type="" class="mr-2 form-control">
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="" class="sr-only">Minute</label>
                                                    <input name="" id="" placeholder="0" type="" class="mr-2 form-control">
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="" class="sr-only">Second</label>
                                                    <input name="" id="" placeholder="0" type="" class="mr-2 form-control">
                                                </div>
                                                <small>Define the time in which a user is expected (but not required) to complete the course. Setting this parameter gives Admins and Instructors the possibility to run reports of the actual completion time verses the expected time set here.</small>
                                            </form>

                                        </div>
                                    </div>
                                    <!--end of Average Time for Course-->
                                    <hr class="new2">
                                    <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                                        <span class="ladda-label">Save Changes</span><span class="ladda-spinner"></span>
                                    </button>



                                </div><!--end of time option tag-->
                                <!---------------------------------------------------End of Time Option--------------------------------------------------->

                                <!---------------------------------------------------Certificate--------------------------------------------------->

                                <div class="tab-pane show" id="tab-eg2-3" role="tabpanel">
                                    <!--Select Certificate Template-->
                                    <div class="position-relative row form-group">
                                        <label for="exampleSelect" class="col-sm-2 col-form-label">Select Certificate Template</label>
                                        <div class="col-sm-10">

                                            <div class="position-relative form-group">
                                                <label for="" class="sr-only">Email</label>
                                                <select name="select" id="" class="form-control">
                                                    <option value=""></option>
                                                    <option value="1"></option>
                                                </select>
                                                <small>The selected certificate will be available to a user after he or she completes the course</small>
                                            </div>
                                            <button class="btn btn-primary">Create Certificate</button>

                                        </div>
                                    </div>

                                    <!--end of Select Certificate Template-->

                                </div>
                                <!---------------------------------------------------End of Certificate--------------------------------------------------->

                            </div><!--end of tab-content-->  
                        </div> <!--end of tab-pane show-->
                        <!----------------------------------end of inner tab--------------------------------------------->



                    </div>
                </div>
            </div>                         
        </div>
    </div>
</div>