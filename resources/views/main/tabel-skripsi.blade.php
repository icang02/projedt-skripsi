@extends('layouts.main')

@section('main-contents')
    {{-- @push('link')
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('main-assets') }}/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('main-assets') }}/dist/css/adminlte.min.css">

    @endpush --}}

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
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
                                <table id="example1" class="table table-bordered table-striped">
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
                                                    <a class="btn btn-primary btn-sm" href="#">
                                                        <i class="fas fa-folder"></i> Lihat Skripsi
                                                    </a>
                                                </td>
                                                <td>{{ $skripsi->mahasiswa->name }}</td>
                                                <td>{{ $skripsi->title }}</td>
                                                <td>{{ $skripsi->dosen1->name }}</td>
                                                <td>{{ $skripsi->dosen2->name }}</td>
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

    {{-- @push('script')
        <!-- jQuery -->
        <script src="{{ asset('main-asset/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('main-asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('main-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('main-asset/dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('main-asset/dist/js/demo.js') }}"></script>
        <!-- Page specific script -->

    @endpush --}}
@endsection
