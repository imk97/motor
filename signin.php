<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://apis.google.com/js/api.js"></script>
    
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

        .container {
            max-width: 350px;
            width: 100%;
            height: 450px;
            padding: 25px 30px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
            position: absolute;
            top: 25%;
            bottom: 25%;
            background-color: #f5f5f5;
            /* border: 1px solid grey; */
        }

        input[type="email"], input[type="password"] {
            border-style: none none solid none;
            border-bottom: 1px solid grey;
            width: 100%;
            height: 40px;
            text-indent: 5px;
            margin-bottom: 5px;
            background-color: #f5f5f5;
            border-radius: 0px;
        }

        button {
            width: 100%;
            height: 40px;
            border-radius: 5px;
            background-color: black;
            color: #ffffff;
            font-size: 16px;
            margin: 10px 0px;
        }

        h1 {
            margin: 0px 0px 20px 0px;
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

        @media screen and (max-width: 768px) {
            /* .container {
                top: 25%;
                bottom: 25%;
            } */
        }
    </style>
</head>
<body>



    <div class="container">
        <h1>Login</h1>
        <?php if(isset($_GET["error"])) { ?>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none'">&times;</span>
            <?php echo $_GET["error"]; ?>
        </div>
        <?php } ?>

        <form action="./login-process.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            
            <br>
            <a href="javascript:void(0)">Forgot password?</a>
            <button type="submit">Login</button>
            
            <!-- Google login -->
            <div id="g_id_onload" data-auto_select="false" data-client_id="37952741570-0q2t45pokk735dtug585vt760pnqvj0v.apps.googleusercontent.com" data-login_uri="<?php $_SERVER['SERVER_NAME']; ?>" data-auto_prompt="true" data-callback="handleCredentialResponse" style="width: 100%;"></div>
            <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline" data-text="sign_in_with" data-shape="rectangular" data-logo_alignment="left" data-width="290"></div>

            <br>
            <p>Not a member?<a href="./signup.php">&nbsp;Signup now</a></p>
        </form>
    </div>

    <script>
        function handleCredentialResponse(response) {

            var xhttp = new XMLHttpRequest()
            xhttp.onload = function() {
                // console.log(JSON.parse(this.responseText))
                let data = JSON.parse(this.responseText)
                if (data != null) {
                    // console.log(data)
                    console.log(data.id)
                    console.log(data.name)
                    console.log(data.email)
                    console.log(data.gambar)
                }
            }
            xhttp.open("POST", "google-verify.php")
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
            xhttp.send("token=" + response.credential)
        }

        // const logout = document.getElementById('signout_button');
        // logout.onclick = () => {
        //     google.accounts.id.disableAutoSelect();
        // }
    </script>

</body>
</html>