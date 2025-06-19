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
                      <a href="{{ route('mahasiswa.index') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                          <div>
                              <img src="{{ asset('images/icons/house-g.svg')}}" alt="icon">
                          </div>
                          <p class="font-semibold transition-all duration-300 hover:text-white">Dashboard</p>
                      </a>
                  </li>
                    <li>
                        <a href="{{ route('mahasiswa.isi_penilaian') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 bg-[#2B82FE] hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('images/icons/notepad-text-w.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 text-white hover:text-white"> Isi Penilaian</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa.riwayat_penilaian') }}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('images/icons/message-square-text-g.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Riwayat Penilaian</p>
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
                            <p class="text-sm text-[#7F8190]">Mahasiswa</p>
                            <p class="font-semibold">Davuu</p>
                        </div>
                        <div class="w-[46px] h-[46px]">
                            <img src="{{ asset('images/photos/default-photo.svg')}}" alt="photo">
                        </div>
                    </div>
                </div>
            </div>

          <div class="p-10 w-full">
            <h1 class="text-2xl font-bold mb-6">Tambah Penilaian</h1>

            <form method="POST" action="{{ route('mahasiswa.simpan_penilaian') }}" class="flex flex-col gap-[30px] w-[500px]">
              @csrf

              {{-- Program Studi --}}
              <div class="flex flex-col gap-[10px]">
                <p class="font-semibold">Program Studi</p>
                <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE]">
                  <select name="id_prodi" id="prodiSelect" class="font-semibold w-full outline-none bg-transparent" required>
                    <option value="">Pilih Program Studi</option>
                  </select>
                </div>
                @error('id_prodi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
              </div>

              {{-- Dosen --}}
              <div class="flex flex-col gap-[10px]">
                  <p class="font-semibold">Dosen</p>
                  <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] bg-gray-100">
                      <input type="text" id="dosenText" class="font-semibold w-full outline-none bg-transparent" value="{{ $dosen['nama_dosen'] }}" readonly>
                      <input type="hidden" name="id_dosen" value="{{ $dosen['id_dosen'] }}">
                  </div>
                  @error('id_dosen') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
              </div>

              {{-- SKS --}}
              <div class="flex flex-col gap-[10px]">
                <p class="font-semibold">SKS</p>
                <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE]">
                  <input type="number" name="sks" placeholder="Contoh: 3" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" required>
                </div>
                @error('sks') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
              </div>

              {{-- Aspek Nilai --}}
              <div class="flex flex-col gap-[10px]">
                <p class="font-semibold">Aspek Nilai</p>
                <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE]">
                  <select name="aspek_nilai" class="font-semibold w-full outline-none bg-transparent" required>
                    <option value="">Pilih Nilai</option>
                    <option value="1" {{ old('aspek_nilai') == 1 ? 'selected' : '' }}>1 - Sangat Buruk</option>
                    <option value="2" {{ old('aspek_nilai') == 2 ? 'selected' : '' }}>2 - Buruk</option>
                    <option value="3" {{ old('aspek_nilai') == 3 ? 'selected' : '' }}>3 - Cukup</option>
                    <option value="4" {{ old('aspek_nilai') == 4 ? 'selected' : '' }}>4 - Baik</option>
                    <option value="5" {{ old('aspek_nilai') == 5 ? 'selected' : '' }}>5 - Sangat Baik</option>
                  </select>
                </div>
                @error('aspek_nilai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
              </div>


              {{-- Saran --}}
              <div class="flex flex-col gap-[10px]">
                <p class="font-semibold">Saran</p>
                <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE]">
                  <input type="text" name="saran" maxlength="150" placeholder="Tulis saran di sini..." class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" required>
                </div>
                @error('saran') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
              </div>

              {{-- Tombol --}}
              <div class="flex items-center gap-5">
                <a href="{{ route('mahasiswa.index') }}" class="w-full h-[52px] p-[14px_20px] bg-gray-200 rounded-full font-semibold text-[#0A090B] text-center hover:bg-gray-300 transition-all duration-300">
                  Kembali
                </a>
                <button type="submit" class="w-full h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D]">
                  Simpan Penilaian
                </button>
              </div>
            </form>
          </div>
        </div>
    </section>

    <script>
  document.addEventListener("DOMContentLoaded", () => {
    // Ambil data prodi
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

    // Ambil data dosen
    fetch("http://localhost:8080/api/dosen/getAll")
      .then(response => response.json())
      .then(data => {
        const select = document.getElementById("dosenSelect");
        data.forEach(dosen => {
          const option = document.createElement("option");
          option.value = dosen.id_dosen;
          option.textContent = dosen.nama_dosen;
          select.appendChild(option);
        });
      })
      .catch(error => console.error("Gagal ambil data dosen:", error));
  });
</script>
</body>
</html>
