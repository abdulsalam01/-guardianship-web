<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Perwalian;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PerwalianController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Perwalian::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="row"><a href="javascript:void(0)" id="' . $row->id . '" class="btn btn-primary btn-sm ml-2 btn-edit">Edit</a>';
                    $btn .= '<a href="javascript:void(0)" id="' . $row->id . '" class="btn btn-danger btn-sm ml-2 btn-delete">Delete</a></div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $jurusan = Jurusan::all();
        $dosen = User::where('roles', 'teacher')->get();

        return view('admin.perwalian.index', compact('jurusan', 'dosen'));
    }

}
