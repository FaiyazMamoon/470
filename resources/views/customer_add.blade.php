<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
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
                        <div class="form-group">
                            <label for="actionSelect">Choose whether to Add or Update:</label>
                            <select class="form-control" id="actionSelect">
                                <option value="" selected disabled>Select an action</option>
                                <option value="add">Add New Customer Details</option>
                                <option value="update">Update Customer Details</option>
                                <option value="delete">Delete Customer Details</option>
                            </select>
                            <br>
                            @if ($errors->any())
                                <div class="alert alert-danger text-center py-2" style="width: 50%; margin: 0 auto;" id="errorAlert">
                                    One or more fields are missing.
                                </div>
                                <script>
                                    setTimeout(function() {
                                        document.getElementById('errorAlert').style.display = 'none';
                                    }, 1800); // 1.8 seconds dekhabe
                                </script>
                            @endif
                        </div>

                        <div id="addCustomerForm" style="display: none;">
                            <br>
                            <h5>Add New Customer Details</h5>
                            <form action="{{ route('customer.add') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="role">Role:</label>
                                    <input type="text" class="form-control" id="role" name="role" value="Customer" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="specific_role">Specific Role:</label>
                                    <select class="form-control" id="specific_role" name="specific_role">
                                        <option value="New Customer">New Customer</option>
                                        <option value="Returning Customer">Returning Customer</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                                </div>
                                <div class="form-group">
                                    <label for="phone_no">Phone No.:</label>
                                    <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter phone number">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Add Customer</button>
                            </form>
                        </div>

                        <div id="updateCustomerForm" style="display: none;">
                            <br>
                            <h5>Update Customer Details</h5>
                            <form action="{{ route('customer.update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="updateName">Name:</label>
                                    <input type="text" class="form-control" id="updateName" name="updateName" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="updateSpecificRole">Specific Role:</label>
                                    <select class="form-control" id="updateSpecificRole" name="updateSpecificRole">
                                        <option value="New Customer">New Customer</option>
                                        <option value="Returning Customer">Returning Customer</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="updateAddress">Address:</label>
                                    <input type="text" class="form-control" id="updateAddress" name="updateAddress" placeholder="Enter address">
                                </div>
                                <div class="form-group">
                                    <label for="updatePhoneNo">Phone No.:</label>
                                    <input type="text" class="form-control" id="updatePhoneNo" name="updatePhoneNo" placeholder="Enter phone number">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Update Customer</button>
                            </form>
                        </div>
                        <div id="deleteCustomerForm" style="display: none;">
                                <br>
                                <h5>Delete Customer</h5>
                                <form action="{{ route('customer.delete') }}" method="POST">
                                @csrf
                                    <div class="form-group">
                                        <label for="deleteName">Name:</label>
                                        <input type="text" class="form-control" id="deleteName" name="deleteName" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="deleteAddress">Address:</label>
                                        <input type="text" class="form-control" id="deleteAddress" name="deleteAddress" placeholder="Enter address">
                                    </div>
                                    <div class="form-group">
                                        <label for="deletePhoneNo">Phone No.:</label>
                                        <input type="text" class="form-control" id="deletePhoneNo" name="deletePhoneNo" placeholder="Enter phone number">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-danger">Delete Customer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    document.getElementById('actionSelect').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex].value;
        if (selectedOption === 'add') {
            document.getElementById('addCustomerForm').style.display = 'block';
            document.getElementById('updateCustomerForm').style.display = 'none';
            document.getElementById('deleteCustomerForm').style.display = 'none';
        } else if (selectedOption === 'update') {
            document.getElementById('addCustomerForm').style.display = 'none';
            document.getElementById('updateCustomerForm').style.display = 'block';
            document.getElementById('deleteCustomerForm').style.display = 'none';
        } else if (selectedOption === 'delete') {
            document.getElementById('addCustomerForm').style.display = 'none';
            document.getElementById('updateCustomerForm').style.display = 'none';
            document.getElementById('deleteCustomerForm').style.display = 'block';
        } else {
            document.getElementById('addCustomerForm').style.display = 'none';
            document.getElementById('updateCustomerForm').style.display = 'none';
            document.getElementById('deleteCustomerForm').style.display = 'none';
        }
    });
</script>
                                <!-- Error Toast Message -->
                                @if (session('errorExists'))
                                <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                        Customer already exists! Please choose to update.
                                        </div>
                                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                                <!-- Success Toast Message -->
                                @if (session('successAdd'))
                                <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                        Customer added successfully.
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
                                        Customer details updated successfully.
                                        </div>
                                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                                <!-- Success Toast Message -->
                                @if (session('errorMat'))
                                <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                        No matching customer found.
                                        </div>
                                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                                <!-- Success Toast Message -->
                                @if (session('successDel'))
                                <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                        Customer details removed successfully.
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