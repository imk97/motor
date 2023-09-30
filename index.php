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

    <script src="https://kit.fontawesome.com/50f334ce21.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
            background-color: #ffffff;
            padding: 10px 20px;
            font-weight: bold;
            box-shadow: 0 0px 4px 0 rgba(0, 0, 0, 0.2);
        }

        .navigationBar #sidemenubar {
            display: inline-block;
            width: 30px;
            height: 30px;
            background-image: url("image/person.png");
            background-size: contain;
        }

        .navigationBar #addButton {
            display: inline-block;
            width: 30px;
            height: 30px;
            /* background-color: black; */
            float: right;
            text-align: center;
            font-size: 20px;
        }

        .header {
            max-width: 100%;
            height: 100px;
            padding: 30px;
        }

        .header>* {
            text-align: center;
        }

        .title>h3 {
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
            /* box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); */
            background-color: #f5f5f5;
            padding: 10px;
            display: flex;
            /* cursor: pointer; */
        }

        .card-contain>div#left {
            width: 90%;
        }

        .card-contain>div#right {
            width: 10%;
            position: relative;
        }

        .card-contain>div>p,
        h4,
        a {
            height: auto;
            padding: 2px;
        }

        .card-contain>div>p {
            font-size: 12px;
        }

        .card-contain>div>#noline {
            text-decoration: none;
            color: grey;
        }

        .card-contain>div>img {
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
            justify-content: space-evenly;
        }

        .card-category {
            width: 100px;
            /* height: 30px; */
            /* position: absolute; */
            /* border: 3px solid salmon; */
            text-align: center;
            /* margin: 0px 10px; */
            /* box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); */
            padding: 5px 0px;
            /* margin: 5px; */
            border-radius: 12px;
            font-weight: bold;
            border: 0.5px solid black;
            cursor: pointer;
        }

        .card-category.active {
            background-color: #272829;
            color: white;
        }

        .search-container {
            margin: auto;
            width: 100%;
            padding: 1vh 20%;
            margin-bottom: 2vh;
        }

        .search-container>input[type=text] {
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
            pointer-events: none;
        }

        .bottomsheet-container .bottomsheet-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            z-index: -1;
            opacity: 0;
        }

        .bottomsheet-container .bottomsheet-contents {
            background: #ffffff;
            height: 400px;
            padding: 5vh 20%;
            border-radius: 30px 30px 0px 0px;
            position: fixed;
            left: 0;
            right: 0;
            bottom: -400px;
            width: 100%;
            transition: bottom 0.5s ease-in-out;
        }

        .bottomsheet-body>label {
            display: block;
            padding: 10px 0px;
            font-weight: bold;
        }

        .bottomsheet-container .bottomsheet-contents .bottomsheet-body>input[type=number],
        input[type=text],
        input[type=date],
        select {
            display: block;
            text-indent: 5px;
            border-style: none none solid none;
            border-radius: 0px;
            border-width: 1px;
            border-color: black;
            background-color: #ffffff;
            width: 100%;
            height: 40px;
            min-width: 98%;
            /* position: relative; */
        }

        .bottomsheet-container .bottomsheet-contents .bottomsheet-body>button {
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

        .sidemenu-container .sidemenu-content ul > * {
            margin: 10px 0px;
            list-style: none;
            color: white;
        }

        .sidemenu-content #ppicture {
            width: 30px;
            height: 30px;
            background-color: #ffffff;
            background-image: url("image/person.png");
            background-size: contain;
            margin-bottom: 5px;
        }

        .sidemenu-content * > i {
            margin-right: 30px;
            width: 20px;
            height: 20px;
        }

        .sidemenu-container .sidemenu-content ul > li:last-child {
            /* background-color: blue; */
            position: absolute;
            bottom: 0px;
            width: 90%;
        }

        @media screen and (max-width: 768px) {

            .navigationBar {
                padding-left: 3vw;
                padding-right: 3vw;
            }

            .card-container {
                padding: 0.5vh 3vw;
            }

            .title>h3 {
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

            .bottomsheet-container .bottomsheet-contents .bottomsheet-body>button {
                width: 100%;
            }

        }
    </style>
</head>

<body id="main">
    <div class="navigationBar">
        <div id="sidemenubar"></div>
        <div id="addButton">&#43;</div>
    </div>

    <!-- Side menu -->
    <div class="sidemenu-container">
        <div class="sidemenu-overlay"></div>
        <div class="sidemenu-content">
            <ul>
                <li id="ppicture"></li>
                <li style="font-size: 12px;"><?php echo $_SESSION["email"]; ?></li>
                <li id="home"><i class="fa-solid fa-house"></i>Dashboard</li>
                <!-- <li id="vehicle"><i class="fa-solid fa-car"></i>Vehicle</li> -->
                <li id="profile"><i class="fa-regular fa-user"></i>Profile</li>
                <li id="logout" onclick="logout()"><i class="fa-solid fa-right-from-bracket"></i>Logout</li>
            </ul>
        </div>
    </div>

    <div class="header">
        <h2 id="situation"></h2>
        <h3><?php echo $_SESSION["name"]?></h3>
    </div>

    <!-- Search -->
    <!-- <div class="search-container">
        <input type="text" name="search" id="search" placeholder="Search..">
        <!-- <button type="submit"><i class="fa fa-search"></i></button>
    </div> -->

    <!-- category - itmam/1/8/2023 -->
    <!-- <div class="category">
        <div class="card-category active">All</div>
        <div class="card-category">Upcoming</div>
        <div class="card-category">Completed</div>
    </div> -->

    <div class="title">
        <h3>Select</h3>
    </div>

    <?php
    include './db.php';
    $sql = "select * from maintenance where userid = ? ";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["id"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <!-- Contain card -->
            <div class="card-container">
                <div class="card-contain">
                    <div id="left">
                        <p><?php echo date('Y-m-d', strtotime($row["tarikh"])); ?> &bull; <?php echo date('H:i', strtotime($row["tarikh"] . '+ 8 hours')); ?></p>
                        <h4><?php echo $row["serviceType"]; ?></h4>
                        <a id="noline" href="javascript:void(0)">Detail</a>
                    </div>
                    <div id="right">
                        <!-- <img src="./image/new_tick.png" alt="Done"> -->
                    </div>
                </div>
            </div>
    <?php }
    } ?>

    <!-- Bottom sheet component -->
    <div class="bottomsheet-container">
        <div class="bottomsheet-overlay"></div>
        <div class="bottomsheet-contents">
            <div class="bottomsheet-body">

                <h2 style="text-align: center; padding-top: 10px">Maintenance Detail</h2>

                <!-- <form action="./detail.php" method="post"> -->

                <label for="threshold">Threshold <bold>(km)</bold></label>
                <input type="number" name="threshold" id="threshold">

                <label for="service">Type of service</label>
                <input type="text" name="service" id="service">

                <label for="noplate">No plate</label>
                <select name="vehicle" id="noplate">
                    <option value=""></option>
                    <option value="jug3455">JUG 3455</option>
                </select>

                <button type="submit" onclick="submit()">Next</button>
                <!-- </form> -->
            </div>
        </div>
    </div>

    <script>
        var today = new Date();
        var timeline;
        window.onload = function() {
            if (today.getHours() < 12) {
                timeline = "Good morning"
            } else if (today.getHours() < 18) {
                timeline = "Good afternoon"
            } else {
                timeline = "Good evening"
            }
            document.getElementById("situation").innerHTML = timeline
            // document.getElementById("sidemenu").style.backgroundImage = "url('image/done.png')"
        }

        // let viewport = document.querySelector("meta[name=viewport]")
        // console.log(viewport)

        // console.log(screen.height)
                
        let body = document.getElementById("main")

        // Buka dan tutup BOTTOM SHEET
        let showBottomSheet = document.getElementById("addButton")
        let bottomSheet = document.getElementsByClassName("bottomsheet-container")
        let exitBottomSheet = bottomSheet[0].getElementsByClassName("bottomsheet-overlay")
        let containBottomSheet = document.getElementsByClassName("bottomsheet-contents")

        showBottomSheet.addEventListener("click", () => {
            body.style.overflow = "hidden"
            bottomSheet[0].style.pointerEvents = "auto" // https://stackoverflow.com/questions/16492401/javascript-setting-pointer-events
            exitBottomSheet[0].style.opacity = "0.1"
            containBottomSheet[0].style.bottom = "0"
            // console.log("Berjaya tekan add button")
        })

        exitBottomSheet[0].addEventListener("click", () => {
            bottomSheet[0].style.pointerEvents = "none"
            bottomSheet[0].style.animation = "opacity 0.5s ease-in-out"
            exitBottomSheet[0].style.opacity = "0"
            containBottomSheet[0].style.bottom = "-400px"
            body.removeAttribute("style")
            // console.log("Berjaya tutup bottom sheet")
        })

        // Buka dan tutup SIDE MENU bar
        let sidemenubar = document.getElementById("sidemenubar")
        let sidemenu = document.getElementsByClassName("sidemenu-container")
        let exitSidemenu = sidemenu[0].getElementsByClassName("sidemenu-overlay")
        let contentSidemenu = document.getElementsByClassName("sidemenu-content")

        sidemenubar.addEventListener("click", () => {
            body.style.overflow = "hidden"
            sidemenu[0].style.pointerEvents = "auto"
            contentSidemenu[0].style.left = "0"
            // console.log("sidemenu")
        })

        exitSidemenu[0].addEventListener("click", () => {
            sidemenu[0].style.pointerEvents = "none"
            sidemenu[0].style.animation = "opacity 0.5s ease-in-out"
            contentSidemenu[0].style.left = "-300px"
            body.removeAttribute("style")
            // console.log("Tutup bottom sheet")
        })

        // Logout dari system
        function logout() {
            window.location.href = "logout.php"
        }

        function submit() {
            let threshold = document.getElementById("threshold").value
            let service = document.getElementById("service").value
            let plate = document.getElementById("noplate").value
            // console.log(threshold)
            let now = new Date()
            // console.log(now)
            // console.log(now.getMinutes())
            // console.log(now.getMinutes() + (5))
            let expireTime = now.getMinutes() + 1
            now.setMinutes(expireTime)
            console.log(now)
            // console.log(now.toUTCString())
            document.cookie = "threshold=" + threshold + ";expires=" + now.toUTCString()
            document.cookie = "service=" + service + ";expires=" + now.toUTCString()
            document.cookie = "plate=" + plate + ";expires=" + now.toUTCString()

            window.location.href = "detail.php"
        }

        document.getElementById("service").onchange = () => {
            let service = document.getElementById("service").value
            let firstLetter = service.charAt(0).toUpperCase()
            let remainingWord = service.slice(1)
            // console.log(firstLetter)
            document.getElementById("service").value = firstLetter + remainingWord
        }
    </script>

</body>

</html>