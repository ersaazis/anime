@extends('layout')
@section('title','Anime '.$anime->judul)
@section('content')
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <img src="{{url($anime->foto)}}" width="100%" />
                    </div>
                    <div class="col-12 col-md-9 mt-2">
                        <h3>{{$anime->judul}}</h3>
                        {!! $anime->deskripsi !!}
                    </div>
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
                <h4 class="card-title">Karakter Utama</h4>
                <div class="row">
                    @foreach ($karakterAnime as $item)
                        <a class="col-md-3 col-6" 
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
                        <img src="{{url($item->foto)}}" width="100%" />
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <h4 class="card-title">Episode</h4>
                <ul class="list-unstyled">
                    @forelse ($video['episode'] as $item)
                        <li><a href="{{route('VideoAnime',['anime'=>$anime->judul_alternatif,'video'=>$item->judul_alternatif])}}">{{$item->judul}}</a></li>
                    @empty
                        <li>Tidak Ada</li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <h4 class="card-title">Movie</h4>
                <ul class="list-unstyled">
                    @forelse ($video['movie'] as $item)
                        <li><a href="{{route('VideoAnime',['anime'=>$anime->judul_alternatif,'video'=>$item->judul_alternatif])}}">{{$item->judul}}</a></li>
                    @empty
                        <li>Tidak Ada</li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <h4 class="card-title">Rekomendasi</h4>
                <ul class="list-unstyled">
                    @forelse ($rekomendasiAnime as $item)
                        <li><a href="{{route('Anime',['anime'=>$item->judul_alternatif])}}">{{$item->judul}}</a></li>
                    @empty
                        <li>Tidak Ada</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection