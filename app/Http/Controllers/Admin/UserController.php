<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DataTables;
use Hash;

use App\Models\User;
use App\Models\Role;
use App\Models\Jurusan;


class UserController extends Controller
{

    public function index(Request $request)
    {
        $jurusan = Jurusan::all();
        $teacher = User::select('*')->where('roles', Role::$TEACHER)->get();

        if ($request->ajax()) {
            $data = User::with(['teacher', 'major'])
                ->where('roles', Role::$STUDENT)
                ->orderBy('created_at','DESC')->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<div class="row"><a href="javascript:void(0)" id="'.$row->id.'" class="btn btn-primary btn-sm ml-2 btn-edit">Edit</a>';
                           $btn .= '<a href="javascript:void(0)" id="'.$row->id.'" class="btn btn-danger btn-sm ml-2 btn-delete">Delete</a></div>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('admin.user.index')->with(['jurusan' => $jurusan, 'teacher' => $teacher]);
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

    public function edit(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
