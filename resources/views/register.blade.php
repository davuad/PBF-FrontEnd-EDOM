<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Edom</title>
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
</head>
<body class="min-h-screen flex items-center justify-center bg-[#FBFBFB]">

    <div class="bg-white p-[30px] rounded-[20px] shadow-[0_10px_16px_0_#0A090B0D] w-[500px]">
        <h2 class="text-2xl font-bold text-center mb-[30px] text-[#0A090B]">Daftar ke Edom</h2>

        <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-5">
            @csrf
            <input type="text" name="name" placeholder="Nama Lengkap"
                class="h-[46px] px-[14px] rounded-[10px] border border-[#EEEEEE] focus-within:border-[#0A090B] placeholder:text-[#7F8190]" required>

            <input type="email" name="email" placeholder="  Email"
                class="h-[46px] px-[14px] rounded-[10px] border border-[#EEEEEE] focus-within:border-[#0A090B] placeholder:text-[#7F8190]" required>

            <input type="password" name="password" placeholder="  Password"
                class="h-[46px] px-[14px] rounded-[10px] border border-[#EEEEEE] focus-within:border-[#0A090B] placeholder:text-[#7F8190]" required>

            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                class="h-[46px] px-[14px] rounded-[10px] border border-[#EEEEEE] focus-within:border-[#0A090B] placeholder:text-[#7F8190]" required>

            <button type="submit"
                class="bg-[#06BC65] hover:bg-[#0A090B] text-white font-semibold py-[19px] rounded-[10px] transition-all duration-300">
                Register
            </button>

            <p class="text-center text-sm mt-4 text-[#7F8190]">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-[#6436F1] font-semibold">Login</a>
            </p>
        </form>
    </div>

</body>
</html>
