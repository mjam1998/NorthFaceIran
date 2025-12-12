@extends('front.layout.master')

@section('content')

    <div class="container  mb-5" style="margin-top: 150px;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="p-5" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); ;">
                    <h2 class="mb-3" style="color: #00a036;">ورود به حساب کاربری</h2>
                    <p>برای ورود به حساب کاربری لطفا شماره موبایل و رمز خود را وارد کنید:</p>
                    @if(session()->has('loginError'))
                        <p class="alert alert-danger">{{session('loginError')}}</p>
                    @endif


                    <form method="post" action="{{route('login.post')}}">
                        @csrf


                        <div class="form-group mt-2">
                            <label class="text-dark"> شماره همراه</label>
                            <input class="form-control text-dark" name="mobile" style="direction: ltr;" type="text" placeholder="09-------" required>
                        </div>

                        <div class="form-group mt-2">
                            <label class="text-dark"> رمز عبور </label>
                            <input class="form-control text-dark" name="password" style="direction: ltr;" type="text" placeholder="*********" required>
                        </div>

                        <div class="form-group mt-3">
                            <button class="btn " type="submit" style="background-color: #00a036; color: white; width: 100%;">ورود</button>
                        </div>
                    </form>

                </div>

            </div>
            <div class="col-md-4"></div>
        </div>

    </div>
    <script>
        document.querySelector('.navbar').classList.add('force-white');
    </script>
@endsection
