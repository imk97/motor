<?php
$engineOil = (isset($_GET["engineOil"])) ? $_GET["engineOil"] : null;
$waterCoolant = (isset($_GET["waterCoolant"])) ? $_GET["waterCoolant"] : null;
$rantaiPemacu = (isset($_GET["rantaiPemacu"])) ? $_GET["rantaiPemacu"] : null;
$bendalirBrek = (isset($_GET["bendalirBrek"])) ? $_GET["bendalirBrek"] : null;
$sistemBrek = (isset($_GET["sistemBrek"])) ? $_GET["sistemBrek"] : null;
$suisLampuBrek = (isset($_GET["suisLampuBrek"])) ? $_GET["suisLampuBrek"] : null;
$lampu_hone = (isset($_GET["lampu_hone"])) ? $_GET["lampu_hone"] : null;
$sistemPencengkam = (isset($_GET["sistemPencengkam"])) ? $_GET["sistemPencengkam"] : null;
$tayarHadapan = (isset($_GET["tayarHadapan"])) ? $_GET["tayarHadapan"] : null;
$tayarBelakang = (isset($_GET["tayarBelakang"])) ? $_GET["tayarBelakang"] : null;
$palamPencucuh = (isset($_GET["palamPencucuh"])) ? $_GET["palamPencucuh"] : null;
$sistemPenyejuk = (isset($_GET["sistemPenyejuk"])) ? $_GET["sistemPenyejuk"] : null;

// echo $engineOil;
// echo "\n";
// echo $waterCoolant;

require_once "./db.php";

$sql = "insert into () values ()";
// mysqli_query($conn, $sql)
$engineOil = "motul";
if ($engineOil == "motul") {
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