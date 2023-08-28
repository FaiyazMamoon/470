<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Customer-Info</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap JavaScript and Popper.js (order is important) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">
    <!-- SimpleLightbox plugin CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    
    <style>
        /* Style for the navbar background */
        .navbar {
            background-color: white !important;
        }

        /* Style for navbar links */
        .navbar-nav .nav-link,
        .navbar-link,
        .navbar-brand {
            color: black !important;
        }

        /* Change color to a slightly lighter shade of orange when hovered */
        .navbar-nav .nav-link:hover,
        .navbar-link:hover,
        .navbar-brand:hover {
            color: #FF581C !important; /* Orangered color */
        }

        .dropdown-menu .dropdown-item {
        font-size: 16px; /* Adjust the font size as needed */
        font-family: "ITC Legacy Sans Bold"; 
        }
    </style>
</head>

<body id="page-top">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}" style="color: black;">ফার্মকেয়ার</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="plotDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Plot
                    </a>
                    <div class="dropdown-menu" aria-labelledby="plotDropdown" style="min-width: 160px;">
                        <a class="dropdown-item" href="{{ route('plot.info') }}">Search Plot</a>
                        <a class="dropdown-item" href="{{ route('plot.add.submit') }}">Add/Update Plots</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="financeDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Finance
                    </a>
                    <div class="dropdown-menu" aria-labelledby="financeDropdown" style="min-width: 160px;">
                        <a class="dropdown-item" href="#">Sales</a>
                        <a class="dropdown-item" href="#">Wages</a>
                        <a class="dropdown-item" href="#">Rents and Bills</a>
                        <a class="dropdown-item" href="#">Profit/Loss</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="warehouseDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Warehouse
                    </a>
                    <div class="dropdown-menu" aria-labelledby="warehouseDropdown" style="min-width: 160px;">
                        <a class="dropdown-item" href="#">Search Warehouse</a>
                        <a class="dropdown-item" href="#">Search Items</a>
                        <a class="dropdown-item" href="#">Add/Update Warehouse</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="personnelDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Personnel
                    </a>
                    <div class="dropdown-menu" aria-labelledby="personnelDropdown" style="min-width: 160px;">
                        <a class="dropdown-item" href="{{ route('employee.info') }}">Search Employees</a>
                        <a class="dropdown-item" href="{{ route('employee.add.submit') }}">Add/Update Employees</a>
                        <a class="dropdown-item" href="{{ route('customer.info') }}">Search Customers</a>
                        <a class="dropdown-item" href="{{ route('customer.add.submit') }}">Add/Update Customers</a>
                    </div>
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-link nav-link" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead -->
<header class="masthead d-flex justify-content-center align-items-center">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 700px;">
                    <div class="card-header" style="font-family: 'ITC Legacy Sans Pro Condensed Bold'; font-size: 24px;">Customer Information</div>
                    <div class="card-body" style="font-family: 'ITC Legacy Sans Pro Condensed Bold';">
                        <form action="{{ route('customer.search') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="customerName">Search for your Customers:</label>
                                <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Enter customer name">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                        <!-- Table of customers -->
                        @if (isset($matchingCustomers) && $matchingCustomers->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Address</th>
                                        <th>Phone No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matchingCustomers as $customer)
                                        <tr>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->specific_role }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td>{{ $customer->phone_no }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        <!-- Error message if no match found -->
                        @if (isset($noMatch) && $noMatch)
                            <div class="alert alert-danger text-center py-2" role="alert" style="width: 50%; margin: 0 auto;">
                                No matching customer found.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

</body>
</html>