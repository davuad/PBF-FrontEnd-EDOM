<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body class="font-poppins text-[#0A090B]">

<section id="content" class="flex">
  <!-- Sidebar -->
  <div id="sidebar" class="w-[270px] flex flex-col shrink-0 min-h-screen justify-between p-[30px] border-r border-[#EEEEEE] bg-[#FBFBFB]">
    <div class="w-full flex flex-col gap-[30px]">
      <img src="{{ asset('images/logo/logoEdom1.png') }}" alt="logo" style="display: block; margin: 0 auto; width: 50%;">
      <ul class="flex flex-col gap-3">
        <li>
          <h3 class="font-bold text-xs text-[#A5ABB2]">Fitur</h3>
        </li>
        <li>
          <a href="{{ route('admin.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
            <img src="{{ asset('images/icons/house-g.svg') }}" alt="icon">
            <p class="font-semibold transition-all duration-300 hover:text-white">Dashboard</p>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.dosen.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 bg-[#2B82FE] hover:bg-[#2B82FE]">
            <img src="{{ asset('images/icons/profile-2user.svg') }}" alt="icon">
            <p class="font-semibold text-white hover:text-white">Dosen</p>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.mahasiswa.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
            <img src="{{ asset('images/icons/graduation-cap.svg') }}" alt="icon">
            <p class="font-semibold transition-all duration-300 hover:text-white">Mahasiswa</p>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.matkul.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
            <img src="{{ asset('images/icons/book-open-text.svg') }}" alt="icon">
            <p class="font-semibold transition-all duration-300 hover:text-white">Mata Kuliah</p>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.prodi.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
            <img src="{{ asset('images/icons/layers.svg') }}" alt="icon">
            <p class="font-semibold transition-all duration-300 hover:text-white">Program Studi</p>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.penilaian.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
            <img src="{{ asset('images/icons/message-square-text-g.svg') }}" alt="icon">
            <p class="font-semibold transition-all duration-300 hover:text-white">Rekap Penilaian</p>
          </a>
        </li>
        <hr>
        <li>
          <a href="{{ route('login') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
            <img src="{{ asset('images/icons/log-out.svg') }}" alt="icon">
            <p class="font-semibold transition-all duration-300 hover:text-white">Logout</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div id="menu-content" class="flex flex-col w-full pb-[30px]">
<div class="nav flex justify-between p-5 border-b border-[#EEEEEE]">
                <form class="search flex items-center w-[400px] h-[52px] p-[10px_16px] rounded-full border border-[#EEEEEE]">
                    <input type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Cari Mahasiswa.." name="search">
                    <button type="submit" class="ml-[10px] w-8 h-8 flex items-center justify-center">
                        <img src="{{ asset('images/icons/search.svg')}}" alt="icon">
                    </button>
                </form>
                <div class="flex items-center gap-[30px]">
                    <div class="flex gap-[14px]">
                        <a href="" class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{ asset('images/icons/receipt-text.svg')}}" alt="icon">
                        </a>
                        <a href="" class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{ asset('images/icons/notification.svg')}}" alt="icon">
                        </a>
                    </div>
                    <div class="h-[46px] w-[1px] flex shrink-0 border border-[#EEEEEE]"></div>
                    <div class="flex gap-3 items-center">
                        <div class="flex flex-col text-right">
                            <p class="text-sm text-[#7F8190]">Admin</p>
                            <p class="font-semibold">Davu Andrias</p>
                        </div>
                        <div class="w-[46px] h-[46px]">
                            <img src="{{ asset('images/photos/default-photo.svg')}}" alt="photo">
                        </div>
                    </div>
                </div>
            </div>
  <!-- Main Content -->
    <div class="p-10 w-full">
      <h1 class="text-2xl font-bold mb-6">Tambah Mahasiswa</h1>

      <form method="POST" action="{{ route('admin.mahasiswa.simpan') }}" class="flex flex-col gap-[30px] w-[500px]">
        @csrf

        {{-- NPM --}}
        <div class="flex flex-col gap-[10px]">
          <p class="font-semibold">NPM</p>
          <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE]">
            <input type="text" name="npm" placeholder="Masukkan NPM" value="{{ old('npm') }}" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" required>
          </div>
          @error('npm') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- email --}}
      <div class="flex flex-col gap-[10px]">
        <p class="font-semibold">email</p>
        <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
          <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
            <img src="{{ asset('images/icons/note-favorite-outline.svg') }}" class="w-full h-full object-contain" alt="icon">
          </div>
          <input type="email" name="email" placeholder="Masukkan email" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" required>
        </div>
      </div>

        {{-- Nama Mahasiswa --}}
        <div class="flex flex-col gap-[10px]">
          <p class="font-semibold">Nama Mahasiswa</p>
          <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE]">
            <input type="text" name="nama_mhs" placeholder="Masukkan Nama Mahasiswa" value="{{ old('nama_mhs') }}" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" required>
          </div>
          @error('nama_mhs') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Kelas --}}
        <div class="flex flex-col gap-[10px]">
          <p class="font-semibold">Kelas</p>
          <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE]">
            <input type="text" name="kelas" placeholder="Contoh: TI-3A" value="{{ old('kelas') }}" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" required>
          </div>
          @error('kelas') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Program Studi --}}
        <div class="flex flex-col gap-[10px]">
          <p class="font-semibold">Program Studi</p>
          <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE]">
            <select name="id_prodi" id="prodiSelect" class="font-semibold w-full outline-none bg-transparent" required>
              <option value="">Pilih Program Studi</option>
              <!-- Option diisi otomatis lewat JS -->
            </select>
          </div>
          @error('id_prodi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Tombol --}}
        <div class="flex items-center gap-5">
          <a href="{{ route('admin.mahasiswa.index') }}" class="w-full h-[52px] p-[14px_20px] bg-gray-200 rounded-full font-semibold text-[#0A090B] text-center hover:bg-gray-300 transition-all duration-300">
            Kembali
          </a>
          <button type="submit" class="w-full h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D]">
            Simpan Mahasiswa
          </button>
        </div>
      </form>
    </div>
</section>

<!-- Fetch data prodi -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    fetch("http://localhost:8080/api/prodi/getAll")
        .then(response => response.json())
        .then(data => {
            const select = document.getElementById("prodiSelect");
            data.forEach(prodi => {
                const option = document.createElement("option");
                option.value = prodi.id_prodi;
                option.textContent = prodi.nama_prodi;
                select.appendChild(option);
            });
        })
        .catch(error => console.error("Gagal ambil data prodi:", error));
});
</script>

</body>
</html>