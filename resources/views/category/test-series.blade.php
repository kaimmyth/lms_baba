<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Create Test Series Category
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
                        <form action="{{url((Session::get('form_url').'/add'))}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <input name="id" id="category_id" placeholder="" value="0" type="hidden" class="form-control" required>
                            <div id="smartwizard" class="sw-main sw-theme-default">
                                <ul class="forms-wizard nav nav-tabs step-anchor">
                                    <li class="nav-item active">
                                        <a href="#step-1" class="nav-link">
                                            <em>1</em><span>Category Detail</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="form-wizard-content sw-container tab-content" style="min-height: 386px;">
                                    <div id="step-1" class="tab-pane step-content" style="display: block;">
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Category Name</label>
                                                    <input name="name" id="categoryname" placeholder="" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Select status</label>
                                                    <span id="status">
                                                    <select name="status" id="exampleSelect" class="form-control" required>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>                      
                                                    </select>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="position-relative form-group">
                                                    <label for="fileSelector" class="">File</label>
                                                    <input name="file" id="fileSelector" placeholder="" type="file" class="form-control" required>
                                                    <input name="old_file" id="old_file" placeholder="" type="hidden" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <img src="" id="fileViewer" height="200px" width="200px"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="clearfix">
                                <button type="button" id="reset-btn" class="btn-shadow float-left btn btn-link">Reset</button>
                                <button type="submit" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Submit</button>
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
                        <th>FILE</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$testSeriesCategory)
                    @foreach($testSeriesCategory as $key=>$value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->title}}</td>
                        <td><img src='{{asset("public/upload/".$value->file)}}' height="100px" width="100px"/></td>
                        <td>{{$value->status}}</td>
                        <td>
                            <a onclick="editCategory('{{json_encode($value)}}')"><i class="fas fa-edit"></i></a>
                            <a href="{{url(Session::get('form_url').'/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete this Category ?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
     $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#fileViewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#fileSelector").change(function () {
            readURL(this);
        });
    });

    
    function editCategory(data){
        alert(data);
        if(data){
            var newData=JSON.parse(data);
            $('#category_id').val(newData.id);
            $('#categoryname').val(newData.title);
            $('#fileViewer').attr('src', '{{asset("public/upload/")}}/'+newData.file);
            $('#fileSelector').val('');
            $('#old_file').val(newData.file);
            document.querySelector('#fileSelector').required = false;
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
</script>