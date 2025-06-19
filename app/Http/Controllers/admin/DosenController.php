<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DosenController extends Controller
{
    private $apiBase = 'http://localhost:8080/api/dosen';

    public function index()
    {
        $response = Http::get($this->apiBase);

        if ($response->successful()) {
            $data = $response->json();
        } else {
            $data = [];
            session()->flash('error', 'Gagal mengambil data dosen dari API.');
        }

        return view('admin.dosen.index', compact('data'));
    }

    public function create()
    {
        return view('admin.dosen.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nidn' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'nama_dosen' => 'required|string|max:100',
            'id_prodi' => 'required|numeric',
            'id_matkul' => 'required|numeric',
        ]);

        try {
            $response = Http::asJson()->post($this->apiBase . '/create', $validated);

            if ($response->failed()) {
                $errorMessage = $response->json('message') ?? 'Terjadi kesalahan saat menambahkan dosen.';
                return redirect()->back()
                    ->withErrors(['api' => $errorMessage])
                    ->withInput();
            }

            return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['exception' => $e->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $dosenResponse = Http::get("{$this->apiBase}/$id");
        $prodiResponse = Http::get("http://localhost:8080/api/prodi");     // ganti URL sesuai API-mu
        $matkulResponse = Http::get("http://localhost:8080/api/matkul");

        if ($dosenResponse->successful() && $prodiResponse->successful() && $matkulResponse->successful()) {
            $dosen = $dosenResponse->json()['data'];
            $prodiList = $prodiResponse->json();   // pastikan formatnya array
            $matkulList = $matkulResponse->json();

            return view('admin.dosen.edit', compact('dosen', 'prodiList', 'matkulList'));
        } else {
            return redirect()->route('admin.dosen.index')->withErrors('Gagal mengambil data dosen atau referensi.');
        }
    }
    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nidn' => 'required|string|max:20',
            'nama_dosen' => 'required|string|max:100',
            'id_prodi' => 'required|numeric',
            'id_matkul' => 'required|numeric',
        ]);

        try {
            $response = Http::asJson()->put("{$this->apiBase}/update/{$id}", $validated);

            if ($response->failed()) {
                $errorMessage = $response->json('message') ?? 'Gagal memperbarui data dosen.';
                return redirect()->back()
                    ->withErrors(['api' => $errorMessage])
                    ->withInput();
            }

            return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil diperbarui.');
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
                $errorMessage = $response->json('message') ?? 'Gagal menghapus dosen.';
                return redirect()->back()->withErrors(['api' => $errorMessage]);
            }

            return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
