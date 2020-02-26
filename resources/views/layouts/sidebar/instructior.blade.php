

<li class="app-sidebar__heading">Menu</li>
<li><a href="{{url(Session::get('redirect_url').'/dashboard')}}"> <i class="metismenu-icon pe-7s-id"></i>Dashboards</a></li>

<li class="app-sidebar__heading">Instructor Detail</li>
<li><a href="{{url(Session::get('redirect_url').'/dashboard')}}"> <i class="metismenu-icon pe-7s-id"></i>Instructor Dashboard</a></li>
<li><a href="#"><i class="metismenu-icon pe-7s-diamond"></i>Manage Course<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
    <ul>
        <li><a href="{{url(Session::get('redirect_url').'/manage/course')}}"><i class="metismenu-icon"></i>Training Material</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/manage/learning_plan')}}"><i class="metismenu-icon"></i>New Learning Plan</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/manage/course_catelog')}}"><i class="metismenu-icon"></i>Course Catelogue</a></li>                          
    </ul>
</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-car"></i> Learning Object
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li><a href="{{url(Session::get('redirect_url').'/learning-object/reference-material')}}"><i class="metismenu-icon"></i>Manage Course Management</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/learning-object/manage-video')}}"><i class="metismenu-icon"></i>Manage Video</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/learning-object/manage-mcq')}}"><i class="metismenu-icon"></i>Manage MCQ</a></li>
    </ul>
</li>

<li><a href="{{url(Session::get('redirect_url').'/quizz')}}"><i class="metismenu-icon pe-7s-way"></i>Quizz</a></li>
<li><a href="{{url(Session::get('redirect_url').'/test-series')}}"><i class="metismenu-icon pe-7s-id"></i>Test Series</a></li>
<li><a href="{{url(Session::get('redirect_url').'/course-report')}}"><i class="metismenu-icon pe-7s-way"></i>Course Report</a></li>
<li><a href="{{url(Session::get('redirect_url').'/create-certificate')}}"><i class="metismenu-icon pe-7s-way"></i>Certificate</a></li>



<li class="app-sidebar__heading">Learner Detail</li>
<li><a href="{{url(Session::get('redirect_url').'/learner/dashboard')}}"><i class="metismenu-icon pe-7s-graph"></i>Learner Dashboard</a></li>
<li><a href="{{url(Session::get('redirect_url').'/learner')}}"> <i class="metismenu-icon pe-7s-id"></i>learner</a></li>
<li><a href="{{url(Session::get('redirect_url').'/learner/catalog')}}"><i class="metismenu-icon pe-7s-way"></i>Course Catalog</a></li>
<li><a href="{{url(Session::get('redirect_url').'/learner/series')}}"><i class="metismenu-icon pe-7s-ball"></i>Test Series</a></li>
<li><a href="{{url(Session::get('redirect_url').'/learner/quizz')}}"><i class="metismenu-icon pe-7s-id"></i>Quizz</a></li>
<li><a href="{{url(Session::get('redirect_url').'/learner/report-detail')}}"><i class="metismenu-icon pe-7s-graph"></i>Reports Details</a></li>




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
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-light"></i> Tool & Master
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li><a href="{{url(Session::get('redirect_url').'/setting/tool-master/course-category')}}"> <i class="metismenu-icon"></i>Course Category</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/setting/tool-master/test-series-category')}}"> <i class="metismenu-icon"></i>Test Series  Category</a></li>
<!--        <li><a href="{{url(Session::get('redirect_url').'/setting/tool-master/course-code')}}"> <i class="metismenu-icon"></i>Course Code</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/setting/tool-master/plan-code')}}"> <i class="metismenu-icon"></i>Plan Code</a></li>-->
        <li><a href="{{url(Session::get('redirect_url').'/setting/tool-master/course-catalogue')}}"> <i class="metismenu-icon"></i>Course Catalogue</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/setting/tool-master/certificate')}}"> <i class="metismenu-icon"></i>Certificate</a></li>
    </ul>
</li>

