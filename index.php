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
            /* background-color: #B2B2B2; */
            width: 100%;
            height: 50px;
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            background-color: #f5f5f5;
        }

        .navigationBar>p {
            font-weight: bold;
            padding: 15px 20px;
            font-size: 20px;
        }

        .navigationBar>p:first-child {
            position: absolute;
            left: 0;
        }

        .navigationBar>p:last-child {
            position: absolute;
            right: 0;
        }

        .header {
            width: 100%;
            height: 100px;
            padding: 30px;
            /* background-color: whitesmoke; */
        }

        .header>h2,
        h3 {
            text-align: center;
        }

        .title > h5 {
            font-weight: bold;
            padding: 5px 20px;
        }

        .card-container {
            padding: 10px 20px;
            /* position: relative; */
        }

        .card-contain {
            /* cursor: pointer; */
            width: 100%;
            height: 100px;
            border-radius: 12px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            background-color: white;
            padding: 10px;
            display: flex;
        }

        .card-contain > div#left {
            width: 70%;
        }

        .card-contain > div#right {
            width: 30%;
            position: relative;
        }

        .card-contain > div > p, h4, a {
            height: auto;
            position: relative;
            top: 10px;
            padding: 2px;
            /* vertical-align: middle; */
        }

        .card-contain > div > p {
            font-size: 12px;
        }

        .card-contain > div > #noline {
            text-decoration: none;
            color: grey;
        }

        .card-contain > div > img {
            display: block;
            margin-left: auto;
            /* margin-right: 15px;
            position: relative;
            top: 25%; */
        }

        .category {
            width: 100%;
            /* height: 30px; */
            padding: 5px 20px;
            /* border: 1px solid black; */
            margin: auto;
            display: flex;
            /* box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); */
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

        @media screen and (max-width: 768px) {
            .card-contain > div > img {
                width: 45%;
                height: auto;
                padding-top: 10px;
                padding-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="navigationBar">
        <p>Hi, itmam</p>
        <p>&#43;</p>
    </div>

    <div class="header">
        <h2>2 Motor Maintenace</h2>
        <h3>in Scheduled</h3>
    </div>

    <!-- category - itmam/1/8/2023 -->
    <div class="category">
        <div class="card-category">All</div>
        <div class="card-category">Upcoming</div>
        <div class="card-category">Completed</div>
    </div>

    <div class="title">
        <h5>Select</h5>
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
                    <img src="./image/done.png" alt="Done" width="30%">
                </div>
            </div>
        </div>
    <?php } ?>

</body>

</html>