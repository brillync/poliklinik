<?php
session_start();

$username = $_SESSION['username'];

if(!isset($_SESSION["login"])){
    header("Location: ../../index.php");
    exit;
}

require '../../functions/connect_database.php';
require '../../functions/admin_functions.php';

// Ambil data dari tabel poli
$poli = query("SELECT * FROM poli");

// Langkah 2: Menggunakan Query SQL untuk Mengambil id_dokter
$query = "SELECT no_rm FROM pasien WHERE username = '$username'";
$result = mysqli_query($conn, $query);

// Langkah 3: Eksekusi Query dan Mendapatkan Hasil
if ($row = mysqli_fetch_assoc($result)) {
    $no_rm = $row['no_rm'];
}

if(isset($_POST["poli"])){
    echo "
        <script>
            alert('Hai!');
        </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f5f7fa] min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-[#3498db] text-white py-5 shadow-md">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold">Dashboard Pasien</h1>
            <p class="text-lg">Selamat datang, <?= htmlspecialchars($username); ?>!</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-10 grid grid-cols-2 gap-6 flex-grow">
        <a href="daftar_poli.php" class="relative flex flex-col justify-center items-center gap-5 bg-white shadow-lg p-8 rounded-lg hover:bg-[#f1f8ff] transition duration-300">
            <img src="../../assets/images/daftar_poli.png" alt="Daftar Poli" class="absolute top-0 left-0 w-full h-full object-cover opacity-20 rounded-lg">
            <alt="Daftar Poli" width="80px" class="p-2 rounded-lg z-10">
            <h1 class="text-[#3498db] text-xl font-semibold z-10">Daftar Poli</h1>
        </a>

        <a href="riwayat_daftar.php" class="relative flex flex-col justify-center items-center gap-5 bg-white shadow-lg p-8 rounded-lg hover:bg-[#f1f8ff] transition duration-300">
            <img src="../../assets/images/riwayat_poli.png" alt="Riwayat Daftar Poli" class="absolute top-0 left-0 w-full h-full object-cover opacity-20 rounded-lg">
            <alt="Riwayat Daftar Poli" width="80px" class="p-2 rounded-lg z-10">
            <h1 class="text-[#3498db] text-xl font-semibold z-10">Riwayat Daftar Poli</h1>
        </a>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-5 mt-auto">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2024 Poliklinik BK.</p>
        </div>
    </footer>
</body>

</html>