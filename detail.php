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
        background-color: #f5f5f5;
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
        <button onclick="history.back()"><i class="fas fa-arrow-left"></i></button>
        <div>Maintenance Detail</div>
    </div>

    <form action="./maintenance-process.php" method="get">
        <div class="checklist-container">
            <h3>LIST</h3>
                <div class="checklist-content">
                    <h5>Minyak Enjin</h5>
                    <p>10w-50</p>
                    <input type="checkbox" name="engineOil" id="engineOil" onchange="status(engineOil)" value="engineOil">
                </div>
                <!-- <hr> -->
                <div class="checklist-content">
                    <h5>Cecair Penyejuk Radiator</h5>
                    <p>-</p>
                    <input type="checkbox" name="waterCoolant" id="waterCoolant" onchange="status(waterCoolant)" value="waterCoolant">
                </div>
                <!-- <hr> -->
                <div class="checklist-content">
                    <h5>Rantai Pemacu</h5>
                    <p>-</p>
                    <input type="checkbox" name="rantaiPemacu" id="rantaiPemacu" onchange="status(rantaiPemacu)" value="rantaiPemacu">
                </div>
                <!-- <hr> -->
                <div class="checklist-content">
                    <h5>Bendalir Brek</h5>
                    <p>-</p>
                    <input type="checkbox" name="bendalirBrek" id="bendalirBrek" onchange="status(bendalirBrek)" value="bendalirBrek">
                </div>
                <!-- <hr> -->
                <div class="checklist-content">
                    <h5>Sistem Brek</h5>
                    <p>-</p>
                    <input type="checkbox" name="sistemBrek" id="sistemBrek" onchange="status(sistemBrek)" value="sistemBrek">
                </div>
                <!-- <hr> -->
                <div class="checklist-content">
                    <h5>Suis Lampu Brek</h5>
                    <p>-</p>
                    <input type="checkbox" name="suisLampuBrek" id="suisLampuBrek" onchange="status(suisLampuBrek)" value="suisLampuBrek">
                </div>
                <!-- <hr> -->
                <div class="checklist-content">
                    <h5>Lampu/Hon</h5>
                    <p>-</p>
                    <input type="checkbox" name="lampu_hone" id="lampu_hone" onchange="status(lampu_hone)" value="lampu_hone">
                </div>
                <!-- <hr> -->
                <div class="checklist-content">
                    <h5>Sistem Pencengkam</h5>
                    <p>-</p>
                    <input type="checkbox" name="sistemPencengkam" id="sistemPencengkam" onchange="status(sistemPencengkam)" value="sistemPencengkam">
                </div>
                <!-- <hr> -->
                <div class="checklist-content">
                    <h5>Tayar Hadapan</h5>
                    <p>90/80-17</p>
                    <input type="checkbox" name="tayarHadapan" id="tayarHadapan" onchange="status(tayarHadapan)" value="tayarHadapan">
                </div>
                <div class="checklist-content">
                    <h5>Tayar Belakang</h5>
                    <p>120/70-17</p>
                    <input type="checkbox" name="tayarBelakang" id="tayarBelakang" onchange="status(tayarBelakang)" value="tayarBelakang">
                </div>
                <div class="checklist-content">
                    <h5>Palam Pencucuh</h5>
                    <p>Tembaga/Platinum tunggal/Dwi Platinum/Iridium</p>
                    <input type="checkbox" name="palamPencucuh" id="palamPencucuh" onchange="status(palamPencucuh)" value="palamPencucuh">
                </div>
                <!-- <hr> -->
                <div class="checklist-content">
                    <h5>Sistem Penyejuk</h5>
                    <p>Pre-mix coolant</p>
                    <input type="checkbox" name="sistemPenyejuk" id="sistemPenyejuk" onchange="status(sistemPenyejuk)" value="sistemPenyejuk">
                </div>
            <!-- <hr><br> -->
        </div>
        <div class="btn-container">
            <button type="submit">Save</button>
        </div>
    </form>

    
</body>
<script>
    function status(checkbox) {
        console.log(checkbox.value)
    }
</script>
</html>