<style>
    .list-group-item {
        position: relative;
        display: block;
        padding: .10rem 1.25rem;
        margin-bottom: -1px;
        background: none;
        border: 0px solid rgba(255, 255, 255, 0.125);
        color: #000;
    }
    .widget-content .widget-content-left .widget-heading {
        opacity: .8;
        font-weight: 500;
        font-size: 19px;
    }
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
                    <div>View Test Series Detail
                        <div class="page-title-subheading">This is test series of where user give their test.
                        </div>
                    </div>
                </div><!--end of page-title-heading -->
            </div><!--end of page-title-wrapper-->
        </div><!--end of page title-->
        <div class="mbg-3 alert alert-info alert-dismissible fade show" role="alert">
            <span class="pr-2">
                <i class="fa fa-question-circle"></i>
            </span>
            This dashboard example was created using only the available elements and components, no additional SCSS was written!
        </div>


        <!--search bar-->
        <div class="app-inner-layout__top-pane">
            <div class="pane-right">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-search fa-w-16 "></i>
                        </div>
                    </div>
                    <input placeholder="Search..." type="text" class="form-control"></div>
            </div>
        </div>
        <!--end of search bar-->
        <br>
        @if(@$seriesData && count(@$seriesData)>0)
        <div class="row">
            @foreach($seriesData AS $key=>$value)
            <div class="col-md-3">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <img src="https://cdn.pixabay.com/photo/2017/01/31/13/39/icon-2024124_960_720.png" style="height: 40px;">

                                            <div class="widget-heading">{{$value->title}}</div>
                                            <div class="widget-subheading">115 Total Test |<font style="color:green;"> 2 Test </font></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li><br>
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-subheading">41 Full Test - Prelims</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-subheading">53 Topic Pack</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-subheading">People Interested</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-subheading">11 Previous Paper</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-subheading">+10 more tests</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <hr class="new2">
                    <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                        <a href="{{url(Session::get('form_url').'/view')}}"><span class="ladda-label" style="color: #fff;">View Test Series</span></a>
                        <span class="ladda-spinner"></span>
                    </button>
                    <button class="mb-2 mr-2 btn-icon btn-icon-only btn-shadow btn-dashed btn btn-outline-info">
                        <i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="mbg-3 alert alert-danger alert-dismissible fade show " role="alert">
            <span class="pr-2">
                <i class="fa fa-question-circle"></i>
            </span>
            No Test series For this category.....!!
        </div>
        @endif

    </div><!--end of main inner-->
</div>