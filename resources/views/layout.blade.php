<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="@yield('deskripsi','Nonton Anime Gratis tanpa iklan')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ cb()->getAppName() }} - @yield('title','Nonton Anime Gratis')</title>
    <link rel="stylesheet" href="{{ url('/') }}/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/styles.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="{{ url('/') }}">{{ cb()->getAppName() }}</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('SemuaAnime') }}">Anime</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('SemuaVideo') }}">Video</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('JadwalRilis') }}">Jadwal Rilis</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="modal" data-target="#cariAnime" href="#cariAnime">Cari Anime</a></li>
                    @if(!cb()->session()->id())
                    <?php session(['lite_mode' => false]); ?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ url(cb()->getAdminPath().'/login') }}">Login</a></li>
                    @else
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ url(cb()->getAdminPath()) }}">Member</a></li>
                    @endif
                    @if (session('lite_mode',false))
                        <li class="nav-item" role="presentation"><a class="nav-link btn btn-primary text-light" href="{{ route('LiteMode') }}" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Kembali Kesemula <em>(Dengan Gambar)</em>">Default Mode</a></li>
                    @else
                        <li class="nav-item" role="presentation"><a class="nav-link btn btn-primary text-light" href="{{ route('LiteMode') }}" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Mode Hemat Kuota <em>(Tanpa Gambar)</em>">Lite Mode</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <main class="clean-block clean-form dark pt-5">
        <div class="container">
            @foreach ($pengumuman as $item)
            <div class="alert alert-primary" role="alert">
                <b>{!! $item->judul !!}</b>, {{ $item->isi }}
            </div>
            @endforeach
            @yield('content')
        </div>
    </main>
    <footer class="p-4">
        <div class="row">
            <div class="col">
                <p class="text-monospace text-center">{{ cb()->getAppName() }} &COPY; {{ date('Y') }}</p>
            </div>
        </div>
    </footer>
    <!-- Modal Cari Anime -->
    <div class="modal fade" id="cariAnime" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cari Anime</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('CariAnime')}}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="cari" class="form-control" placeholder="Judul Anime">
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-secondary" value="cari">
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="{{ url('/') }}/assets/js/script.min.js"></script>
    <script>
    $(document).on('click', '.rating', function(event){
        var cek = $(event.currentTarget).attr('href');
        cek = cek.replace('#','')
        cek = cek.split('-')
        $.get( "{{route('RatingAnime',['rating'=>'','id_anime'=>''])}}/"+cek[0]+"/"+cek[1], function( data ) {
            alert('Berhasil Memberikan Rating');
        });
    });
    $(document).on('click', '.vote', function(event){
        var cek = $(event.currentTarget).attr('href');
        cek = cek.replace('#','')
        cek = cek.split('-')
        $.get( "{{route('VoteAnime',['tipe'=>'','id_anime'=>''])}}/"+cek[0]+"/"+cek[1], function( data ) {
            alert('Berhasil '+data);
        });
    });
    </script>
</body>

</html>