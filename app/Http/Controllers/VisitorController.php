<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function tes() {
        $pengunjung = Visitor::all();
        return view('coba.index', compact('pengunjung'));
    }
}
