<!DOCTYPE html>
<html>
<head>
    <title>Form Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff; /* Added background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added box shadow */
        }
        
        h1 {
            text-align: center;
        }
        
        label {
            display: block;
            margin-top: 10px;
        }
        
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Form Nilai</h1>
    <form method="POST" action="#">
        <label for="assessment">Nilai Assessment:</label>
        <input type="number" name="assessment" id="assessment" required>

        <label for="ats">Nilai ATS:</label>
        <input type="number" name="ats" id="ats" required>

        <label for="aas">Nilai AAS:</label>
        <input type="number" name="aas" id="aas" required>

        <input type="submit" name="kirim" value="Submit">
    </form>
</body>
</html>




<?php
include 'db.php';
include 'aritmatika.php';

if(isset($_POST["kirim"])) { 
    $assessment = $_POST['assessment'];
    $ats = $_POST['ats'];
    $aas = $_POST['aas'];
    $nilai = new Nilai($assessment, $ats, $aas);
    echo "Nilai Assessment: " . $assessment . "<br>";
    echo "Nilai ATS: " . $ats . "<br>";
    echo "Nilai AAS: " . $aas . "<br>";
    echo "<br>";
    echo "Kategori Assessment: " . $nilai->kategoriAssessment() . "<br>";
    echo "Kategori ATS: " . $nilai->kategoriATS() . "<br>";
    echo "Kategori AAS: " . $nilai->kategoriAAS() . "<br>";
    echo "<br>";
    echo "Jumlah Total: " . $nilai->hitungTotal() . "<br>";
    echo "Rata-Rata: " . $nilai->hitungRataRata() . "<br>";
    echo "Nilai Maksimal: " . $nilai->hitungNilaiMaksimal() . "<br>";
    echo "Nilai Minimal: " . $nilai->hitungNilaiMinimal() . "<br>";
    echo "<br>";

    $db->insertData($assessment, $ats, $aas);
}

$db->close();
?>