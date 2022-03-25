<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class JurusanController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Jurusan::all();
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

        return view('admin.jurusan.index');
    }

    public function store(Request $request)
    {
        $data = new Jurusan();
        $data->title = $request->title;
        $data->slug = Str::slug($data->title, '-');
        $data->description = $request->title;
        $data->save();
    }

    public function edit($id)
    {
        $data = Jurusan::findOrFail($id);

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = Jurusan::findOrFail($id);
        $data->title = $request->title_updt;
        $data->slug = Str::slug($data->title, '-');
        $data->description = $request->title_updt;
        $data->save();
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
    }
}
