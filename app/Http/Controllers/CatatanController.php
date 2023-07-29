<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatatanController extends Controller
{
    public function storecatatan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'catatan' => 'required'
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Catatan::create([
            'user_id' => auth()->user()->id,
            'pengajuan_bansos_id' => $request->pengajuan_bansos_id,
            'catatan' => $request->catatan,
        ]);

        toastr()->success('Catatan berhasil ditambahkan.', 'Sukses');
        return redirect()->back();
    }
}
