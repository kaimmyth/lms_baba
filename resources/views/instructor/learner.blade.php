<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>create Learner
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
                        <form action="{{url(('/'.Auth::user()->name.'/instructor/learner/add'))}}" method="post" enctype="text/multipart"> 
                            @csrf
                            <div id="smartwizard" class="sw-main sw-theme-default">

                                <ul class="forms-wizard nav nav-tabs step-anchor">
                                    <li class="nav-item active">
                                        <a href="#step-1" class="nav-link">
                                            <em>1</em><span>Learner Detail</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="form-wizard-content sw-container tab-content" style="min-height: 386px;">
                                    <div id="step-1" class="tab-pane step-content" style="display: block;">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Name</label>
                                                    <input name="name" id="name" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="" class="">Email </label>
                                                    <input name="email" id="" placeholder="" type="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="" class="">Username</label>
                                                    <input name="username" id="username" placeholder="" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="" class="">Password</label>
                                                    <input name="password" id="password" placeholder="" type="password" class="form-control">
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
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$learnerList)
                    @foreach($learnerList as $key=>$value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->username}}</td>
                        <td>{{$value->email}}</td>
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