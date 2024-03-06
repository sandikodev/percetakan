<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Addons;
use App\Models\JenisBahan;
use App\Models\JenisLaminasi;
use App\Models\Layanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
 
class LayananController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Superadmin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan    = Layanan::all();
        $bahan      = JenisBahan::join('tb_layanan','tb_layanan.id','=','id_layanan')->select('tb_jenis_bahan.*','tb_layanan.nama_service')->get(); 
        $laminasi   = JenisLaminasi::join('tb_layanan','tb_layanan.id','=','id_layanan')->select('tb_jenis_laminasi.*','tb_layanan.nama_service')->get(); 
        $addons     = Addons::all();
        $layanan_select = Layanan::all();
        $layanan_select2 = Layanan::all();


        return view('admin.layanan.index',compact('layanan','layanan_select','layanan_select2','bahan','laminasi','addons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    public function create_bahan()
    {
        $layanan = Layanan::all();
        return view('admin.layanan.bahan_create',compact('layanan'));
    }

    public function create_laminasi()
    {
        $layanan = Layanan::all();
        return view('admin.layanan.laminasi_create',compact('layanan'));
    }

    public function create_addons()
    {
        return view('admin.layanan.addons_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_service'       => 'required',
            'satuan' => 'required',
            'status' => 'required',
        ]);

        Layanan::create([
            'nama_service'       => $request->nama_service,
            'satuan'       => $request->satuan,
            'status'       => $request->status,
            'keterangan'         => $request->keterangan,
        ]);

        notify()->success('Layanan berhasil ditambahkan! ⚡️');
        return redirect()->route('layanan.index');
    }

    public function post_bahan(Request $request)
    {
        $request->validate([
            'id_layanan'        => 'required',
            'nama_bahan'        => 'required',
            'panjang'           => 'required|max:255',
            'harga_cm2'          => 'required|max:255',
            'stok'              => 'required|max:255',
        ]);

        JenisBahan::create([
            'id_layanan'    => $request->id_layanan,
            'nama_bahan'    => $request->nama_bahan,
            'panjang'       => $request->panjang,
            'harga_cm2'      => $request->harga_cm2,
            'stok'          => $request->stok,
            'keterangan'    => $request->keterangan,
        ]);

        notify()->success('Jenis Bahan berhasil ditambahkan! ⚡️');
        return redirect()->route('layanan.index');
    }
    
    public function post_laminasi(Request $request)
    {
        $request->validate([
            'id_layanan'        => 'required',
            'nama_laminasi'        => 'required',
            'harga_cm2'          => 'required|max:255',
            'stok'              => 'required|max:255',
        ]);

        JenisLaminasi::create([
            'id_layanan'        => $request->id_layanan,
            'nama_laminasi'    => $request->nama_laminasi,
            'harga_cm2'      => $request->harga_cm2,
            'stok'          => $request->stok,
            'keterangan'    => $request->keterangan,
        ]);

        notify()->success('Jenis laminasi berhasil ditambahkan! ⚡️');
        return redirect()->route('layanan.index');
    }

    public function post_addons(Request $request)
    {
        $request->validate([
            'nama_addons'        => 'required',
        ]);

        Addons::create([
            'nama_addons'    => $request->nama_addons,
            'keterangan'    => $request->keterangan,
        ]);

        notify()->success('Addons berhasil ditambahkan! ⚡️');
        return redirect()->route('layanan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layanan         = Layanan::findOrFail($id);

        return view('admin.layanan.edit',compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // dd($request);

        $request->validate([
            'nama_service'       => 'required',
            'satuan'             => 'required',
            'status'             => 'required',
        ]);

        $layanan = Layanan::findOrfail($id);

        $layanan->update([
            'nama_service'       => $request->nama_service,
            'satuan'             => $request->satuan,
            'status'             => $request->status,
            'keterangan'         => $request->keterangan,
        ]);

        notify()->success('Data berhasil diubah! ⚡️');
        return redirect()->back();
    }
    

    public function update_bahan(Request $request, string $id): RedirectResponse
    {
//    dd($request);

        $request->validate([
            'id_layanan'        => 'required',
            'nama_bahan'        => 'required',
            'panjang'           => 'required|max:255',
            'harga_cm2'          => 'required|max:255',
            'stok'              => 'required|max:255',
        ]);

        $bahan = JenisBahan::findOrfail($id);

        $bahan->update([
            'id_layanan'    => $request->id_layanan,
            'nama_bahan'    => $request->nama_bahan,
            'panjang'       => $request->panjang,
            'harga_cm2'      => $request->harga_cm2,
            'stok'          => $request->stok,
            'keterangan'    => $request->keterangan,
        ]);

        notify()->success('Data berhasil diubah! ⚡️');
        return redirect()->back();
    }

    public function update_laminasi(Request $request, string $id): RedirectResponse
    {
        // dd($request);

        $request->validate([
            'id_layanan'        => 'required',
            'nama_laminasi'        => 'required',
            'harga_cm2'          => 'required|max:255',
            'stok'              => 'required|max:255',
        ]);

        $laminasi = JenisLaminasi::findOrfail($id);

        $laminasi->update([
            'id_layanan'        =>$request->id_layanan,
            'nama_laminasi'    => $request->nama_laminasi,
            'harga_cm2'      => $request->harga_cm2,
            'stok'          => $request->stok,
            'keterangan'    => $request->keterangan,
        ]);

        notify()->success('Data berhasil diubah! ⚡️');
        return redirect()->back();
    }
    
    public function update_addons(Request $request, string $id): RedirectResponse
    {
        // dd($request);

        $request->validate([
            'nama_addons'        => 'required',
        ]);

        $addons = Addons::findOrfail($id);

        $addons->update([
            'nama_addons'    => $request->nama_addons,
            'keterangan'    => $request->keterangan,
        ]);

        notify()->success('Data berhasil diubah! ⚡️');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layanan = Layanan::findOrfail($id);

    
        $layanan->delete();
        
        notify()->success('Layanan berhasil dihapus! ⚡️');
        return redirect()->route('layanan.index');
    }

    public function destroy_bahan(string $id)
    {
        $bahan = JenisBahan::findOrfail($id);

    
        $bahan->delete();
        
        notify()->success('Jenis Bahan berhasil dihapus! ⚡️');
        return redirect()->route('layanan.index');
    }
    
    public function destroy_laminasi(string $id)
    {
        $laminasi = JenisLaminasi::findOrfail($id);

    
        $laminasi->delete();
        
        notify()->success('Jenis Laminasi berhasil dihapus! ⚡️');
        return redirect()->route('layanan.index');
    }

    public function destroy_addons(string $id)
    {
        $addons = Addons::findOrfail($id);

    
        $addons->delete();
        
        notify()->success('Addons berhasil dihapus! ⚡️');
        return redirect()->route('layanan.index');
    }
}
