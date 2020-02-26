<li class="app-sidebar__heading">Menu</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-rocket"></i> Dashboards
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <!--<li><a href="{{url(Session::get('redirect_url').'/superadmin')}}"><i class="metismenu-icon"></i>Superadmin</a></li>-->
        <li><a href="{{url(Session::get('redirect_url').'/dashboard')}}"><i class="metismenu-icon"></i>LMS Dashboard</a></li>
        <li><a href="{{url(Session::get('redirect_url').'/company')}}"> <i class="metismenu-icon pe-7s-id"></i>Company</a></li>
    </ul>
</li>
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
