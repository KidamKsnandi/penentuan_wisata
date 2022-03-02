<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Validator;

class GaleriController extends Controller
{
    public function all()
    {
        $galeri = Galeri::with('wisata')->latest()->get();
        return view('admin.galeri.all', compact('galeri'));
    }

    public function index(Wisata $wisata)
    {
        $wisata = Wisata::find($wisata->id);
        $galeri = Galeri::where('id_wisata', $wisata->id)->get();
        return view('admin.galeri.index', compact('wisata', 'galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Wisata $wisata)
    {
        $wisata = Wisata::find($wisata->id);
        return view('admin.galeri.create', compact('wisata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Wisata $wisata)
    {
        $message = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
            'image' => 'File harus image/foto ngab!!!',
        ];

        $rules = [
            'gambar' => 'required|',
            'gambar.*' => 'required|image|max:2048',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        // $validated = $request->validate([
        //     'gambar' => 'required',
        //     'gambar.*' => 'required|image|max:2048',
        // ], $messages);

        // if ($request->hasFile('gambar')) {
        //     $image = $request->file('gambar');
        //     $name = rand(1000, 9999) . $image->getClientOriginalName();
        //     $image->move('images/galeri/', $name);
        //     $galeri->gambar = $name;
        // }
        // $galeri->save();
        if ($request->hasfile('gambar')) {
            $files = [];
            foreach ($request->file('gambar') as $file) {
                if ($file->isValid()) {
                    $gambar = rand(1000, 9999) . $file->getClientOriginalName();
                    $file->move(public_path('images/galeri/'), $gambar);
                    $files[] = [
                        'id_wisata' => $wisata->id,
                        'gambar' => $gambar,
                    ];
                }
            }
            Galeri::insert($files);
        }
        Alert::success('Mantap', 'Berhasil Menyimpan Data Baru')->autoclose(3000);
        // Session::flash("flash_notification", [
        //                 "level"=>"success",
        //                 "message"=>"Berhasil Menyimpan Gambar di Galeri"
        //                 ]);
        return redirect('/admin/' . $wisata->slug . '/galeri');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $wisata, $id)
    {
        $wisata = Wisata::find($wisata->id);
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.show', compact('wisata', 'galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisata $wisata, $id)
    {
        $wisata = Wisata::find($wisata->id);
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('wisata', 'galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wisata $wisata, $id)
    {
        $message = [
            'image' => 'File harus image/foto ngab!!!',
            'max' => 'Maksimal gambar harus 2 mb',
        ];

        $rules = [
            'gambar' => 'image|max:2049',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        // $validated = $request->validate([
        //     'gambar' => 'image|max:2049',
        // ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->id_wisata = $wisata->id;
        // upload cover
        if ($request->hasFile('gambar')) {
            $galeri->deleteGaleri();
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/galeri/', $name);
            $galeri->gambar = $name;
        }
        $galeri->save();
        Alert::success('Mantap', 'Berhasil Menyimpan Data Baru')->autoclose(3000);
        // Session::flash("flash_notification", [
        //                 "level"=>"success",
        //                 "message"=>"Berhasil Menyimpan Gambar di Galeri"
        //                 ]);
        return redirect('/admin/' . $wisata->slug . '/galeri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata, $id)
    {
        $wisata = Wisata::find($wisata->id);
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();
        $galeri->deleteGaleri();
        Alert::success('Mantap', 'Berhasil Menghapus Data')->autoclose(3000);
        // Session::flash("flash_notification", [
        //                 "level"=>"success",
        //                 "message"=>"Berhasil Menghapus Gambar di Galeri $wisata->nama_wisata"
        //                 ]);
        return redirect()->back();
    }
}
