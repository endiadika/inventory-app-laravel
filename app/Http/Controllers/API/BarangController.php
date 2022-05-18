<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Helpers\ApiFormatter;
use Exception;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // abort_if(Gate::denies('barang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = Barang::all();

      
        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
        
        
    }

    public function create()
    {
        // abort_if(Gate::denies('barang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        
       
    }

    public function store(Request $request)
    {
        // Barang::create($request->validated());
        
        try {
            $request->validate([
                'name' => 'required',
                'kategori' => 'required',
                'harga' => 'required',
                'stock' => 'required',
            ]);

            $barang = Barang::create([
                'name' => $request->name,
                'kategori' => $request->kategori,
                'harga' => $request->harga,
                'stock' => $request->stock
            ]);

            $data = Barang::where('id', '=', $barang->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
       
        
    }

    public function show($id)
    {
        $data = Barang::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

        try {

            $request->validate([
                'name' => 'required',
                'kategori' => 'required',
                'harga' => 'required',
                'stock' => 'required',
            ]);


            $barang = Barang::findOrFail($id);

            $barang->update([
                'name' => $request->name,
                'kategori' => $request->kategori,
                'harga' => $request->harga,
                'stock' => $request->stock
            ]);

            $data = Barang::where('id', '=', $barang->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function destroy($id)
    {
        try {
            $barang = Barang::findOrFail($id);

            $data = $barang->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Destory data');
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
