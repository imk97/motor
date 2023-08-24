<?php
session_start();
// // Check have permission to access the file or not
// if (isset($_SESSION["name"]) == null && (isset($_SESSION["id"])) == null) {
//     // Http code is authorized
//     header('Location: signin.php', 401);
// }
// $threshold = $_POST["threshold"];
// $service = $_POST["service"];
// $kenderaan = $_POST["vehicle"];
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
        /* -webkit-tap-highlight-color: rgba(255, 255, 255, 0) !important;  */
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
        /* display: flex;
        align-items: center; */
        padding: 15px 20px;
        box-shadow: 0 0px 4px 0 rgba(0,0,0,0.2);
        position: sticky;
        top: 0;
        right: 0;
        left: 0;
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
        /* padding: 10px; */
        /* cursor: pointer; */
        width: 20px;
        height: 20px;
        color: black;
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
        /* cursor: pointer; */
        width: 100%;
        height: 50px;
        border: none;
        padding: 15px 0px;
        /* margin: 10px 0px; */
        /* border: 1px solid black; */
        /* position: relative; */
        border-bottom: 1px solid #DCDCDC;
        /* display: flex;
        align-items: center; */
    }

    .checklist-content p {
        font-size: 13px;
        word-wrap: break-word;
    }

    .checklist-content input {
        float: right;
        height: 20px;
        width: 15px;
    }

    .btn-container {
        width: 100%;
        position: fixed;
        bottom: 0;
        padding: 15px 20%;
        background-color: #ffffff;
        border: none;
    }

    .btn-container button {
        width: 100%;
        height: 45px;
        margin: auto;
        background-color: black;
        color: #ffffff;
        border-radius: 10px;
    }

    .last-content {
        height: 100px;
        width: 100%;
    }

    .modal {
        z-index: 1;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.85);
        /* opacity: 0.8; */
        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
    }

    .modal-content {
        background-color: #ffffff;
        width: 70%;
        margin: auto;
        height: 100px;
        padding: 10px;
        border-radius: 10px;
    }

    #center {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding-bottom: 10px;
    }

    #center > * {
        padding: 3px 0px;
    }

    #btnCenter {
        display: grid;
        grid-template-columns: auto auto;
        column-gap: 10px;
        padding: 0px 20px;
    }

    @media screen and (max-width: 768px) {
        .checklist-container {
            padding: 0.5vh 3vw;
        }

        .btn-container {
            padding: 13px 3vw;
        }

        .navigationBar {
            padding-left: 3vw;
            padding-right: 3vw;
        }
    }


</style>
<body>
    <div class="navigationBar">
        <button onclick="onBack()" id="backBtn" type="button" title="backBtn"><i class="fas fa-arrow-left"></i></button>
        <div>Maintenance Detail</div>
    </div>

    <div class="modal" id="alertModal">
        <div class="modal-content">
            <div id="center">
                <i class="fa-solid fa-circle-exclamation"></i>
                <h4>Anda pasti nak ke laman utama?</h4>
            </div>
            <div id="btnCenter">
                <button>Modify</button>
                <button>Cancel</button>
            </div>
        </div>
    </div>

    <form action="./maintenance-process.php" method="get">
        <div class="checklist-container">
            <h3>LIST</h3>

                <input type="hidden" name="tarikh" value="<?php echo $tarikh; ?>" >
                <input type="hidden" name="threshold" value="<?php echo $_COOKIE["tmpDetail"]; ?>" >
                <input type="hidden" name="service" value="<?php echo $service; ?>" >
                
                <div class="checklist-content">
                    <label for="engineOil">
                        Minyak Enjin
                        <!-- <p>10w-50</p> -->
                    </label>
                    <input type="checkbox" name="engineOil" id="engineOil" value="engineOil">
                </div>
                <div class="checklist-content">
                    <label for="waterCoolant">
                        Cecair Penyejuk Radiator
                        <!-- <p></p> -->
                    </label>
                    <input type="checkbox" name="waterCoolant" id="waterCoolant" value="waterCoolant">
                </div>
                <div class="checklist-content">
                    <label for="rantaiPemacu">
                        Rantai Pemacu
                        <!-- <p></p> -->
                    </label>
                    <input type="checkbox" name="rantaiPemacu" id="rantaiPemacu" value="rantaiPemacu">
                </div>
                <div class="checklist-content">
                    <label for="bendalirBrek">
                        Bendalir Brek
                        <!-- <p></p> -->
                    </label>
                    <input type="checkbox" name="bendalirBrek" id="bendalirBrek" value="bendalirBrek">
                </div>
                <div class="checklist-content">
                    <label for="sistemBrek">
                        <label for="sistemBrek">
                            Sistem Brek
                            <!-- <p> </p> -->
                        </label>                        
                    </label> 
                    <input type="checkbox" name="sistemBrek" id="sistemBrek" value="sistemBrek">
                </div>
                <div class="checklist-content">
                    <label for="suisLampuBrek">
                        Suis Lampu Brek
                        <!-- <p></p> -->
                    </label>                    
                    <input type="checkbox" name="suisLampuBrek" id="suisLampuBrek" value="suisLampuBrek">
                </div>
                <div class="checklist-content">
                    <label for="lampu_hone">
                        Lampu/Hon
                        <!-- <p></p> -->
                    </label>
                    <input type="checkbox" name="lampu_hone" id="lampu_hone" value="lampu_hone">
                </div>
                <div class="checklist-content">
                    <label for="sistemPencengkam">
                        Sistem Pencengkam
                        <!-- <p></p> -->
                    </label>                    
                    <input type="checkbox" name="sistemPencengkam" id="sistemPencengkam" value="sistemPencengkam">
                </div>
                <div class="checklist-content">
                    <label for="tayarHadapan">
                        Tayar Hadapan
                        <!-- <p>90/80-17</p> -->
                    </label>                    
                    <input type="checkbox" name="tayarHadapan" id="tayarHadapan" value="tayarHadapan">
                </div>
                <div class="checklist-content">
                    <label for="tayarBelakang">
                        Tayar Belakang
                        <!-- <p>120/70-17</p> -->
                    </label>
                    <input type="checkbox" name="tayarBelakang" id="tayarBelakang" value="tayarBelakang">
                </div>
                <div class="checklist-content">
                    <label for="palamPencucuh">
                        Palam Pencucuh
                        <!-- <p>Tembaga/Platinum tunggal/Dwi Platinum/Iridium</p> -->
                    </label>
                    <input type="checkbox" name="palamPencucuh" id="palamPencucuh" value="palamPencucuh">
                </div>
                <div class="checklist-content">
                    <label for="sistemPenyejuk">
                        Sistem Penyejuk
                        <!-- <p>Pre-mix coolant</p> -->
                    </label>
                    <input type="checkbox" name="sistemPenyejuk" id="sistemPenyejuk" value="sistemPenyejuk">
                </div>
                <div class="last-content"></div>
        </div>
        <div class="btn-container">
            <button type="submit" id="submit">Save</button>
        </div>
    </form>

</body>
<script>
    function onBack() {
        console.log("Anda pasti ke laman utama")
        document.cookie = "tmpDetail=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/motor;"
        history.back()
        // window.location.href = "index.php"

    }
</script>
</html>