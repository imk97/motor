<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'PT Serif';
        }

        #id {
            width: 100vw;
            height: 100vh;
        }


    </style>
</head>

<body>

    <!-- Top navigation guideline -->
    <?php include_once "./top-navigationbar.php"; ?>

    <div id="contain" style="overflow-y: scroll;"></div>

    <!-- Bottom navigation guideline -->
    <?php include_once "./bottom-navigationbar.php"; ?>
</body>

</html>