<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\StokObat;
use Illuminate\Http\Request;

class StokObatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $stokObat = StokObat::with('kategori')
                    ->when($search, function ($query, $search) {
                            $query->where('nama_obat', 'like', "%$search%");
                    })->paginate(13);
        return view('petugas.stokObat', compact('stokObat'));
    }
}
