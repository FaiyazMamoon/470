<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ফার্মকেয়ার</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>        
            .dropdown-menu .dropdown-item {
            font-size: 20px; /* Adjust the font size as needed */
            font-family: "ITC Legacy Sans Bold"; /* Use Times New Roman or a similar font */
        }</style>
    </head>
    <body id="page-top">
<!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">ফার্মকেয়ার</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    
                    @guest <!-- Check if the user is a guest (not logged in) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="registerDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="registerDropdown" style="min-width: 160px;">
                            <a class="dropdown-item" href="{{ route('signup.form') }}" style="font-size: 14px;">Sign Up</a>
                            <a class="dropdown-item" href="{{ route('signin.form') }}" style="font-size: 14px;">Sign In</a>
                        </div>
                    </li>
                    @else <!-- If the user is authenticated (logged in) -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Cultivate Success by Effortlessly Managing Plots, Warehouses, and Resources.</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">ফার্মকেয়ার can help you store and handle all of your necessary information in one place. Simply sign up to get started. No strings attached!</p>
                        <a class="btn btn-primary btn-xl" href="#about">Get Started</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">We've got what you need!</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">At ফার্মকেয়ার, we specialize in simplifying the complex world of agriculture.  Manage plot information and optimize land usage. Take charge of your warehouses , ensuring that resources are efficiently stored and managed. Our solution extends to smart employee and customer management as well.</p>
                        @guest <!-- Check if the user is a guest (not logged in) -->
                            <a class="btn btn-light btn-xl" href="{{ route('signup.form') }}">Sign Up</a>
                            &nbsp;
                            <a class="btn btn-light btn-xl" href="{{ route('signin.form') }}">Sign In</a>
                        @endguest
                    </div>
                </div>
            </div>
        </section>

        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">At Your Service</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Simple Structure</h3>
                            <p class="text-muted mb-0">Simple but efficient structure that is easy to use.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Up to Date</h3>
                            <p class="text-muted mb-0">Track all of your details and keep yourself updated.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">All in One Place</h3>
                            <p class="text-muted mb-0">Handle everything related to your farm management.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Customer Care</h3>
                            <p class="text-muted mb-0">Don't forget the importance of customer management!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="background img\1.jpg" title="Project Name">
                            <img class="img-fluid" src="background img\1.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">ফার্মকেয়ার in:</div>
                                <div class="project-name">Warehouse Management</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="background img\3.jpeg" title="Project Name">
                            <img class="img-fluid" src="background img\3.jpeg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">ফার্মকেয়ার in:</div>
                                <div class="project-name">Daily Planning</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="background img\2.jpeg" title="Project Name">
                            <img class="img-fluid" src="background img\2.jpeg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">ফার্মকেয়ার in:</div>
                                <div class="project-name">Plot Management</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="background img\4.jpg" title="Project Name">
                            <img class="img-fluid" src="background img\4.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">ফার্মকেয়ার in:</div>
                                <div class="project-name">Employee Management</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="background img\5.jpg" title="Project Name">
                            <img class="img-fluid" src="background img\5.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">ফার্মকেয়ার in:</div>
                                <div class="project-name">Customer Care</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg" title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="..." />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">ফার্মকেয়ার in:</div>
                                <div class="project-name">Information Management</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - ফার্মকেয়ার</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>

                                            <!-- Success Toast Message -->
                                            @if (session('success'))
                                <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                        Successfully logged in!
                                        </div>
                                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                                        <!-- Success Toast Message -->
                                        @if (session('successOut'))
                                <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                        Logged out successfully.
                                        </div>
                                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                                        <!-- Success Toast Message -->
                                        @if (session('successUp'))
                                <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                        Registration successfull! Please log in.
                                        </div>
                                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    // Get the toast element
                                    const toastEl = document.querySelector('.toast');

                                    // Show the toast if it exists
                                    if (toastEl) {
                                        const bsToast = new bootstrap.Toast(toastEl);
                                        bsToast.show();
                                    }
                                });
                            </script>
</html>