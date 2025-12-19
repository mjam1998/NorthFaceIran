@extends('front.layout.master')

@section('page_title', 'پیگیری سفارش')

@section('content')
    <div class="container py-5" style="margin-top: 100px; min-height: 70vh;">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5 text-center">
                        <i class="bi bi-box-seam-fill text-primary display-1 mb-4"></i>
                        <h2 class="fw-bold mb-4">پیگیری سفارش</h2>
                        <p class="text-muted mb-5">برای مشاهده وضعیت سفارش خود، کد پیگیری را وارد کنید.</p>

                        <form action="{{ route('order.track.result') }}" method="POST" class="mx-auto" style="max-width: 400px;">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="track_number" class="form-control form-control-lg text-center"
                                       placeholder="کد پیگیری (مثل VEMQEI90M)"
                                       value="{{ old('track_number') }}"
                                       required
                                       dir="ltr">
                                <button class="btn btn-primary btn-lg" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>

                            @error('track_number')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </form>

                        <div class="mt-5 text-muted small">
                            <p>کد پیگیری در پیامک تأیید سفارش برای شما ارسال شده است.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.navbar').classList.add('force-white');
    </script>
@endsection
