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
                <form>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="" class="">Course<font style="color:red;">*</font></label>
                                <input name="" id="" placeholder="Write Course Name" type="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="" class="">Category<font style="color:red;">*</font></label>
                                <input name="" id="" placeholder="" type="" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="" class="">Course Code<font style="color:red;">*</font></label>
                                <input name="" id="" placeholder="eg.MCS 041" type="" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="" class="">Credit<font style="color:red;">*</font></label>
                                <input name="" id="" placeholder="No. of Credit" type="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="" class="">Certificate<font style="color:red;">*</font></label>
                                <input name="" id="" placeholder="" type="" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="" class="">Documents<font style="color:red;">*</font></label>
                                <input name="" id="" placeholder="" type="eg.MCS 041" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group"><label for="exampleFile" class="">Upload Document</label>
                                <input name="file" id="exampleFile" type="file" class="form-control-file">
                                <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="position-relative form-group"><label for="exampleSelect" class="">Select status</label>
                                <select name="select" id="exampleSelect" class="form-control">
                                    <option>Active</option>
                                    <option>Inactive</option>                      
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h5 class="card-title">Type</h5>
                            <fieldset class="position-relative form-group">
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input name="radio1" type="radio" class="form-check-input">
                                        e Learning
                                    </label>
                                </div>
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input name="radio1" type="radio" class="form-check-input">
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
                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="new2">


                    <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-primary" data-style="expand-left">
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
        <!--end of add course section-->
    </div>
</div>