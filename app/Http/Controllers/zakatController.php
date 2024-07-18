<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zakat;
use Yajra\DataTables\Facades\DataTables;

class ZakatController extends Controller
{
    public function index()
    {
        $data = zakat::latest()->get();
        return DataTables::of($data)
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required|date',
            'berat' => 'required|',
            'asal' => 'required',
        ]);

        Zakat::create($request->all());

        return response()->json(['success' => 'Data berhasil disimpan.']);
    }

    public function edit($id)
    {
        $zakat = Zakat::findOrFail($id);
        return response()->json($zakat);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required|date',
            'berat' => 'required|',
            'asal' => 'required',
        ]);

        $zakat = Zakat::findOrFail($id);
        $zakat->update($request->all());

        return response()->json(['success' => 'Data berhasil diupdate.']);
    }
    public function destroy($id)
    {
        $zakat = Zakat::findOrFail($id);
        $zakat->delete();

        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
