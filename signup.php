<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
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
        }

        .container {
            /* border: 1px solid black; */
            width: 100%;
            height: 500px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
            max-width: 350px;
            position: absolute;
            top: 25%;
            bottom: 40%;
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
        <h1>Sign up</h1>
        <form action="javascript:void(0)" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <label for="pass">Password</label>
            <input type="password" name="password" id="pass">
            <label for="confPassword">Confirm Password</label>
            <input type="password" name="confPass" id="confPassword">
            <button type="submit">Signup</button>
            <p>Already have an account?&nbsp;<a href="signin.php">Login</a></p>
        </form>
    </div>
</body>
</html>