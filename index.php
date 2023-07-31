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
        }

        .navigationBar>p {
            font-weight: bold;
            padding: 15px 20px;
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
            position: relative;
        }

        .card-contain {
            /* cursor: pointer; */
            width: 100%;
            height: 100px;
            border-radius: 12px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            background-color: white;
            padding: 10px;
        }

        .card-contain > p, h4, a {
            height: auto;
            position: relative;
            top: 10px;
            padding: 2px;
            /* vertical-align: middle; */
        }

        .card-contain > p {
            font-size: 12px;
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

    <div class="title">
        <h5>Select</h5>
    </div>


    <!-- Contain card -->
    <div class="card-container">
        <div class="card-contain">
            <p>5 May 2023 &bull; 17:56</p>
            <h4>Service 1</h4>
            <a href="javascript:void(0)">Detail</a>
        </div>
    </div>

    <!-- <div class="card-container">
        <div class="card-contain">
            <p>5 May 2023</p>
            <h5>Tukar Minyak Hitam</h5>
        </div>
    </div> -->

    <!-- <div class="card-container">
        <div class="card-contain">
            <p>5 May 2023</p>
            <h5>Tukar Minyak Hitam</h5>
        </div>
    </div> -->

</body>

</html>