<html>

<body>
    <?php
    //ambil data dari form input dibagian index.html dengan metode POST
    $kecamatan = $_POST['kecamatan'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $luas = $_POST['luas'];
    $jumlah_penduduk = $_POST['jumlah_penduduk'];

    // Sesuaikan dengan setting MySQL
    // informasi telah di tentukan 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pbwebAc8";

    // buat connection dengan variabel
    $conn = new mysqli($servername, $username, $password, $dbname);

    //  periksa koneksi berhasil
    // jika gagal, proses run akan berhenti dan menampilkan pesan kesalahan
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //susunan query sql saat dimasukkan ke dalam data tabel database 7b
    $sql = "INSERT INTO 7b (kecamatan, longitude, latitude, luas, jumlah_penduduk)
            VALUES ('$kecamatan', $longitude, $latitude, $luas, $jumlah_penduduk)";

    //jika query berhasil makan muncul pesan "New record created successfully"
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //menutup koneksi ke database pbwebac7
    $conn->close();

    //bagian header dan exit ini tidak diaktifkan , jika di aktifkan maka akan kembali ke index.html
    //header("Location: index.html");
    //exit;
    ?>
</body>

</html>