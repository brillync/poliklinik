<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../../index.php");
    exit;
}

require '../../functions/connect_database.php';
require '../../functions/admin_functions.php';

// Ambil data dari tabel poli
$poli = query("SELECT * FROM poli");

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){
    // Cek apakah data berhasil ditambahkan atau tidak
    if(tambah_poli($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
            </script>
        ";
        header("Location: kelola_poli.php");
    } else{
        echo "
             <script>
                alert('Data gagal ditambahkan!');
            </script>
        ";
        header("Location: kelola_poli.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Poli</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex gap-5 bg-[#3498db]">
    <!-- Side Bar -->
    <?= include("../../components/sidebar_admin.php"); ?>
    <!-- Side Bar End -->

    <main class="flex flex-col w-full bg-white pb-10 px-8">
        <!-- Header -->
        <header class="flex items-center gap-3 py-7 shadow-lg bg-[#3498db] rounded-lg w-full">
            <h1 class="text-3xl text-white font-medium w-full text-center">Daftar Pengelolaan Poli</h1>
        </header>

        <!-- Form Section -->
        <article>
            <form action="" method="post" class="flex flex-col gap-6 mt-8 mx-auto p-8 bg-[#f4f4f4] rounded-2xl w-full max-w-3xl shadow-md">
                <div class="flex flex-col gap-4">
                    <label for="nama_poli" class="text-lg font-medium text-[#3498db]">Nama Poli</label>
                    <input type="text" name="nama_poli" id="nama_poli" placeholder="Nama Poli"
                        class="px-4 py-3 outline-none rounded-lg bg-white border border-[#3498db]">
                </div>

                <div class="flex flex-col gap-4">
                    <label for="keterangan" class="text-lg font-medium text-[#3498db]">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" placeholder="Keterangan"
                        class="px-4 py-3 outline-none rounded-lg bg-white border border-[#3498db]">
                </div>

                <button type="submit" name="submit"
                    class="bg-[#3498db] w-full py-3 text-white font-medium rounded-lg mt-4 hover:bg-[#2980b9] transition-all duration-300">Tambah Data</button>
            </form>

            <!-- Daftar Poli Section -->
            <section class="mt-8 mx-auto p-8 border border-[#3498db] rounded-2xl w-full max-w-3xl">
                <h1 class="mb-5 text-2xl text-[#3498db] font-medium">Daftar Poli</h1>
                <table class="w-full table-fixed border border-[#3498db]">
                    <thead>
                        <tr>
                            <th class="w-[5%] border py-3 text-[#3498db]">No</th>
                            <th class="w-[30%] border py-3 text-[#3498db]">Nama Poli</th>
                            <th class="w-[40%] border py-3 text-[#3498db]">Keterangan</th>
                            <th class="w-[35%] border py-3 text-[#3498db]">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach($poli as $item) : ?>
                        <tr>
                            <td class="border py-5 text-center"><?= $index ?></td>
                            <td class="border py-5 text-center"><?= $item["nama_poli"] ?></td>
                            <td class="border py-5 text-center"><?= $item["keterangan"] ?></td>
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
