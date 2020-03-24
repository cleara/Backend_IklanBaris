<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::all();

        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = new Barang();
            $data->title = $request->input('judul');
            $data->deskripsi = $request->input('dekripsi');
            $data->harga = $request->input('harga');
            $data->gambar = $request->input('gambar');
            $data->save();

            return response()->json([
                'status' => '1',
                'message' => 'Tambah data barang berhasil!',
            ]);
        } catch(\Exception $e){
            return response()->json([
                'status' => '0',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Barang::where('id', $id)->get();
        return response($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Barang::where('id', $id)->first();
            $data->judul = $request->input('judul');
            $data->deskripsi = $request->input('dekripsi');
            $data->harga = $request->input('harga');
            $data->gambar = $request->input('gambar');            
            $data->save();

            return response()->json([
                'status' => '1',
                'message' => 'Ubah data barang berhasil!',
            ]);
        } catch(\Exception $e){
            return response()->json([
                'status' => '0',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Barang::where('id', $id)->first();
            $data->delete();

            return response()->json([
                'status' => '1',
                'message' => 'Hapus data barang berhasil!',
            ]);
        } catch(\Exception $e){
            return response()->json([
                'status' => '0',
                'message' => $e->getMessage()
            ]);
        }
    }
}
