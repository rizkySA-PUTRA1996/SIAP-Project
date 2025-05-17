<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index(Request $request)
    {
        // $search = $request->input('search');

        $antrian = Antrian::paginate(7);
        // when($search, function ($query) use ($search) {
        //     $query->whereHas('pasien', function ($q) use ($search) {
        //     $q->where('nama_pasien', 'like', "%$search%");
        //     });
        // })->paginate(7);

    return view('petugas.antrian', compact('antrian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Antrian $antrian, $id)
    {
        $antrian = Antrian::with('pasien', 'transaksi', 'detailTransaksi.obat', 'detailTransaksi.batch')->findOrFail($id);
        return view('petugas.antrian', compact('antrian', 'antrianDetail'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Antrian $antrian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Antrian $antrian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Antrian $antrian)
    {
        //
    }

}
