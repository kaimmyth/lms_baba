<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Test Series
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
                        <a data-toggle="tab" href="#tab-eg1-0" class="btn-shadow btn btn-primary show active">Test Series Setting</a>
                        <a data-toggle="tab" href="#tab-eg1-1" class="btn-shadow btn btn-primary show">Set Question</a>
                    </div>
                </div>
            </div>

            <div class="tab-content" style="padding:2em;">
                <div class="tab-pane show active" id="tab-eg1-0" role="tabpanel">
                    <form action="{{url(Session::get('form_url').'/add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="id" type="hidden" id="test_series_id" value="0" required/>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="" class="">Title &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                    <input name="title" id="title"  placeholder="Test Series Title" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="" class="">Category&nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                    <span id="editcategory">
                                        <select class="form-control" name="category_id" required="">
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
                                    <input name="time_limit" id="time_limit" placeholder="60" type="number" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="" class="">Maximum Tries &nbsp;<font style="color:red; font-size:18px;">*</font></label>
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
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="" class="">Total Marks &nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                    <input name="total_marks" id="total_marks" placeholder="100" type="number" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="" class="">Passing Marks&nbsp;<font style="color:red; font-size:18px;">*</font></label>
                                    <input name="passing_marks" id="passing_marks" placeholder="30" type="number" class="form-control">
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
                            <a onclick="editTestSeries('{{json_encode($value)}}')"><i class="fas fa-edit"></i></a>
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
        if(data){
            var newData=JSON.parse(data);
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
            if (newData.status=='Active') {
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