<?php

namespace App\Http\Controllers;

use App\Models\Pkl;
use Illuminate\Http\Request;

class PklController extends Controller
{
    public function index()
    {
        $pkls = Pkl::all();
        return view('pkls.index', compact('pkls'));
    }

    public function create()
    {
        return view('pkls.create');
    }

    public function store(Request $request)
    {
        Pkl::create($request->all());
        return redirect()->route('pkls.index')->with('success', 'Data PKL berhasil ditambahkan.');
    }

    public function edit(Pkl $pkl)
    {
        return view('pkls.edit', compact('pkl'));
    }

    public function update(Request $request, Pkl $pkl)
    {
        $pkl->update($request->all());
        return redirect()->route('pkls.index')->with('success', 'Data PKL berhasil diperbarui.');
    }

    public function destroy(Pkl $pkl)
    {
        $pkl->delete();
        return redirect()->route('pkls.index')->with('success', 'Data PKL berhasil dihapus.');
    }
}
