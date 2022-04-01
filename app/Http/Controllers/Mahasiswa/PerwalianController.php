<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;

class PerwalianController extends Controller
{
    //
    public function index()
	{
        $jurusan = Jurusan::all();
        $dosen = User::where('roles', 'teacher')->get();

		return view('mahasiswa.perwalian' , compact('jurusan', 'dosen'));
	}
}
