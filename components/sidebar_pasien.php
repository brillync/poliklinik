<aside class="flex flex-col w-[250px] h-[100vh] bg-[#3498db] border-r border-slate-600 pl-6 pr-8 py-10 sticky top-0">
    <!-- Profile -->
    <div class="flex flex-col items-center gap-3">
        <img src="../../assets/images/login.png" alt="" width="60px" class="rounded-full border-2 border-[#3498db]">
        <h1 class="text-lg text-white font-semibold">Pasien</h1>
    </div>
    <!-- Profile End -->

    <!-- Menu -->
    <nav class="flex flex-col gap-6 mt-10">
        <a href="dashboard_pasien.php" class="flex items-center gap-4 pr-5 pl-2 py-2 rounded-lg hover:bg-[#2C3E50] hover:translate-x-4 transition-all duration-300">
            <img src="../../assets/images/dashboard.png" alt="Dashboard" width="40px" class="p-2 bg-[#2C3E50] rounded-lg">
            <span class="text-white font-medium">Dashboard</span>
        </a>

        <a href="daftar_poli.php" class="flex items-center gap-4 pr-5 pl-2 py-2 rounded-lg hover:bg-[#2C3E50] hover:translate-x-4 transition-all duration-300">
            <img src="../../assets/images/hospital.png" alt="Daftar Poli" width="40px" class="p-2 bg-[#2C3E50] rounded-lg">
            <span class="text-white font-medium">Daftar Poli</span>
        </a>

        <a href="riwayat_daftar.php" class="flex items-center gap-4 pr-5 pl-2 py-2 rounded-lg hover:bg-[#2C3E50] hover:translate-x-4 transition-all duration-300">
            <img src="../../assets/icons/notebook-pen.svg" alt="Riwayat Poli" class="p-2 bg-[#2C3E50] rounded-lg">
            <span class="text-white font-medium">Riwayat Poli</span>
        </a>
    </nav>
    <!-- Menu End -->

    <!-- Logout -->
    <a href="../../auth/logout.php" class="mt-auto flex items-center gap-4 pr-5 pl-2 py-2 rounded-lg hover:bg-red-500 hover:translate-x-4 transition-all duration-300">
        <img src="../../assets/icons/log-out.svg" alt="Logout" class="p-2 bg-[#2C3E50] rounded-lg">
        <span class="text-white font-medium">Log Out</span>
    </a>
    <!-- Logout End -->
</aside>
