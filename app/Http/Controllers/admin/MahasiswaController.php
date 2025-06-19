<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    private $apiBase = 'http://localhost:8080/api/mahasiswa';

    public function index()
    {
        $response = Http::get($this->apiBase);

        if ($response->successful()) {
            $data = $response->json();
        } else {
            $data = [];
            session()->flash('error', 'Gagal mengambil data dosen dari API.');
        }

        return view('admin.mahasiswa.index', compact('data'));
    }

    public function create()
    {
        return view('admin.mahasiswa.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'npm' => 'required|string|max:9',           // Nomor Induk Mahasiswa
            'email' => 'required|email|max:255',
            'nama_mhs' => 'required|string|max:100',     // Nama lengkap mahasiswa
            'kelas' => 'required|string|max:10',         // Kelas (misal: TI-3A, B2, dll)
            'id_prodi' => 'required|numeric',            // ID dari Prodi (integer dari tabel prodi)
        ]);

        try {
            $response = Http::asJson()->post($this->apiBase . '/create', $validated);

            if ($response->failed()) {
                $errorMessage = $response->json('message') ?? 'Terjadi kesalahan saat menambahkan dosen.';
                return redirect()->back()
                    ->withErrors(['api' => $errorMessage])
                    ->withInput();
            }

            return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['exception' => $e->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $mahasiswaResponse = Http::get("{$this->apiBase}/$id");
        //dd($mahasiswaResponse->status(), $mahasiswaResponse->body());
        $prodiResponse = Http::get("http://localhost:8080/api/prodi");

        if ($mahasiswaResponse->successful() && $prodiResponse->successful()) {
            $mahasiswa = $mahasiswaResponse->json()['data'];
            $prodiList = $prodiResponse->json();

            return view('admin.mahasiswa.edit', compact('mahasiswa', 'prodiList'));
        } else {
            return redirect()->route('admin.mahasiswa.index')->withErrors('Gagal mengambil data mahasiswa atau referensi.');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'npm' => 'required|string|max:9',           // Nomor Induk Mahasiswa
            'email' => 'required|email|max:255',
            'nama_mhs' => 'required|string|max:100',     // Nama lengkap mahasiswa
            'kelas' => 'required|string|max:10',         // Kelas (misal: TI-3A, B2, dll)
            'id_prodi' => 'required|numeric',            // ID dari Prodi (integer dari tabel prodi)
        ]);

        try {
            $response = Http::asJson()->put("{$this->apiBase}/update/{$id}", $validated);

            if ($response->failed()) {
                $errorMessage = $response->json('message') ?? 'Gagal memperbarui data mahasiswa.';
                return redirect()->back()
                    ->withErrors(['api' => $errorMessage])
                    ->withInput();
            }

            return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
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
                $errorMessage = $response->json('message') ?? 'Gagal menghapus mahasiswa.';
                return redirect()->back()->withErrors(['api' => $errorMessage]);
            }

            return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
