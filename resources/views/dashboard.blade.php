<?php
if(cb()->session()->roleId() == 1){
    $head_script='<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">';
    $bottom_view='dashboardBottom';
}
?>
@extends('crud::themes.adminlte.layout.layout')
@section('content')
    @if (cb()->session()->roleId() == 1)
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Trafik Website</h3>

                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    </div>
                </div>
                <div class="box-body">
                    <img style="width:100%;height:250px" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRTUksHZqcm2L9czJrJIgq5DxM2gNYCl4kbDbrLGZ_AkP2oTly1gZZUyOQJ_Ra1AmqotPyKnCmCApjG/pubchart?oid=1644222507&format=image" width="100%">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua-active"><i class="fa fa-users"></i></span>
    
                <div class="info-box-content">
                <span class="info-box-text"><b>Member</b></span>
                <span class="info-box-text">Terdaftar <span class="badge bg-blue-active">{{ $memberTerdaftar }}</span></span>
                <span class="info-box-text">Terferifikasi <span class="badge bg-blue-active">{{ $memberTerverifikasi }}</span></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red-active"><i class="fa fa-youtube-play"></i></span>
    
                <div class="info-box-content">
                <span class="info-box-text"><b>Anime</b></span>
                <span class="info-box-text">Total <span class="badge bg-blue-active">{{ $animeTerdaftar }}</span></span>
                <span class="info-box-text">Tervote <span class="badge bg-blue-active">{{ $animeTervote }}</span></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green-active"><i class="fa fa-play"></i></span>
    
                <div class="info-box-content">
                <span class="info-box-text"><b>Video</b></span>
                <span class="info-box-text">Total <span class="badge bg-blue-active">{{ $videoTerdaftar }}</span></span>
                <span class="info-box-text">Link Rusak <span class="badge bg-blue-active">{{ $videoRusak }}</span></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow-active"><i class="fa fa-street-view"></i></span>
    
                <div class="info-box-content">
                <span class="info-box-text"><b>Karakter</b></span>
                <span class="info-box-text">Total <span class="badge bg-blue-active">{{ $karakterTerdaftar }}</span></span>
                <span class="info-box-text">Tervote <span class="badge bg-blue-active">{{ $karakterTervote }}</span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Anime Update Hari Ini</h3>

                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Anime</th>
                                                <th>Hari Update</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataAnimeUpdate as $item)
                                            <tr>
                                                <td>{{$j++}}</td>
                                                <td>{!! $item->judul !!}</td>
                                                <td>{{ucwords($item->hari_tayang)}}</td>
                                                <td>
                                                    <a href="{{url(cb()->getAdminPath().'/video/add/')}}" class="btn btn-xs btn-primary">Tambah</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Anime Trending Hari Ini</h3>

                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Anime</th>
                                                <th>Hari Update</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($animeTrending as $item)
                                            <tr>
                                                <td>{{$o++}}</td>
                                                <td>{!! $item->judul !!}</td>
                                                <td>{{ucwords($item->hari_tayang)}}</td>
                                                <td>
                                                    <a target="_blank" href="{{route('Anime',['anime'=>$item->judul_alternatif])}}" class="btn btn-xs btn-primary">Lihat</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Video Trending Hari Ini</h3>

                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Anime</th>
                                                <th>Judul Video</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($videoTrending as $item)
                                            <tr>
                                                <td>{{$p++}}</td>
                                                <td>{{$item->judul_anime}}</td>
                                                <td>{!! $item->judul !!}</td>
                                                <td>
                                                    <a target="_blank" href="{{route('VideoAnime',['anime'=>$item->judul_alternatif_anime,'video'=>$item->judul_alternatif])}}" class="btn btn-xs btn-primary">Lihat</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($videoRusak)
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Report Link Video Rusak</h3>

                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Video</th>
                                <th>Report</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($dataVideoRusak as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->judul_anime}} - {!! $item->judul !!}</td>
                                <td>{{$item->jum_report}}</td>
                                <td>
                                    <a href="{{route('VideoAnime',['anime'=>$item->judul_alternatif_anime,'judul'=>$item->judul_alternatif])}}" class="btn btn-xs btn-primary" target="_blank">Lihat</a>
                                    <a href="{{url(cb()->getAdminPath().'/video/edit/'.$item->id)}}" class="btn btn-xs btn-primary">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                 @endif                                 
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Report Video Terfavorit Bulan Ini</h3>

                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        <strong>Report : 1 {{date('M, Y')}} - {{date('t M, Y')}}</strong>
                                    </p>

                                    <div class="chart">
                                        <div id="chart_video" style="height: 300px; width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        @php
                                        $l=1;                                    
                                        @endphp
                                        @foreach ($labelReportVideo as $item)
                                            <tr>
                                                <td class="{{$color[$l]}}" width="25%">Video {{$l++}}</td>
                                                <td>{{$item->judul_anime}} - {!! $item->judul !!}</td>
                                            </tr>                                        
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Report Anime Terfavorit Bulan Ini</h3>

                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        <strong>Report : 1 {{date('M, Y')}} - {{date('t M, Y')}}</strong>
                                    </p>

                                    <div class="chart">
                                        <div id="chart_anime" style="height: 300px; width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        @foreach ($labelReportAnime as $item)
                                            <tr>
                                                <td class="{{$color[$k]}}" width="25%">Anime {{$k++}}</td>
                                                <td>{!! $item->judul !!}</td>
                                            </tr>                                        
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Report Video Terfavorit Bulan Ini</h3>

                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        <strong>Report : 1 {{date('M, Y')}} - {{date('t M, Y')}}</strong>
                                    </p>

                                    <div class="chart">
                                        <div id="chart_video" style="height: 300px; width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        @php
                                        $l=1;
                                        @endphp
                                        @foreach ($labelReportVideo as $item)
                                            <tr>
                                                <td class="{{$color[$l]}}" width="25%">Video {{$l++}}</td>
                                                <td>{{$item->judul_anime}} - {!! $item->judul !!}</td>
                                            </tr>                                        
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Report Genre Terfavorit Bulan Ini</h3>

                            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        <strong>Report : 1 {{date('M, Y')}} - {{date('t M, Y')}}</strong>
                                    </p>

                                    <div class="chart">
                                        <div id="chart_genre" style="height: 300px; width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                    @foreach ($labelReportGenre as $item)
                                        <tr>
                                            <td class="{{$color[$m]}}" width="25%">Genre {{$m++}}</td>
                                            <td>{{$item->nama}}</td>
                                        </tr>                                        
                                    @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @else
        <div class="callout callout-success">
            <h4>Selamat datang {{cb()->session()->name()}}</h4>
            <p>Selamat menikmati streaming anime tanpa iklan !!!</p>
            <p>Note : Ada beberapa iklan yang datang dari server video</p>
        </div>
        <a href="{{url('')}}" class="btn btn-primary"><i class="fa fa-youtube-play"></i> <span>Nonton Anime</span></a>
        @endif
@endsection