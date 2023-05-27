@extends('layouts.main')

@section('main-contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Data Ujian Skripsi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Ujian Skripsi</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Mahasiswa yang Telah Ujian Skripsi</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-sm table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Judul</th>
                                            <th>Pembimbing 1</th>
                                            <th>Pembimbing 2</th>
                                            <th>Progress</th>
                                            <th>Status</th>
                                            <th>Tanggal Ujian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $skripsi)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm badge" href="#">
                                                        <i class="fas fa-folder"></i> Lihat Skripsi
                                                    </a>
                                                </td>
                                                <td>{{ $skripsi->mahasiswa->nama }}</td>
                                                <td>{{ $skripsi->judul }}</td>
                                                <td>{{ $skripsi->pembimbing_1->nama }}</td>
                                                <td>{{ $skripsi->pembimbing_2->nama }}</td>
                                                <td>
                                                    @php
                                                        if (($skripsi->file_skripsi && $skripsi->file_hasil && $skripsi->file_proposal) != null) {
                                                            $progress = '100%';
                                                            $bgProgress = 'success';
                                                        } elseif (($skripsi->file_hasil && $skripsi->file_proposal) != null) {
                                                            $progress = '66.66%';
                                                            $bgProgress = 'primary';
                                                        } elseif ($skripsi->file_proposal != null) {
                                                            $progress = '33.33%';
                                                            $bgProgress = 'danger';
                                                        } else {
                                                            $progress = '0%';
                                                            $bgProgress = 'danger';
                                                        }
                                                    @endphp
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar bg-{{ $bgProgress }}"
                                                            style="width: {{ $progress }}"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge badge-success">{{ $skripsi->status }}</span></td>
                                                <td>{{ $skripsi->tgl_ujian }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9">Belum ada data skripsi.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
