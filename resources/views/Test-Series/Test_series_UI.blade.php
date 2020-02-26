<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Test UI</title>
    <style>
        .outer-container{
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgb(61, 61, 61);
            z-index:+9999;
        }
        .inner-container{
            position: relative;
            height: 100%;
            width: 100%;
            background: rgb(228, 228, 228);
        }

        .ui-header{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 70px;
            background: rgb(219, 219, 219);
        }
        .ui-header img{
            height: 70px;
            padding: 10px 0;
            display: inline-block;
        }
        .ui-footer{
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 70px;
            background: rgb(207, 207, 207);
            padding: 15px;
        }
        .outer-ui-content{
            position: absolute;
            top: 70px;
            height: calc(100% - 140px);
            width: 100%;
            background: rgb(255, 255, 255);
        }
        .inner-ui-content{
            position: relative;
            width: 100%;
            height: 100%;
        }
        .ui-sidebar{
            float: right;
            width: 500px;
            height: 100%;
            overflow: auto;
            background: white;
            padding: 15px;
        }
        .inner-cover-ui-content{
            float: left;
            width: calc(100% - 500px);
            height: 100%;
            overflow: auto;
            background:rgb(199, 255, 222);
        }
        .ui-content-navigation{
            background:rgb(165, 165, 165);
            padding: 15px;
        }
        .ui-content{
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="outer-container">
        <div class="inner-container">

            <!-- header starts -->
            <div class="ui-header">
                <img src="https://cdn4.iconfinder.com/data/icons/social-media-logos-6/512/49-pepsi-512.png">&nbsp;&nbsp;<b>LMS Test Series</b>
            </div>
            <!-- header ends -->

            <div class="outer-ui-content"> <!-- contents absolute -->
                <div class="inner-ui-content"> <!-- contents relative -->

                    <!--  -->
                    <div class="inner-cover-ui-content">
                        <!-- navigation starts -->
                        <div class="ui-content-navigation">
                            <div class="row">
                                <div class="col-12">
                                    <h4>Navigation</h4>
                                </div>
                            </div>
                        </div>
                        <!-- navigation ends -->

                        <!-- question/contents starts -->
                        <div class="ui-content">
                            <div class="row">
                                <div class="col-12">
                                    <h1>Actual Content</h1>
                                </div>
                            </div>
                        </div>
                        <!-- question/contents ends -->
                    </div>
                    <!--  -->


                    <!-- sidebar starts -->
                    <div class="ui-sidebar">
                        <div class="row">
                            <div class="col-12">
                                <h4>Sidebar</h4>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar starts -->

                </div> <!-- contents absolute -->
            </div> <!-- contents relative -->

            <!-- footer starts -->
            <div class="ui-footer">
                <div class="row">
                    <div class="col-12">
                        <h4>Footer</h4>
                    </div>
                </div>
            </div>
            <!-- footer ends -->

        </div>
    </div>
</body>
</html>