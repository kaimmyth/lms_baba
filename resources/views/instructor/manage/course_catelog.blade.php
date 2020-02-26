<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-phone icon-gradient bg-night-fade">
                        </i>
                    </div>
                    <div>Course Catalogue
                        <div class="page-title-subheading">Create a brand new catalogue by assigning number of pre-existing course and allow user to view it.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url(('/'.Auth::user()->name.'/company/instructor/manage/course_catelog/add'))}}" method="post" enctype='multipart/form-data'> 
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="position-relative form-group" style="padding-left: 1em;">
                                    <label>Course</label>
                                    <select name="course_id" class="form-control" required="">
                                        <option value="">--Select Course--</option>
                                        @if(@$courseList)
                                        @foreach($courseList as $key=>$value)
                                        <option value="{{$value->id}}">{{$value->course_name}}</option>
                                        @endforeach
                                        @endif
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="position-relative form-group"><label for="exampleSelect" class="">Select status</label>
                                <select name="status" id="exampleSelect" class="form-control" required>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>                      
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            @if(@$catalogueList)
                            @foreach($catalogueList AS $key=>$value)
                            <div class="col-md-4">
                                <div class="position-relative row form-group" style="padding-left: 2em;">
                                    <div class="position-relative form-check"><label class="form-check-label">
                                            <input id="checkbox2" name="catalog[]" type="checkbox" value="{{$value->id}}" class="form-check-input" >{{$value->catalogue_name}}</label>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>

                        <hr class="new2">
                        <button type="submit" class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-primary" data-style="expand-left">
                            <span class="ladda-label">Create</span>
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
                    </div>
                </form>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <table class="mb-0 table table-sm">
                        <thead>
                            <tr>
                                <th>SR. NO.</th>
                                <th>COURSE</th>
                                <th>CATALOGUE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(@$catalogList)
                            @foreach($catalogList as $key=>$value)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$value->courseData->course_name}}</td>
                                <td>{{$value->catalogueData->catalogue_name}}</td>
                                <td>{{$value->catalog_status}}</td>
                                <td>
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <i class="fa fa-certificate"></i>
                                    <i class="fas fa-edit"></i>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
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
            </div>
        </div>
    </div><!--end of main-inner-->
</div>