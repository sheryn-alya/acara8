<html>

<body>
    <?php
    //Menggunakan format php

    // Sesuaikan dengan setting MySQL di web myphpadmin
    // Mendeklarasikan koneksi dari mysql untuk menentukan informasi koneksi ke database mysql
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pbwebAc8";

    // membuat sambungan dengan database dgn variable yg telah di tentukan
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check koneksi jika salah akn menghentikan proses
    // menampilkan pesan kesalahan
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // untuk mengambil data tabel dari database 7B
    $sql = "SELECT * FROM 7b";
    $result = $conn->query($sql);

    // memeriksa hasil query yang ada baris data dalam format tabel HTML
    // jika tidak pesan yg muncul "0 results"
    if ($result->num_rows > 0) {
        //ini jenis data yang akan ditampilkan
        echo "<table border='1px'><tr>
<th>kecamatan</th>
<th>longitude</th>
<th>latitude</th>
<th>luas</th>
<th>jumlah Penduduk</th>
<th>aksi</th>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["kecamatan"] . "</td><td>" .
                $row["longitude"] . "</td><td>" .
                $row["latitude"] . "</td><td>" .
                $row["luas"] . "</td><td align='right'>" .
                $row["jumlah_penduduk"] .
                $row["aksi"] .  "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // menutup koneksi ke databse mysql
    $conn->close();
    ?>

</body>

</html>