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
            <img src="{{ asset('images/logo/logoEdom1.png')}}" alt="logo" style="display: block; margin: 0 auto; width: 50%;">
            <ul class="flex flex-col gap-3">
                <li>
                    <h3 class="font-bold text-xs text-[#A5ABB2]">Fitur</h3>
                </li>
                <li>
                  <a href="{{ route('admin.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                      <img src="{{ asset('images/icons/house-g.svg')}}" alt="icon">
                      <p class="font-semibold transition-all duration-300 hover:text-white">Dashboard</p>
                  </a>
                </li>
                <li>
                    <a href="{{ route('admin.dosen.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 bg-[#2B82FE] hover:bg-[#2B82FE]">
                        <img src="{{ asset('images/icons/profile-2user.svg')}}" alt="icon">
                        <p class="font-semibold transition-all duration-300 text-white hover:text-white">Dosen</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.mahasiswa.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                        <img src="{{ asset('images/icons/graduation-cap.svg')}}" alt="icon">
                        <p class="font-semibold transition-all duration-300 hover:text-white">Mahasiswa</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.matkul.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                        <img src="{{ asset('images/icons/book-open-text.svg')}}" alt="icon">
                        <p class="font-semibold transition-all duration-300 hover:text-white">Mata Kuliah</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.prodi.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                        <img src="{{ asset('images/icons/layers.svg')}}" alt="icon">
                        <p class="font-semibold transition-all duration-300 hover:text-white">Program Studi</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.penilaian.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                        <img src="{{ asset('images/icons/message-square-text-g.svg')}}" alt="icon">
                        <p class="font-semibold transition-all duration-300 hover:text-white">Rekap Penilaian</p>
                    </a>
                </li>
                <hr>
                <li>
                  <a href="{{ route('login') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                      <img src="{{ asset('images/icons/log-out.svg')}}" alt="icon">
                      <p class="font-semibold transition-all duration-300 hover:text-white">Logout</p>
                  </a>
                </li>
            </ul>
        </div>
    </div>

    <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            <div class="nav flex justify-between p-5 border-b border-[#EEEEEE]">
                <form class="search flex items-center w-[400px] h-[52px] p-[10px_16px] rounded-full border border-[#EEEEEE]">
                    <input type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Cari dosen.." name="search">
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
      <h1 class="text-2xl font-bold mb-6">Edit Dosen</h1>

      <form method="POST" action="{{ route('admin.dosen.update', $dosen['id_dosen']) }}" class="flex flex-col gap-[30px] w-[500px]">
        @csrf
        @method('PUT')

        {{-- NIDN --}}
        <div class="flex flex-col gap-[10px]">
          <p class="font-semibold">NIDN</p>
          <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
            <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
              <img src="{{ asset('images/icons/note-favorite-outline.svg') }}" class="w-full h-full object-contain" alt="icon">
            </div>
            <input type="text" name="nidn" value="{{ old('nidn', $dosen['nidn']) }}" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" required>
          </div>
        </div>

        {{-- Nama Dosen --}}
        <div class="flex flex-col gap-[10px]">
          <p class="font-semibold">Nama Dosen</p>
          <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
            <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
              <img src="{{ asset('images/icons/user.svg') }}" class="w-full h-full object-contain" alt="icon">
            </div>
            <input type="text" name="nama_dosen" value="{{ old('nama_dosen', $dosen['nama_dosen']) }}" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" required>
          </div>
        </div>

        {{-- Program Studi --}}
        <div class="flex flex-col gap-[10px]">
          <p class="font-semibold">Program Studi</p>
          <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
            <div class="mr-[14px] w-6 h-6 flex items-center justify-center">
              <img src="{{ asset('images/icons/book.svg') }}" class="w-full h-full object-contain" alt="icon">
            </div>
            <select name="id_prodi" class="font-semibold w-full outline-none bg-transparent" required>
              <option value="">Pilih Program Studi</option>
              @foreach($prodiList as $prodi)
                <option value="{{ $prodi['id_prodi'] }}" {{ $prodi['id_prodi'] == $dosen['id_prodi'] ? 'selected' : '' }}>
                  {{ $prodi['nama_prodi'] }}
                </option>
              @endforeach
            </select>
          </div>
        </div>

        {{-- Mata Kuliah --}}
        <div class="flex flex-col gap-[10px]">
          <p class="font-semibold">Mata Kuliah</p>
          <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
            <div class="mr-[14px] w-6 h-6 flex items-center justify-center">
              <img src="{{ asset('images/icons/book-open-text.svg') }}" class="w-full h-full object-contain" alt="icon">
            </div>
            <select name="id_matkul" class="font-semibold w-full outline-none bg-transparent" required>
              <option value="">Pilih Mata Kuliah</option>
              @foreach($matkulList as $matkul)
                <option value="{{ $matkul['id_matkul'] }}" {{ $matkul['id_matkul'] == $dosen['id_matkul'] ? 'selected' : '' }}>
                  {{ $matkul['nama_matkul'] }}
                </option>
              @endforeach
            </select>
          </div>
        </div>

        {{-- Tombol --}}
        <div class="flex items-center gap-5">
          <a href="{{ route('admin.dosen.index') }}" class="w-full h-[52px] p-[14px_20px] bg-gray-200 rounded-full font-semibold text-[#0A090B] text-center hover:bg-gray-300 transition-all duration-300">
            Kembali
          </a>
          <button type="submit" class="w-full h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D]">
            Update Dosen
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

</body>
</html>
