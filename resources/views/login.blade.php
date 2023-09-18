<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <style type="text/css">
        /* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
    </style>
</head>


<body class="animsition" style="animation-duration: 900ms; opacity: 1;">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a class="navbar-brand" href="/" style="text-decoration: none;font-family: 'Montserrat', sans-serif;/* display: flex; *//* justify-content: space-between; */"><span style="font-size: 25px;color: #1dbf73;font-weight: 555;">Excellence</span><span style="font-size: 25px;color:black;font-weight: 555;"> Marketing</span></a>
                        </div>
                        <div class="login-form">
                            <form action="/login-check" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Enter your name">

                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">

                                </div>
                                <br>
                                @if (session()->has('error'))
                                <br>
                                <div class="alert alert-danger" role="alert">


                                    {{session('error')}}

                                </div>
                                @endif
                                <br>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>

                                <br>
                                <div class="inform" style="text-align: center;">
                                    <p>
                                        <span style='font-size:11px;'>This project is made by <a href="https://www.psofts.online" style="text-decoration: none; color:green;">Psoft</a>.</span>
                                    </p>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>