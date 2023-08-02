<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor maintenance</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f5f5;
        }

        .navigationBar {
            max-width: 100%;
            height: 50px;
            top: 0;
            background-color: #f5f5f5;
            padding: 15px 20px;
            font-weight: bold;
            /* position: sticky;
            position: -webkit-sticky;
            overflow: hidden; */
        }

        .navigationBar > ul {
            list-style-type: none;
        }

        .navigationBar > ul > li {
            float: left;
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
            background-color: white;
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
            position: relative;
            top: 10px;
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

        .search-container > input {
            width: 100%;
            height: 30px;
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
        }

    </style>
</head>

<body>
    <div class="navigationBar">
        <ul>
            <li>Hi, itmam</li>
            <li style="float: right">&#43;</li>
        </ul>
        <!-- <p>Hi, itmam</p>
        <p>&#43;</p> -->
    </div>

    <div class="header">
        <h2>2 Motor Maintenace</h2>
        <h3>in Scheduled</h3>
    </div>

    <!-- Search -->
    <div class="search-container">
        <input type="search" name="search" id="search">
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

</body>

</html>