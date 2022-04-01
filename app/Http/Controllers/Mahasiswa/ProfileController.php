<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

use Hash;

use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::all();
    	return view('mahasiswa.profile', compact('jurusan'));
    }

    public function update(Request $request, User $user)
    {
    	if ($request->password) {
    		$password = Hash::make($request->password);
    	}else{
    		$password = $request->old_password;
    	}

    	$request->request->add(['password' => $password]);
        $request->request->add(['major_id' => $request->id_jurusan]);
    	$user->update($request->all());
    	return back()->with('success','Updated successfully');
    }
}
