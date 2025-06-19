<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PenilaianController extends Controller
{
    private $apiBase = 'http://localhost:8080/api/penilaian';

    public function index()
    {
        $response = Http::get($this->apiBase);
        $penilaianList = [];

        if ($response->successful()) {
            $data = $response->json();

            foreach ($data as $penilaian) {
                // Ambil data dari JSON
                $idPenilaian = $penilaian['id_penilaian'] ?? null;
                $id_dosen = $penilaian['id_dosen'] ?? null;
                $namaDosen = $penilaian['nama_dosen'] ?? '-';
                $nidn = $penilaian['nidn'] ?? '-';

                // Ambil penilaian lengkap per dosen
                $penilaianResponse = Http::get("http://localhost:8080/api/penilaian/getTotalPenilaianMhs/{$id_dosen}");

                $totalSkor = 0;
                $jumlahPenilaian = 0;

                if ($penilaianResponse->successful()) {
                    $penilaianData = $penilaianResponse->json('data') ?? [];

                    foreach ($penilaianData as $entry) {
                        $aspekNilai = $entry['aspek_nilai'] ?? [];

                        // Jika aspek_nilai berbentuk array
                        if (is_array($aspekNilai)) {
                            foreach ($aspekNilai as $nilai) {
                                $totalSkor += (int)$nilai;
                                $jumlahPenilaian++;
                            }
                        }
                        // Jika aspek_nilai bentuk string langsung (seperti di JSON kamu)
                        elseif (is_numeric($aspekNilai)) {
                            $totalSkor += (int)$aspekNilai;
                            $jumlahPenilaian++;
                        }
                    }
                }

                $rataRata = $jumlahPenilaian > 0 ? round($totalSkor / $jumlahPenilaian, 2) : 0;
                $kategori = $this->getKategoriPenilaian($rataRata);

                $penilaianList[] = [
                    'id_penilaian' => $idPenilaian,
                    'id_dosen' => $id_dosen,
                    'nama_dosen' => $namaDosen,
                    'nidn' => $nidn,
                    'jumlah_penilaian' => $jumlahPenilaian,
                    'rata_rata_nilai' => $rataRata,
                    'kategori' => $kategori,
                ];
            }
        } else {
            session()->flash('error', 'Gagal mengambil data penilaian dari API.');
        }

        return view('admin.penilaian.index', compact('penilaianList'));
    }

    private function getKategoriPenilaian($nilai)
    {
        if ($nilai >= 4.5) return 'Baik Sekali';
        if ($nilai >= 4.0) return 'Baik';
        if ($nilai >= 3.0) return 'Cukup Baik';
        if ($nilai >= 2.0) return 'Kurang Baik';
        if ($nilai > 0)   return 'Buruk';
        return 'Belum Dinilai';
    }
}
