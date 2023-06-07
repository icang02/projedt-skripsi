@extends('layouts.main')

@section('main-contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Judul</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="card">
                            <div class="card-body">
                                <link rel="stylesheet" href="{{ asset('main-assets/css/timeline.css') }}">
                                @php
                                    $cekFile = App\Models\Skripsi::where('mhs_id', auth()->user()->id)
                                        ->get()
                                        ->first();
                                @endphp

                                <h1 style="margin-bottom: 100px;">TIMELINE PROGRES</h1>
                                <div class="process-wrapper">
                                    <div id="progress-bar-container">
                                        <ul>
                                            <li class="@if (isset($skripsiMhs)) step @endif step01 active">
                                                <div class="step-inner">PROPOSAL</div>
                                            </li>
                                            <li class="@if (isset($skripsiMhs)) step @endif step02">
                                                <div class="step-inner">HASIL</div>
                                            </li>
                                            <li class="@if (isset($skripsiMhs)) step @endif step03">
                                                <div class="step-inner">SKRIPSI</div>
                                            </li>
                                            <li class="@if (isset($skripsiMhs)) step @endif step04">
                                                <div class="step-inner">FINISH</div>
                                            </li>
                                        </ul>

                                        <div id="line">
                                            <div id="line-progress"></div>
                                        </div>
                                    </div>

                                    <div id="progress-content-section">
                                        <div class="section-content discovery active">
                                            <form action="{{ url('upload-file-proposal') }}" enctype="multipart/form-data"
                                                method="post">
                                                {{ csrf_field() }}
                                                <div class="mb-4">
                                                    <h6>Judul Tugas Akhir</h6>
                                                    @if (isset($skripsiMhs))
                                                        <textarea name="judul" cols="90" rows="4" required>{{ $skripsiMhs->judul }}</textarea>
                                                    @else
                                                        <textarea name="judul" cols="90" rows="4" required></textarea>
                                                    @endif

                                                </div>

                                                <h2>
                                                    <label for="upload-file" class="upload-btn">UPLOAD FILE
                                                        PROPOSAL</label>
                                                    <input type="file" id="upload-file" class="upload-input"
                                                        name="file_proposal" required />
                                                </h2>

                                                <div class="select-wrapper">
                                                    <select name="dosen1" id="combo-1" class="select" required>
                                                        <option value="">Dosen Pembimbing 1</option>
                                                        @forelse ($dosen as $item)
                                                            <option @if ($item->id == old('dosen1', isset($skripsiMhs) ? $skripsiMhs->pembimbing1_id : null)) selected @endif
                                                                value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @empty
                                                            <option value="">Belum ada data dosen</option>
                                                        @endforelse
                                                    </select>
                                                    <span class="select-icon">
                                                        <i class="fa fa-chevron-down"></i>
                                                    </span>
                                                </div>
                                                <div class="select-wrapper">
                                                    <select name="dosen2" id="combo-2" class="select" required>
                                                        <option value="">Dosen Pembimbing 2</option>
                                                        @forelse ($dosen as $item)
                                                            <option @if ($item->id == old('dosenw', isset($skripsiMhs) ? $skripsiMhs->pembimbing2_id : null)) selected @endif
                                                                value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @empty
                                                            <option value="">Belum ada data dosen</option>
                                                        @endforelse
                                                    </select>
                                                    <span class="select-icon">
                                                        <i class="fa fa-chevron-down"></i>
                                                    </span>
                                                </div>
                                                <div>
                                                    <button class="upload-btn mt-3">SIMPAN</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="section-content strategy">
                                            <form action="{{ url('upload-file-hasil') }}" method="post"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="mb-4">
                                                    <h6>Judul Tugas Akhir</h6>
                                                    @if (isset($skripsiMhs))
                                                        <textarea cols="90" rows="4" readonly>{{ $skripsiMhs->judul }}</textarea>
                                                    @else
                                                        <textarea cols="90" rows="4" readonly></textarea>
                                                    @endif
                                                </div>
                                                <h2>
                                                    <label for="file_hasil" class="upload-btn">Upload File
                                                        HASIL</label>
                                                    <input type="file" id="file_hasil" class="upload-input"
                                                        name="file_hasil" required />
                                                </h2>
                                                <div>
                                                    <button class="upload-btn">SIMPAN</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="section-content creative">
                                            <form action="{{ url('upload-file-skripsi') }}" method="post"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="mb-4">
                                                    <h6>Judul Tugas Akhir</h6>
                                                    @if (isset($skripsiMhs))
                                                        <textarea name="judul" cols="90" rows="4" readonly>{{ $skripsiMhs->judul }}</textarea>
                                                    @else
                                                        <textarea name="judul" cols="90" rows="4" readonly></textarea>
                                                    @endif
                                                </div>
                                                <h2>
                                                    <label for="file_skripsi" class="upload-btn">Upload File
                                                        SKRIPSI</label>
                                                    <input type="file" id="file_skripsi" class="upload-input"
                                                        name="file_skripsi" required />
                                                </h2>
                                                <div>
                                                    <button class="upload-btn">SIMPAN</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="section-content production">
                                            <h2>SELESAI</h2>
                                            <p>Selamat Wisuda.</p>
                                        </div>

                                    </div>
                                </div>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

                                {{-- Cek file apa yg sudah diupload --}}
                                @if (isset($skripsiMhs))
                                    @if (!is_null($skripsiMhs->file_proposal) && is_null($skripsiMhs->file_hasil) && is_null($skripsiMhs->file_skripsi))
                                        <script>
                                            jQuery(function() {
                                                jQuery('.step02').click();
                                            })
                                        </script>
                                    @elseif (!is_null($skripsiMhs->file_proposal) && !is_null($skripsiMhs->file_hasil) && is_null($skripsiMhs->file_skripsi))
                                        <script>
                                            jQuery(function() {
                                                jQuery('.step03').click();
                                            })
                                        </script>
                                    @elseif (!is_null($skripsiMhs->file_proposal) && !is_null($skripsiMhs->file_hasil) && !is_null($skripsiMhs->file_skripsi))
                                        <script>
                                            jQuery(function() {
                                                jQuery('.step04').click();
                                            })
                                        </script>
                                    @endif
                                @endif


                                <script>
                                    $(".step").click(function() {
                                        $(this).addClass("active").prevAll().addClass("active");
                                        $(this).nextAll().removeClass("active");
                                    });

                                    $(".step01").click(function() {
                                        $("#line-progress").css("width", "0%");
                                        $(".discovery").addClass("active").siblings().removeClass("active");
                                    });
                                </script>

                                @if (isset($skripsiMhs))
                                    @if ($skripsiMhs->file_proposal != null)
                                        <script>
                                            $(".step02").click(function() {
                                                $("#line-progress").css("width", "33%");
                                                $(".strategy").addClass("active").siblings().removeClass("active");
                                            });
                                        </script>
                                    @endif

                                    @if ($skripsiMhs->file_hasil != null)
                                        <script>
                                            $(".step03").click(function() {
                                                $("#line-progress").css("width", "66%");
                                                $(".creative").addClass("active").siblings().removeClass("active");
                                            });
                                        </script>
                                    @endif

                                    @if ($skripsiMhs->file_skripsi != null)
                                        <script>
                                            $(".step04").click(function() {
                                                $("#line-progress").css("width", "100%");
                                                $(".production").addClass("active").siblings().removeClass("active");
                                            });
                                        </script>
                                    @endif
                                @endif

                            </div>
                        </div>
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
