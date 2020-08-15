@extends('main')
@section('title','Genre '.$title)
@section('deskripsi','Semua Anime dengan Genre '.$title)
@section('main')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Genre {{$title}}</h4>
        <div class="row">
            @foreach ($anime as $item)
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
        <div class="row mt-2 float-right">
            <div class="col">
                {{ $anime->links() }}
            </div>
        </div>
    </div>
</div>
@endsection