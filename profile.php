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
            /* display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; */
            margin: 10vw 10vw;
        }

        .contents>* {
            margin: 10px 0;
        }

        .contents > label {
            color: grey;
            float: left !important;
        }

        .contents > input[type="text"] {
            width: 100%;
            height: 30px;
            border-style: none none solid none;
            border-width: 1px;
            outline: none;

        }

        .contents > #profile {
            width: 100px;
            height: 100px;
            outline: solid;
            outline-width: 1px;
            margin: 40px auto;
            border-radius: 50px;
        }

        .sidemenu-container {
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            /* opacity: 0; */
        }

        .sidemenu-container .sidemenu-overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.85);
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0;
        }

        /* .sidemenu-container.show {
            opacity: 1;
            pointer-events: auto;
        } */

        .sidemenu-container .sidemenu-content {
            /* display: block; */
            height: 100%;
            width: 300px;
            background-color: #272829;
            z-index: 1;
            position: fixed;
            left: -300px;
            top: 0;
            bottom: 0;
            border-radius: 0px 12px 12px 0px;
            transition: all 0.8s ease;
            padding: 10px 20px;
            /* box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15); */
        }

        /* .sidemenu-content.show {
            left: 0px;
            transition: all 0.8s ease;
        } */

        .sidemenu-container .sidemenu-content ul>* {
            margin: 10px 0px;
            list-style: none;
            color: white;
        }

        .sidemenu-content #ppicture {
            width: 80px;
            height: 80px;
            background-color: #ffffff;
            background-image: url("image/person.png");
            background-repeat: no-repeat;
            background-size: contain;
            margin-bottom: 5px;
        }

        .sidemenu-content *>i {
            margin-right: 30px;
            width: 20px;
            height: 20px;
        }

        .sidemenu-container .sidemenu-content ul>li:last-child {
            /* background-color: blue; */
            position: absolute;
            bottom: 20px;
            width: 90%;
        }

        .contents img {
            width: 25%;
            /* height: 50%; */
            margin: auto;
            display: block;
            margin-bottom: 20px;
        }

    </style>
</head>

<body id="body">
    <div class="navigationBar">
        <!-- <button id="sidemenubar"><i class="fas fa-bars" style="color: #000000;"></i></button>
        <div>Profile</div> -->
    </div>

    <!-- Side menu -->
    <!-- <div class="sidemenu-container">
        <div class="sidemenu-overlay"></div>
        <div class="sidemenu-content">
            <ul>
                <li id="ppicture"></li>
                <li style="font-size: 12px;"><?php echo $_SESSION["email"]; ?></li>
                <li id="home"><i class="fa-solid fa-house"></i>Dashboard</li>
                <li id="vehicle"><i class="fa-solid fa-car"></i>Vehicle</li> 
                <li id="profile" onclick="profile()"><i class="fa-regular fa-user"></i>Profile</li>
                <li id="logout" onclick="logout()"><i class="fa-solid fa-right-from-bracket"></i>Logout</li>
            </ul>
        </div>
    </div> -->


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
                <img src="image/person.png" alt="">
                <label for="name">Full name</label>
                <input type="text" name="name" id="name" value="<?php echo $row["name"]; ?>">
                <!-- <hr> -->
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $row["email"]; ?>">
                <!-- <hr> -->
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="">
            </div>
    <?php }
    }
    ?>
</body>

<script>
    var body = document.getElementById("body")

    window.onload = function() {
        body.style.right = "0px";
    }

    // Buka dan tutup SIDE MENU bar
    let sidemenubar = document.getElementById("sidemenubar")
    let sidemenu = document.getElementsByClassName("sidemenu-container")
    let exitSidemenu = sidemenu[0].getElementsByClassName("sidemenu-overlay")
    let contentSidemenu = document.getElementsByClassName("sidemenu-content")

    sidemenubar.addEventListener("click", () => {
        // body.style.overflow = "hidden"
        sidemenu[0].style.pointerEvents = "auto"
        contentSidemenu[0].style.left = "0"
        // console.log("sidemenu")
    })

    exitSidemenu[0].addEventListener("click", () => {
        sidemenu[0].style.pointerEvents = "none"
        sidemenu[0].style.animation = "opacity 0.5s ease-in-out"
        contentSidemenu[0].style.left = "-300px"
        // body.removeAttribute("style")
        // console.log("Tutup bottom sheet")
    })


    // function onBack() {
    //     // console.log("Anda pasti ke laman utama")
    //     // document.cookie = "tmpDetail=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/motor;"
    //     var body = document.getElementsByTagName("body")
    //     body[0].style.animation = "closeBody 0.5s"
    //     history.back()
    //     // window.location.href = "index.php"

    // }
</script>

</html>