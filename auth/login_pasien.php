<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

require '../functions/connect_database.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM pasien WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($password === $row["password"]) {
            $_SESSION["login"] = "true";
            $_SESSION["username"] = $username;
            header("Location: ../pages/pasien/dashboard_pasien.php?username=$username");
            exit;
        }
    }

    if ($username === 'admin' && $password === '123') {
        $_SESSION["login"] = "true";
        $_SESSION["username"] = $username;
        header("Location: ../pages/admin/dashboard_admin.php");
        exit;
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f5f7fa] min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-[#3498db] text-white py-5 shadow-md">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-bold">Poliklinik BK</h1>
            <p class="text-lg">Masuk untuk jadwalkan pemeriksaan, silakan login untuk melanjutkan.</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 flex justify-center items-center py-10">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login Pasien</h1>
            <form action="" method="post" class="space-y-5">
                <input type="text" name="username" placeholder="Username" required
                    class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-3 text-gray-700 outline-none focus:border-[#3498db]">

                <input type="password" name="password" placeholder="Password" required
                    class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-3 text-gray-700 outline-none focus:border-[#3498db]">

                <?php if (isset($error)) : ?>
                    <p class="text-red-500 text-sm">Username atau password salah!</p>
                <?php endif; ?>

                <button type="submit" name="login"
                    class="w-full bg-[#3498db] text-white py-3 rounded-lg font-medium hover:bg-[#2979b7] transition">Login</button>

                <div class="text-center">
                    <p class="text-gray-600">Belum punya akun? <a href="registrasi_pasien.php" class="text-[#3498db] font-medium">Registrasi</a></p>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-5">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2024 Poliklinik BK.</p>
        </div>
    </footer>
</body>

</html>