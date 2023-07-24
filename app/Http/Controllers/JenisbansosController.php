<?php

namespace App\Http\Controllers;

use App\Models\Jenisbansos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisbansosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jenisbansos::all();

        return view('jenis_bansos.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_bansos' => 'required|max:30',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $create = Jenisbansos::create($request->all());

        toastr()->success('Data jenis bansos berhasil ditambahkan.', 'Sukses');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_bansos' => 'required|max:30',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = Jenisbansos::find($request->id);
        $data->update($request->all());

        toastr()->success('Data jenis bansos berhasil diubah.', 'Sukses');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $jenisbansos = Jenisbansos::find($id)->delete();

        toastr()->success('Data jenis bansos berhasil dihapus.', 'Sukses');
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Jenisbansos::find($id);
        return $data;
    }
}
