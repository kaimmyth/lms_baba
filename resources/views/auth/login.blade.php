<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Login - Leraning Management system</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
              />
        <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

        <!-- Disable tap highlight on IE -->
        <meta name="msapplication-tap-highlight" content="no">

        <link href="https://demo.dashboardpack.com/architectui-html-pro/main.87c0748b313a1dda75f5.css" rel="stylesheet">
        <!-- Alert -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
        <script src="{{ asset('public/assets/js/calendar.js') }}"></script>
        <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    </head>


    <body>
        <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100">
                    <div class="h-100 no-gutters row">
                        <div class="d-none d-lg-block col-lg-4">
                            <div class="slider-light">
                                <div class="slick-slider">
                                    <div>
                                        <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url('assets/images/originals/city.jpg');"></div>
                                            <div class="slider-content"><h3>Embrace Intelligence Enterprice Learning</h3>
                                                <p>Learning technology elevates the learner experience by producing deeper personalization, while automating menial, time-consuming tasks for learning platform administrators.</p></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url('assets/images/originals/citynights.jpg');"></div>
                                            <div class="slider-content"><h3>Automate Learning Management</h3>
                                                <p>Centralize, manage and organize learning activities, while creating beautiful experiences that employees, customers, and partners will keep coming back to, with Baba Learn LMS.</p></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url('assets/images/originals/citydark.jpg');"></div>
                                            <div class="slider-content"><h3>Get Up & Traning even Faster with Ready-Made Course</h3>
                                                <p>Get instant access to a full library of ready-made courses covering customer service, sales, policy & compliance, IT skills and other essential business must-haves.</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                            <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">

                                <h4 class="mb-0">
                                    <span class="d-block">Welcome back,</span>
                                    <span>Please sign in to your account.</span></h4>
                                <h6 class="mt-3">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6>
                                <div class="divider row"></div>
                                <div>
                                    <form class="" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">Username</label>
                                                    <input name="username" id="exampleEmail" placeholder="Username here..." value="{{ old('email') }}" type="text" class="form-control @error('username') is-invalid @enderror" required="">
                                                    <!--<input name="email" id="exampleEmail" placeholder="Email here..." value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" required="">-->
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="examplePassword" class="">Password</label>
                                                    <input name="password" id="examplePassword" placeholder="Password here..." type="password"   class="form-control @error('password') is-invalid @enderror" required="">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative form-check">
                                            <input name="check" id="exampleCheck" type="checkbox" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                                                   <label for="exampleCheck" class="form-check-label">Keep me logged in</label>
                                        </div>
                                        <div class="divider row"></div>
                                        <div class="d-flex align-items-center">
                                            <div class="ml-auto"><a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>
                                                <button type="submit" class="btn btn-primary btn-lg">
                                                    {{ __('Login to Dashboard') }}
                                                </button>
                                                <!--<a href="{{url('leraner-dashboard')}}"><span class="btn btn-primary btn-lg">Login to Dashboard</span></a>-->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.alert')
        <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-pro/assets/scripts/main.87c0748b313a1dda75f5.js"></script></body>
</html>
