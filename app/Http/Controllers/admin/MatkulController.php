<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MatkulController extends Controller
{
    private $apiBase = 'http://localhost:8080/api/matkul';

    public function index()
    {
        $response = Http::get($this->apiBase);

        if ($response->successful()) {
            $data = $response->json();
        } else {
            $data = [];
            session()->flash('error', 'Gagal mengambil data dosen dari API.');
        }

        return view('admin.matkul.index', compact('data'));
    }

    public function create()
    {
        return view('admin.matkul.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_matkul' => 'required|string|max:100',     // Nama lengkap mahasiswa
            'id_prodi' => 'required|numeric',            // ID dari Prodi (integer dari tabel prodi)
            'sks' => 'required|numeric',
        ]);

        try {
            $response = Http::asJson()->post($this->apiBase . '/create', $validated);

            if ($response->failed()) {
                $errorMessage = $response->json('message') ?? 'Terjadi kesalahan saat menambahkan dosen.';
                return redirect()->back()
                    ->withErrors(['api' => $errorMessage])
                    ->withInput();
            }

            return redirect()->route('admin.matkul.index')->with('success', 'matkul berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['exception' => $e->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $matkulresponse = Http::get("{$this->apiBase}/$id");
        //dd($matkulresponse->status(), $matkulresponse->body());
        $prodiResponse = Http::get("http://localhost:8080/api/prodi");

        if ($matkulresponse->successful() && $prodiResponse->successful()) {
            $matkul = $matkulresponse->json()['data'];
            $prodiList = $prodiResponse->json();

            return view('admin.matkul.edit', compact('matkul', 'prodiList'));
        } else {
            return redirect()->route('admin.matkul.index')->withErrors('Gagal mengambil data matkul atau referensi.');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_matkul' => 'required|string|max:100',     // Nama lengkap mahasiswa
            'id_prodi' => 'required|numeric',            // ID dari Prodi (integer dari tabel prodi)
            'sks' => 'required|numeric',
        ]);

        try {
            $response = Http::asJson()->put("{$this->apiBase}/update/{$id}", $validated);

            if ($response->failed()) {
                $errorMessage = $response->json('message') ?? 'Gagal memperbarui data matkul.';
                return redirect()->back()
                    ->withErrors(['api' => $errorMessage])
                    ->withInput();
            }

            return redirect()->route('admin.matkul.index')->with('success', 'matkul berhasil diperbarui.');
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
                $errorMessage = $response->json('message') ?? 'Gagal menghapus matkul.';
                return redirect()->back()->withErrors(['api' => $errorMessage]);
            }

            return redirect()->route('admin.matkul.index')->with('success', 'matkul berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
