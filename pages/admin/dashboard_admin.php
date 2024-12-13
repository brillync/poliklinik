<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../../index.php");
    exit;
}

require '../../functions/connect_database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex gap-5 bg-[#f5f7fa]">
    <!-- Side Bar -->
    <?= include("../../components/sidebar_admin.php"); ?>
    <!-- Side Bar End -->

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-10 grid grid-cols-2 gap-6 flex-grow">
        <!-- Kelola Dokter -->
        <a href="kelola_dokter.php"
        class="relative flex flex-col justify-center items-center gap-5 bg-white shadow-lg p-8 rounded-lg hover:bg-[#d0e8ff] transition duration-300">
            <img src="../../assets/images/profil_dokter.png" alt="Kelola Dokter" width="100px" class="p-2 rounded-lg object-contain">
            <span class="text-[#2c3e50] font-medium text-lg">Data Dokter</span>
        </a>

        <!-- Kelola Pasien -->
        <a href="kelola_pasien.php"
        class="relative flex flex-col justify-center items-center gap-5 bg-white shadow-lg p-8 rounded-lg hover:bg-[#d0e8ff] transition duration-300">
            <img src="../../assets/images/periksa.png" alt="Kelola Pasien" width="100px" class="p-2 rounded-lg object-contain">
            <span class="text-[#2c3e50] font-medium text-lg">Data Pasien</span>
        </a>

        <!-- Kelola Poli -->
        <a href="kelola_poli.php"
        class="relative flex flex-col justify-center items-center gap-5 bg-white shadow-lg p-8 rounded-lg hover:bg-[#d0e8ff] transition duration-300">
            <img src="../../assets/images/jadwal_periksa.png" alt="Kelola Poli" width="100px" class="p-2 rounded-lg object-contain">
            <span class="text-[#2c3e50] font-medium text-lg">Daftar Poli</span>
        </a>

        <!-- Kelola Obat -->
        <a href="kelola_obat.php"
        class="relative flex flex-col justify-center items-center gap-5 bg-white shadow-lg p-8 rounded-lg hover:bg-[#d0e8ff] transition duration-300">
            <img src="../../assets/images/kelola_obat.png" alt="Kelola Obat" width="100px" class="p-2 rounded-lg object-contain">
            <span class="text-[#2c3e50] font-medium text-lg">Daftar Obat</span>
        </a>
    </main>
</body>

</html>
