<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Create Certificate maser
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
                        <form action="{{url(Session::get('form_url').'/add')}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <input id="certificate_id" name="id" value="0" type="hidden">
                            <div id="smartwizard" class="sw-main sw-theme-default">
                                <div class="form-wizard-content sw-container tab-content" style="min-height: 386px;">
                                    <div id="step-1" class="tab-pane step-content" style="display: block;">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Title Name</label>
                                                    <input name="name" id="title" placeholder="" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Demo File</label>
                                                    <input name="file" id="file" placeholder="" type="file" class="form-control" required>
                                                    <input name="old_file" id="old_file" placeholder="" type="hidden" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <img  src="https://saiviraj.docebosaas.com/themes/spt/images/certificate_sample.jpg" id="imgviwer" height="200px" width="200px">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
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
                    @if(@$certificateList)
                    @foreach($certificateList as $key=>$value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->name}}</td>
                        <td><img src="{{asset('public/upload').'/'.$value->file}}" height="100px" width="100px"></td>
                        <td>{{$value->status}}</td>
                        <td>
<!--                            <i class="fa fa-download" aria-hidden="true"></i>
                            <a href="http://baba.software/lms_baba/edit_certificate"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <i class="fa fa-certificate"></i>-->
                            <i class="fas fa-edit" onclick="editCertificate('{{json_encode($value)}}')"></i>
                             <a href="{{url(Session::get('form_url').'/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete this Certificate ?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                    $('#imgviwer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file").change(function () {
            readURL(this);
        });
    });
</script>

<script>
    function editCertificate(data){
        if(data){
            var newData=JSON.parse(data);
            $('#certificate_id').val(newData.id);
            $('#title').val(newData.name);
            $('#old_file').val(newData.file);
            $('#imgviwer').attr('src', '{{asset("public/upload")}}/'+newData.file);
        
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
            document.getElementById("file").required = false;
            
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            
        }else{
            toastr.error('Someting Wrong...!'); 
        }
    }
</script>