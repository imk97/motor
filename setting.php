<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>

    <script src="https://kit.fontawesome.com/50f334ce21.js" crossorigin="anonymous"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0) !important;
            -webkit-focus-ring-color: rgba(255, 255, 255, 0) !important;
            outline: none !important;
        }

        .navigationBar {
            width: 100%;
            max-width: 100%;
            height: 50px;
            background-color: #ffffff;
            font-weight: bold;
            /* display: flex;
            align-items: center; */
            padding: 15px 20px;
            box-shadow: 0 0px 4px 0 rgba(0, 0, 0, 0.2);
            position: sticky;
            top: 0;
            right: 0;
            left: 0;
        }

        .navigationBar div {
            display: inline;
            margin-left: 20px;
        }

        main {
            max-width: 100vw;
        }

        main > div {
            cursor: pointer;
            padding: 20px 25px;
            height: 80px;
            width: 100vw;
            display: flex;
            align-items: center;
            column-gap: 20px;
        }

        #desc p {
            font-size: 14px;
        }

        main > div:active {
            background-color: grey;
        }

    </style>
</head>

<body>

    <!-- Top navigation guideline -->
    <?php //include_once "./top-navigationbar.php"; ?>

    <main>
        <div onclick="nav('profile')">
            <i class="fa-regular fa-user fa-xl"></i>
            <div id="desc">
                <p><b>Account Information</b></p>
                <p>See your account information like your phone number and email address.</p> 
            </div>
        </div>
        <div onclick="nav('password')">
            <i class="fa-solid fa-lock fa-xl" style="color: #000000;"></i>
            <div id="desc">
            <p><b>Password</b></p>
            <p>Change your password.</p> 
            </div>
        </div>
        <div onclick="nav()">
            <i class="fa-solid fa-shield-halved fa-xl" style="color: #000000;"></i>
            <div id="desc">
                <p><b>Security</b></h4>
                <p>See information about your account.</p>
            </div>
        </div>
    </main>

    <!-- Bottom navigation guideline -->
    <?php //include_once "./bottom-navigationbar.php"; ?>

</body>

<script>

    function nav (redirect) {
        switch (redirect) {
            case "profile":
                Android.profile()
                break;
        
            case "password":
                Android.password()
                break;

            default:
                break;
        }
    }

</script>
</html>