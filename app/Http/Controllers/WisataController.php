<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Kategori;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Session;
use Str;
use Validator;

class WisataController extends Controller
{
    public function index()
    {
        $wisata = Wisata::with('kategori')->get();
        return view('admin.wisata.index', compact('wisata'));
    }

    public function create()
    {
        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        return view('admin.wisata.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $message = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
            'min' => 'Data harus diisi minimal :min karakter ya ngab!!!',
        ];

        $rules = [
            'nama_wisata' => 'required|unique:wisatas',
            'lokasi' => 'required',
            'cover' => 'required',
            'embed_map' => 'required',
            'nama_wisata.*' => 'required',
            'lokasi.*' => 'required|min:10',
            'cover.*' => 'required|image|max:2048',
            'embed_map.*' => 'required|min:20',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        if (is_countable($request['nama_wisata']) && count($request['nama_wisata']) > 0) {
            foreach ($request['nama_wisata'] as $item => $value) {
                // $data = array(
                //     'nama_wisata' => $request['nama_wisata'][$item],
                //     'slug' => Str::slug($request['nama_wisata'][$item]),
                //     'id_kategori' => $request['id_kategori'][$item],
                //     'lokasi' => $request['lokasi'][$item],
                //     'deskripsi_wisata' => 'Belum Ada Deskripsi, Maaf :(',
                //     'harga_tiket' => $request['harga_tiket'][$item],
                //     ''
                // );
                // Kategori::create($data);
                $wisata = new Wisata();
                $wisata->nama_wisata = $request['nama_wisata'][$item];
                $slug = Str::slug($request['nama_wisata'][$item]);
                $wisata->slug = $slug;
                $wisata->id_kategori = $request['id_kategori'][$item];
                $wisata->lokasi = $request['lokasi'][$item];
                $wisata->deskripsi_wisata = "Belum Ada Deskripsi, Maaf :( ";
                $wisata->harga_tiket = "Belum Ditentukan";
                if ($request->hasFile('cover')) {
                    $image = $request['cover'][$item];
                    $name = rand(1000, 9999) . $image->getClientOriginalName();
                    $image->move('images/cover/', $name);
                    $wisata->cover = $name;
                }
                $wisata->status = "Normal";
                $wisata->embed_map = $request['embed_map'][$item];
                $wisata->save();
            }
        }
        // Session::flash("flash_notification", [
        //     "level" => "success",
        //     "message" => "Berhasil Menyimpan Wisata Baru",
        // ]);
        Alert::success('Mantap', 'Berhasil Menyimpan' . $wisata->nama_wisata)->autoclose(3000);
        return redirect()->route('wisata.index');
    }

    public function deskripsi(Wisata $wisata)
    {
        $wisata = Wisata::find($wisata->id);
        return view('admin.wisata.deskripsi', compact('wisata'));
    }

    public function simpandeskripsi(Request $request, Wisata $wisata)
    {
        $message = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
            'min' => ':attribute harus diisi minimal :min karakter ya ngab!!!',
        ];

        $rules = [
            'deskripsi_wisata' => 'required|min:200',
        ];

        // $request->validate([
        //     'deskripsi_wisata' => 'required|min:100',
        // ], $messages);

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $wisata = Wisata::findOrFail($wisata->id);
        $wisata->deskripsi_wisata = $request->deskripsi_wisata;
        $wisata->save();
        Alert::success('Mantap', 'Berhasil Menyimpan' . $wisata->nama_wisata)->autoclose(3000);

        // Session::flash("flash_notification", [
        //     "level" => "success",
        //     "message" => "Berhasil Menyimpan Deskripsi Wisata $wisata->nama_wisata",
        // ]);
        return redirect()->route('wisata.index');
    }

    public function harga(Wisata $wisata)
    {
        $wisata = Wisata::find($wisata->id);
        return view('admin.wisata.harga', compact('wisata'));
    }

    public function simpanharga(Request $request, Wisata $wisata)
    {
        $message = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
            'min' => ':attribute harus diisi minimal :min karakter ya ngab!!!',
        ];

        $rules = [
            'harga_tiket' => 'required|min:50',
        ];

        // $request->validate([
        //     'harga_tiket' => 'required|min:50',
        // ], $messages);

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $wisata = Wisata::findOrFail($wisata->id);
        $wisata->harga_tiket = $request->harga_tiket;
        $wisata->save();
        // Session::flash("flash_notification", [
        //     "level" => "success",
        //     "message" => "Berhasil Menyimpan Harga Tiket $wisata->nama_wisata",
        // ]);
        Alert::success('Mantap', 'Berhasil Menyimpan' . $wisata->nama_wisata)->autoclose(3000);
        return redirect()->route('wisata.index');
    }

    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        $status = json_decode($wisata->status);
        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        return view('admin.wisata.edit', compact('wisata', 'kategori', 'status'));
    }

    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
            'deskripsi_wisata.min' => ':attribute minimal :min karakter ya ngab!!',
            'harga_tiket.min' => ':attribute minimal :min karakter ya ngab!!',
            'embed_map.min' => ':attribute minimal :min karakter ya ngab!!',
        ];

        $rules = [
            'nama_wisata' => 'required',
            'id_kategori' => 'required',
            'lokasi' => 'required',
            'deskripsi_wisata' => 'required|min:200',
            'harga_tiket' => 'required|min:50',
            'embed_map' => 'required|min:20',
        ];

        // $request->validate([
        //     'nama_wisata' => 'required',
        //     'id_kategori' => 'required',
        //     'lokasi' => 'required',
        //     'deskripsi_wisata' => 'required|min:100',
        //     'harga_tiket' => 'required|min:50',
        // ], $messages);

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $wisata = Wisata::findOrFail($id);
        $wisata->nama_wisata = $request->nama_wisata;
        $slug = Str::slug($wisata->nama_wisata);
        $wisata->slug = $slug;
        $wisata->id_kategori = $request->id_kategori;
        $wisata->lokasi = $request->lokasi;
        $wisata->deskripsi_wisata = $request->deskripsi_wisata;
        $wisata->harga_tiket = $request->harga_tiket;
        // upload cover
        if ($request->hasFile('cover')) {
            $wisata->deleteCover();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/cover/', $name);
            $wisata->cover = $name;
        }
        $wisata->embed_map = $request->embed_map;
        if ($request->status == "") {
            $wisata->status = "Normal";
        } else {
            $wisata->status = $request->status;
        }
        $wisata->save();
        // Session::flash("flash_notification", [
        //     "level" => "success",
        //     "message" => "Berhasil Menyimpan $wisata->nama_wisata",
        // ]);
        Alert::success('Mantap', 'Berhasil Menyimpan Data Wisata')->autoclose(3000);
        return redirect()->route('wisata.index');
    }

    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        if (!Wisata::destroy($id)) {return redirect()->back();} else {
            $wisata->deleteCover();
            // Session::flash("flash_notification", [
            //     "level" => "success",
            //     "message" => "Berhasil Menghapus ",
            // ]);
            Alert::success('Mantap', 'Data Berhasil dihapus')->autoclose(3000);
            return redirect()->route('wisata.index');
        }
    }
}
