<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../../index.php");
    exit;
}

require '../../functions/connect_database.php';
require '../../functions/pasien_functions.php';

// Validasi session data
if (!isset($_SESSION['no_rm']) || !isset($_SESSION['id_poli'])) {
    echo "<script>alert('Data tidak valid! Silakan ulangi pendaftaran.'); window.location.href = 'daftar_poli.php';</script>";
    exit;
}

$no_rm = $_SESSION['no_rm'];
$id_poli = $_SESSION['id_poli'];

// Ambil nomor ID pasien berdasarkan nomor rekam medis
$query = "SELECT id FROM pasien WHERE no_rm = '$no_rm'";
$result = mysqli_query($conn, $query);

$id_pasien = null;
if ($row = mysqli_fetch_assoc($result)) {
    $id_pasien = $row['id'];
} else {
    echo "<script>alert('Nomor rekam medis tidak valid!'); window.location.href = 'daftar_poli.php';</script>";
    exit;
}

// Ambil data jadwal periksa berdasarkan id_poli
$query = "SELECT jadwal_periksa.*, dokter.nama 
          FROM jadwal_periksa
          JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
          WHERE dokter.id_poli = $id_poli";
$jadwal_periksa = mysqli_query($conn, $query);

// Cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
    $id_jadwal = htmlspecialchars($_POST["id_jadwal"]);
    $keluhan = htmlspecialchars($_POST["keluhan"]);

    // Validasi input
    if (empty($id_jadwal) || empty($keluhan)) {
        echo "<script>alert('Semua data wajib diisi!');</script>";
    } else {
        // Masukkan data ke tabel riwayat_poli atau pendaftaran poli
        $status_periksa = "Menunggu";
        $query_insert = "INSERT INTO riwayat_poli (id_pasien, id_jadwal, keluhan, status_periksa) 
                         VALUES ('$id_pasien', '$id_jadwal', '$keluhan', '$status_periksa')";
        
        if (mysqli_query($conn, $query_insert)) {
            echo "<script>
                    alert('Pendaftaran berhasil!');
                    document.location.href = 'dashboard_pasien.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Terjadi kesalahan saat menyimpan data. Coba lagi.');
                  </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jadwal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex gap-5 bg-[#f5f7fa]">
    <!-- Side Bar -->
    <?= include("../../components/sidebar_pasien.php"); ?>
    <!-- Side Bar End -->

    <main class="flex flex-col w-full bg-white pb-10 px-8">
        <!-- Header -->
        <header class="flex items-center gap-3 py-7 shadow-lg bg-[#3498db] rounded-lg w-full">
            <h1 class="text-3xl text-white font-medium w-full text-center">Pilih Jadwal Periksa</h1>
        </header>

        <!-- Form Section -->
        <article>
            <form action="" method="post" class="flex flex-col gap-6 mt-8 mx-auto p-8 bg-[#f4f4f4] rounded-2xl w-full max-w-3xl shadow-md">
                <input type="hidden" name="id_pasien" value="<?= $id_pasien ?>">

                <!-- Pilihan Jadwal -->
                <div class="flex flex-col gap-4">
                    <label for="id_jadwal" class="text-lg font-medium text-[#3498db]">Jadwal Periksa</label>
                    <select id="id_jadwal" name="id_jadwal" class="px-4 py-3 outline-none rounded-lg bg-white border border-[#3498db]" required>
                        <option value="" disabled selected>Pilih jadwal...</option>
                        <?php if (mysqli_num_rows($jadwal_periksa) > 0): ?>
                            <?php foreach ($jadwal_periksa as $item): ?>
                                <option value="<?= $item['id'] ?>">
                                    dr. <?= $item['nama'] ?> | <?= $item['hari'] ?> | <?= $item['jam_mulai'] ?> - <?= $item['jam_selesai'] ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Tidak ada jadwal tersedia</option>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Keluhan -->
                <div class="flex flex-col gap-4">
                    <label for="keluhan" class="text-lg font-medium text-[#3498db]">Keluhan</label>
                    <textarea id="keluhan" name="keluhan" rows="5" class="px-4 py-3 outline-none rounded-lg bg-white border border-[#3498db]" required></textarea>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" name="submit" class="bg-[#3498db] w-full py-3 text-white font-medium rounded-lg mt-4 hover:bg-[#2980b9] transition-all duration-300">
                    Lanjut
                </button>
            </form>

            <!-- Daftar Jadwal Section -->
            <section class="mt-8 mx-auto p-8 border border-[#3498db] rounded-2xl w-full max-w-3xl">
                <h1 class="mb-5 text-2xl text-[#3498db] font-medium">Daftar Jadwal Periksa</h1>
                <table class="w-full table-fixed border border-[#3498db]">
                    <thead>
                        <tr>
                            <th class="w-[5%] border py-3 text-[#3498db]">No</th>
                            <th class="w-[30%] border py-3 text-[#3498db]">Dokter</th>
                            <th class="w-[30%] border py-3 text-[#3498db]">Hari</th>
                            <th class="w-[20%] border py-3 text-[#3498db]">Jam</th>
                            <th class="w-[15%] border py-3 text-[#3498db]">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach ($jadwal_periksa as $item): ?>
                            <tr>
                                <td class="border py-5 text-center"><?= $index ?></td>
                                <td class="border py-5 text-center"><?= $item["nama"] ?></td>
                                <td class="border py-5 text-center"><?= $item["hari"] ?></td>
                                <td class="border py-5 text-center"><?= $item["jam_mulai"] ?> - <?= $item["jam_selesai"] ?></td>
                                <td class="border py-5 text-center">
                                    <a href="pilih_jadwal.php?id=<?= $item["id"] ?>" class="bg-green-500 px-6 py-2 rounded-lg text-white mr-3">Pilih</a>
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
