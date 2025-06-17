<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AntrianController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data dari API tanpa token
        $response = Http::get('https://ti054a04.agussbn.my.id/api/petugas/antrean');


        if (!$response->successful()) {
            return redirect()->back()->withErrors(['api' => 'Gagal mengambil data dari API.']);
        }

        $data = collect($response->json()['data'] ?? []);

        // Simulasi pagination manual
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $pagedData = $data->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $antrian = new LengthAwarePaginator($pagedData, $data->count(), $perPage, $currentPage, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        return view('petugas.antrian', compact('antrian'));
    }
}
