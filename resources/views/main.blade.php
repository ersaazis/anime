<?php
    $i=$j=$k=1;
?>
@extends('layout')
@section('content')
<div class="row no-gutters">
    @foreach ($animeTayang as $item)
        @if($i++ <= 6)
        <a class="col-md-2 col-4" 
            data-toggle="popover" 
            data-trigger="focus"
            data-html="true"
            title="<a href='{{route('Anime',['anime'=>$item->judul_alternatif])}}' class='text-dark'>{{$item->judul}} <i class='fa fa-external-link'></i></a>" 
            data-content="
            <b>Rating</b> : {{$item->rating}} <br>
            <b>Voter</b> : {{$item->voter}} <br>
            <b>Total Episode</b> : {{$item->total_episode}} <br>
            <b>Status</b> : {{$item->status}} <br>
            <b>Hari Tayang</b> : {{$item->hari_tayang}} <br>
            "
            data-placement="bottom"
            href="javascript:void(0);"
        >
            {{-- <a href="{{route('Anime',['anime'=>$item->judul_alternatif])}}"> --}}
                <img src="{{$item->foto}}" width="100%" />
            {{-- </a> --}}
        </a>
        @endif
    @endforeach
    <div class="col col-12"><button class="btn float-right m-2 btn-sm" type="button"  data-toggle="modal" data-target="#AnimeRilisHariIni">Lainya<br></button></div>
</div>
<div class="row">
    <div class="col mt-2">
        @yield('main')
    </div>
    <div class="col col-md-4 col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Genre</h4>
                    @foreach ($tags as $item)
                        <a href="{{route('Genre',['genre'=>$item->nama_alternatif])}}"><span class="badge badge-secondary m-1"> {{$item->nama}} </span></a>
                    @endforeach
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <h4 class="card-title">Anime Favorit<button class="btn float-right btn-sm" type="button" data-toggle="modal" data-target="#AnimeTerfavorit">Lainya<br></button></h4>
                <div class="row">
                    @foreach ($animeFavorit as $item)
                        @if($j++ <= 4)
                            <a class="col-md-6 col-6 mt-3" 
                                data-toggle="popover" 
                                data-trigger="focus"
                                data-html="true"
                                title="<a href='{{route('Anime',['anime'=>$item->judul_alternatif])}}' class='text-dark'>{{$item->judul}} <i class='fa fa-external-link'></i></a>" 
                                data-content="
                                <b>Rating</b> : {{$item->rating}} <br>
                                <b>Voter</b> : {{$item->voter}} <br>
                                <b>Total Episode</b> : {{$item->total_episode}} <br>
                                <b>Status</b> : {{$item->status}} <br>
                                <b>Hari Tayang</b> : {{$item->hari_tayang}} <br>
                                "
                                data-placement="bottom"
                                href="javascript:void(0);"
                            >
                            <img src="{{$item->foto}}" width="100%" />
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <h4 class="card-title">Karakter Favorit<button class="btn float-right btn-sm" type="button" data-toggle="modal" data-target="#KarakterTerfavorit">Lainya<br></button></h4>
                <div class="row">
                    @foreach ($karakterFavorit as $item)
                        @if($k++ <= 4)
                        <a class="col-md-6 col-6 mt-3" 
                        data-toggle="popover" 
                        data-trigger="focus"
                        data-html="true"
                        title="<a href='{{route('KarakterAnime',['karakter'=>$item->nama_alternatif])}}' class='text-dark'>{{$item->nama}} <i class='fa fa-external-link'></i></a>" 
                        data-content="
                        <b>Voter</b> : {{$item->voter}}
                        "
                        data-placement="bottom"
                        href="javascript:void(0);"
                        >
                        <img src="{{$item->foto}}" width="100%" />
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Anime Rilis Hari Ini -->
<div class="modal fade" id="AnimeRilisHariIni" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Anime Rilis Hari Ini</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                @foreach ($animeTayang as $item)
                    <a class="col-md-3 col-6 mt-3" 
                        data-toggle="popover" 
                        data-trigger="focus"
                        data-html="true"
                        title="<a href='{{route('Anime',['anime'=>$item->judul_alternatif])}}' class='text-dark'>{{$item->judul}} <i class='fa fa-external-link'></i></a>" 
                        data-content="
                        <b>Rating</b> : {{$item->rating}} <br>
                        <b>Voter</b> : {{$item->voter}} <br>
                        <b>Total Episode</b> : {{$item->total_episode}} <br>
                        <b>Status</b> : {{$item->status}} <br>
                        <b>Hari Tayang</b> : {{$item->hari_tayang}} <br>
                        "
                        data-placement="bottom"
                        href="javascript:void(0);"
                    >        
                    <img src="{{$item->foto}}" width="100%" />
                    </a>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Modal Anime Terfavorit -->
<div class="modal fade" id="AnimeTerfavorit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Anime Terfavorit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                @foreach ($animeFavorit as $item)
                        <a class="col-md-3 col-6 mt-3" 
                            data-toggle="popover" 
                            data-trigger="focus"
                            data-html="true"
                            title="<a href='{{route('Anime',['anime'=>$item->judul_alternatif])}}' class='text-dark'>{{$item->judul}} <i class='fa fa-external-link'></i></a>" 
                            data-content="
                            <b>Rating</b> : {{$item->rating}} <br>
                            <b>Voter</b> : {{$item->voter}} <br>
                            <b>Total Episode</b> : {{$item->total_episode}} <br>
                            <b>Status</b> : {{$item->status}} <br>
                            <b>Hari Tayang</b> : {{$item->hari_tayang}} <br>
                            "
                            data-placement="bottom"
                            href="javascript:void(0);"
                        >                
                        <img src="{{$item->foto}}" width="100%" />
                        </a>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Modal Karakter Terfavorit -->
<div class="modal fade" id="KarakterTerfavorit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Karakter Terfavorit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                @foreach ($karakterFavorit as $item)
                    <a class="col-md-3 col-6 mt-3" 
                    data-toggle="popover" 
                    data-trigger="focus"
                    data-html="true"
                    title="<a href='{{route('KarakterAnime',['karakter'=>$item->nama_alternatif])}}' class='text-dark'>{{$item->nama}} <i class='fa fa-external-link'></i></a>" 
                    data-content="
                    <b>Voter</b> : {{$item->voter}}
                    "
                    data-placement="bottom"
                    href="javascript:void(0);"
                    >
                    <img src="{{$item->foto}}" width="100%" />
                    </a>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</div>
@endsection