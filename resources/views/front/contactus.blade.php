{{-- resources/views/front/contact.blade.php --}}

@extends('front.layout.master')


@section('content')

    <section class="py-5" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('front/assets/images/about-hero.jpg') }}') no-repeat center center/cover; color: white;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-end">
                    <h1 class="display-4 fw-bold mb-4">تماس با ما</h1>
                    <p class="lead">نمایندگی رسمی برند معتبر The North Face در ایران</p>
                </div>
                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                    <img src="{{asset('front/assets/The-North-Face-Logo.png')}}" alt="لوگو نورث فیس" class="img-fluid" style="max-height: 200px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <h2 class="display-5 fw-bold mb-4 text-primary">اطلاعات تماس</h2>
                    <div class="d-flex align-items-start mb-4">
                        <i class="bi bi-geo-alt-fill fs-3 text-primary me-3"></i>
                        <div>
                            <h5>آدرس فروشگاه</h5>
                            <p class="lead text-muted mb-0">
                                تهران، میدان انقلاب، ابتدای خیابان جمالزاده جنوبی، مجتمع آفتاب، طبقه دهم، واحد 1011
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="bi bi-telephone-fill fs-3 text-primary me-3"></i>
                        <div>
                            <h5>تلفن تماس</h5>
                            <p class="lead text-muted mb-0">09123579250</p>
                        </div>
                    </div>
                  {{--  <div class="d-flex align-items-center mb-4">
                        <i class="bi bi-envelope-fill fs-3 text-primary me-3"></i>
                        <div>
                            <h5>ایمیل</h5>
                            <p class="lead text-muted mb-0">info@northfaceiran.com (اگر ایمیل دارید جایگزین کنید)</p>
                        </div>
                    </div>--}}
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{asset('front/assets/enghelab.jpg')}}" alt="میدان انقلاب تهران" class="img-fluid rounded shadow mb-4">
                    <p class="text-muted"> میدان انقلاب تهران</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center display-5 fw-bold mb-5">مکان ما روی نقشه</h2>
            <div class="ratio ratio-21x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.212345678901!2d51.392345!3d35.699876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzXCsDQxJzU5LjYiTiA1McKwMjMnMzIuNCJF!5e0!3m2!1sfa!2sir!4v1720000000000" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <p class="text-center text-muted mt-3">برای مسیر دقیق، می‌توانید در گوگل مپس جستجو کنید: "مجتمع آفتاب جمالزاده تهران"</p>
        </div>
    </section>



    <!-- Call to Action -->
    <section class="py-5 text-center" style="background-color: #000; color: white;">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4">سوالی دارید؟ با ما تماس بگیرید!</h2>
            <a href="tel:09123579250" class="btn btn-warning btn-lg px-5 py-3">تماس تلفنی: 09123579250</a>
        </div>
    </section>

@endsection
