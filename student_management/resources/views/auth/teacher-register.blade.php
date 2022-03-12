<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from seantheme.com/hud/page_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Feb 2022 10:00:59 GMT -->
    <head>
        <meta charset="utf-8" />
        <title>HUD | Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <link href="assets/css/vendor.min.css" rel="stylesheet" />
        <link href="assets/css/app.min.css" rel="stylesheet" />
    </head>
    <body class="pace-top">
        <div id="app" class="app app-full-height app-without-header">
            <div class="register">
                <div class="register-content">
                    <form action="{{ url('StoreTeacher') }}" method="POST">
                        @csrf
                        <h1 class="text-center">Sign Up</h1>
                        <p class="text-white text-opacity-50 text-center">One Admin ID is all you need to access all the Admin services.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Teacher Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control form-control-lg bg-white bg-opacity-5" placeholder="e.g Teacher Name" value="" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Teacher Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control form-control-lg bg-white bg-opacity-5" placeholder="username@address.com" value="" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Teacher Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control form-control-lg bg-white bg-opacity-5" placeholder="Enter Teacher Phone No" value="" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Teacher Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control form-control-lg bg-white bg-opacity-5" placeholder="Enter Teacher Password" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control form-control-lg bg-white bg-opacity-5" placeholder="Confirm Teacher Password" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Teacher ID <span class="text-danger">*</span></label>
                                    <input type="text" name="roll" class="form-control form-control-lg bg-white bg-opacity-5" placeholder="Enter Teacher ID No" />
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Teacher Registrarion <span class="text-danger">*</span></label>
                                    <input type="text" name="registration" class="form-control form-control-lg bg-white bg-opacity-5" placeholder="Enter Teacher Registration" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Job Joining Date <span class="text-danger">*</span></label>
                                    <input type="text" name="session" class="form-control form-control-lg bg-white bg-opacity-5" placeholder="Enter Teacher Joining Date" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Teacher Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control form-control-lg bg-white bg-opacity-5" placeholder="Enter Teacher Address" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Shift <span class="text-danger">*</span></label>
                                    <select name="shift" class="form-select form-select-lg bg-white bg-opacity-5">
                                        <option value="0">Day</option>
                                        <option value="1">Night</option>
                                    </select>
                                </div>
                                {{-- <div class="mb-3">
                                    <label class="form-label">Country <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-lg bg-white bg-opacity-5">
                                        <option>United States</option>
                                    </select>
                                </div> --}}
                                <div class="mb-3">
                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" class="form-select form-select-lg bg-white bg-opacity-5">
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>
                                {{-- <div class="mb-3">
                                    <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                    <div class="row gx-2">
                                        <div class="col-6">
                                            <select class="form-select form-select-lg bg-white bg-opacity-5">
                                                <option>Month</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-select form-select-lg bg-white bg-opacity-5">
                                                <option>Day</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-select form-select-lg bg-white bg-opacity-5">
                                                <option>Year</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="customCheck1"  name="agree_tos"/>
                                <label class="form-check-label" for="customCheck1">I have read and agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-outline-theme btn-lg d-block w-100" value="Sign Up">
                        </div>
                        <div class="text-white text-opacity-50 text-center">Already have an Admin ID? <a href="{{ url ('login') }}">Sign In</a></div>
                    </form>
                </div>
            </div>

            <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        </div>

        <script src="assets/js/vendor.min.js" type="8f9018789dcc4c8c1ccf9336-text/javascript"></script>
        <script src="assets/js/app.min.js" type="8f9018789dcc4c8c1ccf9336-text/javascript"></script>

        <script type="8f9018789dcc4c8c1ccf9336-text/javascript">
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-53034621-1', 'auto');
            ga('send', 'pageview');
        </script>
        <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="8f9018789dcc4c8c1ccf9336-|49" defer=""></script>
        <script
            defer
            src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
            integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
            data-cf-beacon='{"rayId":"6e0f1d59fbb52ec8","version":"2021.12.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":100}'
            crossorigin="anonymous"
        ></script>
    </body>

    <!-- Mirrored from seantheme.com/hud/page_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Feb 2022 10:00:59 GMT -->
</html>
