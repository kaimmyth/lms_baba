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
            <div>
                <h6>Video Source</h6>
                <div class="divider"></div>
                <div>
                    <label><input type="radio" name="colorRadio" value="red"> Upload File</label>
                    <label><input type="radio" name="colorRadio" value="green">YouTube URL</label>
                    <label><input type="radio" name="colorRadio" value="blue">  Embeded Video URL</label>
                </div>
                <hr class="new2">
                <div class="red box">
                    <span class="btn btn-default btn-file btn-blue floatL mr15">*Select File
                        <input class="uploadFile" type="file" placeholder="*Upload File" id="userfile" title="" name="userfile">
                    </span>
                    <div class="col-md-12 note no-padding" style="color: #000;"><strong>Note: You can upload only MP4 (H.264)file format.</strong> </div>
                </div>
                <div class="green box">
                    <div class="position-relative form-group">
                        <label for="" class="" style="color: #000;">URL <font style="color:red">*</font></label>
                        <input name="" id="" placeholder="Record Your Screen Here" type="" class="form-control">
                    </div>
                </div>
                <div class="blue box">
                    <div class="position-relative form-group">
                        <label for="" class="" style="color: #000;">Embeded Video<font style="color:red">*</font></label>
                        <input name="" id="" placeholder="Record Your Screen Here" type="" class="form-control">
                    </div>    
                </div>
                <hr class="new2">

                <div class="position-relative form-group">
                    <label for="" class="">Title</label>
                    <input name="" id="" placeholder="with a placeholder" type="" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="exampleText" class="">Description</label>
                    <textarea name="text" id="exampleText" class="form-control"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title" style="text-transform: inherit;">Allow User to move through video by dragging the item in playhaed</h5>
                        <fieldset class="position-relative form-group">
                            <div class="position-relative form-check">
                                <label class="form-check-label">
                                    <input name="radio1" type="radio" class="form-check-input">No</label>
                            </div>
                            <div class="position-relative form-check">
                                <label class="form-check-label">
                                    <input name="radio1" type="radio" class="form-check-input">Yes</label>
                            </div>
                            <div class="position-relative form-check">
                                <label class="form-check-label">
                                    <input name="radio1" type="radio" class="form-check-input">After Completion</label>
                            </div>
                        </fieldset>
                    </div><!--end of col-->

                    <div class="col-md-6">
                        <h5 class="card-title"  style="text-transform: inherit;">Allow User to Change the playback speed.</h5>
                        <fieldset class="position-relative form-group">
                            <div class="position-relative form-check">
                                <label class="form-check-label">
                                    <input name="radio1" type="radio" class="form-check-input">Yes</label>
                            </div>
                            <div class="position-relative form-check">
                                <label class="form-check-label">
                                    <input name="radio1" type="radio" class="form-check-input">No</label>
                            </div>
                        </fieldset>
                    </div><!--end of col-->
                </div><!--end of row-->
            </div>
            <hr class="new2">

            <button class="ladda-button mb-2 mr-2 btn-square btn btn-primary" data-style="expand-left">
                <span class="ladda-label">Create Video</span>
                <span class="ladda-spinner"></span>
            </button>
            <button class="ladda-button mb-2 mr-2 btn-square btn btn-dashed btn-outline-secondary" data-style="expand-right">
                <span class="ladda-label">Cancel</span><span class="ladda-spinner"></span></button>



        </div><!--card-body-->
    </div><!--end of main inner-->
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
    });
</script>