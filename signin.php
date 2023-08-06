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
            height: 430px;
            padding: 25px 30px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
            position: absolute;
            top: 30%;
            bottom: 40%;
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

        @media screen and (max-width: 768px) {
            .container {
                top: 20%;
                bottom: 20%;
            }
        }
    </style>
</head>
<body>



    <div class="container">
        <h1>Login</h1>
        <form action="javascript:void(0)" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">

            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            
            <br>
            <a href="javascript:void(0)">Forgot password?</a>
            <button type="submit">Login</button>
            
            <!-- Google login -->
            <div id="g_id_onload" data-auto_select="true" data-client_id="37952741570-0q2t45pokk735dtug585vt760pnqvj0v.apps.googleusercontent.com" data-login_uri="<?php $_SERVER['SERVER_NAME']; ?>" data-auto_prompt="true" data-callback="handleCredentialResponse" style="width: 100%;"></div>
            <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline" data-text="sign_in_with" data-shape="rectangular" data-logo_alignment="left"></div>

            <br>
            <p>Not a member?<a href="signup.php">&nbsp;Signup now</a></p>
        </form>
    </div>

    <script>
        function handleCredentialResponse(response) {
            // console.log("Encoded JWT ID token: " + response.credential);
            // console.log(response)

            // decodeJwtResponse() is a custom function defined by you
            // to decode the credential response.
            const responsePayload = decodeJwtResponse(response.credential);

            // console.log(responsePayload)

            document.getElementById("id").innerHTML = responsePayload.sub
            document.getElementById("name").innerHTML = responsePayload.name
            document.getElementById("email").innerHTML = responsePayload.email
            document.getElementById("img").setAttribute("src", responsePayload.picture)

            // console.log("ID: " + responsePayload.sub);
            // console.log('Full Name: ' + responsePayload.name);
            // console.log('Given Name: ' + responsePayload.given_name);
            // console.log('Family Name: ' + responsePayload.family_name);
            // console.log("Image URL: " + responsePayload.picture);
            // console.log("Email: " + responsePayload.email);

        }

        function decodeJwtResponse(token) {
            var base64Url = token.split('.')[1];
            var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
            var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));

            return JSON.parse(jsonPayload);
        }

        // Check user dah pernah login atau tak
        // window.onload = function() {
        //     console.log("Hello")
        //     google.accounts.id.initialize({
        //         client_id: '37952741570-0q2t45pokk735dtug585vt760pnqvj0v.apps.googleusercontent.com',
        //         callback: handleCredentialResponse,
        //         auto_select: true

        //     });
        //     google.accounts.id.prompt();
        // }

        // const logout = document.getElementById('signout_button');
        // logout.onclick = () => {
        //     google.accounts.id.disableAutoSelect();
        // }
    </script>

</body>
</html>