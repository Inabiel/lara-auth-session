<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|min:5',
            'nama'=> 'required|string|min:4',
            'tgl_lahir' => 'required|date',
            'jk' => 'required|boolean',
            'alamat'=>'required|string',
            'email' => 'required|email'
        ]);

        Siswa::create([
            'nim' => $validated['nim'],
            'nama'=> $validated['nama'],
            'tgl_lahir' => $validated['tgl_lahir'],
            'jk' => $validated['jk'],
            'alamat'=>$validated['alamat'],
            'email' => $validated['email']
        ]);
        return redirect('/home');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nama'=> 'string|min:4',
            'tgl_lahir' => 'date',
            'jk' => 'boolean',
            'alamat'=>'string',
            'email' => 'email'
        ]);

        $data = Siswa::where('nim',$request->nim)->first();
        $data->nim = $validated['nim'];
        $data->nama = $validated['nama'];
        $data->tgl_lahir = $validated['tgl_lahir'];
        $data->jk = $validated['jk'];
        $data->alamat = $validated['alamat'];
        $data->email = $validated['email'];
        $data->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::where('id',$id)->delete();
        return redirect()->route('home');
    }
}
