<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        div#noti-contain {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

    </style>
</head>
<body>
    <!-- Top navigation guideline -->
    <?php //include_once "./top-navigationbar.php"; ?>

    <div id="noti-contain">
        <h4>Cannot use this feature at the moment</h4>
        <p>Notification</p>
    </div>

    <!-- Bottom navigation guideline -->
    <?php //include_once "./bottom-navigationbar.php"; ?>
</body>
</html>