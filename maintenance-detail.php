<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance detail</title>

    <script src="https://kit.fontawesome.com/50f334ce21.js" crossorigin="anonymous"></script>    <link rel="preconnect" href="https://fonts.googleapis.com">

</head>
<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    body {
        /* background-color: #f5f5f5; */
    }

    .navigationBar {
        width: 100%;
        max-width: 100%;
        height: 50px;
        background-color: #f5f5f5;
        font-weight: bold;
        padding: 15px 20px;
    }

    /* .navigationBar div:last-child {
        justify-content: center;
        text-align: center;
    } */

    .checklist-container {
        padding: 15px 20px;
        margin: auto;
    }

    ul li {
        list-style-type: none;
        /* margin: 0px 30px 5px 0px; */
    }

    label {
        margin-left: 50px;
    }


</style>
<body>
    <div class="navigationBar">
        <div><i class="fas fa-arrow-left"></i></div>
        <!-- <div>Maintenance Detail</div> -->
    </div>

    <div class="checklist-container">
        <h3>LIST</h3>
        <hr><br>
        <ul>
            <li>
                <input type="checkbox" name="minyakHitam" id="minyakHitam">
                <label for="minyakHitam">Minyak Hitam</label>
            </li>
            <li>
                <input type="checkbox" name="waterCoolant" id="waterCoolant">
                <label for="waterCoolant">Water Coolant</label>
            </li>
        </ul>
    </div>
</body>
</html>