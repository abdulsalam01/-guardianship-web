<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\TeacherImport;
use Illuminate\Http\Request;

use DataTables;
use Hash;
use Excel;

use App\Models\User;
use App\Models\Role;


class TeacherController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*')->where('roles', Role::$TEACHER)->orderBy('created_at', 'DESC');
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

        return view('admin.teacher.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->request->add(['password' => Hash::make($request->password)]);
        User::create($request->all());
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);

        return response()->json($data);
    }

    // public function edit(User $user)
    // {
    //     return response()->json($user);
    // }

    public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());
    }

    public function destroy($id)
    {
        User::find($id)->delete();
    }

    public function import(Request $request) {
        $data = Excel::import(new TeacherImport, request()->file('file'));
        return redirect('/admin/teacher');
    }    
}
