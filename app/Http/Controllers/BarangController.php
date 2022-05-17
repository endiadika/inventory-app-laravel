<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BarangController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('barang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barang = Barang::all();

        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        // abort_if(Gate::denies('barang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('barang.create');
    }

    public function store(StoreBarangRequest $request)
    {
        // Barang::create($request->validated());

        return redirect()->route('barang.index');
    }

    public function show(Barang $barang)
    {
        // abort_if(Gate::denies('barang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        // abort_if(Gate::denies('barang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('barang.edit', compact('barang'));
    }

    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $barang->update($request->validated());

        return redirect()->route('barang.index');
    }

    public function destroy(Barang $barang)
    {
        // abort_if(Gate::denies('barang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barang->delete();

        return redirect()->route('barang.index');
    }
}
