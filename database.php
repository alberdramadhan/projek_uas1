<?php
// koneksi database
$servername = "localhost";
$username = "data_mahasiswa";
$password = "01234";
$dbname = "projek";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Assumsi tabel bernama "data_mahasiswa" dengan kolom "id", "nama", "umur", dan "jurusan"
// Mengambil data dari database
$sql = "SELECT * FROM data_mahasiswa";
$result = $conn->query($sql);

// Array untuk menampung data
$data_mahasiswa = array();

// Memeriksa apakah data berhasil diambil
if ($result->num_rows > 0) {
    // Loop setiap baris data
    while ($row = $result->fetch_assoc()) {
        // Assign data ke dalam array $data_mahasiswa
        $data_mahasiswa[] = array(
            'id' => $row['id'],
            'nama' => $row['nama'],
            'umur' => $row['umur'],
            'jurusan' => $row['jurusan']
        );
    }
} else {
    echo "Tidak ada data.";
}

// Menutup koneksi ke database
$conn->close();

// Menampilkan data
echo "<h2>Data Mahasiswa</h2>";
echo "<ul>";
foreach ($data_mahasiswa as $mahasiswa) {
    echo "<li>ID: " . $mahasiswa['id'] . "</li>";
    echo "<li>Nama: " . $mahasiswa['nama'] . "</li>";
    echo "<li>Umur: " . $mahasiswa['umur'] . "</li>";
    echo "<li>Jurusan: " . $mahasiswa['jurusan'] . "</li>";
    echo "<br>";
}
echo "</ul>";
?>
