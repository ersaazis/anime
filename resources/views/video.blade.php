@extends('layout')
@section('title','Anime '.$anime->judul.' - '.$video->judul)
@section('deskripsi',strip_tags($video->deskripsi))
@section('content')
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <button id="reportButton" onclick="reportVideo({{$video->id}})" class="btn btn-warning float-left btn-sm w-100" type="button" data-toggle="tooltip" data-placement="top" title="Klik jika video rusak">
                            <i class="fa fa-info"></i> Video Rusak
                        </button>
                    </div>
                    <div class="col-12 col-md-6">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col" style="min-height:300px" id="kolomPlayer">
                        <iframe id="videoPlayer" allowfullscreen frameborder="0" src="{{$video->server1}}" class="w-100 h-100"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4 mt-2">
                        <select id="pilihServer" class="form-control form-control-sm" onchange="gantiServer()">
                            @if($video->server1 != "")
                                <option value="{{$video->server1}}">Server 1</option>
                            @endif
                            @if($video->server2 != "")
                                <option value="{{$video->server2}}">Server 2</option>
                            @endif
                            @if($video->server3 != "")
                                <option value="{{$video->server3}}">Server 3</option>
                            @endif
                            @if($video->server4 != "")
                                <option value="{{$video->server4}}">Server 4</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-12 col-md-4 mt-2 text-center">
                        <div class="btn-group" role="group">
                            @if($prevVideo and $video->tipe == 'episode')
                                <a class="btn btn-dark btn-sm" href="{{route('VideoAnime',['anime'=>$anime->judul_alternatif,'judul'=>$prevVideo->judul_alternatif])}}">&lt;&lt;</a>
                            @endif
                            <a class="btn btn-dark btn-sm" href="{{route('Anime',['anime'=>$anime->judul_alternatif])}}"><i class="fa fa-list-ul"></i></a>
                            @if($nextVideo and $video->tipe == 'episode')
                                <a class="btn btn-dark btn-sm" href="{{route('VideoAnime',['anime'=>$anime->judul_alternatif,'judul'=>$nextVideo->judul_alternatif])}}">&gt;&gt;</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-2">
                        <button class="btn btn-secondary w-100 btn-sm" type="button" onclick="refreshVideo()">
                            <i class="fa fa-rotate-left"></i> Refresh
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <h4 class="card-title">Karakter Utama</h4>
                <div class="row">
                    @foreach ($karakterAnime as $item)
                        <a class="col-md-2 col-4" 
                        data-toggle="popover" 
                        data-trigger="focus"
                        data-html="true"
                        title="<a href='{{route('KarakterAnime',['karakter'=>$item->nama_alternatif])}}' class='text-dark'>{{$item->nama}} <i class='fa fa-external-link'></i></a>" 
                        data-content="
                        <b>Voter</b> : {{($item->voter)?$item->voter:0}} @if(cb()->session()->id()) <a class='vote badge badge-secondary m-1' href='#k-{{$item->id}}'>Vote</a> @endif
                        "
                        data-placement="bottom"
                        href="javascript:void(0);"
                        >
                        @if (!session('lite_mode',false))
                        <img src="{{url($item->foto)}}" class="img-fluid position-relative mx-auto"/>
                <h3 class="w-75 position-absolute text-dark bg-white p-1" style="font-size:50%;font-weight:700;top:5%">{!! $item->nama !!}</h3>
                <h3 class="w-30 position-absolute text-white bg-danger p-1" style="font-size:50%;font-weight:700;bottom:10%">{!! $item->status !!}</h3>
                        @else
                        <div class="card h-100">
                            <div class="card-body text-center text-dark">
                                {{$item->nama}}
                            </div>
                        </div>
                        @endif
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th width="30%">Rating</th>
                                <td>: {{$anime->rating}}</td>
                            </tr>
                            <tr>
                                <th>Voter</th>
                                <td>: {{$anime->voter}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>: {{ucwords($anime->status)}}</td>
                            </tr>
                            <tr>
                                <th>Total Episode</th>
                                <td>: {{$anime->total_episode}}</td>
                            </tr>
                            <tr>
                                <th>Hari Tayang</th>
                                <td>: {{ucwords($anime->hari_tayang)}}</td>
                            </tr>
                            <tr>
                                <th>Genre</th>
                                <td>: {!! $genre !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card mt-2">
            <div class="card-body">
                <div class="row">
                    @if (!session('lite_mode',false))
                    <div class="col-12 col-md-3">
                        <img src="{{url($video->foto)}}" width="100%" />
                    </div>
                    @endif
                    <div class="col-12 col-md-9 mt-2">
                        <h3>{!! $video->judul !!}</h3>
                        {!! $video->deskripsi !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <h4 class="card-title">Rekomendasi</h4>
                <ul class="list-unstyled">
                    @forelse ($rekomendasiAnime as $item)
                        <li><a href="{{route('Anime',['anime'=>$item->judul_alternatif])}}">{!! $item->judul !!}</a></li>
                    @empty
                        <li>Tidak Ada</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
function reportVideo(id) {
    $.get( "{{route('ReportVideo',['id_video'=>''])}}/"+id, function( data ) {
        $('#reportButton').attr('onclick','');
        $('#reportButton').attr('disabled','true');
        $('#reportButton').html('<i class="fa fa-check"></i> Berhasil');
    });
}
function refreshVideo() {
    var player=$('#kolomPlayer').html();
    $('#kolomPlayer').html("");
    $('#kolomPlayer').html(player);
}
function gantiServer() {
    var player=$('#pilihServer').val();
    $('#videoPlayer').attr('src',player);
    refreshVideo();
}
</script>
@endsection