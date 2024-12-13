<?php
session_start();

$username = $_SESSION['username'];

// Redirect jika user belum login
if (!isset($_SESSION["login"])) {
    header("Location: ../../index.php");
    exit;
}

require '../../functions/connect_database.php';
require '../../functions/admin_functions.php';

// Ambil data poli
$poli = query("SELECT * FROM poli");

// Ambil nomor rekam medis berdasarkan username
$query = "SELECT no_rm FROM pasien WHERE username = '$username'";
$result = mysqli_query($conn, $query);

// Cek apakah data no_rm ditemukan
$no_rm = null;
if ($row = mysqli_fetch_assoc($result)) {
    $no_rm = $row['no_rm'];
} else {
    echo "<script>alert('Nomor Rekam Medis tidak ditemukan!'); window.location.href='../../index.php';</script>";
    exit;
}

// Handle form submit
$error_message = "";
if (isset($_POST["submit"])) {
    $selected_poli = $_POST["poli"];

    // Validasi input poli
    if (empty($selected_poli)) {
        $error_message = "Silakan pilih poliklinik sebelum melanjutkan.";
    } else {
        // Redirect ke halaman pilih_jadwal.php dengan data poli
        $_SESSION['no_rm'] = $no_rm;
        $_SESSION['id_poli'] = $selected_poli;
        header("Location: pilih_jadwal.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Poli</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex gap-5 bg-[#f5f7fa]">
    <!-- Side Bar -->
    <?= include("../../components/sidebar_pasien.php"); ?>
    <!-- Side Bar End -->

    <main class="flex flex-col w-full bg-white pb-10 px-8">
        <!-- Header -->
        <header class="flex items-center gap-3 py-7 shadow-lg bg-[#3498db] rounded-lg w-full">
            <h1 class="text-3xl text-white font-medium w-full text-center">Daftar Poli</h1>
        </header>

        <!-- Form Section -->
        <article>
            <form action="" method="post" class="flex flex-col gap-6 mt-8 mx-auto p-8 bg-[#f4f4f4] rounded-2xl w-full max-w-3xl shadow-md">
                <!-- Nomor Rekam Medis -->
                <div class="flex flex-col gap-4">
                    <label for="no_rm" class="text-lg font-medium text-[#3498db]">Nomor Rekam Medis</label>
                    <input type="text" name="no_rm" id="no_rm" value="<?= $no_rm ?>" readonly
                        class="px-4 py-3 outline-none rounded-lg bg-white border border-[#3498db] text-gray-600">
                </div>

                <!-- Pilihan Poli -->
                <div class="flex flex-col gap-4">
                    <label for="poli" class="text-lg font-medium text-[#3498db]">Pilih Poli</label>
                    <select id="poli" name="poli" class="px-4 py-3 outline-none rounded-lg bg-white border border-[#3498db]" required>
                        <option value="" disabled selected>Pilih poliklinik...</option>
                        <?php foreach ($poli as $item): ?>
                            <option value="<?= $item["id"] ?>"><?= $item["nama_poli"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Error Message -->
                <?php if (!empty($error_message)): ?>
                    <p class="text-red-500 text-sm"><?= $error_message ?></p>
                <?php endif; ?>

                <!-- Tombol Submit -->
                <button type="submit" name="submit"
                    class="bg-[#3498db] w-full py-3 text-white font-medium rounded-lg mt-4 hover:bg-[#2980b9] transition-all duration-300">
                    Lanjut
                </button>
            </form>

            <!-- Daftar Poli Section -->
            <section class="mt-8 mx-auto p-8 border border-[#3498db] rounded-2xl w-full max-w-3xl">
                <h1 class="mb-5 text-2xl text-[#3498db] font-medium">Daftar Poli</h1>
                <table class="w-full table-fixed border border-[#3498db]">
                    <thead>
                        <tr>
                            <th class="w-[5%] border py-3 text-[#3498db]">No</th>
                            <th class="w-[30%] border py-3 text-[#3498db]">Nama Poli</th>
                            <th class="w-[50%] border py-3 text-[#3498db]">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach ($poli as $item) : ?>
                            <tr>
                                <td class="border py-5 text-center"><?= $index ?></td>
                                <td class="border py-5 text-center"><?= $item["nama_poli"] ?></td>
                                <td class="border py-5 text-center">
                                    <a href="edit_poli.php?id=<?= $item["id"] ?>" class="bg-green-500 px-6 py-2 rounded-lg text-white mr-3">Edit</a>
                                    <a href="hapus_poli.php?id=<?= $item["id"] ?>" class="bg-red-500 px-6 py-2 rounded-lg text-white">Delete</a>
                                </td>
                            </tr>
                        <?php $index++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </article>
    </main>
</body>

</html>
