<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
// exit;
Route::get('clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    Session::flash('success', 'All Clear');
    echo "DONE";
});

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('{user}')->group(function() {


    /* ---------Start Route For Super Admin Access -------- */
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'DashboardController@Admin');
        Route::prefix('company')->group(function() {
            Route::get('/dashboard', 'CompanyController@Dashboard');
            Route::get('/', 'CompanyController@Home');
            Route::post('/add', 'CompanyController@AddCompany');

            Route::prefix('setting')->group(function() {
                Route::prefix('power-user')->group(function() {

                    Route::get('/privacy-policy', 'SettingController@PrivacyPolicy');
                    Route::get('/terms-condition', 'SettingController@TermCondition');
                    Route::get('/cookie-policy', 'SettingController@CookiePolicy');
                    Route::get('/advance-setting', 'SettingController@AdvanceSetting');
                });
            });
        });
    });
    /* ----------------End Super Admin Route----------------- */

    /* ---------Start Route For Company Access -------- */
    Route::prefix('company')->group(function() {
        Route::get('/dashboard', 'CompanyController@Dashboard');
        Route::get('/', 'CompanyController@Home');
        Route::post('/add', 'CompanyController@AddCompany');

        /* ---------Start Route For Company Instructor Access -------- */
        Route::prefix('instructor')->group(function() {
            Route::get('/', 'InstructorController@Home');
            Route::post('/add', 'InstructorController@AddInstructor');
            Route::get('/dashboard', 'DashboardController@InstructorDashboard');

            /* ---------Start Route For Company Instructor Manage Course Access -------- */
            Route::prefix('manage')->group(function() {
                /* ---------Start Route For Company Instructor Course Access -------- */
                Route::prefix('course')->group(function () {
                    Route::get('/', 'CourseController@Course');
                    Route::post('/add', 'CourseController@AddCourse');
                    Route::get('/delete/{id}', 'CourseController@DeleteCourse');
                });
                /* ----------------End Company Instructor Course Route----------------- */

                /* ---------Start Route For Company Instructor Learning Plan Access -------- */
                Route::prefix('learning_plan')->group(function() {
                    Route::get('/', 'PlanController@LearingPlan');
                    Route::post('/add', 'PlanController@AddLearingPlan');
                    Route::get('/delete/{id}', 'PlanController@DeletePlan');
                });
                /* ----------------End Company Instructor Learning Plan Route----------------- */

                /* ---------Start Route For Company Instructor Course Catalog Access -------- */
                Route::prefix('course_catelog')->group(function() {
                    Route::get('/', 'CourseController@Catelog');
                    Route::post('/add', 'CourseController@AddCourseCatalog');
                });
                /* ----------------End Company Instructor Course Catalog Route----------------- */
            });
            /* ----------------End Company Instructor Manage Course Route----------------- */

            /* ---------Start Route For Company Instructor Learning Object Access -------- */
            Route::prefix('learning-object')->group(function() {
                /* ---------Start Route For Company Instructor Learning Object Material Access -------- */
                Route::prefix('reference-material')->group(function () {
                    Route::get('/', 'LearningController@ReferenceMaterial');
                    Route::post('/update', 'CourseController@UpdateProperties');
                    Route::post('/updatePropertiesDetail', 'CourseController@updatePropertiesDetail');
                    Route::post('/updateCatalogue', 'CourseController@updateCatalogue');
                    Route::post('/updateTimeOption', 'CourseController@updateTimeOption');
                    Route::post('/updateCertificateTemplate', 'CourseController@updateCertificateTemplate');
                });
                /* ----------------End Company Instructor Learning Object Material Route----------------- */

                /* ---------Start Route For Company Instructor Manage Course Videos Access -------- */
                Route::prefix('manage-video')->group(function () {
                    Route::get('/', 'VideoController@Video');
                    Route::post('/add', 'VideoController@Add');
                });
                /* ----------------End Company Instructor Manage Course Videos Route----------------- */

                /* ---------Start Route For Company Instructor Manage Course Questions  Access -------- */
                Route::prefix('manage-mcq')->group(function() {
                    Route::get('/', 'LearningController@Mcq');

                    /* ----Abhishek Anand----- */
                    Route::get('/set_mcq_question', 'LearningController@SetMcqQuestion');
                    Route::post('/add', 'LearningController@Add_mcq');
                    Route::post('/BulkUploadQuestion', 'LearningController@BulkUploadQuestion');
                    Route::get('/delete_mcq/{id}', 'LearningController@delete_mcq');
                    Route::get('/active_deactive_mcq/{id}', 'LearningController@active_deactive_mcq');
                    Route::get('/changeStatus', 'LearningController@changeStatus');
                    Route::get('/edit_mcq/{mcq_id}', 'LearningController@edit_mcq');
                    Route::get('/set_mcq_question', 'LearningController@SetMcqQuestion');
                    Route::get('/fetch_mcq_question/{id}', 'LearningController@fetch_mcq_question');
                    /* ------End Anand Route------ */
                });
                /* ----------------End Company Instructor Manage Course Questions  Route----------------- */
            });
            /* ----------------End Company Instructor Learning Object Route----------------- */

            /* ---------Start Route For Company Instructor Quizz Access -------- */
            Route::prefix('quizz')->group(function () {
                Route::get('/', 'QuizzController@Quizz');
                Route::post('/add', 'QuizzController@add');
                Route::get('/delete/{id}', 'QuizzController@deleteQuizz');
            });
            /* ----------------End Company Instructor Quizz Route----------------- */


            /* ---------Start Route For Company Instructor Test Series Access -------- */
            Route::prefix('test-series')->group(function () {
                Route::get('/', 'TestSeriesController@index');
                Route::get('/fetch_details/{id}', 'TestSeriesController@fetch_details');
                Route::post('/add', 'TestSeriesController@store');
                Route::get('/delete/{id}', 'TestSeriesController@delete');
            });
            /* ----------------End Company Instructor Test Series  Route----------------- */

            /* ---------Start Route For Company Instructor Course Report Access -------- */
            Route::get('/course-report', 'ReportController@CourseReport');
            /* ----------------End Instructor Course Report Route----------------- */

            /* ---------Start Route For Company Instructor Create Certificate Access -------- */
            Route::get('/create-certificate', 'CertificateController@CreateCertificate');
            /* ----------------End Company Instructor Create Certificate Route----------------- */
        });
        /* ----------------End Company Instructor Route----------------- */

        /* ---------Start Route For Company Learner Access -------- */
        Route::prefix('learner')->group(function() {
            Route::get('/', 'LearnerController@Home');
            Route::post('/add', 'LearnerController@AddLearner1');
            Route::get('/dashboard', 'DashboardController@LearnerDashboard');

            /* ---------Start Route For Company Learner Catalog Access -------- */
            Route::prefix('catalog')->group(function () {
                Route::get('/', 'CatelogController@LearnerCatelog');
                Route::post('/filter', 'CatelogController@filter');
            });
            /* ----------------End Company Learner Catalog Route----------------- */

            /* ---------Start Route For Company Learner Series Access -------- */
            Route::prefix('series')->group(function () {
                Route::get('/', 'TestSeriesCategoryController@TestSeriesCategory');
                Route::prefix('detail')->group(function () {
                    Route::post('/', 'TestSeriesController@TestSeries');
                    Route::get('/view', 'TestSeriesController@view');
                });
            });
            /* ----------------End Company Learner Series Route----------------- */

            /* ---------Start Route For Company Learner Quizz Access -------- */
            Route::prefix('/quizz')->group(function () {
                Route::get('/', 'QuizzController@LearnerQuizz');
                Route::get('/start', 'QuizzController@start');
            });
            /* ----------------End Company Learner Quizz Route----------------- */

            /* ---------Start Route For Instructor Learner Report Details Access -------- */
            Route::get('/report-detail', 'ReportController@CourseReport');
            /* ----------------End Company Learner Report Details Route----------------- */
        });
        /* ----------------End Company Learner Route----------------- */

        /* ---------Start Route For Company Setting Access -------- */
        Route::prefix('setting')->group(function() {
            /* ---------Start Route For Company Setting User Pawor Access -------- */
            Route::prefix('power-user')->group(function() {
                Route::get('/privacy-policy', 'SettingController@PrivacyPolicy');
                Route::get('/terms-condition', 'SettingController@TermCondition');
                Route::get('/cookie-policy', 'SettingController@CookiePolicy');
                Route::get('/advance-setting', 'SettingController@AdvanceSetting');
            });
            /* ----------------End Company Setting User Pawor Route----------------- */

            /* ---------Start Route For Company Setting Tool & Master Access -------- */
            Route::prefix('tool-master')->group(function () {

                /* ---------Start Route For Company Setting Tool & Master Course Category Access -------- */
                Route::prefix('course-category')->group(function () {
                    Route::get('/', 'CategoryController@CourseCategory');
                    Route::post('add', 'CategoryController@CreateCourseCategory');
                });
                /* ----------------End Company Setting Tool & Master Course Category Route----------------- */

                /* ---------Start Route For Company Setting Tool & Master Test Series Category Access -------- */
                Route::prefix('test-series-category')->group(function () {
                    Route::get('/', 'TestSeriesCategoryController@index');
                    Route::post('add', 'TestSeriesCategoryController@store');
                    Route::get('delete/{id}', 'TestSeriesCategoryController@delete');
                });
                /* ----------------End Company Company Tool & Master Test Series Category Route----------------- */

                /* ---------Start Route For Company Setting Tool & Master Course Code Access -------- */
                Route::prefix('course-code')->group(function () {
                    Route::get('/', 'CourseCodeController@Code');
                    Route::post('add', 'CourseCodeController@Add');
                });
                /* ----------------End Company Setting Tool & Master Course Code  Route----------------- */

                /* ---------Start Route For Company Setting Tool & Master Plan Code Access -------- */
                Route::prefix('plan-code')->group(function () {
                    Route::get('/', 'PlanController@Code');
                    Route::post('/add', 'PlanController@AddCode');
                });
                /* ----------------End Company Tool & Master Plan Code Route----------------- */

                /* ---------Start Route For Company Setting Tool & Master Course Catalog Access -------- */
                Route::prefix('course-catalogue')->group(function () {
                    Route::get('/', 'CatalogueController@Catalogue');
                    Route::post('/add', 'CatalogueController@Add');
                });
                /* ----------------End Company Setting Tool & Master Course Catalog Route----------------- */

                /* ---------Start Route For Company Tool & Master Certificate Access -------- */
                Route::prefix('certificate')->group(function () {
                    Route::get('/', 'CertificateController@Certificate');
                    Route::post('/add', 'CertificateController@addCertificate');
                    Route::get('/delete/{id}', 'CertificateController@deleteCertificate');
                });
                /* ----------------End Company Setting Tool & Master Certificate Route----------------- */
            });
            /* ----------------End Company Tool & Master Route----------------- */
        });
        /* ----------------End Company Setting Route----------------- */
    });
    /* ----------------End Company Route----------------- */

    /* ---------Start Route For Instructor Access -------- */
    Route::prefix('instructor')->group(function() {
        Route::get('/dashboard', 'DashboardController@InstructorDashboard');

        /* ---------Start Route For Instructor Manage Course Access -------- */
        Route::prefix('manage')->group(function() {
            /* ---------Start Route For Instructor Course Access -------- */
            Route::prefix('course')->group(function () {
                Route::get('/', 'CourseController@Course');
                Route::post('/add', 'CourseController@AddCourse');
                Route::get('/delete/{id}', 'CourseController@DeleteCourse');
            });
            /* ----------------End Instructor Course Route----------------- */

            /* ---------Start Route For Instructor Learning Plan Access -------- */
            Route::prefix('learning_plan')->group(function() {
                Route::get('/', 'PlanController@LearingPlan');
                Route::post('/add', 'PlanController@AddLearingPlan');
                Route::get('/delete/{id}', 'PlanController@DeletePlan');
            });
            /* ----------------End Instructor Learning Plan Route----------------- */

            /* ---------Start Route For Instructor Course Catalog Access -------- */
            Route::prefix('course_catelog')->group(function() {
                Route::get('/', 'CourseController@Catelog');
                Route::post('/add', 'CourseController@AddCourseCatalog');
            });
            /* ----------------End Instructor Course Catalog Route----------------- */
        });
        /* ----------------End Instructor Manage Course Route----------------- */

        /* ---------Start Route For Instructor Learning Object Access -------- */
        Route::prefix('learning-object')->group(function() {
            /* ---------Start Route For Instructor Learning Object Material Access -------- */
            Route::prefix('reference-material')->group(function () {
                Route::get('/', 'LearningController@ReferenceMaterial');
                Route::post('/update', 'CourseController@UpdateProperties');
                Route::post('/updatePropertiesDetail', 'CourseController@updatePropertiesDetail');
                Route::post('/updateCatalogue', 'CourseController@updateCatalogue');
                Route::post('/updateTimeOption', 'CourseController@updateTimeOption');
                Route::post('/updateCertificateTemplate', 'CourseController@updateCertificateTemplate');
            });
            /* ----------------End Instructor Learning Object Material Route----------------- */

            /* ---------Start Route For Instructor Manage Course Videos Access -------- */
            Route::prefix('manage-video')->group(function () {
                Route::get('/', 'VideoController@Video');
                Route::post('/add', 'VideoController@Add');
            });
            /* ----------------End Instructor Manage Course Videos Route----------------- */

            /* ---------Start Route For Instructor Manage Course Questions  Access -------- */
            Route::prefix('manage-mcq')->group(function() {
                Route::get('/', 'LearningController@Mcq');

                /* ----Abhishek Anand----- */
                Route::get('/set_mcq_question', 'LearningController@SetMcqQuestion');
                Route::post('/add', 'LearningController@Add_mcq');
                Route::post('/BulkUploadQuestion', 'LearningController@BulkUploadQuestion');
                Route::get('/delete_mcq/{id}', 'LearningController@delete_mcq');
                Route::get('/active_deactive_mcq/{id}', 'LearningController@active_deactive_mcq');
                Route::get('/changeStatus', 'LearningController@changeStatus');
                Route::get('/edit_mcq/{mcq_id}', 'LearningController@edit_mcq');
                Route::get('/set_mcq_question', 'LearningController@SetMcqQuestion');
                Route::get('/fetch_mcq_question/{id}', 'LearningController@fetch_mcq_question');
                /* ------End Anand Route------ */
            });
            /* ----------------End Instructor Manage Course Questions  Route----------------- */
        });
        /* ----------------End Instructor Learning Object Route----------------- */

        /* ---------Start Route For Instructor Quizz Access -------- */
        Route::prefix('quizz')->group(function () {
            Route::get('/', 'QuizzController@Quizz');
            Route::get('/show/{id}', 'QuizzController@show');
            Route::get('/edit_show/{id}', 'QuizzController@edit_show');
            Route::post('/add', 'QuizzController@add');
            Route::get('/delete/{id}', 'QuizzController@deleteQuizz');
        });
        /* ----------------End Instructor Quizz Route----------------- */


        /* ---------Start Route For Instructor Test Series Access -------- */
        Route::prefix('test-series')->group(function () {
            Route::get('/', 'TestSeriesController@index');
            Route::get('/fetch_details/{id}', 'TestSeriesController@fetch_details');
            Route::post('/add', 'TestSeriesController@store');
            Route::get('/delete/{id}', 'TestSeriesController@delete');
        });
        /* ----------------End Instructor Test Series  Route----------------- */

        /* ---------Start Route For Instructor Course Report Access -------- */
        Route::get('/course-report', 'ReportController@CourseReport');
        /* ----------------End Instructor Course Report Route----------------- */

        /* ---------Start Route For Instructor Create Certificate Access -------- */
        Route::get('/create-certificate', 'CertificateController@CreateCertificate');
        /* ----------------End Instructor Create Certificate Route----------------- */

        /* ---------Start Route For Instructor Learner Access -------- */
        Route::prefix('learner')->group(function() {
            Route::get('/', 'LearnerController@Home');
            Route::post('/add', 'LearnerController@AddLearner1');
            Route::get('/dashboard', 'DashboardController@LearnerDashboard');

            /* ---------Start Route For Instructor Learner Catalog Access -------- */
            Route::prefix('catalog')->group(function () {
                Route::get('/', 'CatelogController@LearnerCatelog');
                Route::post('/filter', 'CatelogController@filter');
            });
            /* ----------------End Instructor Learner Catalog Route----------------- */

            /* ---------Start Route For Instructor Learner Series Access -------- */
            Route::prefix('series')->group(function () {
                Route::get('/', 'TestSeriesCategoryController@TestSeriesCategory');
                Route::prefix('detail')->group(function () {
                    Route::post('/', 'TestSeriesController@TestSeries');
                    Route::get('/view', 'TestSeriesController@view');
                });
            });
            /* ----------------End Instructor Learner Series Route----------------- */

            /* ---------Start Route For Instructor Learner Quizz Access -------- */
            Route::prefix('/quizz')->group(function () {
                Route::get('/', 'QuizzController@LearnerQuizz');
                Route::get('/start', 'QuizzController@start');
            });
            /* ----------------End Instructor Learner Quizz Route----------------- */

            /* ---------Start Route For Instructor Learner Report Details Access -------- */
            Route::get('/report-detail', 'ReportController@CourseReport');
            /* ----------------End Instructor Learner Report Details Route----------------- */
        });
        /* ----------------End Instructor Learner Route----------------- */

        /* ---------Start Route For Instructor Setting Access -------- */
        Route::prefix('setting')->group(function() {
            /* ---------Start Route For Instructor Setting User Pawor Access -------- */
            Route::prefix('power-user')->group(function() {
                Route::get('/privacy-policy', 'SettingController@PrivacyPolicy');
                Route::get('/terms-condition', 'SettingController@TermCondition');
                Route::get('/cookie-policy', 'SettingController@CookiePolicy');
                Route::get('/advance-setting', 'SettingController@AdvanceSetting');
            });
            /* ----------------End Instructor Learner User Pawor Route----------------- */

            /* ---------Start Route For Instructor Setting Tool & Master Access -------- */
            Route::prefix('tool-master')->group(function () {

                /* ---------Start Route For Instructor Learner Setting Tool & Master Course Category Access -------- */
                Route::prefix('course-category')->group(function () {
                    Route::get('/', 'CategoryController@CourseCategory');
                    Route::post('add', 'CategoryController@CreateCourseCategory');
                });
                /* ----------------End Instructor Learner Tool & Master Course Category Route----------------- */

                /* ---------Start Route For Instructor Learner Setting Tool & Master Test Series Category Access -------- */
                Route::prefix('test-series-category')->group(function () {
                    Route::get('/', 'TestSeriesCategoryController@index');
                    Route::post('add', 'TestSeriesCategoryController@store');
                    Route::get('delete/{id}', 'TestSeriesCategoryController@delete');
                });
                /* ----------------End Instructor Learner Tool & Master Test Series Category Route----------------- */

                /* ---------Start Route For Instructor Learner Setting Tool & Master Course Code Access -------- */
                Route::prefix('course-code')->group(function () {
                    Route::get('/', 'CourseCodeController@Code');
                    Route::post('add', 'CourseCodeController@Add');
                });
                /* ----------------End Instructor Learner Setting Tool & Master Course Code  Route----------------- */

                /* ---------Start Route For Instructor Learner Setting Tool & Master Plan Code Access -------- */
                Route::prefix('plan-code')->group(function () {
                    Route::get('/', 'PlanController@Code');
                    Route::post('/add', 'PlanController@AddCode');
                });
                /* ----------------End Instructor Learner Setting Tool & Master Plan Code Route----------------- */

                /* ---------Start Route For Instructor Learner Setting Tool & Master Course Catalog Access -------- */
                Route::prefix('course-catalogue')->group(function () {
                    Route::get('/', 'CatalogueController@Catalogue');
                    Route::post('/add', 'CatalogueController@Add');
                });
                /* ----------------End Instructor Learner Setting Tool & Master Course Catalog Route----------------- */

                /* ---------Start Route For Instructor Setting Tool & Master Certificate Access -------- */
                Route::prefix('certificate')->group(function () {
                    Route::get('/', 'CertificateController@Certificate');
                    Route::post('/add', 'CertificateController@addCertificate');
                    Route::get('/delete/{id}', 'CertificateController@deleteCertificate');
                });
                /* ----------------End Instructor Learner Setting Tool & Master Certificate Route----------------- */
            });
            /* ----------------End Instructor Learner Tool & Master Route----------------- */
        });
        /* ----------------End Instructor Setting Route----------------- */
    });
    /* ----------------End Instructor Route----------------- */

    /* ---------Start Route For Learner Access -------- */
    Route::prefix('learner')->group(function() {

        Route::get('/dashboard', 'DashboardController@LearnerDashboard');
        /* ---------Start Route For Learner Catalog Access -------- */
        Route::prefix('catalog')->group(function () {
            Route::get('/', 'CatelogController@LearnerCatelog');
            Route::post('/filter', 'CatelogController@filter');
        });
        /* ----------------End Learner Catalog Route----------------- */

        /* ---------Start Route For Learner Series Access -------- */
        Route::prefix('series')->group(function () {
            Route::get('/', 'TestSeriesCategoryController@TestSeriesCategory');
            Route::prefix('detail')->group(function () {
                Route::post('/', 'TestSeriesController@TestSeries');
                Route::get('/view', 'TestSeriesController@view');
            });
        });
        /* ---------Start Route For Learner Series Access -------- */

        /* ---------Start Route For Learner Quizz Access -------- */
        Route::prefix('/quizz')->group(function () {
            Route::get('/', 'QuizzController@LearnerQuizz');
            Route::get('/start', 'QuizzController@start');
        });
        /* ----------------End Learner Quizz Route----------------- */

        /* ---------Start Route For Learner Report Details Access -------- */
        Route::get('/report-detail', 'ReportController@CourseReport');
        /* ----------------End Learner Report Details Route----------------- */

        /* ---------Start Route For Learner Setting Access -------- */
        Route::prefix('setting')->group(function() {
            /* ---------Start Route For Learner Setting User Pawor Access -------- */
            Route::prefix('power-user')->group(function() {
                Route::get('/privacy-policy', 'SettingController@PrivacyPolicy');
                Route::get('/terms-condition', 'SettingController@TermCondition');
                Route::get('/cookie-policy', 'SettingController@CookiePolicy');
                Route::get('/advance-setting', 'SettingController@AdvanceSetting');
            });
            /* ----------------End Learner User Pawor Route----------------- */
        });
        /* ----------------End Learner Setting Route----------------- */
    });
    /* ----------------End Learner Route----------------- */
});

