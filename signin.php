<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <!-- <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://apis.google.com/js/api.js"></script> -->
    
    <title>Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'PT Serif', serif;
        }

        body {
            /* background-color: #f5f5f5; */
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .flex-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            background-image: url("image/wallpaper2.jpg");
            background-repeat: no-repeat;
            background-position: center top;
            /*background-color: black; /* 393E46 */
        }

        .flex-container #top {
            width: 100vw;
            height: 30vh;
            /*background-color: black; /* 393E46 */
        }

        .flex-container #bottom {
            width: 100vw;
            height: 70vh;
            background-color: #f5f5f5;
            border-radius: 30px 30px 0 0;
        }

        .flex-container #bottom h2 {
            margin: 20px 0px 5px 0px;
            text-align: center;
        }

        .flex-container #bottom form {
            margin: 0 10vw;
        }

        .flex-container #bottom form > * {
            display: block;
            width: 100%;
        }

        .flex-container #bottom form input[type="email"], input[type="password"] {
            margin: 5px auto;
            /* width: 80%; */
            height: 40px;
            border-style: ridge;
            border-radius: 10px;
            text-indent: 5px;
        }

        .flex-container #bottom form button {
            position: absolute;
            bottom: 70px;
            width: 80%;
            height: 40px;
            border-radius: 30px;
            background-color: black;
            color: #ffffff;
        }

        .flex-container #bottom form p {
            position: absolute;
            bottom: 30px;
        }

        a {
            text-decoration: none;
        }

        .alert {
            background-color: #f44336;
            color: white;
            padding: 5px;
            margin-bottom: 5px;
            font-size: 15px;
        }

        .closebtn {
            float: right;
            cursor: pointer;
        }

        .closebtn:hover {
            color: black;
        }

    </style>
</head>
<body>

    <div class="flex-container">
        <div id="top"></div>
        <div id="bottom">
            <h2>Login to your account</h2>
            <form action="./login-process.php" method="post">
                <?php $error = (isset($_GET["error"])) ? htmlentities($_GET["error"], ENT_QUOTES) : null; 
                if(isset($error)) { ?>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none'">&times;</span>
                        <?php echo $error; ?>
                    </div>
                <?php } ?>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <a href="javascript:void(0)">Forgot password?</a>
                <!-- Google login -->
                <!-- <div id="g_id_onload" data-auto_select="false" data-client_id="37952741570-0q2t45pokk735dtug585vt760pnqvj0v.apps.googleusercontent.com" data-login_uri="<?php //$_SERVER['SERVER_NAME']; ?>" data-auto_prompt="true" data-callback="handleCredentialResponse" style="width: 100%;"></div>
                <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline" data-text="sign_in_with" data-shape="rectangular" data-logo_alignment="left" data-width="300"></div> -->

                <button type="submit">Login</button>
                <p>Not a member?<a href="./signup.php">&nbsp;Signup now</a></p>
            </form>
        </div>
    </div>

    <script>
        // function handleCredentialResponse(response) {

        //     var xhttp = new XMLHttpRequest()
        //     xhttp.onload = function() {
        //         // console.log(JSON.parse(this.responseText))
        //         let data = JSON.parse(this.responseText)
        //         if (data != null) {
        //             // console.log(data)
        //             console.log(data.id)
        //             console.log(data.name)
        //             console.log(data.email)
        //             console.log(data.gambar)
        //         }
        //     }
        //     xhttp.open("POST", "./API/google/google-verify.php")
        //     xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        //     xhttp.send("token=" + response.credential)
        // }

        // const logout = document.getElementById('signout_button');
        // logout.onclick = () => {
        //     google.accounts.id.disableAutoSelect();
        // }
    </script>

</body>
</html>