@extends('crudbooster::themes.adminlte.layout.layout_login')
@section('content')

    @if(!getSetting("login_logo"))
        <a href="{{url('')}}"><h1 style="text-align: center">{{ cb()->getAppName() }}</h1></a>
    @endif

    <p class='login-box-msg text-muted' style="text-align: center">Anda Harus Login Terlebih Dahulu</p>

    @include(themeFlashMessageAlert())

    <form id="form-login" autocomplete='off' action="{{ route('AdminAuthControllerPostLogin') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group has-feedback">
            <label for="">Email</label>
            <input autocomplete='off' type="email" class="form-control" name='email' required placeholder="Isi Email anda disini"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <label for="">Password</label>
            <input autocomplete='off' type="password" class="form-control" name='password' required placeholder="Isi Password anda disini"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div style="margin-bottom:10px" class='row'>
            <div class='col-xs-12'>
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __("cb::cb.sign_in")}}</button>

                <br>
                <div class="row">
                    @if(getSetting("enable_register"))
                        <div class="col-sm-6">
                            <div align="left"><a style="text-decoration: underline" href="javascript:;" onclick="showRegister()">Belum Memiliki Akun?</a></div>
                        </div>
                    @endif

                    @if(getSetting("enable_forget"))
                    <div class="col-sm-6">
                        <div align="right">
                            <a href="javascript:;" onclick="showForget()" style="text-decoration: underline">Lupa Password?</a>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </form>

    @if(getSetting("enable_forget"))
    <form id="form-forget" style="display: none;" autocomplete='off' action="{{ route('AdminAuthControllerPostForget') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group has-feedback">
            <label for="">Email</label>
            <input autocomplete='off' type="email" class="form-control" name='email' required placeholder="Isi dengan email yang sudah terdaftar"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <div class="help-block">Pastikan bahwa email anda terdaftar pada sistem kami</div>
        </div>
        <div style="margin-bottom:10px" class='row'>
            <div class='col-xs-12'>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
                <p></p>
                <p>
                    <a href="javascript:;" onclick="showLogin()" style="text-decoration: underline">&laquo; Kembali ke Login</a>
                </p>
            </div>
        </div>
    </form>
    @endif

    @if(getSetting("enable_register"))
        <form id="form-register" style="display: none;" autocomplete='off' action="{{ route('AdminAuthControllerPostRegister') }}" method="post">
            {!! csrf_field() !!}
            <div class="form-group has-feedback">
                <label for="">Nama</label>
                <input autocomplete='off' type="text" class="form-control" name='name' required />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <label for="">Email</label>
                <input autocomplete='off' type="email" class="form-control" name='email' required />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <label for="">Password</label>
                <input autocomplete='off' type="password" class="form-control" name='password' required placeholder="Isi Password anda disini"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <label for="">Captcha</label>
                <p>Berapa Jumlah Dari {{ $no1 }} and {{ $no2 }}</p>
                <input autocomplete='off' type="text" placeholder="Isi jawabanya disini" class="form-control" name='captcha' required />

                <div class="help-block">Pastikan anda mengisinya</div>
            </div>
            <div style="margin-bottom:10px" class='row'>
                <div class='col-xs-12'>
                    <button type="submit" class="btn btn-success btn-block btn-flat">{{ cbLang("register") }}</button>
                    <p></p>
                    <p>
                        <a href="javascript:;" onclick="showLogin()" style="text-decoration: underline">&laquo; Kembali ke Login</a>
                    </p>
                </div>
            </div>
        </form>
    @endif

    @push('bottom')
        <script>

            function showLogin() {
                $("form").hide()
                $("#form-login").fadeIn();
            }
            function showRegister() {
                $("form").hide()
                $("#form-register").fadeIn();
            }
            function showForget() {
                $("form").hide()
                $("#form-forget").fadeIn();
            }
        </script>
    @endpush

@endsection