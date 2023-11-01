<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>

    <script src="https://kit.fontawesome.com/50f334ce21.js" crossorigin="anonymous"></script>
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet"> -->


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .btnNav {
            width: 100%;
            height: 50px;
            position: fixed;
            bottom: 0;
        }

        ul {
            column-count: 5;
            column-gap: 0;
            height: 100%;
            background-color: black;
            color: white;

        }

        li {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            list-style: none;
            /* background-color: blue; */
            height: 100%;
        }

        li.active {
            /* background-color: #ffffff; */
            color: grey;
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
            padding: 10px;
            /* border-radius: 30px 30px 0px 0px; */
            position: fixed;
            left: 0;
            right: 0;
            bottom: -400px;
            width: 100%;
            transition: bottom 0.2s linear;
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
            outline: none;
            /* position: relative; */
        }

        .bottomsheet-container .bottomsheet-contents .bottomsheet-body>button {
            margin: 20px auto 20px auto;
            width: 80%;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: black;
            color: #ffffff;
            border-radius: 10px;
            border-style: none;
            font-size: 16px;
        }


    </style>
</head>
<body>
    <div class="btnNav">
        <ul>
            <li onclick="navigation('main')"><i class="fa-solid fa-house"></i></li>
            <li onclick="navigation('search')"><i class="fa-solid fa-magnifying-glass"></i></li>
            <li id="btnForm"><i class="fa-solid fa-circle-plus"></i></li>
            <li onclick="navigation('notification')"><i class="fa-regular fa-bell"></i></li>
            <li onclick="navigation('setting')"><i class="fa-regular fa-user"></i></li>
        </ul>
    </div>

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

        var red
        window.onload = () => {
            navigation('main')
        }

        function navigation(redirect) {
            let currentScreen = false
            let current = document.getElementsByTagName("li")
            // console.log(current)
            for (let index = 0; index < current.length; index++) {
                const element = current[index];
                let test = element.classList.contains("active")
                if (test == true) {
                    element.classList.remove("active")
                    // console.log(element)
                }
            }

            // Kena check dulu baru buat request kepada server
            if (red != "main") {
                if (red === redirect) {
                // console.log("test")
                    currentScreen = true
                }
            }

            // let red
            switch (redirect) {
                case "main":
                    current[0].classList.add("active")
                    red = redirect
                    break;

                case "search":
                    current[1].classList.add("active")
                    red = redirect
                    break;

                case "notification":
                    current[3].classList.add("active")
                    red = redirect
                    break;
                
                case "setting":
                    current[4].classList.add("active")
                    red = redirect
                    break;

                default:
                    break;
            }

            // Baru request kepada server
            if (!currentScreen) {
                reqAPI();  
            }
        }
        
        function reqAPI() {
                let http = new XMLHttpRequest()
                http.onload = function () {
                    document.getElementById("contain").innerHTML = this.responseText
                }
                http.open("GET", red+".php");
                http.send()
        }


        let btmFrom = document.getElementById("btnForm")
        let bottomSheet = document.getElementsByClassName("bottomsheet-container")
        let exitBottomSheet = bottomSheet[0].getElementsByClassName("bottomsheet-overlay")
        let containBottomSheet = document.getElementsByClassName("bottomsheet-contents")

        btmFrom.addEventListener("click", () => {
            bottomSheet[0].style.pointerEvents = "auto" // https://stackoverflow.com/questions/16492401/javascript-setting-pointer-events
            exitBottomSheet[0].style.opacity = "0.1"
            containBottomSheet[0].style.bottom = "0"
        })

        exitBottomSheet[0].addEventListener("click", () => {
            bottomSheet[0].style.pointerEvents = "none"
            bottomSheet[0].style.animation = "opacity 0.5s ease-in-out"
            exitBottomSheet[0].style.opacity = "0"
            containBottomSheet[0].style.bottom = "-400px"
            // body.removeAttribute("style")
            // console.log("Berjaya tutup bottom sheet")
        })


    </script>
</body>

</html>