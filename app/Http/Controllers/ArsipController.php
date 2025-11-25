<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storange;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

use App\models\Arsip;

class ArsipController extends Controller
{
    public function index()
    {
        $arsips = Arsip::latest()->paginate(10);
        return view('arsip.index', ['arsips' => $arsips]);
    }

    // Tampilkan form upload
    public function create()
    {
        return view('arsip.create');
    }

    // Proses penyimpanan file dan metadata
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'file_arsip' => 'required|file|max:20480', // Maksimal 20MB
            'jenis_arsip' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'metadata_tanggal' => 'nullable|date',
            'metadata_fotografer' => 'nullable|string',
        ]);

        // 2. Simpan file ke Storage 
        if ($request->hasFile('file_arsip')) {
            $file = $request->file('file_arsip');
            $namaFileAsli = $file->getClientOriginalName();
            $path = $file->store('public/arsip');

            // 3. Simpan metadata ke Database 
            Arsip::create([
                'nama_file' => $namaFileAsli,
                'jenis_arsip' => $request->jenis_arsip,
                'path_file' => $path,
                'metadata_tanggal' => $request->metadata_tanggal,
                'deskripsi' => $request->deskripsi,
                'tipe_mime' => $file->getClientMimeType(),
                'id_user' => auth()->id(),
                'diunggah_oleh' => auth()->user()->name, 
            ]);
        }

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil diunggah!');
    }

    // Download file (memerlukan implementasi otorisasi )
    public function download($id)
    {
        $arsip = Arsip::findOrFail($id);
        // Cek otorisasi di sini sebelum download 

        if (Storage::exists($arsip->path_file)) {
            return Storage::download($arsip->path_file, $arsip->nama_file);
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}