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

        if (empty(Catatan::where('user_id', auth()->user()->id)->where('pengajuan_bansos_id', $request->pengajuan_bansos_id)->first())) {
            Catatan::create([
                'user_id' => auth()->user()->id,
                'role' => auth()->user()->role,
                'pengajuan_bansos_id' => $request->pengajuan_bansos_id,
                'catatan' => $request->catatan,
            ]);

            toastr()->success('Catatan berhasil ditambahkan.', 'Sukses');
            return redirect()->back();
        } else {
            toastr()->warning('Catatan dengan pengajuan ini sudah pernah ditambahkan.', 'Peringatan');
            return redirect()->back();
        }
    }
}
