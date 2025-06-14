<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use Illuminate\Support\Facades\Storage;


class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('admin.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('admin.obat.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stok' => 'required|integer|min:0',
        ]);

        $obat = new Obat($validatedData);

        if ($request->hasFile('foto')) {
           $path = $request->file('foto')->store('obat', 'public');
            $obat->foto = $path;
        }

        $obat->save();

        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Display the specified resource.
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('admin.obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $validatedData = $request->validate([
            'nama_obat' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stok' => 'required|integer|min:0',
        ]);

        $obat->fill($validatedData);

      if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($obat->foto && Storage::disk('public')->exists($obat->foto)) {
                Storage::disk('public')->delete($obat->foto);
            }

            $path = $request->file('foto')->store('obat', 'public');
            $obat->foto = $path;
        }

        $obat->save();

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui.');
    }

  public function destroy($id)
{
    $obat = Obat::findOrFail($id);

    // Hapus file dari storage jika ada
    if ($obat->foto && Storage::disk('public')->exists($obat->foto)) {
        Storage::disk('public')->delete($obat->foto);
    }

    $obat->delete();

    return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus.');
}

}
