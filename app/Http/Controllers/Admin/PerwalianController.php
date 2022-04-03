<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Perwalian;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PerwalianController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Perwalian::with(['users' => function($query) {
                return $query->with(['teacher', 'major']);
            }]);
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="row"><a href="javascript:void(0)" id="' . $row->id . '" class="btn btn-primary btn-sm ml-2 btn-edit">Edit</a>';
                    $btn .= '<a href="javascript:void(0)" id="' . $row->id . '" class="btn btn-danger btn-sm ml-2 btn-delete">Delete</a></div>';

                    return $btn;
                })
                ->addColumn('approval', function ($row) {
                    $btn = '<div class="row"><a href="javascript:void(0)" id="' . $row->id . '" class="btn btn-success btn-sm ml-2 btn-approve">Approved</a>';
                    $btn .= '<a href="javascript:void(0)" id="' . $row->id . '" class="btn btn-warning btn-sm ml-2 btn-reject">Reject</a></div>';

                    return $btn;
                })                
                ->rawColumns(['action', 'approval'])
                ->make(true);
        }

        $jurusan = Jurusan::all();
        $dosen = User::where('roles', Role::$TEACHER)->get();
        $mahasiswa = User::where('roles', Role::$STUDENT)->get();

        return view('admin.perwalian.index', compact('jurusan', 'dosen', 'mahasiswa'));
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
