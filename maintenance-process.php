<?php
session_start();
date_default_timezone_set("GMT"); //Global timezone
$tarikh = date("Y-m-d H:i:s");
$threshold = $_POST["threshold"];
$serviceType = $_POST["service"];

$engineOil = (isset($_POST["engineOil"])) ? $_POST["engineOil"] : null;
$waterCoolant = (isset($_POST["waterCoolant"])) ? $_POST["waterCoolant"] : null;
// $rantaiPemacu = (isset($_GET["rantaiPemacu"])) ? $_GET["rantaiPemacu"] : null;
$bendalirBrek = (isset($_POST["minyakBrek"])) ? $_POST["minyakBrek"] : null;
// $sistemBrek = (isset($_GET["sistemBrek"])) ? $_GET["sistemBrek"] : null;
$suisLampuBrek = (isset($_POST["suisLampuBrek"])) ? $_POST["suisLampuBrek"] : null;
$lampu_hone = (isset($_POST["lampu_hon"])) ? $_POST["lampu_hon"] : null;
// $sistemPencengkam = (isset($_GET["sistemPencengkam"])) ? $_GET["sistemPencengkam"] : null;
$tayarHadapan = (isset($_POST["tayarHadapan"])) ? $_POST["tayarHadapan"] : null;
$tayarBelakang = (isset($_POST["tayarBelakang"])) ? $_POST["tayarBelakang"] : null;
$palamPencucuh = (isset($_POST["palamPencucuh"])) ? $_POST["palamPencucuh"] : null;
// $sistemPenyejuk = (isset($_GET["sistemPenyejuk"])) ? $_GET["sistemPenyejuk"] : null;

$plateNo = $_POST["plateNo"];
$userid = $_SESSION["id"];

require_once "./db.php";

$sql = "insert into maintenance (tarikh, threshold, serviceType, engineOil, waterCoolant, brakeFluid, brakeLightSwitch, lightHon, frontTyre, rearTyre, sparkPlug, plateNo, userid) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssiiiiiiiisi", $tarikh, $threshold, $serviceType, $engineOil, $waterCoolant, $bendalirBrek, $suisLampuBrek, $lampu_hone, $tayarHadapan, $tayarBelakang, $palamPencucuh, $plateNo, $userid);
$check = mysqli_stmt_execute($stmt);

if ($check) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Congratulation</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                height: 100vh;
                width: 100vw;
                animation: openBody 1s;
                position: fixed;
            }

            /* Animation setup */
            @keyframes openBody {
                from {
                    right: -100vw;
                }

                to {
                    right: 0px;
                }
            }
        </style>
    </head>
    <body>
        <img src="./image/done.png" alt="Save" width="100px" height="100px">
        <br>
        <h4>Terima Kasih</h4>
        <p>Borang berjaya di hantar.</p>
        <br><br>
        <a href="./index.php">Kembali ke utama</a>
    </body>
    </html>
<?php
} else {
    header("Location: detail.php");
}
?>