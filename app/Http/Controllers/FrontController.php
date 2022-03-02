<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Kategori;
use App\Models\Wisata;
use App\Models\Visitor;

class FrontController extends Controller
{
    public function welcome()
    {
        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        $galeri = Galeri::with('wisata')->inRandomOrder()->limit(6)->get();
        $visitor = Visitor::all();
        return view('welcome', compact('kategori', 'galeri', 'visitor'));
    }

    public function berandakategori(Kategori $kategori)
    {
        $katego = Kategori::orderBy('nama_kategori', 'asc')->get();
        $artikel = Artikel::with('user')->get();
        $wisata = Wisata::where('id_kategori', $kategori->id)->orderBy('nama_wisata', 'asc')->get();
        return view('front/beranda', compact('wisata', 'katego', 'artikel'));
    }

    public function beranda()
    {
        $katego = Kategori::orderBy('nama_kategori', 'asc')->get();
        $artikel = Artikel::with('user')->get();
        $wisata = Wisata::with('kategori')->orderBy('nama_wisata', 'asc')->get();
        return view('front/beranda', compact('wisata', 'katego', 'artikel'));
    }

    public function objekwisata()
    {
        $katego = Kategori::orderBy('nama_kategori', 'asc')->get();
        $wisata = Wisata::with('kategori')->orderBy('nama_wisata', 'asc')->get();
        return view('front/objek-wisata', compact('wisata', 'katego'));
    }

    public function wisatakategori(Kategori $kategori)
    {
        $kagori = Kategori::find($kategori->id);
        $katego = Kategori::orderBy('nama_kategori', 'asc')->get();
        $wisata = Wisata::where('id_kategori', $kategori->id)->orderBy('nama_wisata', 'asc')->get();
        return view('front/objek-wisata', compact('wisata', 'katego', 'kagori'));
    }

    public function wisatadetail(Wisata $wisata)
    {
        $wisata = Wisata::find($wisata->id);
        return view('front/detail-wisata', compact('wisata'));
    }

    public function wisatagaleri(Wisata $wisata)
    {
        $wisata = Wisata::find($wisata->id);
        $galeri = Galeri::where('id_wisata', $wisata->id)->get();
        return view('front/galeri-wisata', compact('wisata', 'galeri'));
    }

    public function artikel()
    {
        $artikel = Artikel::with('user')->latest()->get();
        return view('front/artikel', compact('artikel'));
    }

    public function artikelall()
    {
        $artikel = Artikel::with('user')->latest()->get();
        return view('front/artikel-all', compact('artikel'));
    }

    public function artikeldetail(Artikel $artikel)
    {
        $artikel = Artikel::find($artikel->id);
        $arkel = Artikel::with('user')->latest()->get();
        return view('front/detail-artikel', compact('artikel', 'arkel'));
    }

}
