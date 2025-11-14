<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request as FacadesRequest;

class KategoriController extends Controller
{
    //
    public function index()
    {
        $kategori = kategori::all();
        return view('kategori', compact('kategori'));

    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin-kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function update(Request $request, String $id)
    {
        $id = Crypt::decrypt($id);
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->back()->with('success', 'Kategori berhasil diupdate!');
    }

     public function delete($id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        Kategori::find($id)->delete();
        return redirect()->back()->with('success','data berhasil dihapus');
    }

}
