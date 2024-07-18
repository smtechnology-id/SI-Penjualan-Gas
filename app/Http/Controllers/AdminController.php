<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Konsumen;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('admin.dashboard', compact('barang'));
    }
    public function tentang()
    {
        return view('admin.tentang');
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



    // Method untuk menampilkan form tambah konsumen
    public function showAddKonsumenForm()
    {
        return view('admin.addKonsumen');
    }

    // Method untuk menyimpan data konsumen
    public function storeKonsumen(Request $request)
    {
        $request->validate([
            'kode_konsumen' => 'required|string|max:255',
            'nama_konsumen' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:15',
            'ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'kartu_kendali' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $konsumen = new Konsumen();
        $konsumen->kode_konsumen = $request->kode_konsumen;
        $konsumen->nama_konsumen = $request->nama_konsumen;
        $konsumen->alamat = $request->alamat;
        $konsumen->status = 'active';
        $konsumen->no_telp = $request->no_telp;

        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('public/ktp');
            $konsumen->ktp = str_replace('public/', 'storage/', $ktpPath);
        }

        if ($request->hasFile('kk')) {
            $kkPath = $request->file('kk')->store('public/kk');
            $konsumen->kk = str_replace('public/', 'storage/', $kkPath);
        }

        if ($request->hasFile('kartu_kendali')) {
            $kartuKendaliPath = $request->file('kartu_kendali')->store('public/kartu_kendali');
            $konsumen->kartu_kendali = str_replace('public/', 'storage/', $kartuKendaliPath);
        }

        $konsumen->save();

        return redirect()->route('admin.dataKonsumen')->with('success', 'Konsumen berhasil ditambahkan');
    }


    // Konsumen
    public function editKonsumen($id)
    {
        $konsumen = Konsumen::where('id', $id)->first();
        return view('admin.updateKonsumen', compact('konsumen'));
    }
    public function updateKonsumen(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_konsumen' => 'required|string|max:255',
            'nama_konsumen' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:15',
            'ktp' => 'nullable|file|mimes:jpg,png,jpeg,pdf',
            'kk' => 'nullable|file|mimes:jpg,png,jpeg,pdf',
            'kartu_kendali' => 'nullable|file|mimes:jpg,png,jpeg,pdf',
        ]);

        // Temukan konsumen berdasarkan ID
        $konsumen = Konsumen::find($request->id);

        // Update data konsumen
        $konsumen->kode_konsumen = $request->kode_konsumen;
        $konsumen->nama_konsumen = $request->nama_konsumen;
        $konsumen->alamat = $request->alamat;
        $konsumen->no_telp = $request->no_telp;

        // Update file KTP jika ada
        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('public/ktp');
            $konsumen->ktp = str_replace('public/', 'storage/', $ktpPath);
        }

        // Update file KK jika ada
        if ($request->hasFile('kk')) {
            $kkPath = $request->file('kk')->store('public/kk');
            $konsumen->kk = str_replace('public/', 'storage/', $kkPath);
        }

        // Update file Kartu Kendali jika ada
        if ($request->hasFile('kartu_kendali')) {
            $kartuKendaliPath = $request->file('kartu_kendali')->store('public/kartu_kendali');
            $konsumen->kartu_kendali = str_replace('public/', 'storage/', $kartuKendaliPath);
        }

        // Simpan perubahan
        $konsumen->save();

        // Redirect ke halaman data konsumen dengan pesan sukses
        return redirect()->route('admin.dataKonsumen')->with('success', 'Data konsumen berhasil diupdate.');
    }
    public function deleteKonsumen($id)
    {
        $konsumen = Konsumen::find($id);
        if ($konsumen) {
            $konsumen->delete();
            return redirect()->route('admin.dataKonsumen')->with('success', 'Konsumen berhasil dihapus');
        } else {
            return redirect()->route('admin.dataKonsumen')->with('error', 'Konsumen tidak ditemukan');
        }
    }

    // Penjualan
    public function dataPenjualan()
    {
        $penjualans = Penjualan::all();
        return view('admin.dataPenjualan', compact('penjualans'));
    }

    public function addPenjualan() {
        $barangs = Barang::all();
        $konsumens = Konsumen::all();
        return view('admin.addPenjualan', compact('barangs', 'konsumens'));
    }

    public function addPenjualanPost(Request $request)
    {
        $request->validate([
            'kode_penjualan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'konsumen_id' => 'required|integer',
            'barang_id' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
            'status' => 'required|string',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        // Cek apakah stok barang cukup
        if ($barang->stok_barang < $request->jumlah) {
            return redirect()->route('admin.dataPenjualan')->with('error', 'Stok barang tidak cukup.');
        }

        $total_harga = $barang->harga_jual * $request->jumlah;

        Penjualan::create([
            'kode_penjualan' => $request->kode_penjualan,
            'tanggal' => $request->tanggal,
            'konsumen_id' => $request->konsumen_id,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'total' => $total_harga,
            'status' => $request->status,

        ]);

        // Update stok barang
        $barang->stok_barang -= $request->jumlah;
        $barang->save();

        return redirect()->route('admin.dataPenjualan')->with('success', 'Penjualan berhasil ditambahkan dan stok barang diperbarui.');
    }

    public function updatePenjualan($id)
    {
        $konsumens = Konsumen::all();
        $barangs = Barang::all();
        $penjualan = Penjualan::where('id', $id)->first();
        return view('admin.updatePenjualan', compact('penjualan', 'konsumens', 'barangs'));
    }

    public function updatePenjualanPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_penjualan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'konsumen_id' => 'required|integer|exists:konsumen,id',
            'barang_id' => 'required|integer|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Temukan penjualan berdasarkan ID
        $penjualan = Penjualan::findOrFail($request->id);

        // Update data penjualan
        $penjualan->kode_penjualan = $request->kode_penjualan;
        $penjualan->tanggal = $request->tanggal;
        $penjualan->konsumen_id = $request->konsumen_id;
        $penjualan->barang_id = $request->barang_id;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.dataPenjualan')->with('success', 'Data penjualan berhasil diupdate.');
    }

    public function deletePenjualan($id)
    {
        $penjualan = Penjualan::find($id);

        if ($penjualan) {
            $penjualan->delete();
            return redirect()->route('admin.dataPenjualan')->with('success', 'Data penjualan berhasil dihapus.');
        } else {
            return redirect()->route('admin.dataPenjualan')->with('error', 'Data penjualan tidak ditemukan.');
        }
    }


    // Pembelian
    public function dataPembelian()
    {
        $pembelians = Pembelian::all(); 
        return view('admin.dataPembelian', compact('pembelians'));
    }
    public function addPembelian() {
        $barangs = Barang::all();
        return view('admin.addPembelian', compact('barangs'));
    }

    public function addPembelianPost(Request $request)
    {
        $request->validate([
            'kode_pembelian' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'barang_id' => 'required|integer|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $pembelian = new Pembelian();
        $pembelian->kode_pembelian = $request->kode_pembelian;
        $pembelian->tanggal = $request->tanggal;
        $pembelian->barang_id = $request->barang_id;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->save();

        // Update stok barang
        $barang = Barang::find($request->barang_id);
        $barang->stok_barang += $request->jumlah;
        $barang->save();

        return redirect()->route('admin.dataPembelian')->with('success', 'Pembelian berhasil ditambahkan dan stok barang diperbarui');
    }
    public function updatePembelian($id) {
        $barangs = Barang::all();
        $pembelian = Pembelian::where('id', $id)->first();
        return view('admin.updatePembelian', compact('barangs', 'pembelian'));
    }

    public function updatePembelianPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_pembelian' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'barang_id' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Temukan pembelian berdasarkan ID
        $pembelian = Pembelian::find($request->id);

        // Update data pembelian
        $pembelian->kode_pembelian = $request->kode_pembelian;
        $pembelian->tanggal = $request->tanggal;
        $pembelian->barang_id = $request->barang_id;
        $pembelian->jumlah = $request->jumlah;

        // Simpan perubahan
        $pembelian->save();

        // Redirect ke halaman data pembelian dengan pesan sukses
        return redirect()->route('admin.dataPembelian')->with('success', 'Data pembelian berhasil diupdate.');
    }

    public function deletePembelian($id)
    {
        $pembelian = Pembelian::find($id);
        if ($pembelian) {
            $pembelian->delete();
            return redirect()->route('admin.dataPembelian')->with('success', 'Data pembelian berhasil dihapus.');
        } else {
            return redirect()->route('admin.dataPembelian')->with('error', 'Data pembelian tidak ditemukan.');
        }
    }

    public function dataAdmin()
    {
        $users = User::where('role', 'admin')->get();
        return view('admin.dataAdmin', compact('users'));
    }

    public function addAdmin()
    {
        return view('admin.addUser');
    }

    public function addAdminPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->save();

        return redirect()->route('admin.dataAdmin')->with('success', 'Admin berhasil ditambahkan');
    }
    public function updateAdmin($id) {
        $admin = User::where('id', $id)->first();
        return view('admin.updateUser', compact('admin'));
    }
    
    public function updateAdminPost(Request $request)
    {
        $id = $request->id;
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        
        // Temukan admin berdasarkan ID
        $admin = User::findOrFail($id);

        // Update data admin
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->input('password'));
        }

        // Simpan perubahan
        $admin->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.dataAdmin')->with('success', 'Data admin berhasil diperbarui.');
    }

    public function deleteAdmin($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('admin.dataAdmin')->with('success', 'Admin berhasil dihapus');
        } else {
            return redirect()->route('admin.dataAdmin')->with('error', 'Admin tidak ditemukan');
        }
    }

    public function laporanPenjualan() {
        $penjualans = Penjualan::all();
        $tanggal_sekarang = date('d F Y');
        return view('admin.laporanPenjualan', compact('penjualans', 'tanggal_sekarang'));
    }
    public function laporanKonsumen() {
        $konsumens = Konsumen::all();
        $tanggal_sekarang = date('d F Y');
        return view('admin.laporanKonsumen', compact('konsumens', 'tanggal_sekarang'));
    }
    public function laporanPembelian() {
        $pembelians = Pembelian::all();
        $tanggal_sekarang = date('d F Y');
        return view('admin.laporanPembelian', compact('pembelians', 'tanggal_sekarang'));
    }
}