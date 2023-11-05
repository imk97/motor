<?php
// session_start();
if (isset($_SESSION["name"]) == null && isset($_SESSION["id"]) == null) {
    header("Location: signin.php", 401);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top navigation bar</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .topNav {
            width: 100%;
            height: 50px;
            position: relative;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>
</head>
<body>
    <div class="topNav">
        <?php if ($_SERVER["PHP_SELF"] == "/motor/setting.php") { ?>
            <h3>Settings</h3>
        <?php } ?>
    </div>
</body>
</html>