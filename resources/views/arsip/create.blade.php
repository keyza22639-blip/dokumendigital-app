@extends('layouts.app')

@section('title', 'Unggah Arsip Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-arsip p-4">
            <h2 class="card-title text-center mb-4 fw-bold text-secondary">
                <i class="fas fa-cloud-upload-alt me-2 text-primary-aesthetic"></i> Unggah Dokumen Baru
            </h2>
            <p class="text-center text-muted mb-4">
                Sistem E-Arsip membantu mengorganisir dokumen internal, surat, kontrak, atau arsip liputan/foto[cite: 1, 2, 3].
            </p>

            <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="file_arsip" class="form-label fw-bold">Pilih File Arsip (Foto/Dokumen)</label>
                    <input class="form-control" type="file" id="file_arsip" name="file_arsip" required>
                    <div class="form-text">Mendukung format gambar (JPEG/PNG), PDF, atau dokumen lainnya.</div> [cite: 3]
                    @error('file_arsip')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jenis_arsip" class="form-label fw-bold">Jenis Arsip</label>
                    <select class="form-select" id="jenis_arsip" name="jenis_arsip" required>
                        <option value="">Pilih Jenis Arsip...</option>
                        <option value="Foto Liputan">Foto Liputan (dengan Metadata)</option> [cite: 2]
                        <option value="Surat Kontrak">Surat, Kontrak, atau Dokumen Penting</option> [cite: 3]
                        <option value="Verifikasi Data">Verifikasi Data (Karyawan/Narasumber)</option> [cite: 4]
                        <option value="Dokumen Internal">Dokumen Internal Lainnya</option>
                    </select>
                </div>

                <hr class="my-4">
                <h5 class="fw-bold text-muted mb-3"><i class="fas fa-tags me-1"></i> Metadata Tambahan</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="metadata_tanggal" class="form-label">Tanggal Dokumen/Liputan</label>
                        <input type="date" class="form-control" id="metadata_tanggal" name="metadata_tanggal"> [cite: 2]
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="metadata_fotografer" class="form-label">Fotografer / Pengunggah</label>
                        <input type="text" class="form-control" id="metadata_fotografer" name="metadata_fotografer" placeholder="Nama Fotografer/Pembuat"> [cite: 2]
                    </div>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Tuliskan deskripsi atau konteks file..."></textarea> [cite: 2]
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary-aesthetic btn-lg">
                        <i class="fas fa-save me-2"></i> Simpan Arsip Digital
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection