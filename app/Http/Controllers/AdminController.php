<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function dataBarang()
    {
        $barang = Barang::all();
        return view('admin.dataBarang', compact('barang'));
    }
    public function addBarang()
    {
        return view('admin.addBarang');
    }
    public function addBarangPost(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:255|unique:barang',
            'nama_barang' => 'required|string|max:255',
            'stok_barang' => 'required|integer',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        // Buat barang baru
        Barang::create([
            'kode_barang' => $validated['kode_barang'],
            'nama_barang' => $validated['nama_barang'],
            'stok_barang' => $validated['stok_barang'],
            'harga_beli' => $validated['harga_beli'],
            'harga_jual' => $validated['harga_jual'],
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.dataBarang')->with('success', 'Barang berhasil ditambahkan!');
    }
    public function updateBarang($id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('admin.updatebarang', compact('barang'));
    }

    public function deleteBarang($id)
    {
        $barang = Barang::find($id);
        if ($barang) {
            $barang->delete();
            return redirect()->route('admin.dataBarang')->with('success', 'Barang berhasil dihapus');
        }
        return redirect()->route('admin.dataBarang')->with('error', 'Barang tidak ditemukan');
    }

    public function dataKonsumen()
    {
        $konsumens = Konsumen::all();
        return view('admin.dataKonsumen', compact('konsumens'));
    }

    public function dataPenjualan()
    {
        return view('admin.dataPenjualan');
    }

    public function dataPembelian()
    {
        return view('admin.dataPembelian');
    }

    public function dataAdmin()
    {
        return view('admin.dataAdmin');
    }

    // Method untuk menampilkan form tambah konsumen
    public function showAddKonsumenForm()
    {
        return view('admin.addKonsumen');
    }

    // Method untuk menyimpan data konsumen
    public function storeKonsumen(Request $request)
    {
        // Validasi data
        $request->validate([
            'kode_konsumen' => 'required|string|max:255|unique:konsumen',
            'nama_konsumen' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:15',
            'ktp' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'kartu_kendali' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file KTP dan Kartu Kendali
        $ktpPath = $request->file('ktp')->store('ktp');
        $kartuKendaliPath = $request->file('kartu_kendali')->store('kartu_kendali');

        // Simpan data konsumen
        Konsumen::create([
            'kode_konsumen' => $request->kode_konsumen,
            'nama_konsumen' => $request->nama_konsumen,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'ktp' => $ktpPath,
            'kartu_kendali' => $kartuKendaliPath,
            'status' => 'active',
        ]);

        // Redirect ke halaman data konsumen dengan pesan sukses
        return redirect()->route('admin.dataKonsumen')->with('success', 'Konsumen berhasil ditambahkan.');
    }
}