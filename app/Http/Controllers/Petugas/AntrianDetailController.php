<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\DetailAntrian;
use App\Models\Petugas\StokObat;
use Illuminate\Http\Request;

class AntrianDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail = DetailAntrian::with('antrian', 'obat', 'kategori')->get();
        return view('petugas.antrianDetail', compact('detail'));
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
    public function show(DetailAntrian $detailAntrian, $id)
    {
    $detail = DetailAntrian::with(['antrian', 'riwayat'])
        ->where('id_resep', $id)
        ->firstOrFail();

    $resepDetails = DetailAntrian::with('obat.kategori')
        ->where('id_resep', $id)
        ->get();

    return view('petugas.antrianDetail', compact('detail', 'resepDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailAntrian $detailAntrian, $id)
    {
        // $antrian = Antrian::FindOrFail($id);
        // return view('petugas.antrianDetail', compact('antrian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailAntrian $detailAntrian, $id)
    {
        // $antrian = Antrian::findOrFail($id);

        // if ($request->has('tunda')) {
        //     $antrian->status = 'Ditunda sementara';
        //     $antrian->save();

        //     return redirect()->route('petugas.antrian')->with('success', 'Antrean berhasil ditunda sementara.');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailAntrian $detailAntrian)
    {
        //
    }
}
