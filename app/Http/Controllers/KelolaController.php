<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use OCILob;

class KelolaController extends Controller
{
    public function kelolauser()
   {
        $dtuser = User::all();
       return view('kelolauser',compact('dtuser'));
   }
   
   public function createuser()
   {    
        $role = Role::get();
       return view('createuser',compact('role'));
   }

   public function store(Request $request)
   
   {    
        User::create([
            'role_id'=>$request->role_id,
            'name' => $request->nama,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            

        ]);
        return redirect('kelolauser')->with('success', 'Data Berhasil Disimpan!');
   }

   public function edituser($id)
   {
    $userr = User::findorfail($id);
    $role = Role::get();
    return view('edituser', compact('role','userr'));
   }

   public function update(Request $request, $id)
   {
    $userr = User::FindorFail($id);
    $userr->update($request->except(['password']));
    if($request->password){
        $userr->password = Hash::make($request->password); 
    }
    $userr->save();
    
    return redirect('kelolauser')->with('success', 'Data Berhasil Diupdate!');
   }

   public function delete($id)
   {
    $userr = User::FindorFail($id);
    $userr->delete();
    return back()->with('info', 'Data Berhasil Dihapus');
}
   }

