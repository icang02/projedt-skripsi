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
                                <!-- start progress mahasiswa -->
                                <link rel="stylesheet" href="progres.css">

                                <!DOCTYPE html>
                                <html lang="en">

                                <head>
                                    <meta charset="UTF-8">
                                    <title>Document</title>
                                    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap"
                                        rel="stylesheet">
                                    <style>
                                        body {
                                            margin: 0;
                                            font-family: 'Roboto Condensed', sans-serif;
                                        }


                                        h1 {

                                            color: #333;
                                            font-weight: 700;
                                            margin-top: 125px;
                                            text-align: center;
                                            text-transform: uppercase;
                                            letter-spacing: 4px;
                                            line-height: 23px;
                                        }

                                        /* --- Start progress bar --- */

                                        .process-wrapper {
                                            margin: auto;
                                            max-width: 1080px;
                                        }

                                        #progress-bar-container {
                                            position: relative;
                                            width: 90%;
                                            margin: auto;
                                            height: 100px;
                                            margin-top: 65px;
                                        }

                                        #progress-bar-container ul {
                                            padding: 0;
                                            margin: 0;
                                            padding-top: 15px;
                                            z-index: 9999;
                                            position: absolute;
                                            width: 100%;
                                            margin-top: -40px
                                        }

                                        #progress-bar-container li:before {
                                            content: " ";
                                            display: block;
                                            margin: auto;
                                            width: 30px;
                                            height: 30px;
                                            border-radius: 50%;
                                            border: solid 2px #aaa;
                                            transition: all ease 0.3s;

                                        }

                                        #progress-bar-container li.active:before,
                                        #progress-bar-container li:hover:before {
                                            border: solid 2px #fff;

                                            background: linear-gradient(to right, #E91E63 0%, #fff 100%);
                                        }

                                        #progress-bar-container li {
                                            list-style: none;
                                            margin-left: 40px;
                                            float: left;
                                            width: 20%;
                                            text-align: center;
                                            color: #aaa;
                                            text-transform: uppercase;
                                            font-size: 11px;
                                            cursor: pointer;
                                            font-weight: 700;
                                            transition: all ease 0.2s;
                                            vertical-align: bottom;
                                            height: 60px;
                                            position: relative;
                                        }

                                        #progress-bar-container li .step-inner {
                                            position: absolute;
                                            width: 100%;
                                            bottom: 0;
                                            font-size: 14px;
                                        }

                                        #progress-bar-container li.active,
                                        #progress-bar-container li:hover {
                                            color: #444;
                                        }

                                        #progress-bar-container li:after {
                                            content: " ";
                                            display: block;
                                            width: 6px;
                                            height: 6px;
                                            background: #777;
                                            margin: auto;
                                            border: solid 7px #fff;
                                            border-radius: 50%;
                                            margin-top: 40px;
                                            box-shadow: 0 2px 13px -1px rgba(0, 0, 0, 0.3);
                                            transition: all ease 0.2s;

                                        }

                                        #progress-bar-container li:hover:after {
                                            background: #555;
                                        }

                                        #progress-bar-container li.active:after {
                                            background: #207893;
                                        }

                                        #progress-bar-container #line {
                                            width: 73%;
                                            margin: auto;
                                            margin-left: 40px;
                                            background: #eee;
                                            height: 6px;
                                            position: absolute;
                                            left: 10%;
                                            top: 57px;
                                            z-index: 1;
                                            border-radius: 50px;
                                            transition: all ease 0.9s;
                                        }

                                        #progress-bar-container #line-progress {
                                            content: " ";
                                            width: 3%;
                                            height: 100%;
                                            background: #207893;
                                            background: linear-gradient(to right, #207893 0%, #2ea3b7 100%);
                                            position: absolute;
                                            z-index: 2;
                                            border-radius: 50px;
                                            transition: all ease 0.9s;
                                        }

                                        #progress-content-section {
                                            width: 100%;
                                            margin: auto;
                                            background: #f3f3f3;
                                            border-radius: 4px;
                                        }

                                        #progress-content-section .section-content {
                                            padding: 30px 40px;
                                            text-align: center;
                                        }

                                        #progress-content-section .section-content h2 {
                                            font-size: 17px;
                                            text-transform: uppercase;
                                            color: #333;
                                            letter-spacing: 1px;
                                        }

                                        #progress-content-section .section-content p {
                                            font-size: 16px;
                                            line-height: 1.8em;
                                            color: #777;
                                        }

                                        #progress-content-section .section-content {
                                            display: none;
                                            animation: FadeInUp 700ms ease 1;
                                            animation-fill-mode: forwards;
                                            transform: translateY(15px);
                                            opacity: 0;
                                        }

                                        #progress-content-section .section-content.active {
                                            display: block;
                                        }

                                        @keyframes FadeInUp {
                                            0% {
                                                transform: translateY(15px);
                                                opacity: 0;
                                            }

                                            100% {
                                                transform: translateY(0px);
                                                opacity: 1;
                                            }
                                        }
                                    </style>
                                </head>

                                <body>
                                    @php
                                        $cekFile = App\Models\Skripsi::where('nim', auth()->user()->id)
                                            ->get()
                                            ->first();
                                    @endphp


                                    <h1>TIMELINE PROGRES</h1>
                                    <br>

                                    <div class="process-wrapper">
                                        <div id="progress-bar-container">
                                            <ul>
                                                <li class="step step01 active">
                                                    <div class="step-inner">PROPOSAL</div>
                                                </li>
                                                <li class="step step02">
                                                    <div class="step-inner">HASIL</div>
                                                </li>
                                                <li class="step step03">
                                                    <div class="step-inner">SKRIPSI</div>
                                                </li>
                                                <li class="step step04">
                                                    <div class="step-inner">FINISH</div>
                                                </li>
                                            </ul>

                                            <div id="line">
                                                <div id="line-progress"></div>
                                            </div>
                                        </div>

                                        <div id="progress-content-section">
                                            <div class="section-content discovery active">
                                                <form action="{{ url('upload-file-proposal') }}"
                                                    enctype="multipart/form-data" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="mb-4">
                                                        <h6>Judul Tugas Akhir</h6>
                                                        @if ($cekFile != null)
                                                            <textarea name="judul" cols="90" rows="4" required>{{ $cekFile->title }}</textarea>
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
                                                                <option value="{{ $item->id }}">{{ $item->name }}
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
                                                                <option value="{{ $item->id }}">{{ $item->name }}
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
                                                        @if ($cekFile != null)
                                                            <textarea cols="90" rows="4" readonly>{{ $cekFile->title }}</textarea>
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
                                                        @if ($cekFile != null)
                                                            <textarea name="judul" cols="90" rows="4" readonly>{{ $cekFile->title }}</textarea>
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
                                    @if ($cekFile != null)
                                        @if (!is_null($cekFile->file_proposal) && is_null($cekFile->file_hasil) && is_null($cekFile->file_skripsi))
                                            <script>
                                                jQuery(function() {
                                                    jQuery('.step02').click();
                                                })
                                            </script>
                                        @elseif (!is_null($cekFile->file_proposal) && !is_null($cekFile->file_hasil) && is_null($cekFile->file_skripsi))
                                            <script>
                                                jQuery(function() {
                                                    jQuery('.step03').click();
                                                })
                                            </script>
                                        @elseif (!is_null($cekFile->file_proposal) && !is_null($cekFile->file_hasil) && !is_null($cekFile->file_skripsi))
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

                                        $(".step02").click(function() {
                                            $("#line-progress").css("width", "33%");
                                            $(".strategy").addClass("active").siblings().removeClass("active");
                                        });

                                        $(".step03").click(function() {
                                            $("#line-progress").css("width", "66%");
                                            $(".creative").addClass("active").siblings().removeClass("active");
                                        });

                                        $(".step04").click(function() {
                                            $("#line-progress").css("width", "100%");
                                            $(".production").addClass("active").siblings().removeClass("active");
                                        });
                                    </script>
                                </body>

                                </html>

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
