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
            /* background-color: rgba(0,0,0,0.85);
            opacity: 0; */
            display: flex;
            flex-direction: column-reverse;
            /* justify-content: end; */
            /* align-items: center; */
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
            height: 50vh;
            padding: 5vh 5vw;
            border-radius: 15px;
        }

        .bottomsheet-container .bottomsheet-contents .bottomsheet-body > * {
            display: block;
            margin-top: 1vh;
            margin-bottom: 1vh;
            border-style: none;
            height: 4vh;
            /* padding: 0px 20%; */
            /* text-indent: 5px; */
        }

        .bottomsheet-container .bottomsheet-contents .bottomsheet-body > button {
            color: white;
            background-color: blue;
            height: 40px;
            text-align: center;
            border-radius: 12px;
            margin-top: 10px;
        }

        .bottomsheet-container .bottomsheet-contents .bottomsheet-body > input[type=number], input[type=text] {
            text-indent: 5px;
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
                <!-- <h2>Hello, world!</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit explicabo vero quas eligendi, eos cupiditate sint aliquam a omnis commodi quos in libero veniam. Quidem, non a quibusdam consequuntur mollitia officia numquam sit quos dolorum quaerat reprehenderit laboriosam perspiciatis consequatur odit error dolore recusandae iste id quam magnam ut! Sint nulla minus excepturi libero officiis, deleniti, delectus obcaecati saepe natus rerum nesciunt! Nemo quo id ipsum fugiat voluptas ducimus incidunt nulla sed, voluptates modi exercitationem quod obcaecati corporis perspiciatis dolorum ullam provident sint iusto consequatur totam dolorem. Amet, praesentium accusamus dolore hic ad iusto nostrum exercitationem velit ex optio nihil obcaecati provident enim nobis molestiae cupiditate possimus error itaque facilis eligendi placeat eos quam! Consequatur eveniet corporis nam accusantium nemo harum non explicabo accusamus. Voluptatem laborum dolores magni voluptatibus doloribus sunt? Id quae vero, nemo nam dolore ab amet distinctio molestias excepturi blanditiis quia eos et eligendi magnam voluptas iusto.</p> -->
                <label for="date">Date</label>
                <input type="datetime" name="date" id="date" style="width: 100%">

                <label for="threshold">Threshold <bold>(km)</bold></label>
                <input type="number" name="threshold" id="threshold" style="width: 100%">
            
                <label for="service">Type of service</label>
                <input type="text" name="service" id="service" style="width: 100%">
            
                <button type="submit" style="margin: auto; width: 50%;">Submit</button>
            </div>

        </div>
    </div>

</body>

</html>