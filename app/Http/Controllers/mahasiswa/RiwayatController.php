<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class RiwayatController extends Controller
{
    private $apiBase = 'http://localhost:8080/api/penilaian/riwayat';

    public function index()
    {
        $response = Http::get($this->apiBase);

        $data = [];

        if ($response->successful()) {
            $rawData = $response->json();

            foreach ($rawData as $item) {
                // Konversi aspek_nilai tunggal (bukan array)
                if (isset($item['aspek_nilai'])) {
                    $item['aspek_nilai'] = $this->konversiNilai($item['aspek_nilai']);
                } else {
                    $item['aspek_nilai'] = '-';
                }

                $data[] = $item;
            }
        } else {
            session()->flash('error', 'Gagal mengambil data penilaian dari API.');
        }

        return view('mahasiswa.riwayat_penilaian', compact('data'));
    }

    private function konversiNilai($nilai)
    {
        return match ((int) $nilai) {
            1 => 'Buruk',
            2 => 'Kurang Baik',
            3 => 'Cukup Baik',
            4 => 'Baik',
            5 => 'Baik Sekali',
            default => 'Tidak Diketahui'
        };
    }
}
