<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Eastland - login</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/login-animate.css">
    <link rel="stylesheet" href="css/login-style.css">

    <!-- Alert JS -->
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="top">
            @if(Session::has('error'))
             <div class="alert alert-danger">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 {{ Session::get('error') }}
             </div>
            @endif
            <h1 id="title" class="hidden">
                <span id="logo">Eastland</span> 
            </h1>
        </div>
        <div class="login-box animated fadeInUp">
            <div class="box-header">
                <h2>Log In</h2>
            </div>
            <form action="auth.login" method="post">
                {!! csrf_field() !!}
                <label for="username"> Email</label>
                <br/>
                <input type="text" id="username" name="email" value="{{ old('email') }}">
                <br/>
                <label for="password">Password</label>
                <br/>
                <input type="password" id="password" name="password" value="{{ old('password') }}">
                <br/>
                <button type="submit">Sign In</button>
                <br/>
            </form>
            <!-- Disabled password recovery -->
            <!-- <a href="#"><p class="small">Forgot your password?</p></a> -->
        </div>
    </div>
</body>

<!-- Login scripts animations -->
<script src="scripts/login-animation.js"></script>
</html>
