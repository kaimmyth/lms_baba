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
                    @if(@Auth::user()->users_role==1)
                        @include('layouts.sidebar.admin')
                    @elseif(@Auth::user()->users_role==2)
                        @include('layouts.sidebar.company')
                    @elseif(@Auth::user()->users_role==3)
                        @include('layouts.sidebar.instructior')
                    @elseif(@Auth::user()->users_role==4)
                        @include('layouts.sidebar.learner')
                    @else
                    @endif
                </ul>
            </div>
        </div>
    </div>