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

<body class="flex gap-5 bg-[#f4f7fb]">
    <!-- Side Bar -->
    <?= include("../../components/sidebar_pasien.php"); ?>
    <!-- Side Bar End -->

    <main class="flex flex-col w-full bg-white pb-10 px-8">
        <!-- Header -->
        <header class="flex items-center gap-3 px-8 py-7 shadow-lg bg-[#3498db] rounded-lg w-full">
            <h1 class="text-3xl text-white font-medium w-full text-center">Riwayat Daftar Poli</h1>
        </header>

        <!-- Riwayat Daftar Poli Section -->
        <article class="mt-8">
            <div class="w-full max-w-3xl mx-auto p-8 bg-[#ffffff] rounded-2xl shadow-md">
                <h1 class="mb-5 text-2xl text-[#3498db] font-medium">Daftar Riwayat Pendaftaran Poli</h1>

                <!-- Tabel Riwayat Poli -->
                <table class="w-full table-fixed border border-[#3498db] rounded-lg">
                    <thead>
                        <tr>
                            <th class="w-[5%] border py-3 text-[#3498db]">No</th>
                            <th class="w-[30%] border py-3 text-[#3498db]">ID Poli</th>
                            <th class="w-[30%] border py-3 text-[#3498db]">ID Obat</th>
                            <th class="w-[35%] border py-3 text-[#3498db]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach ($riwayat_pendaftaran as $item) : ?>
                            <tr class="hover:bg-[#f1f5f9] transition-all duration-300">
                                <td class="border py-5 text-center"><?= $index ?></td>
                                <td class="border py-5 text-center"><?= $item["id_poli"] ?></td>
                                <td class="border py-5 text-center"><?= $item["id_obat"] ?></td>
                                <td class="border py-5 text-center">
                                    <a href="edit_pendaftaran.php?id=<?= $item["id"] ?>" class="bg-green-500 px-6 py-2 rounded-lg text-white mr-3 hover:bg-green-600 transition duration-300">Edit</a>
                                    <a href="hapus_pendaftaran.php?id=<?= $item["id"] ?>" class="bg-red-500 px-6 py-2 rounded-lg text-white hover:bg-red-600 transition duration-300">Delete</a>
                                </td>
                            </tr>
                        <?php $index++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </article>
    </main>
</body>

</html>
