<?php
    $x=$j=$k=1;
?>
@extends('layout')
@section('content')
<div class="row no-gutters">
    @foreach ($animeTayang as $item)
        @if($x++ <= 6)
        <a class="col-md-2 col-4" 
            data-toggle="popover" 
            data-trigger="focus"
            data-html="true"
            title="<a href='{{route('Anime',['anime'=>$item->judul_alternatif])}}' class='text-dark'>{!! $item->judul !!} <i class='fa fa-external-link'></i></a>" 
            data-content="
            <b>Rating</b> :
                @for ($i = 1; $i <= 5; $i++)
                    @if(cb()->session()->id()) <a class='rating text-dark' href='#{{$item->id}}-{{$i}}'> @endif <span class='fa fa-star 
                    @if ($item->rating >= $i)
                        stared
                    @endif
                    '></span>@if(cb()->session()->id()) </a> @endif
                @endfor
            <br>
            <b>Voter</b> : {{($item->voter)?$item->voter:0}} @if(cb()->session()->id()) <a class='vote badge badge-secondary m-1' href='#a-{{$item->id}}'>Vote</a> @endif<br>
            <b>Total Episode</b> : {{$item->total_episode}} <br>
            <b>Status</b> : {{ucwords($item->status)}} <br>
            <b>Hari Tayang</b> : {{ucwords($item->hari_tayang)}} <br>
            "
            data-placement="bottom"
            href="javascript:void(0);"
        >
            {{-- <a href="{{route('Anime',['anime'=>$item->judul_alternatif])}}"> --}}
                @if (!session('lite_mode',false))
                <img style="width:100%;height:250px" src="{{url($item->foto)}}" class="img-fluid position-relative mx-auto"/>
                <h3 class="w-75 position-absolute text-dark bg-white p-1" style="font-size:50%;font-weight:700;top:5%">{!! $item->judul !!}</h3>
                <h3 class="w-30 position-absolute text-white bg-danger p-1" style="font-size:50%;font-weight:700;bottom:10%">{!! $item->status !!}</h3>
                @else
                <div class="card h-100">
                    <div class="card-body text-center text-dark">
                        {!! $item->judul !!}
                    </div>
                </div>
                @endif
            {{-- </a> --}}
        </a>
        @endif
    @endforeach
    @if (count($animeTayang))
        <div class="col col-12"><button class="btn float-right m-2 btn-sm" type="button"  data-toggle="modal" data-target="#AnimeRilisHariIni">Lainya<br></button></div>
    @endif
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
                                title="<a href='{{route('Anime',['anime'=>$item->judul_alternatif])}}' class='text-dark'>{!! $item->judul !!} <i class='fa fa-external-link'></i></a>" 
                                data-content="
                                <b>Rating</b> :
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if(cb()->session()->id()) <a class='rating text-dark' href='#{{$item->id}}-{{$i}}'> @endif <span class='fa fa-star 
                                        @if ($item->rating >= $i)
                                            stared
                                        @endif
                                        '></span></a>
                                    @endfor
                                <br>
                                <b>Voter</b> : {{($item->voter)?$item->voter:0}} @if(cb()->session()->id()) <a class='vote badge badge-secondary m-1' href='#a-{{$item->id}}'>Vote</a> @endif <br>
                                <b>Total Episode</b> : {{$item->total_episode}} <br>
                                <b>Status</b> : {{$item->status}} <br>
                                <b>Hari Tayang</b> : {{$item->hari_tayang}} <br>
                                "
                                data-placement="bottom"
                                href="javascript:void(0);"
                            >
                            @if (!session('lite_mode',false))
                            <img style="width:100%;height:250px" src="{{url($item->foto)}}" class="img-fluid position-relative mx-auto"/>
                            <h3 class="w-75 position-absolute text-dark bg-white p-1" style="font-size:50%;font-weight:700;top:5%">{!! $item->judul !!}</h3>
                            <h3 class="w-30 position-absolute text-white bg-danger p-1" style="font-size:50%;font-weight:700;bottom:10%">{!! $item->status !!}</h3>
                            @else
                            <div class="card h-100">
                                <div class="card-body text-center text-dark">
                                    {!! $item->judul !!}
                                </div>
                            </div>
                            @endif
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @if (count($karakterFavorit))
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
                        <b>Voter</b> : {{($item->voter)?$item->voter:0}} @if(cb()->session()->id()) <a class='vote badge badge-secondary m-1' href='#k-{{$item->id}}'>Vote</a> @endif
                        "
                        data-placement="bottom"
                        href="javascript:void(0);"
                        >
                        @if (!session('lite_mode',false))
                        <img style="width:100%;height:250px" src="{{url($item->foto)}}" class="img-fluid position-relative mx-auto"/>
                        <h3 class="w-75 position-absolute text-dark bg-white p-1" style="font-size:50%;font-weight:700;top:5%">{!! $item->nama !!}</h3>
                        @else
                        <div class="card h-100">
                            <div class="card-body text-center text-dark">
                                {{$item->nama}}
                            </div>
                        </div>
                        @endif
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif
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
                        title="<a href='{{route('Anime',['anime'=>$item->judul_alternatif])}}' class='text-dark'>{!! $item->judul !!} <i class='fa fa-external-link'></i></a>" 
                        data-content="
                        <b>Rating</b> :
                            @for ($i = 1; $i <= 5; $i++)
                                @if(cb()->session()->id()) <a class='rating text-dark' href='#{{$item->id}}-{{$i}}'> @endif <span class='fa fa-star 
                                @if ($item->rating >= $i)
                                    stared
                                @endif
                                '></span></a>
                            @endfor
                        <br>
                        <b>Voter</b> : {{($item->voter)?$item->voter:0}} @if(cb()->session()->id()) <a class='vote badge badge-secondary m-1' href='#a-{{$item->id}}'>Vote</a> @endif <br>
                        <b>Total Episode</b> : {{$item->total_episode}} <br>
                        <b>Status</b> : {{$item->status}} <br>
                        <b>Hari Tayang</b> : {{$item->hari_tayang}} <br>
                        "
                        data-placement="bottom"
                        href="javascript:void(0);"
                    >        
                    @if (!session('lite_mode',false))
                    <img style="width:100%;height:250px" src="{{url($item->foto)}}" class="img-fluid position-relative mx-auto"/>
                    <h3 class="w-75 position-absolute text-dark bg-white p-1" style="font-size:50%;font-weight:700;top:5%">{!! $item->judul !!}</h3>
                    <h3 class="w-30 position-absolute text-white bg-danger p-1" style="font-size:50%;font-weight:700;bottom:10%">{!! $item->status !!}</h3>
                    @else
                    <div class="card h-100">
                        <div class="card-body text-center text-dark">
                            {!! $item->judul !!}
                        </div>
                    </div>
                    @endif
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
                            title="<a href='{{route('Anime',['anime'=>$item->judul_alternatif])}}' class='text-dark'>{!! $item->judul !!} <i class='fa fa-external-link'></i></a>" 
                            data-content="
                            <b>Rating</b> :
                                @for ($i = 1; $i <= 5; $i++)
                                    @if(cb()->session()->id()) <a class='rating text-dark' href='#{{$item->id}}-{{$i}}'> @endif <span class='fa fa-star 
                                    @if ($item->rating >= $i)
                                        stared
                                    @endif
                                    '></span></a>
                                @endfor
                            <br>
                            <b>Voter</b> : {{($item->voter)?$item->voter:0}} @if(cb()->session()->id()) <a class='vote badge badge-secondary m-1' href='#a-{{$item->id}}'>Vote</a> @endif <br>
                            <b>Total Episode</b> : {{$item->total_episode}} <br>
                            <b>Status</b> : {{$item->status}} <br>
                            <b>Hari Tayang</b> : {{$item->hari_tayang}} <br>
                            "
                            data-placement="bottom"
                            href="javascript:void(0);"
                        >                
                        @if (!session('lite_mode',false))
                        <img style="width:100%;height:250px" src="{{url($item->foto)}}" class="img-fluid position-relative mx-auto"/>
                        <h3 class="w-75 position-absolute text-dark bg-white p-1" style="font-size:50%;font-weight:700;top:5%">{!! $item->judul !!}</h3>
                        <h3 class="w-30 position-absolute text-white bg-danger p-1" style="font-size:50%;font-weight:700;bottom:10%">{!! $item->status !!}</h3>
                        @else
                        <div class="card h-100">
                            <div class="card-body text-center text-dark">
                                {!! $item->judul !!}
                            </div>
                        </div>
                        @endif
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
                    <b>Voter</b> : {{($item->voter)?$item->voter:0}} @if(cb()->session()->id()) <a class='vote badge badge-secondary m-1' href='#k-{{$item->id}}'>Vote</a> @endif
                    "
                    data-placement="bottom"
                    href="javascript:void(0);"
                    >
                    @if (!session('lite_mode',false))
                    <img style="width:100%;height:250px" src="{{url($item->foto)}}" class="img-fluid position-relative mx-auto"/>
                    <h3 class="w-75 position-absolute text-dark bg-white p-1" style="font-size:50%;font-weight:700;top:5%">{!! $item->nama !!}</h3>
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
    </div>
</div>
@endsection