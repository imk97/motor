<?php
// session_start();
// // Check have permission to access the file or not
// if (isset($_SESSION["name"]) == null && (isset($_SESSION["id"])) == null) {
//     // Http code is authorized
//     header('Location: signin.php', 401);
// }
$tarikh = $_POST["date"];
$threshold = $_POST["threshold"];
$service = $_POST["service"];
$kenderaan = $_POST["vehicle"];
// $tarikh = "20/08/2023";
?>
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
        background-color: #ffffff;
        font-weight: bold;
        display: flex;
        align-items: center;
        padding: 0px 20px;
    }

    .navigationBar div {
        display: inline;
        margin-left: 20px;
    }

    ul li {
        list-style-type: none;
    }

    .navigationBar button {
        border-radius: 12px;
        background-color: #ffffff;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .checklist-container {
        width: 100%;
        height: 100%;
        padding: 1vh 20%;
        margin: auto;
        /* position: relative; */
    }

    .checklist-container h3 {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .checklist-content {
        cursor: pointer;
        width: 100%;
        height: 50px;
        border: none;
        padding: 5px 0px;
        /* border: 1px solid black; */
        position: relative;
        /* border-bottom: 0.5px solid grey; */
    }

    .checklist-content p {
        font-size: 13px;
    }

    .checklist-content input {
        position: absolute;
        top: 15px;
        right: 10px;
    }

    .btn-container {
        width: 100%;
        position: absolute;
        bottom: 0;
        padding: 15px 20%;
    }

    .btn-container button {
        width: 100%;
        height: 45px;
        margin: auto;
        background-color: black;
        color: #ffffff;
        border-radius: 10px;
    }

    @media screen and (max-width: 768px) {
        .checklist-container {
            padding: 0.5vh 3vw;
        }

        .navigationBar {
            padding: 0.5vh 3vw;
        }

        .btn-container {
            padding: 13px 3vw;
        }
    }


</style>
<body>
    <div class="navigationBar">
        <button onclick="window.location.href='index.php'"><i class="fas fa-arrow-left"></i></button>
        <div>Maintenance Detail</div>
    </div>

    <form action="./maintenance-process.php" method="get">
        <div class="checklist-container">
            <h3>LIST</h3>

                <input type="hidden" name="tarikh" value="<?php echo $tarikh; ?>" >
                <input type="hidden" name="threshold" value="<?php echo $threshold; ?>" >
                <input type="hidden" name="service" value="<?php echo $service; ?>" >
                
                <div class="checklist-content">
                    <label for="engineOil">
                        Minyak Enjin
                        <p>10w-50</p>
                    </label>
                    <input type="checkbox" name="engineOil" id="engineOil" value="engineOil">
                </div>
                <div class="checklist-content">
                    <label for="waterCoolant">
                        Cecair Penyejuk Radiator
                        <p></p>
                    </label>
                    <input type="checkbox" name="waterCoolant" id="waterCoolant" value="waterCoolant">
                </div>
                <div class="checklist-content">
                    <label for="rantaiPemacu">
                        Rantai Pemacu
                        <p></p>
                    </label>
                    <input type="checkbox" name="rantaiPemacu" id="rantaiPemacu" value="rantaiPemacu">
                </div>
                <div class="checklist-content">
                    <label for="bendalirBrek">
                        Bendalir Brek
                        <p></p>
                    </label>
                    <input type="checkbox" name="bendalirBrek" id="bendalirBrek" value="bendalirBrek">
                </div>
                <div class="checklist-content">
                    <label for="sistemBrek">
                        <label for="sistemBrek">
                            Sistem Brek
                            <p> </p>
                        </label>                        
                    </label> 
                    <input type="checkbox" name="sistemBrek" id="sistemBrek" value="sistemBrek">
                </div>
                <div class="checklist-content">
                    <label for="suisLampuBrek">
                        Suis Lampu Brek
                        <p></p>
                    </label>                    
                    <input type="checkbox" name="suisLampuBrek" id="suisLampuBrek" value="suisLampuBrek">
                </div>
                <div class="checklist-content">
                    <label for="lampu_hone">
                        Lampu/Hon
                        <p></p>
                    </label>
                    <input type="checkbox" name="lampu_hone" id="lampu_hone" value="lampu_hone">
                </div>
                <div class="checklist-content">
                    <label for="sistemPencengkam">
                        Sistem Pencengkam
                        <p></p>
                    </label>                    
                    <input type="checkbox" name="sistemPencengkam" id="sistemPencengkam" value="sistemPencengkam">
                </div>
                <div class="checklist-content">
                    <label for="tayarHadapan">
                        Tayar Hadapan
                        <p>90/80-17</p>
                    </label>                    
                    <input type="checkbox" name="tayarHadapan" id="tayarHadapan" value="tayarHadapan">
                </div>
                <div class="checklist-content">
                    <label for="tayarBelakang">
                        Tayar Belakang
                        <p>120/70-17</p>
                    </label>
                    <input type="checkbox" name="tayarBelakang" id="tayarBelakang" value="tayarBelakang">
                </div>
                <div class="checklist-content">
                    <label for="palamPencucuh">
                        Palam Pencucuh
                        <p>Tembaga/Platinum tunggal/Dwi Platinum/Iridium</p>
                    </label>
                    <input type="checkbox" name="palamPencucuh" id="palamPencucuh" value="palamPencucuh">
                </div>
                <div class="checklist-content">
                    <label for="sistemPenyejuk">
                        Sistem Penyejuk
                        <p>Pre-mix coolant</p>
                    </label>
                    <input type="checkbox" name="sistemPenyejuk" id="sistemPenyejuk" value="sistemPenyejuk">
                </div>
        </div>
        <div class="btn-container">
            <button type="submit" id="submit">Save</button>
        </div>
    </form>

</body>
</html>