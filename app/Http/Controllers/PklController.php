<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pkl; // mengarah ke model pkl

class PklController extends Controller
{
	public function index()
	{
		$siswa = Pkl::get();
		return response()->json($siswa, 200);
	}

	public function store(Request $request)
	{
		$pkl = new Pkl();
		$pkl->siswa_id = $request->siswa_id;
		$pkl->guru_id = $request->guru_id;
		$pkl->industri_id = $request->industri_id;
		$pkl->mulai = $request->mulai;
		$pkl->selesai = $request->selesai;
		$pkl->save();
		return response()->json($pkl, 200);
	}

	public function update(Request $request, string $id)
	{
		$pkl = Pkl::find($id);
		$pkl->siswa_id = $request->siswa_id;
		$pkl->guru_id = $request->guru_id;
		$pkl->industri_id = $request->industri_id;
		$pkl->mulai = $request->mulai;
		$pkl->selesai = $request->selesai;
		$pkl->save();
		return response()->json($pkl, 200);
	}

	public function destroy(string $id)
	{
		Pkl::destroy($id);
		return response()->json(["message"=>"Deleted"], 200);
	}

    public function show(string $id)
    {
        $pkl = Pkl::find($id);
        if (!$pkl) {
            return response()->json(["message" => 'Data pkl tidak ditemukan'], 404);
        }
        return response()->json($pkl, 200);
    }
}