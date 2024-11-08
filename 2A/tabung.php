<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Penghitung Luas Permukaan Tabung</title>
    <style>
        /* CSS untuk mengatur tampilan */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        h2 {
            color: #333333;
            font-size: 20px;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #333333;
            display: block;
            margin-top: 10px;
            text-align: left;
        }
        input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #cccccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            background-color: #e0f7fa;
            color: #333333;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
            font-size: 14px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><marquee>Luas tabung Uwadidaw</h2></marquee>
        <form method="post">
            <label for="tinggi">Tinggi Tabung:</label>
            <input type="number" name="tinggi" id="tinggi" required>

            <label for="jari_jari">Jari-jari Tabung:</label>
            <input type="number" name="jari_jari" id="jari_jari" required>
            
            <label for="satuan">Satuan:</label>
            <select name="satuan" id="satuan" required>
                <option value="cm">cm</option>
                <option value="m">m</option>
                <option value="inch">inch</option>
            </select>

            <input type="submit" value="Hitung">
        </form>

        <?php
        // Pastikan input 'tinggi', 'jari_jari', dan 'satuan' diterima dari form
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tinggi']) && isset($_POST['jari_jari']) && isset($_POST['satuan'])) {
            // Validasi input
            $tinggi = $_POST['tinggi'];
            $jari_jari = $_POST['jari_jari'];
            $satuan = $_POST['satuan'];
            
            // Konstanta nilai Phi
            $phi = 3.14159;
            
            // Hitung luas lingkaran: π * r^2
            $luas_lingkaran = $phi * pow($jari_jari, 2);
            
            // Hitung luas persegi panjang (selimut tabung): 2 * π * r * t
            $luas_persegi_panjang = 2 * $phi * $jari_jari * $tinggi;
            
            // Hitung luas permukaan tabung: 2 * luas lingkaran + luas persegi panjang
            $luas_permukaan_tabung = 2 * $luas_lingkaran + $luas_persegi_panjang;
            
            // Tampilkan hasil perhitungan
            echo "<div class='result'>";
            echo "<strong>Hasil Perhitungan Luas Permukaan Tabung:</strong><br>";
            echo "Tinggi Tabung: " . $tinggi . " $satuan<br>";
            echo "Jari-jari Tabung: " . $jari_jari . " $satuan<br>";
            echo "Luas Lingkaran: " . round($luas_lingkaran, 2) . " " . $satuan . "²<br>";
            echo "Luas Persegi Panjang: " . round($luas_persegi_panjang, 2) . " " . $satuan . "²<br>";
            echo "Luas Permukaan Tabung: " . round($luas_permukaan_tabung, 2) . " " . $satuan . "²<br>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
