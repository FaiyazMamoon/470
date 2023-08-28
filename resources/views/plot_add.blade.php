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
                    <div class="card-header" style="font-family: 'ITC Legacy Sans Pro Condensed Bold'; font-size: 24px;">Plot Management</div>
                    <div class="card-body" style="font-family: 'ITC Legacy Sans Pro Condensed Bold';">
                        <!-- Action Dropdown -->
                        <form action="{{ route('plot.add') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="action">Select an action:</label>
                                <select class="form-control" id="action" name="action">
                                    <option value="" selected disabled>Select an action</option>
                                    <option value="add">Add New Plot</option>
                                    <option value="update">Update Plot Details</option>
                                    <option value="delete">Delete Plot/Crop Details</option>
                                </select>
                                <br>
                                @if($errors->any())
                                    <div class="alert alert-danger text-center" style="max-width: 400px; margin: 0 auto;">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                    <script>
                                        setTimeout(function(){
                                            document.querySelector('.alert-danger').remove();
                                        }, 1900); // Remove after 1.9 seconds
                                    </script>
                                @endif
                            </div>
                            <br>
                        </form>
                
                        <!-- Add New Plot Form -->
                        <div id="addPlotFormContainer" style="display: none;">
                            <h5>Add New Plot</h5>
                            <form action="{{ route('plot.add') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="plotNumber">Plot Number:</label>
                                    <input type="text" class="form-control" id="plotNumber" name="plotNumber" required>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location:</label>
                                    <input type="text" class="form-control" id="location" name="location" required>
                                </div>

                                <div class="form-group">
                                    <label for="numCrops">How many crop details do you want to add?</label>
                                    <select class="form-control" id="numCrops" name="numCrops">
                                        <option value="" selected disabled>Select an action</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <!-- Input fields for crop details -->
                                
                                @for ($i = 1; $i <= 5; $i++)
                                    <div class="crop-details" id="crop-details-{{ $i }}" style="display: none;">
                                    <br>
                                        <div class="form-group">
                                            <label for="cropName{{ $i }}">Crop Name {{ $i }}:</label>
                                            <input type="text" class="form-control" id="cropName{{ $i }}" name="cropName{{ $i }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="plantationDate{{ $i }}">Plantation Date {{ $i }}:</label>
                                            <input type="date" class="form-control" id="plantationDate{{ $i }}" name="plantationDate{{ $i }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="harvestDate{{ $i }}">Harvest Date {{ $i }}:</label>
                                            <input type="date" class="form-control" id="harvestDate{{ $i }}" name="harvestDate{{ $i }}">
                                        </div>
                                    </div>
                                @endfor
                                <br>
                                <button type="submit" class="btn btn-primary">Add Plot</button>
                            </form>
                        </div>


                            <!-- Update Plot Form -->
                            <div id="updatePlotFormContainer" style="display: none;">
                                <h5>Update Existing Plot</h5>
                                <form action="{{ route('plot.update') }}" method="POST">
                                    @csrf
                                    <!-- Dropdown to select plot number for update -->
                                    <div class="form-group">
                                        <label for="updatePlotNumber">Select Plot Number for Update:</label>
                                        <select class="form-control" id="updatePlotNumber" name="updatePlotNumber">
                                            <option value="">Select Plot Number</option>
                                            @foreach ($plotNumbers as $plotId => $plotNumber)
                                                <option value="{{ $plotNumber }}">{{ $plotNumber }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="updateLocation">Location:</label>
                                        <input type="text" class="form-control" id="updateLocation" name="updateLocation" required>
                                    </div>
                                    <!-- Dropdown to select crop for update -->
                                    <div class="form-group">
                                        <label for="updateCrop">Select Crop for Update:</label>
                                        <select class="form-control" id="updateCrop" name="updateCrop">
                                        <option value="" selected disabled>Select a Crop</option>
                                            @foreach ($cropNames as $cropId => $cropName)
                                                <option value="{{ $cropId }}">{{ $cropName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="crop-update-details">
                                        <div class="form-group">
                                            <label for="updateCropName">Crop Name:</label>
                                            <input type="text" class="form-control" id="updateCropName" name="updateCropName">
                                        </div>
                                        <div class="form-group">
                                            <label for="updatePlantationDate">Plantation Date:</label>
                                            <input type="date" class="form-control" id="updatePlantationDate" name="updatePlantationDate">
                                        </div>
                                        <div class="form-group">
                                            <label for="updateHarvestDate">Harvest Date:</label>
                                            <input type="date" class="form-control" id="updateHarvestDate" name="updateHarvestDate">
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Update Plot</button>
                                </form>
                            </div>




                        <!-- Delete Plot Form -->
                        <div id="deletePlotFormContainer" style="display: none;">
                            <h5>Delete Plot</h5>
                            <form action="{{ route('plot.delete') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="deleteOption">Select Delete Option:</label>
                                    <select class="form-control" id="deleteOption" name="deleteOption">
                                        <option value="" selected disabled>Select an Option</option>
                                        <option value="whole">Delete Whole Plot</option>
                                        <option value="crop">Delete Crop Information</option>
                                    </select>
                                </div>
                                <div id="deletePlotInputContainer" style="display: none;">
                                    <div class="form-group">
                                        <label for="deletePlotNumber">Enter Plot Number:</label>
                                        <input type="text" class="form-control" id="deletePlotNumber" name="deletePlotNumber">
                                    </div>
                                </div>
                                <div id="deleteCropInputContainer" style="display: none;">
                                    <div class="form-group">
                                        <label for="deletePlotNumberCrop">Enter Plot Number:</label>
                                        <input type="text" class="form-control" id="deletePlotNumberCrop" name="deletePlotNumberCrop">
                                    </div>
                                    <div class="form-group">
                                        <label for="deleteCropName">Enter Name of the Crop:</label>
                                        <input type="text" class="form-control" id="deleteCropName" name="deleteCropName">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    const numCropsSelect = document.getElementById('numCrops');
    const cropDetailsDivs = document.querySelectorAll('.crop-details');

    numCropsSelect.addEventListener('change', () => {
        const selectedNum = parseInt(numCropsSelect.value);
        cropDetailsDivs.forEach((div, index) => {
            div.style.display = index < selectedNum ? 'block' : 'none';
        });
    });

    const selectedAction = document.getElementById('action');
    const addPlotFormContainer = document.getElementById('addPlotFormContainer');
    const updatePlotFormContainer = document.getElementById('updatePlotFormContainer');
    const deletePlotFormContainer = document.getElementById('deletePlotFormContainer');

    selectedAction.addEventListener('change', () => {
        const selectedValue = selectedAction.value;

        addPlotFormContainer.style.display = selectedValue === 'add' ? 'block' : 'none';
        updatePlotFormContainer.style.display = selectedValue === 'update' ? 'block' : 'none';
        deletePlotFormContainer.style.display = selectedValue === 'delete' ? 'block' : 'none';
    });

    const updatePlotNumberSelect = document.getElementById('updatePlotNumber');
    const updateCropSelect = document.getElementById('updateCrop');
    const cropUpdateDetailsDiv = document.querySelector('.crop-update-details');

    updatePlotNumberSelect.addEventListener('change', () => {
        const selectedPlotNumber = updatePlotNumberSelect.value;

        if (selectedPlotNumber !== '') {
            cropUpdateDetailsDiv.style.display = 'block';
            updateCropSelect.innerHTML = '<option value="">Select Crop</option>'; // Clear previous options

            // Fetch crops associated with selected plot and populate dropdown
            fetch(`/get-crops/${selectedPlotNumber}`)
                .then(response => response.json())
                .then(data => {
                    updateCropSelect.innerHTML = ''; // Clear previous options
                    data.forEach(crop => {
                        const option = document.createElement('option');
                        option.value = crop.id;
                        option.textContent = crop.name;
                        updateCropSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching crops:', error);
                });
        } else {
            cropUpdateDetailsDiv.style.display = 'none';
            updateCropSelect.innerHTML = '<option value="">Select Crop</option>';
        }
    });

    const deleteOptionSelect = document.getElementById('deleteOption');
    const deletePlotInputContainer = document.getElementById('deletePlotInputContainer');
    const deleteCropInputContainer = document.getElementById('deleteCropInputContainer');

    deleteOptionSelect.addEventListener('change', () => {
        const selectedOption = deleteOptionSelect.value;

        if (selectedOption === 'whole') {
            deletePlotInputContainer.style.display = 'block';
            deleteCropInputContainer.style.display = 'none';
        } else if (selectedOption === 'crop') {
            deletePlotInputContainer.style.display = 'none';
            deleteCropInputContainer.style.display = 'block';
        } else {
            deletePlotInputContainer.style.display = 'none';
            deleteCropInputContainer.style.display = 'none';
        }
    });
</script>
</body>
                                <!-- Combined Toast Messages -->
                                @php
                                $toastMessages = [
                                    'successAdd' => 'Plot information added successfully.',
                                    'successUp' => 'Plot information updated successfully.',
                                    'successPlt' => 'Plot information deleted successfully.',
                                    'successCrp' => 'Crop information deleted successfully.',
                                    'errorPlt' => 'Please enter the correct Plot/Crop information.',
                                    'errorCrp' => 'Crop not found.',
                                ];
                                @endphp

                                @foreach ($toastMessages as $sessionKey => $message)
                                    @if (session($sessionKey))
                                        <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                                            <div class="d-flex">
                                                <div class="toast-body">
                                                    {{ $message }}
                                                </div>
                                                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

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


