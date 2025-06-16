<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index(Request $request)
{
    $antrian = Antrian::paginate(10);

    // Ubah angka status menjadi teks
    $antrian->getCollection()->transform(function ($item) {
        if (in_array($item->status, [1, 2, 3])) {
            $item->status = 'Diterima';
        } elseif ($item->status == 4) {
            $item->status = 'Diproses';
        } elseif ($item->status == 5) {
            $item->status = 'Selesai';
        } else {
            $item->status = '-';
        }
        return $item;
    });

    return view('petugas.antrian', compact('antrian'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
