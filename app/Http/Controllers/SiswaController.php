<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa; // mengarah ke model siswa

class SiswaController extends Controller
{
	public function index()
	{
		$siswa = Siswa::get();
		return response()->json($siswa, 200);
	}

	public function store(Request $request)
	{
		$siswa = new Siswa();
		$siswa->nama = $request->nama;
		$siswa->nis = $request->nip;
		$siswa->gender = $request->gender;
		$siswa->alamat = $request->alamat;
		$siswa->kontak = $request->kontak;
		$siswa->email = $request->email;
		$siswa->status_pkl = $request->status_pkl;
		$siswa->foto = $request->foto;
		$siswa->save();
		return response()->json($siswa, 200);
	}

	public function update(Request $request, string $id)
	{
		$siswa = Siswa::find($id);
		$siswa->nama = $request->nama;
		$siswa->nis = $request->nip;
		$siswa->gender = $request->gender;
		$siswa->alamat = $request->alamat;
		$siswa->kontak = $request->kontak;
		$siswa->email = $request->email;
		$siswa->status_pkl = $request->status_pkl;
		$siswa->foto = $request->foto;
		$siswa->save();
		return response()->json($siswa, 200);
	}

	public function destroy(string $id)
	{
		Siswa::destroy($id);
		return response()->json(["message"=>"Deleted"], 200);
	}

    public function show(string $id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json(["message" => 'Data siswa tidak ditemukan'], 404);
        }
        return response()->json($siswa, 200);
    }
}