@extends('layouts.app')

@section('title', 'Daftar Semua Arsip')

@section('content')
<h1 class="mb-4 fw-bold text-secondary">
    <i class="fas fa-folder-open me-2 text-primary-aesthetic"></i> Daftar Arsip Digital
</h1>
<p class="text-muted">Kelola dan telusuri semua arsip dokumen dan foto yang telah tersimpan.</p>

<div class="card card-arsip p-3 mt-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Nama File</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Tanggal (Meta)</th>
                    <th scope="col">Pengunggah</th>
                    <th scope="col">Ukuran</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($arsips as $arsip)
                <tr>
                    <td class="fw-bold">{{ $arsip->nama_file }}</td>
                    <td><span class="badge rounded-pill bg-info text-dark">{{ $arsip->jenis_arsip }}</span></td>
                    <td>{{ $arsip->metadata_tanggal ? \Carbon\Carbon::parse($arsip->metadata_tanggal)->format('d M Y') : '-' }}</td>
                    <td>{{ $arsip->diunggah_oleh }}</td>
                    <td>{{ number_format($arsip->ukuran_file / 1024 / 1024, 2) }} MB</td>
                    <td class="text-center">
                        <a href="{{ route('arsip.download', $arsip->id) }}" class="btn btn-sm btn-outline-primary" title="Unduh File (Memerlukan Otorisasi)"> 
                            <i class="fas fa-download"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Belum ada arsip yang diunggah.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $arsips->links() }}
    </div>
</div>
@endsection