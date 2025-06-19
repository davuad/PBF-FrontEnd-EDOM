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
                            <p class="text-sm text-[#7F8190]">Admin</p>
                            <p class="font-semibold">Davu Andrias</p>
                        </div>
                        <div class="w-[46px] h-[46px]">
                            <img src="{{ asset('images/photos/default-photo.svg')}}" alt="photo">
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-10 w-full">
            <h1 class="text-2xl font-bold mb-6">Edit Penilaian</h1>

            <form method="POST" action="{{ route('mahasiswa.update_penilaian', $penilaian['id_penilaian']) }}" class="flex flex-col gap-[30px] w-[500px]">
          @csrf
          @method('PUT')

          {{-- Program Studi --}}
          <div class="flex flex-col gap-[10px]">
            <p class="font-semibold">Program Studi</p>
            <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] bg-gray-100">
              <input type="text" id="prodiText" class="font-semibold w-full outline-none bg-transparent" readonly>
              <input type="hidden" name="id_prodi" value="{{ $penilaian['id_prodi'] }}">
            </div>
            @error('id_prodi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          </div>


          {{-- Dosen --}}
          <div class="flex flex-col gap-[10px]">
            <p class="font-semibold">Dosen</p>
            <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] bg-gray-100">
              <input type="text" id="dosenText" class="font-semibold w-full outline-none bg-transparent" readonly>
              <input type="hidden" name="id_dosen" value="{{ $penilaian['id_dosen'] }}">
            </div>
            @error('id_dosen') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          </div>

          {{-- SKS --}}
          <div class="flex flex-col gap-[10px]">
            <p class="font-semibold">SKS</p>
            <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE]">
              <input type="number" name="sks" value="{{ old('sks', $penilaian['sks']) }}" class="font-semibold w-full outline-none bg-transparent" required>
            </div>
            @error('sks') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          </div>

          {{-- Aspek Nilai --}}
          <div class="flex flex-col gap-[10px]">
            <p class="font-semibold">Aspek Nilai</p>
            <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE]">
              <select name="aspek_nilai" class="font-semibold w-full outline-none bg-transparent" required>
                <option value="">Pilih Nilai</option>
                @for ($i = 1; $i <= 5; $i++)
                  <option value="{{ $i }}" {{ old('aspek_nilai', $penilaian['aspek_nilai']) == $i ? 'selected' : '' }}>
                    {{ $i }} -
                    @switch($i)
                      @case(1) Sangat Buruk @break
                      @case(2) Buruk @break
                      @case(3) Cukup @break
                      @case(4) Baik @break
                      @case(5) Sangat Baik @break
                    @endswitch
                  </option>
                @endfor
              </select>
            </div>
            @error('aspek_nilai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          </div>

          {{-- Saran --}}
          <div class="flex flex-col gap-[10px]">
            <p class="font-semibold">Saran</p>
            <div class="flex items-center h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE]">
              <input type="text" name="saran" maxlength="150" value="{{ old('saran', $penilaian['saran']) }}" class="font-semibold w-full outline-none bg-transparent" required>
            </div>
            @error('saran') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          </div>

          {{-- Tombol --}}
          <div class="flex items-center gap-5">
            <a href="{{ route('mahasiswa.isi_penilaian') }}" class="w-full h-[52px] p-[14px_20px] bg-gray-200 rounded-full font-semibold text-[#0A090B] text-center hover:bg-gray-300 transition-all duration-300">
              Batal
            </a>
            <button type="submit" class="w-full h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D]">
              Update Penilaian
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

  {{-- Script untuk fetch data --}}
  <script>
   document.addEventListener("DOMContentLoaded", () => {
  const selectedIdProdi = {{ $penilaian['id_prodi'] }};
  
  fetch("http://localhost:8080/api/prodi/getAll")
    .then(res => res.json())
    .then(data => {
      const selectedProdi = data.find(p => p.id_prodi == selectedIdProdi);
      if (selectedProdi) {
        document.getElementById("prodiText").value = selectedProdi.nama_prodi;
      } else {
        document.getElementById("prodiText").value = "Tidak diketahui";
      }
    });
});


      // Dosen
      const selectedIdDosen = {{ $penilaian['id_dosen'] }};

fetch("http://localhost:8080/api/dosen/getAll")
  .then(res => res.json())
  .then(data => {
    const selectedDosen = data.find(d => d.id_dosen == selectedIdDosen);
    if (selectedDosen) {
      document.getElementById("dosenText").value = selectedDosen.nama_dosen;
    } else {
      document.getElementById("dosenText").value = "Tidak diketahui";
    }
  });
  </script>

</body>
</html>
