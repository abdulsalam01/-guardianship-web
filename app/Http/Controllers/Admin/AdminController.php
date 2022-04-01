<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Perwalian;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $mahasiswa = User::where('roles', 'student')->count();
        $dosen = User::where('roles', 'teacher')->count();
        $jurusan = Jurusan::count();
        $perwalian = Perwalian::count();

    	return view('admin.index', compact('mahasiswa', 'dosen', 'jurusan', 'perwalian'));
    }
}
