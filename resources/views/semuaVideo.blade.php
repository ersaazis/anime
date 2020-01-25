<?php
    $i=$j=$k=1;
?>
@extends('main')
@section('main')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Semua Video</h4>
        <div class="row">
            @foreach ($video as $item)
                <a class="col-md-3 col-6 mt-3" 
                    data-toggle="popover" 
                    data-trigger="focus"
                    data-html="true"
                    title="<a href='{{route('VideoAnime',['anime'=>$item->judul_alternatif_anime,'judul'=>$item->judul_alternatif])}}' class='text-dark'>{{$item->judul}} <i class='fa fa-external-link'></i></a>" 
                    data-content="
                    <b>Anime</b> : {{$item->judul_anime}} <br>
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
        <div class="row mt-2 float-right">
            <div class="col">
                {{ $video->links() }}
            </div>
        </div>
    </div>
</div>
@endsection