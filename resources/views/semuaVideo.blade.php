@extends('main')
@section('title','Semua Video')
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
                <img src="{{url($item->foto)}}" width="100%" />
                @else
                <div class="card h-100">
                    <div class="card-body text-center text-dark">
                        {{$item->judul_anime}} - {{$item->judul}}
                    </div>
                </div>
                @endif
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