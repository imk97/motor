<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .card-container {
            /* padding: 1vh 20vw; */
            cursor: pointer;
            margin-bottom: 10px;
        }

        .card-contain {
            max-width: 100%;
            height: 100px;
            /* border-radius: 12px; */
            background-color: #f5f5f5;
            padding: 15px;
            /* display: flex; */
        }

        .card-contain > * {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .card-contain > p {
            font-size: 12px;
        }

        .card-contain > #noline {
            text-decoration: none;
            color: grey;
        }

    </style>
</head>
<body>

    <?php
        include './db.php';
        $sql = "select * from maintenance where userid = ? ";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $_SESSION["id"]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <!-- Contain card -->
        <div class="card-container">
            <div class="card-contain">
                    <p><?php echo date('Y-m-d', strtotime($row["tarikh"])); ?> &bull; <?php echo date('H:i', strtotime($row["tarikh"] . '+ 8 hours')); ?></p>
                    <h4><?php echo $row["serviceType"]; ?></h4>
                    <a id="noline" href="javascript:void(0)">Detail</a>
            </div>
        </div>
        <?php  }
            }
    } ?>


    <!-- <h1>Home</h1> -->

</body>
</html>