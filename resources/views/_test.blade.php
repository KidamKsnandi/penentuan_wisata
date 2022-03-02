<?php
$filetext = 'webcounter.txt';
$counter = file($filetext);
$visitor = $counter[0];
$visitor++;
$file = fopen($filetext, 'w');
fwrite($file, $visitor);
fclose($file);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Menghitung Jumlah Kunjungan </title>
    <style>
        Body {
            margin: 0;
            padding: 0;
            font-family: verdana;
            font-size: 12px;
        }

        .header {
            color: #fff;
            text-align: center;
            background-color: #00A6BB;
            line-height: 100px;
        }

        .welcome {
            color: #2924F0;
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="header">
        <h1>Hitung Jumlah Pengunjung</h1>
    </div>
    <hr>
    <h2 class="welcome">
        Selamat Datang Anda Adalah Pengunjung<br>
        <?php
        echo "Ke - $visitor";
        ?>
    </h2>
</body>

</html>
