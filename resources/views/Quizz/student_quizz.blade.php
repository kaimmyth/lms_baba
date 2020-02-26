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
                    <div>Quizz Section
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                        </div>
                    </div>
                </div><!--end of page-title-heading -->
            </div><!--end of page-title-wrapper-->
        </div><!--end of page title-->
        <div class="row">
            @if(@$quizzList)
            @foreach($quizzList AS $key=>$value)
            <div class="col-md-3" style="margin-bottom:20px;">
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
                                            <div class="widget-subheading">QUESTIONS {{$value->no_of_question}}</div><br>
                                            <div class="widget-subheading">TOTAL TIME {{$value->time_limit}} Min</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                    <hr class="new2">
                    <center>
                        <button class="ladda-button mb-2 mr-2 btn-square btn btn-gradient-info" data-style="expand-right">
                            <a href="{{url(Session::get('form_url').'/start')}}"><span class="ladda-label" style="color: #fff;">START QUIZZ</span></a>
                            <span class="ladda-spinner"></span>
                        </button>
                    </center>

                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div><!--end of main inner-->
</div>