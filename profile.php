<?php
include_once "db.php";
session_start();
if (!isset($_SESSION["name"])) {
    header('Location: signin.php', 401);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <script src="https://kit.fontawesome.com/50f334ce21.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* body {
            width: 100vw;
            height: 100vh;
            position: fixed;
            right: -100vw;
            transition: right 0.5s ease-in-out;
            /* animation: openBody 0.5s; 
        } */

        .navigationBar {
            width: 100%;
            max-width: 100%;
            height: 50px;
            background-color: #ffffff;
            font-weight: bold;
            /* display: flex;
            align-items: center; */
            padding: 15px 20px;
            /* box-shadow: 0 0px 4px 0 rgba(0, 0, 0, 0.2); */
            position: sticky;
            top: 0;
            right: 0;
            left: 0;
        }

        .navigationBar div {
            display: inline;
            margin-left: 20px;
        }

        .navigationBar button {
            border-radius: 12px;
            background-color: #ffffff;
            border: none;
            /* padding: 10px; */
            /* cursor: pointer; */
            width: 20px;
            height: 20px;
            color: black;
        }

        .contents {
            /* margin: 10vw 10vw; */
            padding: 10% 10vw;
        }

        .contents > form > * {
            margin: 10px 0;
        }

        .contents > form > label {
            color: grey;
            float: left !important;
        }

        .contents > form > input[type="text"],
        input[type="tel"] {
            width: 100%;
            height: 30px;
            border-style: none none solid none;
            border-width: 1px;
            outline: none;

        }

        .contents> form > #profile {
            width: 100px;
            height: 100px;
            outline: solid;
            outline-width: 1px;
            margin: 40px auto;
            border-radius: 50px;
        }

        .contents img {
            width: 25%;
            /* height: 50%; */
            margin: auto;
            display: block;
            margin-bottom: 20px;
        }

        /* #btn {
            width: 100%;
            padding: 0 10vw;
            position: absolute;
            bottom: 30px;
        } */

        button {
            width: 100%;
            height: 45px;
            background-color: #000000;
            color: #ffffff;
            border-radius: 10px;
        }

        .disabled {
            opacity: 0.5;
        }
    </style>
</head>

<body id="body">
    <div class="navigationBar">
        <!-- <button id="sidemenubar"><i class="fas fa-bars" style="color: #000000;"></i></button>
        <div>Profile</div> -->
    </div>

    <?php
    $sql = "select * from user where id = ? ";
    $stmt = mysqli_prepare($conn, $sql);
    //Defense from sql injection
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="contents">
                <!-- <img src="image/person.png" alt=""> -->
                <!-- <div id="profile"></div> -->
                <form action="./update-profile.php" method="post">
                    <img src="profile_images/<?php echo $profile = (isset($row["picture"]) != null) ? $row["picture"] : "person.png" ;?>" alt="">
                    <label for="name">Full name</label>
                    <input type="text" name="name" id="name" value="<?php echo $row["name"]; ?>" oninput="test()">
                    <!-- <hr> -->
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $row["email"]; ?>" oninput="test()">
                    <!-- <hr> -->
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" value="<?php echo $row["phone"]; ?>" oninput="test()">

                    <button type="submit" class="disabled">Save</button>

                </form>
            </div>
    <?php }
    }
    ?>

    <!-- <div id="btn">
        <button type="submit" class="disabled">Save</button>
    </div> -->

</body>

<script>
    var body = document.getElementById("body")

    window.onload = function() {
        body.style.right = "0px";
    }

    function test() {
        console.log("tekan input")
        let btn = document.getElementsByTagName("button")
        // btn[0].classList.remove("disabled")
        btn[0].style.opacity = "1"
    }
</script>

</html>