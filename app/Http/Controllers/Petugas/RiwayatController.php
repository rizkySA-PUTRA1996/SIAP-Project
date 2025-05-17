<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\Antrian;
use App\Models\Petugas\DetailAntrian;
use App\Models\Petugas\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Ambil data riwayat dan grup berdasarkan id_resep
        $riwayat = DetailAntrian::with(['riwayat', 'antrian', 'obat'])
            ->when($search, function ($query, $search) {
                $query->whereHas('riwayat', function ($q) use ($search) {
                    $q->where('nama_pasien', 'like', "%$search%");
                });
            })
            ->paginate(13)
            ->groupBy('antrian.id_resep');

        return view('petugas.riwayatAntrian', compact('riwayat'));
    }
}
