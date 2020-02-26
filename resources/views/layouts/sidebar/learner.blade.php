<li class="app-sidebar__heading">Menu</li>
<li><a href="{{url(Session::get('redirect_url').'/dashboard')}}"> <i class="metismenu-icon pe-7s-id"></i>Dashboards</a></li>

<li class="app-sidebar__heading">Learner Detail</li>
<li><a href="{{url(Session::get('redirect_url').'/dashboard')}}"><i class="metismenu-icon pe-7s-graph"></i>Learner Dashboard</a></li>
<li><a href="{{url(Session::get('redirect_url').'/catalog')}}"><i class="metismenu-icon pe-7s-way"></i>Course Catalog</a></li>
<li><a href="{{url(Session::get('redirect_url').'/series')}}"><i class="metismenu-icon pe-7s-ball"></i>Test Series</a></li>
<li><a href="{{url(Session::get('redirect_url').'/quizz')}}"><i class="metismenu-icon pe-7s-id"></i>Quizz</a></li>
<li><a href="{{url(Session::get('redirect_url').'/report-detail')}}"><i class="metismenu-icon pe-7s-graph"></i>Reports Details</a></li>




<li class="app-sidebar__heading">Setting</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-light"></i> Power User
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li><a href="{{url(Session::get('redirect_url').'/setting/power-user/privacy-policy')}}"> <i class="metismenu-icon"></i>Privacy Policy</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/setting/power-user/terms-condition')}}"><i class="metismenu-icon"></i>Terms & Condition</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/setting/power-user/cookie-policy')}}"><i class="metismenu-icon"></i>Cookie Policy</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/setting/power-user/advance-setting')}}"><i class="metismenu-icon"></i>Advance Setting</a></li>
    </ul>
</li>


<!-- <li class="app-sidebar__heading">Charts</li>
<li>
    <a href="charts-chartjs.html">
        <i class="metismenu-icon pe-7s-graph2">
                            </i>ChartJS
    </a>
</li>
<li>
    <a href="charts-apexcharts.html">
        <i class="metismenu-icon pe-7s-graph">
                            </i>Apex Charts
    </a>
</li>
<li>
    <a href="charts-sparklines.html">
        <i class="metismenu-icon pe-7s-graph1">
                            </i>Chart Sparklines
    </a>
</li> -->