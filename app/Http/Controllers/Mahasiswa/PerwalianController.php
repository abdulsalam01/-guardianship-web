<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\User;
use App\Models\Role;
use App\Models\Perwalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PerwalianController extends Controller
{
    //
    public function index()
	{
        $jurusan = Jurusan::all();
        $data = User::with(['teacher', 'major'])->where('id', Auth::id())->first();
        $dosen = User::where('roles', 'teacher')->get();

		return view('mahasiswa.perwalian' , compact('jurusan', 'dosen', 'data'));
	}

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Perwalian::with(['users' => function($query) {
                return $query->with(['teacher', 'major'])->where('id', Auth::id());
            }]);
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->rawColumns([])
                ->make(true);
        }

        $jurusan = Jurusan::all();
        $dosen = User::where('roles', Role::$TEACHER)->get();
        $mahasiswa = User::where('roles', Role::$STUDENT)->get();

        return view('mahasiswa.list', compact('jurusan', 'dosen', 'mahasiswa'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {   
        Perwalian::create($request->all());
    }

    public function show($id)
    {
        
    }

    public function edit(Perwalian $perwalian)
    {
        return response()->json($perwalian);
    }

    public function update(Request $request, Perwalian $perwalian)
    {
        $perwalian->update($request->all());
    }

    public function destroy(Perwalian $perwalian)
    {
        $perwalian->delete();
    }      
}
