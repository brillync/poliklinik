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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dokter</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex gap-5 bg-[#f5f7fa]">
    <!-- Side Bar -->
    <?= include("../../components/sidebar_dokter.php"); ?>
    <!-- Side Bar End -->

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-10 grid grid-cols-2 gap-6 flex-grow">
        <!-- Jadwal Periksa -->
        <a href="jadwal_periksa.php"
        class="relative flex flex-col justify-center items-center gap-5 bg-white shadow-lg p-8 rounded-lg hover:bg-[#d0e8ff] transition duration-300">
            <img src="../../assets/images/jadwal_periksa.png" alt="Jadwal Periksa" width="100px" class="p-2 rounded-lg object-contain">
            <span class="text-[#2c3e50] font-medium text-lg">Jadwal Pemeriksaan</span>
        </a>

        <!-- Memeriksa Pasien -->
        <a href="memeriksa_pasien.php"
        class="relative flex flex-col justify-center items-center gap-5 bg-white shadow-lg p-8 rounded-lg hover:bg-[#d0e8ff] transition duration-300">
            <img src="../../assets/images/periksa.png" alt="Memeriksa Pasien" width="100px" class="p-2 rounded-lg object-contain">
            <span class="text-[#2c3e50] font-medium text-lg">Status Periksa Pasien</span>
        </a>

        <!-- Riwayat Pasien -->
        <a href="riwayat_pasien.php"
        class="relative flex flex-col justify-center items-center gap-5 bg-white shadow-lg p-8 rounded-lg hover:bg-[#d0e8ff] transition duration-300">
            <img src="../../assets/images/jadwal_periksa.png" alt="Riwayat Pasien" width="100px" class="p-2 rounded-lg object-contain">
            <span class="text-[#2c3e50] font-medium text-lg">Riwayat Pasien</span>
        </a>

        <!-- Profil -->
        <a href="profil.php"
        class="relative flex flex-col justify-center items-center gap-5 bg-white shadow-lg p-8 rounded-lg hover:bg-[#d0e8ff] transition duration-300">
            <img src="../../assets/images/profil_dokter.png" alt="Profil" width="100px" class="p-2 rounded-lg object-contain">
            <span class="text-[#2c3e50] font-medium text-lg">Profil Dokter</span>
        </a>
    </main>
</body>

</html>
