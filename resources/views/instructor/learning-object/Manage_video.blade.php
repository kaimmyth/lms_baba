<style>
    .box{
        color: #fff;
        display: none;
    }
    .red{

    }


    .green{}
    .blue{ }
    label{ margin-right: 15px; }

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
                    <div>Manage Video
                        <div class="page-title-subheading">Manage and upload your video related to course.
                        </div>
                    </div>
                </div><!--end of page-title-heading -->
            </div><!--end of page-title-wrapper-->
        </div><!--end of page title-->
        <div class="card-body">
            <form action="{{url(Session::get('form_url').'/add')}}" method="POST" enctype="multipart/form-data"> 
                @csrf
                <div>
                    <div class="position-relative form-group">
                        <label for="" class="">Course</label>
                        <select name="course_id" id="" class="form-control" required>
                            <option value="">--Select Course--</option>
                            @if(@$courseList)
                            @foreach($courseList AS $key=>$value)
                            <option value="{{$value->id}}">{{$value->course_name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <hr/>
                    <h6>Video Source</h6>
                    <div class="divider"></div>
                    <div>
                        <label><input type="radio" name="fileType" value="1">Upload File</label>
                        <label><input type="radio" name="fileType" value="2">YouTube URL</label>
                        <label><input type="radio" name="fileType" value="3">Embeded Video URL</label>
                    </div>
                    <hr class="new2">
                    <div class="open1 red box">
                        <span class="btn btn-default btn-file btn-blue floatL mr15">*Select File
                            <input class="uploadFile" type="file" placeholder="*Upload File" id="userfile" title="" name="file">
                        </span>
                        <div class="col-md-12 note no-padding" style="color: #000;"><strong>Note: You can upload only MP4 (H.264)file format.</strong> </div>
                    </div>
                    <div class="open2 green box">
                        <div class="position-relative form-group">
                            <label for="" class="" style="color: #000;">URL <font style="color:red">*</font></label>
                            <input name="file" id="" placeholder="Record Your Screen Here" type="" class="form-control">
                        </div>
                    </div>
                    <div class="open3 blue box">
                        <div class="position-relative form-group">
                            <label for="" class="" style="color: #000;">Embeded Video<font style="color:red">*</font></label>
                            <input name="file" id="" placeholder="Record Your Screen Here" type="" class="form-control">
                        </div>    
                    </div>
                    <hr class="new2">

                    <div class="position-relative form-group">
                        <label for="" class="">Title</label>
                        <input name="title" id="" placeholder="with a placeholder" type="" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label for="exampleText" class="">Description</label>
                        <textarea name="description" id="exampleText" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title" style="text-transform: inherit;">Allow User to move through video by dragging the item in playhaed</h5>
                            <fieldset class="position-relative form-group">
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input name="playhaed" type="radio" value="0" class="form-check-input">No</label>
                                </div>
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input name="playhaed" type="radio" value="1" class="form-check-input">Yes</label>
                                </div>
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input name="playhaed" type="radio" value="2" class="form-check-input">After Completion</label>
                                </div>
                            </fieldset>
                        </div><!--end of col-->

                        <div class="col-md-6">
                            <h5 class="card-title"  style="text-transform: inherit;">Allow User to Change the playback speed.</h5>
                            <fieldset class="position-relative form-group">
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input name="playback" type="radio" value="1" class="form-check-input">Yes</label>
                                </div>
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input name="playback" type="radio" value="0" class="form-check-input">No</label>
                                </div>
                            </fieldset>
                        </div><!--end of col-->
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="exampleSelect" class="">Select status</label>
                                <select name="status" id="codeStatus" class="form-control" required>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>                      
                                </select>
                            </div>
                        </div>
                    </div><!--end of row-->
                </div>
                <hr class="new2">

                <button type="submit" class="ladda-button mb-2 mr-2 btn-square btn btn-primary" data-style="expand-left">
                    <span class="ladda-label">Create Video</span>
                    <span class="ladda-spinner"></span>
                </button>
                <button class="ladda-button mb-2 mr-2 btn-square btn btn-dashed btn-outline-secondary" data-style="expand-right">
                    <span class="ladda-label">Cancel</span><span class="ladda-spinner"></span></button>


            </form>
        </div><!--card-body-->
        <div class="card-body">
            <table class="mb-0 table table-sm">
                <thead>
                    <tr>
                        <th>SR. NO.</th>
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th>VIDEO</th>
                        <th>COURSE</th>
                        <th>PLAY HEAD</th>
                        <th>PLAY BACK</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$videoList)
                    @foreach($videoList as $key=>$value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->description}}</td>
                        <td>
                            @if($value->link_type==1)
                            <video width="220" height="115" controls>
                                <source src="{{asset('public/upload/').$value->file}}" type="video/mp4">
                                <source src="{{asset('public/upload/').$value->file}}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                            @elseif($value->link_type==2)
                            <iframe width="220" height="115" src="ttps://www.youtube.com/embed/{{$value->file}}"> </iframe>
                            @else
                            <video width="220" height="115" controls>
                                <source src="{{$value->file}}" type="video/mp4">
                                <source src="{{$value->file}}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                            @endif
                        </td>
                        <td>{{$value->course->course_name}}</td>
                        <td>
                            @if($value->playhaed==1)
                            Yes
                            @elseif($value->playhaed==2)
                            After Completion
                            @else
                            No
                            @endif
                        </td>
                        <td>
                            @if($value->playback==1)
                            Yes
                            @else
                            No
                            @endif
                        </td>
                        <td>{{$value->status}}</td>
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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function () {
    $('input[name="fileType"]').click(function () {
        var inputValue = $(this).attr("value");
        var targetBox = $(".open" + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
