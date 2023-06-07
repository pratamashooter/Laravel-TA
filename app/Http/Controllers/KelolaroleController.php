<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class KelolaroleController extends Controller
{
    public function kelolarole()
    {
        $dtRole = Role::all();
        return view('kelolarole',compact('dtRole'));
    }

    public function createrole()
    {
        return view('createrole');
    }

    public function storerole(Request $request)
    {
        Role::create([
          'nama_role'=> $request->nama_role,
        ]);
        return redirect('kelolarole')->with('success', 'Data Berhasil Disimpan!');
    }

    public function editrole($id)
    {
        $rolee = Role::findorfail($id);
        return view('editrole', compact('rolee'));

    }

    public function updaterole(Request $request, $id)
   {
         $rolee = Role::findorfail($id);
         $rolee->update($request->all());
         return redirect('kelolarole')->with('success', 'Data Berhasil Diupdate!');
   }

   public function deleterole($id)
   {
    $rolee = Role::FindorFail($id);
    $rolee->delete();
    return back()->with('info', 'Data Berhasil Dihapus');
}
}