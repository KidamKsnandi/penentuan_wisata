<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        $kategori = Kategori::all();
        return view('admin.index', compact('user'));
    }

    public function index2()
    {
        $user = User::all();
        $kategori = Kategori::all();
        return view('author.index', compact('user'));
    }

    public function artikel()
    {
        $artikel = Artikel::latest()->get();
        return view('admin.artikel.index', compact('artikel'));
    }

    public function lihat($id)
    {
        $artikel = Artikel::findOrFail($id);
        $slide = json_decode($artikel->status);
        return view('admin.artikel.lihat', compact('artikel', 'slide'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($request->status == "") {
            $artikel->status = "Normal";
        } else {
            $artikel->status = $request->status;
        }
        $artikel->save();
        Alert::success('Mantap', 'Berhasil Mengubah Data')->autoclose(3000);
        // Session::flash("flash_notification", [
        //     "level" => "success",
        //     "message" => "Berhasil Menyimpan $artikel->nama_artikel",
        // ]);
        return redirect('admin/article');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        $artikel->deleteCover();
        Alert::success('Mantap', 'Berhasil Menghapus Data')->autoclose(3000);

        // Session::flash("flash_notification", [
        //     "level" => "success",
        //     "message" => "Berhasil Menghapus Artikel",
        // ]);
        return redirect('admin/article');
    }

    public function tes()
    {
        return view('test');
    }

}
