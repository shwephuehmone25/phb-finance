<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>PHB Finance</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <script src="https://kit.fontawesome.com/8f25487bc5.js" crossorigin="anonymous"></script>

    <!-- MDB UI Kit CSS (v6+) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />

    <!-- Nepcha Analytics -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">

    <div class="container">
        <!-- Section: Design Block -->
        <section class="text-center text-lg-start">

            <!-- Jumbotron -->
            <div class="container py-4">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card cascading-right bg-body-tertiary"
                            style="
            backdrop-filter: blur(30px);
            ">
                            <div class="card-body p-5 shadow-5 text-center">
                                <h2 class="fw-bold mb-5">Sign up now</h2>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" id="name" name="name" class="form-control"
                                                    required />
                                                <label class="form-label" for="name">Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" id="nrc" name="nrc" class="form-control"
                                                    required />
                                                <label class="form-label" for="nrc">NRC</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" id="country" name="country" class="form-control"
                                                    required />
                                                <label class="form-label" for="country">Country</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" id="city" name="city" class="form-control"
                                                    required />
                                                <label class="form-label" for="city">City</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Phone input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" id="phone_number" name="phone_number" class="form-control"
                                            required />
                                        <label class="form-label" for="phone_number">Phone Number</label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <!-- Password input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" id="password" name="password"
                                                    class="form-control" required />
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <!--Confirm Password input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" id="password_confirmation"
                                                    name="password_confirmation" class="form-control" required />
                                                <label class="form-label" for="password_confirmation">Confirm
                                                    Password</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-block mb-4" style="background-color: #1b5a8d;">
                                        Sign up
                                    </button>

                                    <!-- Register buttons -->
                                    <div class="text-center">
                                        <p>or sign up with:</p>
                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>
                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-google"></i>
                                        </button>
                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-twitter"></i>
                                        </button>
                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-github"></i>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg"
                            class="w-100 rounded-4 shadow-4" alt="" />
                    </div>
                </div>
            </div>
            <!-- Jumbotron -->
        </section>
        <!-- Section: Design Block -->

        <!--   Core JS Files   -->
        <script src="{{ asset('js/core/popper.min.js') }}"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/js/mdb.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
