<li class="app-sidebar__heading">Menu</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-rocket"></i> Dashboards
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li><a href="{{url(Session::get('redirect_url').'/superadmin')}}"><i class="metismenu-icon"></i>Superadmin</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/dashboard')}}"><i class="metismenu-icon"></i>LMS Dashboard</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/company')}}"> <i class="metismenu-icon pe-7s-id"></i>Company</a></li>
    </ul>
</li>
<li class="app-sidebar__heading">Instructor Detail</li>
<li><a href="{{url(Session::get('redirect_url').'/company/instructor/dashboard')}}"> <i class="metismenu-icon pe-7s-id"></i>Instructor Dashboard</a></li>
<li><a href="{{url(Session::get('redirect_url').'/company/instructor')}}"><i class="metismenu-icon pe-7s-way"></i>Instructor</a></li>
<li><a href="#"><i class="metismenu-icon pe-7s-diamond"></i>Manage Course<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>
        <li><a href="{{url(Session::get('redirect_url').'/company/instructor/manage/course')}}"><i class="metismenu-icon"></i>Training Material</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/company/instructor/manage/learning_plan')}}"><i class="metismenu-icon"></i>New Learning Plan</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/company/instructor/manage/course_catelog')}}"><i class="metismenu-icon"></i>Course Catelogue</a></li>                          
    </ul>
</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-car"></i> Learning Object
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li><a href="{{url(Session::get('redirect_url').'/company/instructor/learning-object/reference-material')}}"><i class="metismenu-icon"></i>Manage Course Management</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/company/instructor/learning-object/manage-video')}}"><i class="metismenu-icon"></i>Manage Video</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/company/instructor/learning-object/manage-mcq')}}"><i class="metismenu-icon"></i>Manage MCQ</a></li>
    </ul>
</li>

<li><a href="{{url(Session::get('redirect_url').'/company/instructor/quizz')}}"><i class="metismenu-icon pe-7s-way"></i>Quizz</a></li>
<li><a href="{{url(Session::get('redirect_url').'/company/instructor/course-report')}}"><i class="metismenu-icon pe-7s-way"></i>Course Report</a></li>
<li><a href="{{url(Session::get('redirect_url').'/company/instructor/create-certificate')}}"><i class="metismenu-icon pe-7s-way"></i>Certificate</a></li>



<li class="app-sidebar__heading">Learner Detail</li>
<li><a href="{{url(Session::get('redirect_url').'/company/learner/dashboard')}}"><i class="metismenu-icon pe-7s-graph"></i>Learner Dashboard</a></li>
<li><a href="{{url(Session::get('redirect_url').'/company/learner')}}"><i class="metismenu-icon pe-7s-way"></i>Learner</a></li>
<li><a href="{{url(Session::get('redirect_url').'/company/learner/catalog')}}"><i class="metismenu-icon pe-7s-way"></i>Course Catalog</a></li>
<li><a href="{{url(Session::get('redirect_url').'/company/learner/series')}}"><i class="metismenu-icon pe-7s-ball"></i>Test Series</a></li>
<li><a href="{{url(Session::get('redirect_url').'/company/learner/quizz')}}"><i class="metismenu-icon pe-7s-id"></i>Quizz</a></li>
<li><a href="{{url(Session::get('redirect_url').'/company/learner/report-detail')}}"><i class="metismenu-icon pe-7s-graph"></i>Reports Details</a></li>




<li class="app-sidebar__heading">Setting</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-light"></i> Power User
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li><a href="{{url(Session::get('redirect_url').'/company/setting/power-user/privacy-policy')}}"> <i class="metismenu-icon"></i>Privacy Policy</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/company/setting/power-user/terms-condition')}}"><i class="metismenu-icon"></i>Terms & Condition</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/company/setting/power-user/cookie-policy')}}"><i class="metismenu-icon"></i>Cookie Policy</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/company/setting/power-user/advance-setting')}}"><i class="metismenu-icon"></i>Advance Setting</a></li>
    </ul>
</li>
