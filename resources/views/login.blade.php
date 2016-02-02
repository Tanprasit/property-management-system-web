<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Eastland - login</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/login-animate.css">
    <link rel="stylesheet" href="css/login-style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="top">
            <h1 id="title" class="hidden">
                <span id="logo">Eastland</span> 
            </h1>
        </div>
        <div class="login-box animated fadeInUp">
            <div class="box-header">
                <h2>Log In</h2>
            </div>
            <label for="username">Username</label>
            <br/>
            <input type="text" id="username">
            <br/>
            <label for="password">Password</label>
            <br/>
            <input type="password" id="password">
            <br/>
            <button type="submit">Sign In</button>
            <br/>

            <!-- Disabled password recovery -->
            <!-- <a href="#"><p class="small">Forgot your password?</p></a> -->
        </div>
    </div>
</body>

<!-- Login scripts animations -->
<script src="scripts/login-animation.js"></script>
</html>
