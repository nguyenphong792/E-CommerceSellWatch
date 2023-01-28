<?php
session_start();
include_once __DIR__ . '/../dbconnect.php';


if (isset($_SESSION["locked"])) {
    $difference = time() - $_SESSION["locked"];
    if ($difference > 10) {
        unset($_SESSION["locked"]);
        unset($atmp);
    }
}
$atmp = 0;
if (isset($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $atmp = $_POST['hidden'];

    if ($atmp < 4) {
        $sqlLogin = "SELECT * FROM admin WHERE username = '$username' AND password ='$password'";
        $result = mysqli_query($conn, $sqlLogin);
        if (mysqli_num_rows($result)) {
            while (mysqli_fetch_array($result, MYSQLI_BOTH)) {
                echo '<script type="text/javascript">alert("Đăng nhập thành công")
                </script>';
            }
            $_SESSION['username'] = $username;

            header('location:index.php');
        } else {
            $atmp++;

            $_SESSION["error"] = "Thông tin đăng nhập không chính xác";
            // echo'<script type="text/javascript">alert("Đăng nhập thất bại'.$atmp.'")
            //     </script>';
        }
    }
    // if($atmp == 4){
    //     echo'<script type="text/javascript">alert("Đăng nhập bị giới hạn")
    //         </script>';
    // }


}






?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css">

    <style>
        /* Fonts Form Google Font ::- https://fonts.google.com/  -:: */
        @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

        /* End Fonts */
        /* Start Global rules */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        /* End Global rules */

        /* Start body rules */
        body {
            background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
            background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
            background-attachment: fixed;
            background-repeat: no-repeat;

            font-family: 'Vibur', cursive;
            /*   the main font */
            font-family: 'Abel', sans-serif;
            opacity: .95;
            /* background-image: linear-gradient(to top, #d9afd9 0%, #97d9e1 100%); */
        }

        form {
            width: 450px;
            min-height: 500px;
            height: auto;
            border-radius: 5px;
            margin: 2% auto;
            box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
            padding: 2%;
            background-image: linear-gradient(-225deg, #E3FDF5 50%, #FFE6FA 50%);
        }

        /* form Container */
        form .con {
            display: -webkit-flex;
            display: flex;

            -webkit-justify-content: space-around;
            justify-content: space-around;

            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;

            margin: 0 auto;
        }

        /* the header form form */
        header {
            margin: 2% auto 10% auto;
            text-align: center;
        }

        /* Login title form form */
        header h2 {
            font-size: 250%;
            font-family: 'Playfair Display', serif;
            color: #3e403f;
        }

        /*  A welcome message or an explanation of the login form */
        header p {
            letter-spacing: 0.05em;
        }



        /* //////////////////////////////////////////// */
        /* //////////////////////////////////////////// */


        .input-item {
            background: #fff;
            color: #333;
            padding: 14.5px 0px 15px 9px;
            border-radius: 5px 0px 0px 5px;
        }



        /* Show/hide password Font Icon */
        #eye {
            background: #fff;
            color: #333;

            margin: 5.9px 0 0 0;
            margin-left: -20px;
            padding: 15px 9px 19px 0px;
            border-radius: 0px 5px 5px 0px;

            float: right;
            position: relative;
            right: 1%;
            top: -.2%;
            z-index: 5;

            cursor: pointer;
        }

        /* inputs form  */
        input[class="form-input"] {
            width: 256px;
            height: 50px;

            margin-top: 2%;
            padding: 15px;

            font-size: 16px;
            font-family: 'Abel', sans-serif;
            color: #5E6472;

            outline: none;
            border: none;

            border-radius: 0px 5px 5px 0px;
            transition: 0.2s linear;

        }

        .form-input-username {
            width: 260px;
            height: 50px;

            margin-top: 2%;
            padding: 15px;

            font-size: 16px;
            font-family: 'Abel', sans-serif;
            color: #5E6472;

            outline: none;
            border: none;

            border-radius: 0px 5px 5px 0px;
            transition: 0.2s linear;
        }

        input[id="txt-input"] {
            width: 250px;
        }

        /* focus  */
        input:focus {
            transform: translateX(-2px);
            border-radius: 5px;
        }

        /* //////////////////////////////////////////// */
        /* //////////////////////////////////////////// */

        /* input[type="text"] {min-width: 250px;} */
        /* buttons  */
        button {
            display: inline-block;
            color: #252537;

            width: 290px;
            height: 50px;

            padding: 0 20px;
            background: #fff;
            border-radius: 5px;

            outline: none;
            border: none;

            cursor: pointer;
            text-align: center;
            transition: all 0.2s linear;

            margin: 7% auto;
            letter-spacing: 0.05em;
        }

        /* Submits */
        .submits {
            width: 48%;
            display: inline-block;
            float: left;
            margin-left: 2%;
        }

        /*       Forgot Password button FAF3DD  */
        .frgt-pass {
            background: transparent;
        }

        /*     Sign Up button  */
        .sign-up {
            background: #B8F2E6;
        }


        /* buttons hover */
        button:hover {
            transform: translatey(3px);
            box-shadow: none;
        }

        /* buttons hover Animation */
        button:hover {
            animation: ani9 0.4s ease-in-out infinite alternate;
        }

        @keyframes ani9 {
            0% {
                transform: translateY(3px);
            }

            100% {
                transform: translateY(5px);
            }
        }
    </style>
</head>

<body>
    <div class="overlay">

        <form action="login.php" method="post">
            <?php echo "<input type='hidden' name='hidden' value='" . $atmp . "'>"; ?>
            <!--   con = Container  for items in the form-->
            <div class="con">
                <!--     Start  header Content  -->
                <header class="head-form">
                    <h2>Đăng nhập</h2>

                    <!--Xử lý thông tin đăng nhập -->
                    <?php if (isset($_SESSION["error"])) { ?>
                        <p style="color:red;">*<?= $_SESSION["error"] ?></p>
                    <?php unset($_SESSION["error"]);
                    } ?>
                    <!--     A welcome message or an explanation of the login form -->
                    <p>Login admin account to manage</p>
                </header>
                <!--     End  header Content  -->
                <br>

                <div class="field-set">

                    <!--   user name -->
                    <span class="input-item">
                        <i class="fa fa-user-circle"></i>
                    </span>
                    <!--   user name Input-->
                    <input class="form-input-username" id="username" name="username" type="text" placeholder="UserName" required>

                    <br>

                    <!--   Password -->

                    <span class="input-item">
                        <i class="fa fa-key"></i>
                    </span>
                    <!--   Password Input-->
                    <input class="form-input" type="password" placeholder="Password" id="password" name="password" required>

                    <!--      Show/hide password  -->
                    <span>
                        <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                    </span>
                    <br>
                    <!--        buttons -->
                    <!--      button LogIn -->
                    <?php
                    if ($atmp > 3) {
                        $_SESSION["locked"] = time();
                        echo "Please wait for 30 seconds";
                    } else {
                    ?>
                        <button type="submit" name="dangnhap" class="log-in"> Log In </button>
                    <?php } ?>
                </div>

            </div>

            <!-- End Form -->
        </form>

    </div>
    <script>
        function show() {
            var p = document.getElementById('password');
            p.setAttribute('type', 'text');
        }

        function hide() {
            var p = document.getElementById('password');
            p.setAttribute('type', 'password');
        }

        var pwShown = 0;

        document.getElementById("eye").addEventListener("click", function() {
            if (pwShown == 0) {
                pwShown = 1;
                show();
            } else {
                pwShown = 0;
                hide();
            }
        }, false);
    </script>
</body>

</html>