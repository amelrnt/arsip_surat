<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function showAll()
    {
        $allData = Surat::all();

        return view('home',['surat' => $allData]);
    }

    public function uploadFile(Request $request)
    {
        $this->validate($request,[
            'file' => 'mimes:pdf',
        ]);

        $surat = new Surat;

        $surat->nomor = $request->nomor;
        $surat->judul = $request->judul;
        $surat->kategori = $request->kategori;
        $surat->file = $request->file;

        $surat->save();

        return redirect('home')->with('status', 'Surat Terarsipkan!');
    }

    public function deleteFile($id)
    {
        Surat::destroy($id);

        return redirect('home')->with('status', 'Data terhapus!');
    }

    public function downloadFile($id)
    {
        $selected = Surat::find($id);
        $pdf_file = $selected->file;

    }

    public function showDetail($id)
    {
        $selected = Surat::find($id);

        return view('detail',['surat' => $selected]);
    }
    
}
