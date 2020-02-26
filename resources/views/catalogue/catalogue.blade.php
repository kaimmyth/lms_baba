<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Create Course Catalogue 
                        <div class="page-title-subheading">
                            This is an example dashboard created using build-in elements and components.
                        </div>
                    </div>
                </div><!--end of page-title-heading -->
            </div><!--end of page-title-wrapper-->
        </div><!--end of page title-->
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form action="{{url(Session::get('form_url').'/add')}}" method="post" enctype="text/multipart"> 
                            @csrf
                            <div id="smartwizard" class="sw-main sw-theme-default">
                                <ul class="forms-wizard nav nav-tabs step-anchor">
                                    <li class="nav-item active">
                                        <a href="#step-1" class="nav-link">
                                            <em>1</em><span>Catalogue Detail</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="form-wizard-content sw-container tab-content" style="min-height: 386px;">
                                    <div id="step-1" class="tab-pane step-content" style="display: block;">
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Name</label>
                                                    <input name="name" id="codeName" placeholder="" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Select status</label>
                                                    <select name="status" id="codeStatus" class="form-control" required>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="clearfix">
                                <button type="button" id="reset-btn" class="btn-shadow float-left btn btn-link">Reset</button>
                                <!--<button type="button" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Next</button>-->
                                <button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Submit</button>
                                <!--<button type="button" id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Previous</button>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="mb-0 table table-sm">
                <thead>
                    <tr>
                        <th>SR. NO.</th>
                        <th>NAME</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$catalogueList)
                    @foreach($catalogueList as $key=>$value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->catalogue_name}}</td>
                        <td>{{$value->catalogue_status}}</td>
                        <td>
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <a href="http://baba.software/lms_baba/edit_certificate"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <i class="fa fa-certificate"></i>
                            <i class="fas fa-edit"></i>
                            <i class="fa fa-trash" aria-hidden="true"></i>
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