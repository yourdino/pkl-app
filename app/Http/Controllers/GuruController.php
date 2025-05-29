<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru; // mengarah ke model guru

class GuruController extends Controller
{
	public function index()
	{
		$guru = Guru::get();
		return response()->json($guru, 200);
	}

	public function store(Request $request)
	{
		$guru = new Guru();
		$guru->nama = $request->nama;
		$guru->nip = $request->nip;
		$guru->gender = $request->gender;
		$guru->alamat = $request->alamat;
		$guru->kontak = $request->kontak;
		$guru->email = $request->email;
		$guru->save();
		return response()->json($guru, 200);
	}

	public function update(Request $request, string $id)
	{
		$guru = Guru::find($id);
		$guru->nama = $request->nama;
		$guru->nip = $request->nip;
		$guru->gender = $request->gender;
		$guru->alamat = $request->alamat;
		$guru->kontak = $request->kontak;
		$guru->email = $request->email;
		$guru->save();
		return response()->json($guru, 200);
	}

	public function destroy(string $id)
	{
		Guru::destroy($id);
		return response()->json(["message"=>"Deleted"], 200);
	}

    public function show(string $id)
    {
        $guru = Guru::find($id);
        if (!$guru) {
            return response()->json(["message" => 'Data guru tidak ditemukan'], 404);
        }
        return response()->json($guru, 200);
    }
}