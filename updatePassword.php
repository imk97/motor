<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update password</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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

        /* .navigationBar button {
            border-radius: 12px;
            background-color: #ffffff;
            border: none;
            /* padding: 10px; */
            /* cursor: pointer;
            width: 20px;
            height: 20px;
            color: black;
        } */

        .content {
            width: 100%;
            height: 100%;
            padding: 10%;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form > * {
            /* margin: 10px; */
            margin: 5px 0;
        }

        input[type="password"] {
            outline: none;
            width: 100%;
            height: 30px;
            border-style: none none solid none;
            border-width: 1px;
        }

        button {
            width: 50%;
            margin: 10px auto;
            height: 40px;
            border-radius: 20px;
            border-width: 1px;
        }
    </style>
</head>

<body>
    <div class="navigationBar"></div>

    <div class="content">
        <form action="" method="post">
            <label for="curr_password">Current password</label>
            <input type="password" name="current_password" id="curr_password">

            <label for="new_password">New password</label>
            <input type="password" name="new_password" id="new_password">

            <label for="confirm_pasword">Confirm password</label>
            <input type="password" name="confirm_password" id="confirm_password">

            <button type="submit">Update password</button>
        </form>
    </div>
</body>

</html>