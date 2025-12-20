@extends('front.layout.master')



@section('content')
    <div class="container py-5 " style="margin-top: 100px;">
        <h2 class="text-center mb-5 fw-bold">ثبت نهایی سفارش</h2>

        <div class="row">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>خطا در اطلاعات وارد شده:</strong>
                    <ul class="mt-2 mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
                @if(session()->has('errorPortal'))
                    <p class="alert alert-danger">{{session('errorPortal')}}</p>
                @endif
            <!-- فرم اطلاعات ارسال -->
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">اطلاعات گیرنده</h5>
                        <form action="{{route('checkout.pay.submit')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">نام و نام خانوادگی <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">موبایل <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control" required value="{{ old('mobile') }}" placeholder="09123456789">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">استان <span class="text-danger">*</span></label>
                                    <input type="text" name="state" class="form-control" required value="{{ old('state') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">شهر <span class="text-danger">*</span></label>
                                    <input type="text" name="city" class="form-control" required value="{{ old('city') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">آدرس کامل <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control" rows="4" required>{{ old('address') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">کد پستی <span class="text-danger">*</span></label>
                                <input type="text" name="postal_code" class="form-control" required value="{{ old('postal_code') }}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">روش ارسال <span class="text-danger">*</span></label>
                                <select name="send_method_id" class="form-select" required>
                                    <option value="">انتخاب کنید</option>
                                    @foreach($sends as $send)
                                        <option value="{{ $send->id }}">{{ $send->name }} --{{$send->description}} </option>
                                    @endforeach
                                </select>
                            </div>
                             <p> ثبت سفارش و خرید به معنای پذیرش <a href="{{route('front.rules')}}">قوانین سایت</a> میباشد.  </p>
                            <button type="submit" class="btn btn-success btn-lg w-100">
                                ثبت سفارش و پرداخت
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- خلاصه سفارش -->
            <div class="col-lg-4">
                <div class="card shadow-sm sticky-top" style="top: 100px;">
                    <div class="card-body">
                        <h5 class="card-title mb-4">خلاصه سفارش</h5>
                        <div class="border-bottom pb-3 mb-3">
                            @foreach($cart as $key => $item)
                                <div class="d-flex justify-content-between mb-2 small">
                                    <span>{{ $item['product_name'] }}  × {{$item['color_name']}}×{{ $item['size_name'] }}× {{ $item['quantity'] }}</span>
                                    <span>{{ number_format($item['price'] * $item['quantity']) }} تومان</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-between fs-5 fw-bold">
                            <span>جمع کل:</span>
                            <span class="text-danger">{{ number_format($totalAmount) }} تومان</span>
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
