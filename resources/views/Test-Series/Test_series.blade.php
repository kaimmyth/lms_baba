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
                        <div class="page-title-subheading">This is test series of where user give their test.
                        </div>
                    </div>
                </div><!--end of page-title-heading -->
            </div><!--end of page-title-wrapper-->
        </div><!--end of page title-->

        <div class="row">
            <div class="col-md-12">
                <h4 style="text-align: center; font-weight: 600;">Everything You Need For Your Exam Preparation</h4>
                <p style="text-align: center;">Online Courses, Practice Question Bank, Mock Test Series, Study Notes, Strategy & Preparation Plans, Guidance & Mentoring and more...</p>
            </div><!--end of col md 12--> 
        </div>
        <hr class="new2">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-hover-shadow-2x mb-3 card">
                    <div class="rm-border responsive-center text-left card-header">
                        <div><h5 class="menu-header-title text-capitalize text-purple">Best Online Courses by Top Teachers</h5></div>
                    </div>
                    <div class="widget-chart widget-chart2 text-left pt-0">
                        <div class="widget-chat-wrapper-outer">
                            <div class="widget-chart-content">
                                <div class="widget-chart-flex">
                                    <div class="widget-numbers">
                                        <div class="widget-chart-flex">
                                            <div class="text-success"><span>348</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-hover-shadow-2x mb-3 card">
                    <div class="rm-border responsive-center text-left card-header">
                        <div><h5 class="menu-header-title text-capitalize text-danger">Sent Messages</h5></div>
                    </div>
                    <div class="widget-chart widget-chart2 text-left pt-0">
                        <div class="widget-chat-wrapper-outer">
                            <div class="widget-chart-content">
                                <div class="widget-chart-flex">
                                    <div class="widget-numbers">
                                        <div class="widget-chart-flex">
                                            <div class="text-danger"><span>425</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <h6 style="text-align:left; font-weight: 600; color: #000;">Upcoming and Popular Exams </h6>
            <hr class="new2">
        </div><!--end of col md 12-->
        <div class="container">
            <div class="row">
                @if(@$testSeriesCategory)
                @foreach($testSeriesCategory AS $key=>$value)
                <div class="col-md-3">
                    <div class="card mb-3 widget-chart card-hover-shadow-2x">
                        <div class="icon-wrapper border-light rounded">
                            <div class="icon-wrapper-bg bg-light"></div>
                            <i class="lnr-cog icon-gradient bg-night-fade"></i></div>
                        <div class="widget-numbers"> 
                            <form method="POST" action="{{url(Session::get('form_url').'/detail')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$value->id}}" /> 
                                <button type="submit" class="bg-white border-0">{{$value->title}}</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div> 


    </div><!--end of main inner-->
</div>