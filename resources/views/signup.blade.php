<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

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
        max-width: 4000px; /* Limit the maximum width of the signup form */
        margin: 0 auto; /* Center the form horizontally */
    }
</style>
<body>

<div class="signup-content">
    <div class="signup-form">
        <h2 class="form-title">Create An Account</h2>
        <form method="POST" class="register-form" id="register-form" action="{{ route('signup') }}">
            @csrf <!-- CSRF Token -->

                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name" required />
                            @error('name')
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
                        
                        <div class="form-group">
                            <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" required />
                        </div>
                        
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>

                        <div class="form-group" style="margin-top: -10px;">
                            <p style="font-size: 14px;">Already a member? <a href="{{ route('signin.form') }}" style="color: #15B8FF;">Please log in.</a></p>
                        </div>
                    </form>
            </div>
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                </div>
            </div>
        </div>
    </section>
</div>



    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
</body>
</html>
