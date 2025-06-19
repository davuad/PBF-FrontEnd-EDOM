<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdiController extends Controller
{
    private $apiBase = 'http://localhost:8080/api/prodi';

    public function index()
    {
        $response = Http::get($this->apiBase);

        $prodiList = [];

        if ($response->successful()) {
            $data = $response->json();

            // Loop data array langsung
            foreach ($data as $prodi) {
                $id = $prodi['id_prodi'];

                $dosenResponse = Http::get("http://localhost:8080/api/dosen/prodi/{$id}");
                $mahasiswaResponse = Http::get("http://localhost:8080/api/mahasiswa/prodi/{$id}");

                // Hitung jumlah data di 'data' jika ada, jika tidak, hitung sebagai 0
                $jumlahDosen = $dosenResponse->successful() ? count($dosenResponse->json('data') ?? []) : 0;
                $jumlahMahasiswa = $mahasiswaResponse->successful() ? count($mahasiswaResponse->json('data') ?? []) : 0;

                $prodiList[] = [
                    'id_prodi' => $prodi['id_prodi'],
                    'nama_prodi' => $prodi['nama_prodi'],
                    'jumlah_dosen' => $jumlahDosen,
                    'jumlah_mahasiswa' => $jumlahMahasiswa,
                ];
            }
        } else {
            session()->flash('error', 'Gagal mengambil data Prodi dari API.');
        }

        return view('admin.prodi.index', ['data' => $prodiList]);
    }

    public function create()
    {
        return view('admin.prodi.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_prodi' => 'required|string|max:100',
        ]);

        try {
            $response = Http::asJson()->post("{$this->apiBase}/create", $validated);

            if ($response->failed()) {
                $errorMessage = $response->json('message') ?? 'Terjadi kesalahan saat menambahkan prodi.';
                return redirect()->back()
                    ->withErrors(['api' => $errorMessage])
                    ->withInput();
            }

            return redirect()->route('admin.prodi.index')->with('success', 'Prodi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['exception' => $e->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $prodiresponse = Http::get("{$this->apiBase}/{$id}");

        if ($prodiresponse->successful()) {
            $json = $prodiresponse->json();
            // Jika API mengembalikan object dengan key 'data'
            $prodi = is_array($json) && isset($json['data']) ? $json['data'] : $json;

            return view('admin.prodi.edit', compact('prodi'));
        }

        return redirect()->route('admin.prodi.index')
            ->withErrors(['api' => 'Gagal mengambil data prodi atau referensi.']);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_prodi' => 'required|string|max:100',
        ]);

        try {
            $response = Http::asJson()->put("{$this->apiBase}/update/{$id}", $validated);

            if ($response->failed()) {
                $errorMessage = $response->json('message') ?? 'Gagal memperbarui data prodi.';
                return redirect()->back()
                    ->withErrors(['api' => $errorMessage])
                    ->withInput();
            }

            return redirect()->route('admin.prodi.index')->with('success', 'Prodi berhasil diperbarui.');
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
                $errorMessage = $response->json('message') ?? 'Gagal menghapus prodi.';
                return redirect()->back()->withErrors(['api' => $errorMessage]);
            }

            return redirect()->route('admin.prodi.index')->with('success', 'Prodi berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
