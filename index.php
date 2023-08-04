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
        }

        .bottomsheet-body > form > label {
            display: block;
            padding: 10px 0px;
            font-weight: bold;
        }

        .bottomsheet-container .bottomsheet-contents .bottomsheet-body > form > input[type=number], input[type=text], input[type=datetime] {
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
            height: 30px;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: blue;
            color: #ffffff;
            border-radius: 12px;
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
        }

    </style>
</head>

<body>
    <div class="navigationBar">
        <ul>
            <li>Hi, itmam</li>
            <li style="float: right">&#43;</li>
        </ul>
    </div>

    <div class="header">
        <h2>2 Motor Maintenace</h2>
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

                <form action="" method="post">
                    <label for="date">Date</label>
                    <input type="datetime" name="date" id="date">

                    <label for="threshold">Threshold <bold>(km)</bold></label>
                    <input type="number" name="threshold" id="threshold">
                
                    <label for="service">Type of service</label>
                    <input type="text" name="service" id="service">

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let viewport = document.querySelector("meta[name=viewport]")
        console.log(viewport)

        console.log(screen.height)
    </script>

</body>

</html>