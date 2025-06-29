<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HasilPenilaianController extends Controller
{
    private $apiBase = 'http://localhost:8080/api/penilaian/riwayat';

    public function index()
    {
        $response = Http::get($this->apiBase);

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

        return view('dosen.hasil_penilaian', compact('data'));
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

    public function saran()
    {
        $response = Http::get($this->apiBase);

        if ($response->successful()) {
            $data = $response->json();
        } else {
            $data = [];
            session()->flash('error', 'Gagal mengambil data penilaian dari API.');
        }

        return view('dosen.saran', compact('data'));
    }
}
