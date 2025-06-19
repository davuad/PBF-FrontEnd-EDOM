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
        <div id="sidebar" class="w-[270px] flex flex-col shrink-0 min-h-screen justify-between p-[30px] border-r border-[#EEEEEE] bg-[#FBFBFB]">
            <div class="w-full flex flex-col gap-[30px]">
                
                    <img src="{{ asset('images/logo/logoEdom1.png')}}" alt="logo" style="display: block; margin: 0 auto; width: 50%;">
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">Fitur</h3>
                    </li>
                    <li>
                      <a href="{{ route('admin.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                          <div>
                              <img src="{{ asset('images/icons/house-g.svg')}}" alt="icon">
                          </div>
                          <p class="font-semibold transition-all duration-300 hover:text-white">Dashboard</p>
                      </a>
                  </li>
                    <li>
                        <a href="{{ route('admin.dosen.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 bg-[#2B82FE] hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('images/icons/profile-2user.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 text-white hover:text-white">Dosen</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.mahasiswa.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('images/icons/graduation-cap.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Mahasiswa</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.matkul.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('images/icons/book-open-text.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Mata Kuliah</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.prodi.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('images/icons/layers.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Program Studi</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.penilaian.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('images/icons/message-square-text-g.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Rekap Penilaian</p>
                        </a>
                    </li>
                    <hr>
                    <li>
                      <a href="{{ route('login') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                          <div>
                              <img src="{{ asset('images/icons/log-out.svg')}}" alt="icon">
                          </div>
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

              @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="flex flex-col px-5 mt-5">
                <div class="w-full flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <p class="font-extrabold text-[30px] leading-[45px]">Evaluasi Dosen Oleh Mahasiswa</p>
                        <p class="text-[#7F8190]">Kelola data Dosen</p>
                    </div>
                    <a href="{{ route('admin.dosen.tambah') }}" class="h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D]">Tambah Data Dosen</a>
                </div>
            </div>
            <div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
                <div class="course-list-header flex flex-nowrap justify-between pb-4 pr-10 border-b border-[#EEEEEE]">
                    <div class="flex shrink-0 w-[300px]">
                        <p class="text-[#7F8190]">Nama Dosen</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[150px]">
                        <p class="text-[#7F8190]">NIDN</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[150px]">
                        <p class="text-[#7F8190]">Prodi</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[170px]">
                        <p class="text-[#7F8190]">Mata Kuliah</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[120px]">
                        <p class="text-[#7F8190]">Aksi</p>
                    </div>
                </div>
                @forelse ($data as $dosen)
                <div class="flex flex-nowrap justify-between items-center bg-white rounded shadow-sm p-4 mb-3">
                    <!-- Foto Dosen -->
                    <div class="flex items-center w-[300px]">
                        <div class="w-16 h-16 overflow-hidden rounded-full mr-4">
                            <img src="{{ asset('images/thumbnail/Basic-Interview.png') }}" class="object-cover w-full h-full" alt="Foto Dosen">
                        </div>
                        <div>
                            <p class="font-bold text-lg">{{ $dosen['nama_dosen'] ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- NIDN -->
                    <div class="w-[150px] text-center">
                        <p class="font-semibold">{{ $dosen['nidn'] ?? '-' }}</p>
                    </div>

                    <!-- Nama Prodi -->
                    <div class="w-[150px] text-center">
                        <p class="font-semibold">{{ $dosen['nama_prodi'] ?? '-' }}</p>
                    </div>

                    <!-- Mata Kuliah -->
                    <div class="w-[170px] text-center">
                        <span class="px-4 py-1 bg-orange-100 text-orange-600 rounded-full text-sm font-semibold">
                            {{ $dosen['nama_matkul'] ?? '-' }}
                        </span>
                    </div>

                    <div class="flex shrink-0 w-[120px] items-center">
                        <div class="relative h-[41px]">
                            <div class="menu-dropdown w-[120px] max-h-[41px] overflow-hidden absolute top-0 p-[10px_16px] bg-white flex flex-col gap-3 border border-[#EEEEEE] transition-all duration-300 hover:shadow-[0_10px_16px_0_#0A090B0D] rounded-[18px]">
                                <button onclick="toggleMaxHeight(this)" class="flex items-center justify-between font-bold text-sm w-full">
                                    menu
                                    <img src="{{ asset('images/icons/arrow-down.svg')}}" alt="icon">
                                </button>
                                <a href="{{ route('admin.dosen.edit', $dosen['id_dosen']) }}" class="flex items-center justify-between font-bold text-sm w-full">
                                    Edit 
                                </a>
                                <form action="{{ route('admin.dosen.hapus', $dosen['id_dosen']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center text-gray-500 mt-10">
                    <p>Data dosen tidak ditemukan.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <script>
        function toggleMaxHeight(button) {
            const menuDropdown = button.parentElement;
            menuDropdown.classList.toggle('max-h-fit');
            menuDropdown.classList.toggle('shadow-[0_10px_16px_0_#0A090B0D]');
            menuDropdown.classList.toggle('z-10');
        }

        document.addEventListener('click', function(event) {
            const menuDropdowns = document.querySelectorAll('.menu-dropdown');
            const clickedInsideDropdown = Array.from(menuDropdowns).some(function(dropdown) {
                return dropdown.contains(event.target);
            });
            
            if (!clickedInsideDropdown) {
                menuDropdowns.forEach(function(dropdown) {
                    dropdown.classList.remove('max-h-fit');
                    dropdown.classList.remove('shadow-[0_10px_16px_0_#0A090B0D]');
                    dropdown.classList.remove('z-10');
                });
            }
        });
    </script>
</body>
</html>