<style type="text/css">
    .background-wrapper {
        margin-right: 0;
        border: 1px solid #e4e6e5;
        margin-top: 22px;
        float: left;
    }
</style>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card-body">
            <h6>Edit Certificate Template</h6>
            <hr class="new2">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="" class="">Code</label>
                        <input name="" id="" placeholder="" type="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="" class="">Name </label>
                        <input name="" id="" placeholder="" type="" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="" class="">Create Template</label>
                    <textarea name="" id="editor" cols="20" rows="10"></textarea>
                </div>

                <div class="col-md-4" style="margin-top: 1em;">
                    <label for="" class=""><strong>Orientation:</strong></label>
                    <label><input type="radio" name="" value="red">&nbsp;Landscape</label>
                    <label><input type="radio" name="" value="green">&nbsp;Portrait</label>
                </div>

                <div class="col-md-4" style="margin-top: 1em;">
                    <label for="" class=""><strong>Background:</strong></label>
                    <input name="file" id="exampleFile" type="file" class="form-control-file">
                    <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                </div>

                <div class="col-md-4" style="margin-top: 1em;">
                    <div class="background-wrapper">
                        <div>
                            <img src="https://saiviraj.docebosaas.com/themes/spt/images/certificate_sample.jpg" alt="" style="height: 65px;"> 
                        </div>
                    </div>
                </div>
            </div>
            <hr class="new2">

            <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-danger" data-style="slide-up">
                <span class="ladda-label">Cancel</span><span class="ladda-spinner"></span>
            </button>

            <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                <span class="ladda-label">Confirm</span><span class="ladda-spinner"></span>
            </button>   
        </div>               
    </div>
</div><!--end of main inner-->