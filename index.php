<?php
session_start();
// Check have permission to access the file or not
if (isset($_SESSION["name"]) == null && (isset($_SESSION["id"])) == null) {
    // Http code is authorized
    header('Location: signin.php', 401);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor maintenance</title>

    <script src="https://kit.fontawesome.com/50f334ce21.js" crossorigin="anonymous"></script>    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'PT Serif', serif;
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0) !important; 
            -webkit-focus-ring-color: rgba(255, 255, 255, 0) !important; 
            outline: none !important;
        }

        body {
            /* background-color: #f5f5f5; */
            background-color: #ffffff;
        }

        .navigationBar {
            max-width: 100%;
            height: 50px;
            top: 0;
            background-color: #ffffff;
            padding: 15px 20px;
            font-weight: bold;
            /* position: sticky;
            position: -webkit-sticky;
            overflow: hidden; */
        }

        ul {
            list-style-type: none;
        }

        .navigationBar > ul > li {
            float: left;
            color: black;
        }

        .navigationBar > ul > li:first-child {
            cursor: pointer;
        }

        .header {
            max-width: 100%;
            height: 100px;
            padding: 30px;
        }

        .header > * {
            text-align: center;
        }

        .title > h3 {
            font-weight: bold;
            padding: 5px 20%;
        }

        .card-container {
            padding: 1vh 20vw;
        }

        .card-contain {
            max-width: 100%;
            height: 100px;
            border-radius: 12px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            background-color: #f5f5f5;
            padding: 10px;
            display: flex;
        }

        .card-contain > div#left {
            width: 90%;
        }

        .card-contain > div#right {
            width: 10%;
            position: relative;
        }

        .card-contain > div > p, h4, a {
            height: auto;
            padding: 2px;
        }

        .card-contain > div > p {
            font-size: 12px;
        }

        .card-contain > div > #noline {
            text-decoration: none;
            color: grey;
        }

        .card-contain > div > img {
            /* display: block;
            margin-left: auto;
            margin-right: 15px;
            position: relative;
            top: 25%; */
            max-width: 100%;
        }

        .category {
            width: 100%;
            padding: 5px 20%;
            margin: auto;
            display: flex;
        }

        .card-category {
            width: 100%;
            /* height: 30px; */
            /* position: absolute; */
            /* border: 3px solid salmon; */
            text-align: center;
            /* margin: 0px 10px; */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            padding: 5px 0px;
            margin: 5px;
            border-radius: 12px;
            font-weight: bold;
        }

        .search-container {
            margin: auto;
            width: 100%;
            padding: 1vh 20%;
            margin-bottom: 2vh;
        }

        .search-container > input[type=text] {
            width: 100%;
            height: 40px;
            border: none;
            border-radius: 12px;
            padding: 2vh 5px;
        }

        .bottomsheet-container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column-reverse;
            opacity: 0;
            pointer-events: none;
        }

        .bottomsheet-container.show {
            opacity: 1;
            pointer-events: auto;
        }

        .bottomsheet-container .bottomsheet-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.85);
            z-index: -1;
            opacity: 0.3;
        }

        .bottomsheet-container .bottomsheet-contents {
            background: #f5f5f5;
            height: 400px;
            padding: 5vh 20%;
            border-radius: 15px 15px 0px 0px;
            position: relative;
            bottom: -400px;
        }

        .bottomsheet-contents.show {
            bottom: 0;
            transition: all 1s ease;
        }

        .bottomsheet-body > form > label {
            display: block;
            padding: 10px 0px;
            font-weight: bold;
        }

        .bottomsheet-container .bottomsheet-contents .bottomsheet-body > form > input[type=number], input[type=text], input[type=date] {
            text-indent: 5px;
            border-style: none none solid none;
            border-radius: 0px;
            border-width: 1px;
            border-color: black;
            background-color: #f5f5f5;
            width: 100%;
            height: 40px;
        }

        .bottomsheet-container .bottomsheet-contents .bottomsheet-body > form > button {
            margin: auto;
            width: 150px;
            height: 40px;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: black;
            color: #ffffff;
            border-radius: 10px;
            border-style: none;
            font-size: 16px;
        }

        #addButton {
            cursor: pointer;
            background-color: #ffffff;
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
            opacity: 0;
        }

        .sidemenu-container .sidemenu-overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            background-color: rgba(0,0,0,0.85);
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0;
        }

        .sidemenu-container.show {
            opacity: 1;
            pointer-events: auto;
        }

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
            /* box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15); */
        }

        .sidemenu-content.show {
            left: 0px;
            transition: all 0.8s ease;
        }

        .sidemenu-content > div {
            text-align: start;
            color: #ffffff;
            padding: 10px 20px;
        }
        .sidemenu-content ul li {
            color: #ffffff;
            padding: 10px 20px;
            /* margin: 30px 0px;  */
            cursor: pointer;
        }

        .sidemenu-content ul li i {
            padding-left: 0px;
            padding-right: 20px;
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .sidemenu-content > ul > li:last-child {
            position: absolute;
            bottom: 0px;
            width: 100%;
            margin-bottom: 10px;
            /* border-top: 1px solid whitesmoke; */
            /* padding-top: 20px; */
            /* margin-bottom: 5px; */
        }

        @media screen and (max-width: 768px) {
            .card-container {
                padding: 0.5vh 3vw;
            }

            .title > h3 {
                font-weight: bold;
                padding: 0px 3vw;
                margin-top: 20px;
            }

            .category {
                padding: 0px 3vw;
            }

            .search-container {
                padding: 0px 3vw;
            }

            .bottomsheet-container .bottomsheet-contents {
                padding: 15px 3vw;
            }

            .bottomsheet-container .bottomsheet-contents .bottomsheet-body > form > button {
                width: 100%;
            }
        }

    </style>
</head>

<body id="main">
    <div class="navigationBar">
        <ul>
            <li id="sidemenubar">Hi, <?php echo $_SESSION["name"]; ?></li>
            <li id="addButton" style="float: right;">&#43;</li>
        </ul>
    </div>

    <!-- Side menu -->
    <div class="sidemenu-container">
        <div class="sidemenu-overlay"></div>
        <div class="sidemenu-content">
            <div><?php echo $_SESSION["name"]; ?></div>
            <div><?php echo $_SESSION["email"]; ?></div>
            <hr>
            <ul>
                <li id="home"><i class="fa-solid fa-house"></i>Dashboard</li>
                <li id="vehicle"><i class="fa-solid fa-car"></i>Vehicle</li>
                <li id="profile"><i class="fa-regular fa-user"></i>Profile</li>
                <li id="logout" onclick="logout()"><i class="fa-solid fa-right-from-bracket"></i>Logout</li>
            </ul>
        </div>
    </div>

    <div class="header">
        <h2>2 Motor Maintenace Yet</h2>
        <h3>in Scheduled</h3>
    </div>

    <!-- Search -->
    <div class="search-container">
        <input type="text" name="search" id="search" placeholder="Search..">
        <!-- <button type="submit"><i class="fa fa-search"></i></button> -->
    </div>

    <!-- category - itmam/1/8/2023 -->
    <div class="category">
        <div class="card-category">All</div>
        <div class="card-category">Upcoming</div>
        <div class="card-category">Completed</div>
    </div>

    <div class="title">
        <h3>Select</h3>
    </div>

    <?php for ($i=0; $i < 10; $i++) { ?>
        <!-- Contain card -->
        <div class="card-container">
            <div class="card-contain">
                <div id="left">
                    <p>5 May 2023 &bull; 17:56</p>
                    <h4>Service 1</h4>
                    <a id="noline" href="javascript:void(0)">Detail</a>
                </div>
                <div id="right">
                    <!-- <img src="./image/new_tick.png" alt="Done"> -->
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Bottom sheet component -->
    <div class="bottomsheet-container">
        <div class="bottomsheet-overlay"></div>       
        <div class="bottomsheet-contents">
            <div class="bottomsheet-body">

                <h2 style="text-align: center; padding-top: 10px">Maintenance Detail</h2>

                <form action="./detail.php" method="post">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date">

                    <label for="threshold">Threshold <bold>(km)</bold></label>
                    <input type="number" name="threshold" id="threshold">
                
                    <label for="service">Type of service</label>
                    <input type="text" name="service" id="service">

                    <button type="submit">Next</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // let viewport = document.querySelector("meta[name=viewport]")
        // console.log(viewport)

        // console.log(screen.height)

        // Buka dan tutup BOTTOM SHEET
        let showBottomSheet = document.getElementById("addButton")
        let bottomSheet = document.getElementsByClassName("bottomsheet-container")
        let exitBottomSheet = bottomSheet[0].getElementsByClassName("bottomsheet-overlay")
        let containBottomSheet = document.getElementsByClassName("bottomsheet-contents")

        showBottomSheet.addEventListener("click", () => {
            // console.log("Berjaya tekan add button")
            bottomSheet[0].classList.add("show")
            containBottomSheet[0].classList.add("show")
        })

        exitBottomSheet[0].addEventListener("click", () => {
            // console.log("Berjaya tutup bottom sheet")
            bottomSheet[0].classList.remove("show")
            containBottomSheet[0].classList.remove("show")
        })

        // Buka dan tutup SIDE MENU bar
        let sidemenubar = document.getElementById("sidemenubar")
        let sidemenu = document.getElementsByClassName("sidemenu-container")
        let exitSidemenu = sidemenu[0].getElementsByClassName("sidemenu-overlay")
        let contentSidemenu = document.getElementsByClassName("sidemenu-content")

        sidemenubar.addEventListener("click", () => {
            // console.log("sidemenu")
            sidemenu[0].classList.add("show")
            contentSidemenu[0].classList.add("show")
        })

        exitSidemenu[0].addEventListener("click", () => {
            // console.log("Tutup bottom sheet")
            sidemenu[0].classList.remove("show")
            contentSidemenu[0].classList.remove("show")
        })

        // Logout dari system
        function logout() {
            window.location.href = "logout.php"
        }



    </script>

</body>

</html>