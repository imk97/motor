<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://apis.google.com/js/api.js"></script>

    <title>Sign up</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'PT Serif', serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            width: 100vw;
            height: 100vh;
        }

        .container {
            /* border: 1px solid black; */
            width: 100%;
            height: 550px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
            max-width: 350px;
            /* position: absolute;
            top: 25%;
            bottom: 25%; */
            padding: 25px 30px;
            background-color: #f5f5f5;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            height: 40px;
            border-style: none none solid none;
            border-bottom: 1px solid grey;
            margin-bottom: 5px;
            text-indent: 5px;
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

        p {
            text-align: center;
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

        @media screen and (max-width: 768px) {
            /* .container {
                top: 20%;
                bottom: 20%;
            } */
        }

        @media screen and (max-width: 280px) {
            .container {
                top: 15%;
                bottom: 15%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign up</h1>

        <?php if (isset($_GET["error"])) {?>
        <div class="alert">
            <?php echo $_GET["error"]; ?>
        </div>
        <?php } ?>

        <form action="./signup-process.php" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="pass">Password</label>
            <input type="password" name="password" id="pass" onchange="sanitize()" required>
            <label for="confPassword">Confirm Password</label>
            <input type="password" name="confPass" id="confPassword" required>
            <button type="submit">Signup</button>
            
            <!-- Google login -->
            <div id="g_id_onload" data-auto_select="false" data-client_id="37952741570-0q2t45pokk735dtug585vt760pnqvj0v.apps.googleusercontent.com" data-login_uri="<?php $_SERVER['SERVER_NAME']; ?>" data-auto_prompt="true" data-callback="handleCredentialResponse"></div>
            <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline" data-text="signup_with" data-shape="rectangular" data-logo_alignment="left" data-width="290"></div>

            <br>
            <p>Already have an account?&nbsp;<a href="signin.php">Login</a></p>
        
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

        function sanitize() {
            let pass = document.getElementById("pass").value
            let container = document.getElementsByClassName("container")[0]
            if (pass.length < 8) {
                console.log("Password must be at least 8 characters")
                container.style.height = "600px"
            } else {
                container.style.height = "550px"
            }
        }
    </script>

</body>
</html>