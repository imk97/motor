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
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'PT Serif';
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
            padding: 5px 10vw 0 10vw;
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

        input[type="file"] {
            width: 100%;
            display: none;
        }

        .contents> form > #profile {
            /* width: 100px;
            height: 100px;
            outline: solid;
            outline-width: 1px;
            margin: 40px auto;
            border-radius: 50px; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        input[type="button"] {
            position: relative;
            left: 50px;
            width: 40px;
            height: 20px;
            border: none;
            /* background-color: green; */
        }

        .contents img {
            width: 70px;
            height: 70px;
            /* height: 50%; */
            /* margin: auto; */
            /* display: block; */
            /* margin-bottom: 20px; */
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

        #updProfile {
            background-color: #f4f4f4;
            width: 100%;
            height: 50vh;
            position: absolute;
            bottom: 0;
            z-index: 1;
            display: none;
        }

        #confirmation {
            column-count: 2;
            column-width: 100px;
            background-color: blue;
            list-style: none;
        }
    </style>
</head>

<body>

    <!-- Top navigation guideline -->
    <?php include_once "./top-navigationbar.php"; ?>

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
                    <div id="profile">
                        <img src="profile_images/<?php echo $profile = (isset($row["picture"]) != null) ? $row["picture"] : "person.png" ;?>" alt="">
                        <input type="button" value="Edit" onclick="upload()">
                    </div>
                    <label for="name">Full name</label>
                    <input type="text" name="name" id="name" value="<?php echo $name = (isset($row["name"])) ? $row["name"] : null; ?>" oninput="enSubmitBtn()">

                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $email = (isset($row["email"])) ? $row["email"] : null ; ?>" oninput="enSubmitBtn()">

                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" value="<?php echo $phone = (isset($row["phone"])) ? $row["phone"] : null; ?>" oninput="enSubmitBtn()">

                    <button type="submit" class="disabled">Save</button>

                </form>
            </div>

            <div id="updProfile">
                <div id="updContain">
                    <img src="profile_images/<?php echo $profile = (isset($row["picture"]) != null) ? $row["picture"] : "person.png" ;?>" alt="" style="background-color: white;">
                    <label for="uploadProfile" id="edit">Edit</label>
                    <input type="file" name="profile" id="uploadProfile" onclick="upload()">
                    <ul id="confirmation">
                        <li><button type="submit">Save</button></li>
                        <li><button type="submit">Cancel</button></li>
                    </ul>
                </div>
            </div>

    <?php }
    }
    ?>

    <!-- Bottom navigation guideline -->
    <?php //include_once "./bottom-navigationbar.php"; ?>

</body>

<script>
    function enSubmitBtn() {
        // console.log("tekan input")
        let btn = document.getElementsByTagName("button")
        btn[0].style.opacity = "1"
    }

    function upload() {
        console.log("upload profile")
        let openProfile = document.getElementById("updProfile")
        openProfile.style.display = "block"
        // enSubmitBtn()
    }
</script>

</html>