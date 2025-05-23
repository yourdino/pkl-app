<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $siswas = Siswa::all();
        return view('siswas.index', compact('siswas'));
    }
    
    public function create() {
        return view('siswas.create');
    }
    
    public function store(Request $request) {
        Siswa::create($request->all());
        return redirect()->route('siswas.index');
    }
    
    public function edit(Siswa $siswa) {
        return view('siswas.edit', compact('siswa'));
    }
    
    public function update(Request $request, Siswa $siswa) {
        $siswa->update($request->all());
        return redirect()->route('siswas.index');
    }
    
    public function destroy(Siswa $siswa) {
        $siswa->delete();
        return redirect()->route('siswas.index');
    }
}    