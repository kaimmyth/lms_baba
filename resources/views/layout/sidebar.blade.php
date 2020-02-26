<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
						<span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <!-- <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
					<span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div> -->
        <div class="app-header__menu">
            <span>
			<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
				<span class="btn-icon-wrapper">
					<i class="fa fa-ellipsis-v fa-w-6"></i>
				</span>
            </button>
            </span>
        </div>
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading">Menu</li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-rocket"></i> Dashboards
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li><a href="{{url('admin')}}"><i class="metismenu-icon"></i>Superadmin</a></li>
                            <li><a href="{{url('lms_dashboard')}}"><i class="metismenu-icon"></i>LMS Dashboard</a></li>
                        </ul>
                    </li>
                    
                    <li class="app-sidebar__heading">Instructor Detail</li>
                    <li><a href="{{url('Instructor_dashboard')}}"> <i class="metismenu-icon pe-7s-id"></i>Instructor Dashboard</a></li>
                    <li><a href="{{url('/learner')}}"><i class="metismenu-icon pe-7s-way"></i>Laerner</a></li>
                    <li><a href="#"><i class="metismenu-icon pe-7s-diamond"></i>Manage Course<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                        <ul>
                            <li><a href="{{url('courses')}}"><i class="metismenu-icon"></i>Training Material</a></li>
                            <li><a href="{{url('learning_plan')}}"><i class="metismenu-icon"></i>New Learning Plan</a></li>
                            <li><a href="{{url('Course_catelog')}}"><i class="metismenu-icon"></i>Course Catelogue</a></li>                          
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-car"></i> Laerning Object
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li><a href="{{url('Reference_Material')}}"><i class="metismenu-icon"></i>Manage Course Management</a></li>
                            <li><a href="{{url('Manage_video')}}"><i class="metismenu-icon"></i>Manage Video</a></li>
                            <li><a href="{{url('Manage_MCQ')}}"><i class="metismenu-icon"></i>Manage MCQ</a></li>
                        </ul>
                    </li>

                    <li><a href="{{url('Quizz')}}"><i class="metismenu-icon pe-7s-way"></i>Quizz</a></li>
                    <li><a href="{{url('Course_report')}}"><i class="metismenu-icon pe-7s-way"></i>Course Report</a></li>
                    <li><a href="{{url('create_certificate')}}"><i class="metismenu-icon pe-7s-way"></i>Certificate</a></li>
            


                    <li class="app-sidebar__heading">Learner Detail</li>
                    <li><a href="{{url('/leraner-dashboard')}}"><i class="metismenu-icon pe-7s-graph"></i>Learner Dashboard</a></li>
                    <li><a href="{{url('student_catalog')}}"><i class="metismenu-icon pe-7s-way"></i>Course Catalog</a></li>
                    <li><a href="{{url('Test_series')}}"><i class="metismenu-icon pe-7s-ball"></i>Test Series</a></li>
                    <li><a href="{{url('student_quizz')}}"><i class="metismenu-icon pe-7s-id"></i>Quizz</a></li>
                    <li><a href="widgets-profile-boxes.html"><i class="metismenu-icon pe-7s-graph"></i>Reports Details</a></li>




                    <li class="app-sidebar__heading">Setting</li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-light"></i> Power User
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li><a href="forms-controls.html"> <i class="metismenu-icon"></i>Privacy Policy</a></li>
                            <li><a href="forms-layouts.html"><i class="metismenu-icon"></i>Terms & Condition</a></li>
                            <li><a href="forms-validation.html"><i class="metismenu-icon"></i>Cookie Policy</a></li>
                            <li><a href="https://saimiy.docebosaas.com/legacy/admin/index.php%3Fr%3DadvancedSettings/index"><i class="metismenu-icon"></i>Advance Setting</a></li>
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
                </ul>
            </div>
        </div>
    </div>