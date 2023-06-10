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
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        
        th {
            background-color: #4CAF50;
            color: white;
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

    <?php
    include 'db.php';
    include 'aritmatika.php';

    if(isset($_POST["kirim"])) { 
        $assessment = $_POST['assessment'];
        $ats = $_POST['ats'];
        $aas = $_POST['aas'];
        $nilai = new Nilai($assessment, $ats, $aas);
        
        echo "<h2>Hasil Nilai</h2>";
        echo "<table>";
        echo "<tr><th>Deskripsi</th><th>Nilai</th></tr>";
        echo "<tr><td>Nilai Assessment</td><td>" . $assessment . "</td></tr>";
        echo "<tr><td>Nilai ATS</td><td>" . $ats . "</td></tr>";
        echo "<tr><td>Nilai AAS</td><td>" . $aas . "</td></tr>";
        echo "<tr><td colspan='2'></td></tr>";
        echo "<tr><td>Kategori Assessment</td><td>" . $nilai->kategoriAssessment() . "</td></tr>";
        echo "<tr><td>Kategori ATS</td><td>" . $nilai->kategoriATS() . "</td></tr>";
        echo "<tr><td>Kategori AAS</td><td>" . $nilai->kategoriAAS() . "</td></tr>";
        echo "<tr><td colspan='2'></td></tr>";
        echo "<tr><td>Jumlah Total</td><td>" . $nilai->hitungTotal() . "</td></tr>";
        echo "<tr><td>Rata-Rata</td><td>" . $nilai->hitungRataRata() . "</td></tr>";
        echo "<tr><td>Nilai Maksimal</td><td>" . $nilai->hitungNilaiMaksimal() . "</td></tr>";
        echo "<tr><td>Nilai Minimal</td><td>" . $nilai->hitungNilaiMinimal() . "</td></tr>";
        echo "</table>";

        $db->insertData($assessment, $ats, $aas);
    }

    $db->close();
    ?>
</body>
</html>
