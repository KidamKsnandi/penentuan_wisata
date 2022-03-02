<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Str;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Kategori',
            'data' => $kategori,
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
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = Str::slug($kategori->nama_kategori);;
        $kategori->deskripsi_kategori = $request->deskripsi_kategori;
        $kategori->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Kategori Berhasil dibuat',
            'data' => $kategori,
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
        $kategori = Kategori::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Show Data Kategori',
            'data' => $kategori,
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
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = $request->slug;
        $kategori->deskripsi_kategori = $request->deskripsi_kategori;
        $kategori->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Kategori Berhasil diedit',
            'data' => $kategori,
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
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Kategori Berhasil Dihapus',
            'data' => $kategori,
        ], 200);
    }
}
