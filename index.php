<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Appointment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f5f7fa;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-secondary {
            background-color: transparent;
            color: #3498db;
            border: 2px solid #3498db;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="container flex flex-col-reverse md:flex-row items-center justify-between gap-10 px-5">
        <!-- Left Section -->
        <div class="max-w-lg text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight">
            Nikmati pelayanan kesehatan berkualitas di <span class="text-blue-500">Poliklinik BK!</span>
            </h1>
            <p class="text-lg text-gray-600 mt-4">
                Kami hadir untuk memberikan pelayanan kesehatan terbaik bagi Anda. Bersama, kita wujudkan hidup sehat dan bahagia melalui layanan kesehatan yang profesional dan terpercaya.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 mt-6">
                <a href="auth/login_pasien.php" class="btn-primary text-center">Login Pasien</a>
                <a href="auth/login_dokter.php" class="btn-secondary text-center">Login Dokter</a>
            </div>
        </div>

        <!-- Right Section -->
        <div class="max-w-lg">
            <img src="assets/images/health-professional-team.png" alt="Illustration of a doctor" class="w-full">
        </div>
    </div>
</body>

</html>
