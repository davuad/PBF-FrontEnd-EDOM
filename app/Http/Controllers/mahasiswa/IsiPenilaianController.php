<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class IsiPenilaianController extends Controller
{
    private $apiBase = 'http://localhost:8080/api/penilaian';
    private $apidosen = 'http://localhost:8080/api/dosen';

    public function index()
    {
        $penilaianData = [];
        $dosenData = [];

        // Ambil data penilaian
        $penilaianResponse = Http::get($this->apiBase);
        if ($penilaianResponse->successful()) {
            $penilaianData = $penilaianResponse->json();
        } else {
            session()->flash('error', 'Gagal mengambil data penilaian dari API.');
        }

        // Ambil data dosen
        $dosenResponse = Http::get($this->apidosen);
        if ($dosenResponse->successful()) {
            $dosenData = $dosenResponse->json();
        } else {
            session()->flash('error', 'Gagal mengambil data dosen dari API.');
        }

        // Kirim keduanya ke view
        return view('mahasiswa.isi_penilaian', [
            'penilaian' => $penilaianData,
            'listdosen' => $dosenData
        ]);
    }

    public function create($id_dosen)
    {
        $response = Http::get("http://localhost:8080/api/dosen/{$id_dosen}");

        if ($response->successful()) {
            $dosen = $response->json('data');
            return view('mahasiswa.tambah_penilaian', compact('dosen'));
        }

        return redirect()->back()->withErrors(['message' => 'Dosen tidak ditemukan']);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_prodi' => 'required|numeric|max:9',
            'id_dosen' => 'required|numeric|max:100',
            'sks' => 'required|numeric|max:10',
            'aspek_nilai' => 'required|in:1,2,3,4,5',
            'saran' => 'required|string|max:150',
        ]);


        try {
            $response = Http::asJson()->post($this->apiBase . '/create', $validated);
            // dd($response->status(), $response->json());
            if ($response->failed()) {
                $errorMessage = $response->json('message') ?? 'Terjadi kesalahan saat menambahkan penilaian.';
                return redirect()->back()
                    ->withErrors(['api' => $errorMessage])
                    ->withInput();
            }

            return redirect()->route('mahasiswa.riwayat_penilaian')->with('success', 'penilaian berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['exception' => $e->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $penilaianresponse = Http::get("{$this->apiBase}/$id");
        //dd($penilaianresponse->status(), $penilaianresponse->body());
        $dosenresponse = Http::get("http://localhost:8080/api/dosen");
        $prodiresponse = Http::get("http://localhost:8080/api/prodi");

        if ($penilaianresponse->successful() && $dosenresponse->successful() && $prodiresponse->successful()) {
            $penilaian = $penilaianresponse->json()['data'];
            $dosenList = $dosenresponse->json();
            $prodiList = $prodiresponse->json();

            return view('mahasiswa.edit_penilaian', compact('penilaian', 'dosenList', 'prodiList'));
        } else {
            return redirect()->route('mahasiswa.isi_penilaian')->withErrors('Gagal mengambil data penilaian atau referensi.');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_prodi' => 'required|numeric|max:9',
            'id_dosen' => 'required|numeric|max:100',
            'sks' => 'required|numeric|max:10',
            'aspek_nilai' => 'required|in:1,2,3,4,5',
            'saran' => 'required|string|max:150',
        ]);
        // dd($validated);

        try {
            $response = Http::asJson()->put("{$this->apiBase}/update/{$id}", $validated);
            //dd($response->status(), $response->body());
            if ($response->failed()) {
                $errorMessage = $response->json('message') ?? 'Gagal memperbarui data penilaian.';
                return redirect()->back()
                    ->withErrors(['api' => $errorMessage])
                    ->withInput();
            }

            return redirect()->route('mahasiswa.riwayat_penilaian')->with('success', 'penilaian berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['exception' => $e->getMessage()])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $response = Http::delete("{$this->apiBase}/delete/{$id}");

            if ($response->failed()) {
                $errorMessage = $response->json('message') ?? 'Gagal menghapus penilaian.';
                return redirect()->back()->withErrors(['api' => $errorMessage]);
            }

            return redirect()->route('mahasiswa.isi_penilaian')->with('success', 'penilaian berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
