<?php

namespace App\Http\Controllers;

use App\Models\Industri;
use Illuminate\Http\Request;

class IndustriController extends Controller
{
    public function index()
    {
        $industris = Industri::all();
        return view('industris.index', compact('industris'));
    }

    public function create()
    {
        return view('industris.create');
    }

    public function store(Request $request)
    {
        Industri::create($request->all());
        return redirect()->route('industris.index')->with('success', 'Data industri berhasil ditambahkan.');
    }

    public function edit(Industri $industri)
    {
        return view('industris.edit', compact('industri'));
    }

    public function update(Request $request, Industri $industri)
    {
        $industri->update($request->all());
        return redirect()->route('industris.index')->with('success', 'Data industri berhasil diperbarui.');
    }

    public function destroy(Industri $industri)
    {
        $industri->delete();
        return redirect()->route('industris.index')->with('success', 'Data industri berhasil dihapus.');
    }
}
