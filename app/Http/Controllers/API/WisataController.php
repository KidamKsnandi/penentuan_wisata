<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use App\Models\Wisata;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = Wisata::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Wisata',
            'data' => $wisata,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wisata = new Wisata();
        $wisata->nama_wisata = $request->nama_wisata;
        $slug = Str::slug($wisata->nama_wisata);
        $wisata->slug = $slug;
        $wisata->id_kategori = $request->id_kategori;
        $wisata->lokasi = $request->lokasi;
        $wisata->deskripsi_wisata = $request->deskripsi_wisata;
        $wisata->harga_tiket = $request->harga_tiket;
        $wisata->cover = $request->cover;
        $wisata->status = $request->status;
        $wisata->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Wisata Berhasil dibuat',
            'data' => $wisata,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wisata = Wisata::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Show Data Wisata',
            'data' => $wisata,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wisata = Wisata::findOrFail($id);
        $wisata->nama_wisata = $request->nama_wisata;
        $slug = Str::slug($wisata->nama_wisata);
        $wisata->slug = $slug;
        $wisata->id_kategori = $request->id_kategori;
        $wisata->lokasi = $request->lokasi;
        $wisata->deskripsi_wisata = $request->deskripsi_wisata;
        $wisata->harga_tiket = $request->harga_tiket;
        $wisata->cover = $request->cover;
        $wisata->status = $request->status;
        $wisata->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Wisata Berhasil diedit',
            'data' => $wisata,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        $wisata->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Wisata Berhasil Dihapus',
            'data' => $wisata,
        ], 200);
    }
}
