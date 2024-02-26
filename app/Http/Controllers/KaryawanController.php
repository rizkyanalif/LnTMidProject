<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Http\Requests\StorekaryawanRequest;
use App\Http\Requests\UpdatekaryawanRequest;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $karyawans = karyawan::all();
        $karyawans = $karyawans->reverse();

        return view('dashboard', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-karyawan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama'=>'required|min:5|max:20',
            'umur'=>'required|min:20|numeric',
            'alamat'=>'required|min:10|max:40',
            'noHp'=>'required|numeric|digits_between:9,12|starts_with:08',
        ]);

        karyawan::create([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'noHp' => $request->noHp,
        ]);

        return redirect('/dashboard')->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function showDetail($id)
    {
        $karyawan = karyawan::findorFail($id);

        return view('detail-karyawan', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $karyawan = karyawan::findorFail($id);

        return view('edit-karyawan', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama'=>'required|min:5|max:20',
            'umur'=>'required|min:20|numeric',
            'alamat'=>'required|min:10|max:40',
            'noHp'=>'required|numeric|digits_between:9,12|starts_with:08',
        ]);

        karyawan::findorFail($id)->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'noHp' => $request->noHp,
        ]);

        return redirect('/dashboard')->with('success', 'Karyawan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        karyawan::destroy($id);
        return redirect('/dashboard')->with('deleted', 'Karyawan berhasil dihapus');
    }
}
