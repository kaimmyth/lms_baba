<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Add Course
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--end of page title--> 


        <!--add course section-->
        <div class="main-card mb-3 card">
            <div class="card-body">
                <!-- <h5 class="card-title">Grid Rows</h5> -->
                <form action="{{url(Session::get('form_url').'/add')}}" method="post" enctype='multipart/form-data'> 
                    @csrf
                    <input type="hidden" value="0" name="id" id="course_id"/>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="" class="">Course<font style="color:red;">*</font></label>
                                <input name="courseName" id="courseName" placeholder="Write Course Name" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="" class="">Category<font style="color:red;">*</font></label>
                                <span id="category">
                                    <select class="form-control" name="cate_id" required>
                                        <option value="">--Select Category--</option>
                                        @if(@$category)
                                        @foreach($category as $key=>$value)
                                        <option value="{{$value->id}}">{{$value->cate_name}}</option>
                                        @endforeach
                                        @endif
                                    </select>   
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="" class="">Course Code<font style="color:red;">*</font></label>
                                <input name="courseCode" id="courseCode" type="text" class="form-control" required=""/>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="" class="">Credit<font style="color:red;">*</font></label>
                                <input name="credit" id="credit" placeholder="No. of Credit" type="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="" class="">Certificate<font style="color:red;">*</font></label>
                                <span id="certificate">
                                    <select name="certificate" id="exampleSelect" class="form-control" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>                      
                                    </select>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="" class="">Documents<font style="color:red;">*</font></label>
                                <input name="document" id="document" placeholder="" type="eg.MCS 041" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group"><label for="exampleFile" class="">Upload Document</label>
                                <input name="file" id="editFile" type="file" class="form-control-file" required>
                                <input name="old_file" id="old_file" type="hidden" class="form-control-file" >
                                <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
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

                        <div class="col-md-4">
                            <h5 class="card-title">Type</h5>
                            <fieldset class="position-relative form-group">
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input name="courseType" type="radio" id="courseType1" value="e-learning" class="form-check-input" required checked>
                                        e Learning
                                    </label>
                                </div>
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input name="courseType" type="radio" id="courseType2" value="classroom" class="form-check-input" >
                                        Classroom
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="exampleText" class="">Descriprion</label>
                                <textarea name="description" id="editor" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="new2">


                    <button type="submit" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-primary" data-style="expand-left">
                        <span class="ladda-label">Create Course</span>
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
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="mb-0 table table-sm">
                <thead>
                    <tr>
                        <th>SR. NO.</th>
                        <th>Course</th>
                        <th>Category</th>
                        <th>Code</th>
                        <th>Credit</th>
                        <th>Certificate</th>
                        <th>Document</th>
                        <th>File</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$courseList)
                    @foreach($courseList as $key=>$value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->course_name}}</td>
                        <td>{{$value->category->cate_name}}</td>
                        <td>{{$value->course_code}}</td>
                        <td>{{$value->course_credit}}</td>
                        <td>{{$value->course_certificate}}</td>
                        <td>{{$value->course_document}}</td>
                        <td><img src="{{asset('public/upload')}}/{{$value->course_document_file}}" height="100px" width="100px"/></td>
                        <td>{{$value->course_type}}</td>
                        <td>{{$value->course_description}}</td>
                        <td>{{$value->course_status}}</td>
                        <td>
<!--                            <i class="fa fa-download" aria-hidden="true"></i>
                            <a href="http://baba.software/lms_baba/edit_certificate"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <i class="fa fa-certificate"></i>-->
                            <a onclick="editCourse('{{json_encode($value)}}')"><i class="fas fa-edit"></i></a>
                            <a href="{{url(Session::get('form_url').'/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete this course ?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        <!--end of add course section-->
        <input type="hidden" id="getCategoryList" value="{{json_encode($category)}}"/>
    </div>
</div>
<script>
    function editCourse(e){
        if (e){
            var newData = JSON.parse(e);
            $('#course_id').val(newData.id);
            $('#courseName').val(newData.course_name);
            $('#courseCode').val(newData.course_code);
            $('#credit').val(newData.course_credit);
            $('#old_file').val(newData.course_document_file);
            $('#document').val(newData.course_document);
            CKEDITOR.instances['editor'].setData(newData.course_description);
            document.getElementById("editFile").required = false;
            if (newData.course_type == 'e-learning') {
                document.getElementById("courseType1").checked = true;
                document.getElementById("courseType2").checked = false;
            }else{
                document.getElementById("courseType2").checked = true;
                document.getElementById("courseType1").checked = false; 
            }
            
            var allCategory = JSON.parse($("#getCategoryList").val());
            var catHtml = '';
            catHtml += '<select name="cate_id" class="form-control" required="">';
            catHtml += '<option value="' + newData.category.id + '">' + newData.category.cate_name + '</option>';
            if (Array.isArray(allCategory)) {
                for (i = 0; i < allCategory.length; i++) {
                    if (allCategory[i].id != newData.category.id) {
                        catHtml += '<option value="' + allCategory[i].id + '">' + allCategory[i].cate_name + '</option>';
                    }
                }
            }
            catHtml += '</select>';
            $('#category').html(catHtml);
            
            var statusHtml = '';
            statusHtml += '<select name="status" id="exampleSelect" class="form-control" required>';
            if (newData.course_status=='Active') {
                statusHtml += '<option value="Active">Active</option>';
                statusHtml += '<option value="Inactive">Inactive</option>';
            }else{
               statusHtml += '<option value="Inactive">Inactive</option>';
               statusHtml += '<option value="Active">Active</option>';
            }
            statusHtml += '</select>';
            $('#status').html(statusHtml);
            
            var certificateHtml = '';
            certificateHtml += '<select name="certificate" id="exampleSelect" class="form-control" required>';
            if (newData.course_certificate=='Yes') {
                certificateHtml += '<option value="Yes">Yes</option>';
                certificateHtml += '<option value="No">No</option>';
            }else{
               certificateHtml += '<option value="No">No</option>';
               certificateHtml += '<option value="Yes">Yes</option>';
            }
            certificateHtml += '</select>';
            $('#certificate').html(certificateHtml);
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        } else{
            toastr.error('Someting Wrong...!');
        }
    }
    
</script>

