<?php
    $x=$j=1;
?>
@extends('main')
@section('main')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Video Trending<button class="btn float-right btn-sm" type="button" data-toggle="modal" data-target="#VideoTrendingHariIni">Lainya</button></h4>
        <div class="row">
            @foreach ($videoTrending as $item)
                @if($x++ <= 4)
                <a class="col-md-3 col-6 mt-3" 
                    data-toggle="popover" 
                    data-trigger="focus"
                    data-html="true"
                    title="<a href='{{route('VideoAnime',['anime'=>$item->judul_alternatif_anime,'judul'=>$item->judul_alternatif])}}' class='text-dark'>{!! $item->judul !!} <i class='fa fa-external-link'></i></a>" 
                    data-content="
                    <b>Anime</b> : {{$item->judul_anime}} <br>
                    <b>Rating</b> :
                        @for ($i = 1; $i <= 5; $i++)
                            @if(cb()->session()->id()) <a class='rating text-dark' href='#{{$item->id_anime_id}}-{{$i}}'> @endif <span class='fa fa-star 
                            @if ($item->rating >= $i)
                                stared
                            @endif
                            '></span></a>
                        @endfor
                    <br>
                    <b>Voter</b> : {{($item->voter)?$item->voter:0}} @if(cb()->session()->id()) <a class='vote badge badge-secondary m-1' href='#a-{{$item->id_anime_id}}'>Vote</a> @endif <br>
                    <b>Total Episode</b> : {{$item->total_episode}} <br>
                    <b>Status</b> : {{$item->status}} <br>
                    <b>Hari Tayang</b> : {{$item->hari_tayang}} <br>
                    "
                    data-placement="bottom"
                    href="javascript:void(0);"
                >
                @if (!session('lite_mode',false))
                <img style="width:100%;height:200px" src="{{url($item->foto)}}" class="img-fluid position-relative mx-auto"/>
                <h3 class="w-75 position-absolute text-dark bg-white p-1" style="font-size:50%;font-weight:700;top:5%">{!! $item->judul_anime !!}</h3>
                <h3 class="w-75 position-absolute text-white bg-info p-1" style="font-size:50%;font-weight:700;bottom:0%">{!! $item->judul !!}</h3>
                <h3 class="w-30 position-absolute text-white bg-danger p-1" style="font-size:50%;font-weight:700;bottom:10%">{!! $item->status !!}</h3>
                @else
                <div class="card h-100">
                    <div class="card-body text-center text-dark">
                        {{$item->judul_anime}} - {!! $item->judul !!}
                    </div>
                </div>
                @endif
                </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-body">
        <h4 class="card-title">Anime Trending<button class="btn float-right btn-sm" type="button" data-toggle="modal" data-target="#AnimeTrendingHariIni">Lainya</button></h4>
        <div class="row">
            @foreach ($animeTrending as $item)
                @if($j++ <= 4)
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
                <img style="width:100%;height:200px" src="{{url($item->foto)}}" class="img-fluid position-relative mx-auto"/>
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
<div class="card mt-2">
    <div class="card-body">
        <h4 class="card-title">Video Terbaru<a class="btn float-right btn-sm" href="{{route('SemuaVideo')}}">Lainya</a></h4>
        <div class="row">
            @foreach ($anime as $item)
                <a class="col-md-3 col-6 mt-3" 
                    data-toggle="popover" 
                    data-trigger="focus"
                    data-html="true"
                    title="<a href='{{route('VideoAnime',['anime'=>$item->judul_alternatif_anime,'judul'=>$item->judul_alternatif])}}' class='text-dark'>{!! $item->judul !!} <i class='fa fa-external-link'></i></a>" 
                    data-content="
                    <b>Anime</b> : {{$item->judul_anime}} <br>
                    <b>Rating</b> :
                        @for ($i = 1; $i <= 5; $i++)
                            @if(cb()->session()->id()) <a class='rating text-dark' href='#{{$item->id_anime_id}}-{{$i}}'> @endif <span class='fa fa-star 
                            @if ($item->rating >= $i)
                                stared
                            @endif
                            '></span></a>
                        @endfor
                    <br>
                    <b>Voter</b> : {{($item->voter)?$item->voter:0}} @if(cb()->session()->id()) <a class='vote badge badge-secondary m-1' href='#a-{{$item->id_anime_id}}'>Vote</a> @endif <br>
                    <b>Total Episode</b> : {{$item->total_episode}} <br>
                    <b>Status</b> : {{$item->status}} <br>
                    <b>Hari Tayang</b> : {{$item->hari_tayang}} <br>
                    "
                    data-placement="bottom"
                    href="javascript:void(0);"
                >
                @if (!session('lite_mode',false))
                <img style="width:100%;height:200px" src="{{url($item->foto)}}" class="img-fluid position-relative mx-auto"/>
                <h3 class="w-75 position-absolute text-dark bg-white p-1" style="font-size:50%;font-weight:700;top:5%">{!! $item->judul_anime !!}</h3>
                <h3 class="w-75 position-absolute text-white bg-info p-1" style="font-size:50%;font-weight:700;bottom:0%">{!! $item->judul !!}</h3>
                <h3 class="w-30 position-absolute text-white bg-danger p-1" style="font-size:50%;font-weight:700;bottom:10%">{!! $item->status !!}</h3>
                @else
                <div class="card h-100">
                    <div class="card-body text-center text-dark">
                        {{$item->judul_anime}} - {!! $item->judul !!}
                    </div>
                </div>
                @endif
                </a>
            @endforeach
        </div>
    </div>
</div>
<!-- Modal Video Trending Hari Ini -->
<div class="modal fade" id="VideoTrendingHariIni" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Video Trending Hari Ini</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                @foreach ($videoTrending as $item)
                    <a class="col-md-3 col-6 mt-3" 
                        data-toggle="popover" 
                        data-trigger="focus"
                        data-html="true"
                        title="<a href='{{route('VideoAnime',['anime'=>$item->judul_alternatif_anime,'judul'=>$item->judul_alternatif])}}' class='text-dark'>{!! $item->judul !!} <i class='fa fa-external-link'></i></a>" 
                        data-content="
                        <b>Anime</b> : {{$item->judul_anime}} <br>
                        <b>Rating</b> :
                            @for ($i = 1; $i <= 5; $i++)
                                @if(cb()->session()->id()) <a class='rating text-dark' href='#{{$item->id_anime_id}}-{{$i}}'> @endif <span class='fa fa-star 
                                @if ($item->rating >= $i)
                                    stared
                                @endif
                                '></span></a>
                            @endfor
                        <br>
                        <b>Voter</b> : {{($item->voter)?$item->voter:0}} @if(cb()->session()->id()) <a class='vote badge badge-secondary m-1' href='#a-{{$item->id_anime_id}}'>Vote</a> @endif <br>
                        <b>Total Episode</b> : {{$item->total_episode}} <br>
                        <b>Status</b> : {{$item->status}} <br>
                        <b>Hari Tayang</b> : {{$item->hari_tayang}} <br>
                        "
                        data-placement="bottom"
                        href="javascript:void(0);"
                    >
                    @if (!session('lite_mode',false))
                    <img style="width:100%;height:200px" src="{{url($item->foto)}}" class="img-fluid position-relative mx-auto"/>
                    <h3 class="w-75 position-absolute text-dark bg-white p-1" style="font-size:50%;font-weight:700;top:5%">{!! $item->judul_anime !!}</h3>
                    <h3 class="w-75 position-absolute text-white bg-info p-1" style="font-size:50%;font-weight:700;bottom:0%">{!! $item->judul !!}</h3>
                    <h3 class="w-30 position-absolute text-white bg-danger p-1" style="font-size:50%;font-weight:700;bottom:10%">{!! $item->status !!}</h3>
                    @else
                    <div class="card h-100">
                        <div class="card-body text-center text-dark">
                            {{$item->judul_anime}} - {!! $item->judul !!}
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
<!-- Modal Anime Trending Hari Ini -->
<div class="modal fade" id="AnimeTrendingHariIni" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Anime Trending Hari Ini</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                @foreach ($animeTrending as $item)
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
                    <img style="width:100%;height:200px" src="{{url($item->foto)}}" class="img-fluid position-relative mx-auto"/>
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

@endsection