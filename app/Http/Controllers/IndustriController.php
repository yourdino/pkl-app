<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industri; // mengarah ke model industri

class IndustriController extends Controller
{
	public function index()
	{
		$siswa = Industri::get();
		return response()->json($siswa, 200);
	}

	public function store(Request $request)
	{
		$industri = new Industri();
		$industri->nama = $request->nama;
		$industri->bidang_usaha = $request->bidang_usaha;
		$industri->alamat = $request->alamat;
		$industri->kontak = $request->kontak;
		$industri->email = $request->email;
		$industri->save();
		return response()->json($industri, 200);
	}

	public function update(Request $request, string $id)
	{
		$industri = Industri::find($id);
		$industri->nama = $request->nama;
		$industri->bidang_usaha = $request->bidang_usaha;
		$industri->alamat = $request->alamat;
		$industri->kontak = $request->kontak;
		$industri->email = $request->email;
		$industri->save();
		return response()->json($industri, 200);
	}

	public function destroy(string $id)
	{
		Siswa::destroy($id);
		return response()->json(["message"=>"Deleted"], 200);
	}

    public function show(string $id)
    {
        $industri = Industri::find($id);
        if (!$industri) {
            return response()->json(["message" => 'Data industri tidak ditemukan'], 404);
        }
        return response()->json($industri, 200);
    }
}