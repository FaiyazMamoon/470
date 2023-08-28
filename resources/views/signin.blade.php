<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    body {
        background-image: url('background img/bckgrnd.jpg');
        background-size: cover;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .signup-content {
        background: rgba(255, 255, 255, 1);
        padding: 30px;
        border-radius: 15px;
        max-width: 4000px; /* Limit the maximum width of the sign-in form */
        margin: 0 auto; /* Center the form horizontally */
    }
</style>
<body>

<div class="signup-content">
    <div class="signup-form">
        <h2 class="form-title">Sign In</h2>
            <form method="POST" class="register-form" id="signin-form" action="{{ route('signin') }}">
            @csrf <!-- CSRF Token -->

            <div class="form-group">
                <label for="username"><i class="zmdi zmdi-account"></i></label>
                <input type="text" name="username" id="username" placeholder="Your Username" required />
                @error('username')
                    <span class="text-danger" style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email"><i class="zmdi zmdi-email"></i></label>
                <input type="email" name="email" id="email" placeholder="Your Email" required />
                @error('email')
                    <span class="text-danger" style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="password" id="password" placeholder="Password" required />
                @error('password')
                    <span class="text-danger" style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group form-button">
                <input type="submit" name="signin" id="signin" class="form-submit" value="Sign In"/>
            </div>
        </form>
        
        @if (session('error'))
            <div class="alert alert-danger" style="color: red;">
                {{ session('error') }}
            </div>
        @endif
<!-- use korbo jodi logout er redirect signing e dei -->
        @if (session('successOut'))
                <div class="alert alert-danger" style="color: green;">
                    {{ session('successOut') }}
                </div>
        @endif
    </div>
    
    <div class="signup-image">
        <figure><img src="images/signin-image.jpg" alt="sign in image"></figure>
    </div>
</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
