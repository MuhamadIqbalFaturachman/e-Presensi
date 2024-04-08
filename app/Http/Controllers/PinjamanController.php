<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Pinjaman;

class PinjamanController extends Controller
{
    public function index()
    {
        $pinjaman = Pinjaman::all();
        return view('pinjaman.pinjaman', compact('pinjaman'));
    }

    public function create()
    {
        return view('pinjaman.create');
    }

    public function store(Request $request)
    {
        $id_pinjaman = $request->input('id_pinjaman');
        $nama_peminjam = $request->input('nama_peminjam');
        $jumlah_pinjaman = $request->input('jumlah_pinjaman');
        $metode = $request->input('metode');
        $angsuran = $request->input('angsuran');
        $tanggal_pinjaman = $request->input('tanggal_pinjaman');
        $waktu_pinjaman = $request->input('waktu_pinjaman');

        $data = [
            'id_pinjaman' => $id_pinjaman, 
            'nama_peminjam' => $nama_peminjam, 
            'jumlah_pinjaman' => $jumlah_pinjaman, 
            'metode' => $metode, 
            'angsuran' => $angsuran, 
            'tanggal_pinjaman' => $tanggal_pinjaman, 
            'waktu_pinjaman' => $waktu_pinjaman 
        ];

        $simpan = DB::table('pinjams')->insert($data);

        if ($simpan) {
            return redirect('/pinjaman/pinjaman')->with(['success' => 'Data berhasil disimpan']);
        }else {
            return redirect('/pinjaman/create')->with(['error' => 'Data gagal disimpan']);
        }
    }

    public function edit($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        return view('pinjaman.edit', compact('pinjaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pinjaman' => 'required',
            'nama_peminjam' => 'required',
            'jumlah_pinjaman' => 'required',
            'metode' => 'required',
            'angsuran' => 'required',
            'tanggal_pinjaman' => 'required',
            'waktu_pinjaman' => 'required',
        ]);
    
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->update([
            'id_pinjaman' => $request->id_pinjaman,
            'nama_peminjam' => $request->nama_peminjam,
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'metode' => $request->metode,
            'angsuran' => $request->angsuran,
            'tanggal_pinjaman' => $request->tanggal_pinjaman,
            'waktu_pinjaman' => $request->waktu_pinjaman,
        ]);
    
        return redirect()->route('pinjaman.pinjaman')->with('success', 'Pinjaman updated successfully!');
    }

    public function destroy($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);

        $pinjaman->delete();

        return redirect()->route('pinjaman.pinjaman')->with('success', 'Pinjaman berhasil dihapus.');
    }
}