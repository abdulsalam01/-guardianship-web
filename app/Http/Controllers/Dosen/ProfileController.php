<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

use Hash;

use App\Models\User;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $jurusan = Jurusan::all();
    	return view('dosen.profile');
    }

    public function update(Request $request, User $user)
    {
    	if ($request->password) {
    		$password = Hash::make($request->password);
    	}else{
    		$password = $request->old_password;
    	}

    	$request->request->add(['password' => $password]);
    	$user->update($request->all());
    	return back()->with('success','Updated successfully');
    }
}
