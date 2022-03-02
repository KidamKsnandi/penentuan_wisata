<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Kategori;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::find($id);
        return view('admin.user.profile', compact('user'));

    }

    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('admin.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
            'email' => 'Data harus email!!',
            'unique' => 'User sudah ada!! ganti yang lain ngab!!!',
            'max' => ':attribute minimal :max karakter ya ngab!!',
            'min' => ':attribute minimal :min karakter ya ngab!!',
            'same' => ':attribute tidak sama dengan password confirmation',
        ];

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'role' => 'required',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        // $validated = $request->validate([
        // 'name' => 'required|string|max:255',
        // 'email' => 'required|string|email|max:255|unique:users',
        // 'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        // 'password_confirmation' => 'min:6',
        // 'role' => 'required',
        // ], $messages);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->attachRole($request->role);
        Alert::success('Mantap', 'Berhasil Menyimpan Data Baru')->autoclose(3000);

        // Session::flash("flash_notification", [
        //             "level"=>"success",
        //             "message"=>"Berhasil Menyimpan $user->name"
        //             ]);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if (Auth::user()->id == "1" || $user->id == Auth::user()->id) {
            return view('admin.user.edit', compact('user'));
        } else {
            Alert::warning('Maaf', 'Anda Tidak bisa Merubah apapun di akun orang lain!!')->autoclose(3000);

            // Session::flash("flash_notification", [
            //     "level" => "danger",
            //     "message" => "Anda Tidak bisa Merubah apapun di akun orang lain!!",
            // ]);
            return redirect()->route('user.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
            'email' => 'Data harus email!!',
            'max' => ':attribute minimal :max karakter ya ngab!!',
            'min' => ':attribute minimal :min karakter ya ngab!!',
            'same' => ':attribute tidak sama dengan password confirmation',
        ];

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        // $validated = $request->validate([
        // 'name' => 'required|string|max:255',
        // 'email' => 'required|string|email|max:255',
        // 'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        // 'password_confirmation' => 'min:6',
        // ], $messages);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Alert::success('Mantap', 'Berhasil Mengubah Data')->autoclose(3000);

        // Session::flash("flash_notification", [
        //                 "level"=>"success",
        //                 "message"=>"Berhasil Menyimpan $user->name"
        //                 ]);
        if (Auth::user()->id == "1") {
            return redirect()->route('user.index');
        } else {
            if (Auth::user()->hasRole('admin')) {
                return redirect('admin');
            } else if (Auth::user()->hasRole('author')) {
                return redirect('author');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user = User::findOrFail($id);
        if (Auth::user()->id == "1" || $user->id == Auth::user()->id) {
            $user->delete();
            Alert::success('Mantap', 'Berhasil Menghapus Data')->autoclose(3000);

            // Session::flash("flash_notification", [
            //     "level" => "success",
            //     "message" => "Berhasil Menghapus User $user->name",
            // ]);
            return redirect()->route('user.index');
        } else {
            Alert::warning('Maaf', 'Anda Tidak bisa Merubah apapun di akun orang lain!!')->autoclose(3000);
            // Session::flash("flash_notification", [
            //     "level" => "danger",
            //     "message" => "Anda Tidak bisa Merubah apapun di akun orang lain!!",
            // ]);
            return redirect()->route('user.index');
        }
    }

}
