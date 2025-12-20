

@extends('front.layout.master')


@section('content')

    <!-- Hero Section -->
    <section class="py-5" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('front/assets/images/about-hero.jpg') }}') no-repeat center center/cover; color: white;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-end">
                    <h1 class="display-4 fw-bold mb-4">درباره نورث فیس ایران</h1>
                    <p class="lead">نمایندگی رسمی برند معتبر The North Face در ایران</p>
                </div>
                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                    <img src="{{asset('front/assets/The-North-Face-Logo.png')}}" alt="لوگو نورث فیس" class="img-fluid" style="max-height: 200px;">
                </div>
            </div>
        </div>
    </section>

    <!-- About Brand Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center flex-row-reverse flex-lg-row">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4 text-primary">تاریخچه برند نورث فیس</h2>
                    <p class="lead text-muted">
                        نورث فیس (The North Face) یک برند معتبر آمریکایی در حوزه پوشاک و تجهیزات تخصصی فضای باز است که در سال ۱۹۶۶ در ایالت کالیفرنیا تأسیس شد. نام این برند برگرفته از سردترین و چالش‌برانگیزترین سمت کوه‌هاست و نشان‌دهنده روح ماجراجویی و استقامت آن می‌باشد.
                    </p>
                    <p class="lead text-muted">
                        نورث فیس با تمرکز بر طراحی و تولید لباس‌ها و تجهیزات کوهنوردی، طبیعت‌گردی و فعالیت‌های ماجراجویانه، همواره کیفیت و دوام را در اولویت قرار داده است. استفاده از فناوری‌های پیشرفته برای عایق حرارتی، مقاومت در برابر آب و شرایط سخت محیطی از ویژگی‌های شاخص محصولات این برند است.
                    </p>
                </div>
                <div class="col-lg-6 text-center mb-4 mb-lg-0">
                    <img src="{{asset('front/assets/history.jfif')}}" alt="تاریخچه نورث فیس" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Products & Values Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center display-5 fw-bold mb-5">محصولات و ارزش‌های نورث فیس</h2>
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <img src="{{asset('front/assets/Vault-Backpack.png')}}" alt="کوله پشتی نورث فیس" class="img-fluid rounded shadow mb-3" style="height: 300px; object-fit: cover;">
                    <h4>کوله‌پشتی‌های حرفه‌ای</h4>
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{asset('front/assets/suit.jpg')}}" alt="تجهیزات نورث فیس" class="img-fluid rounded shadow mb-3" style="height: 300px; object-fit: cover;">
                    <h4>کاپشن و لباس‌های مقاوم</h4>
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{asset('front/assets/camp.jpg')}}" alt="کفش و تجهیزات کمپینگ" class="img-fluid rounded shadow mb-3" style="height: 300px; object-fit: cover;">
                    <h4>کفش و تجهیزات کمپینگ</h4>
                </div>
            </div>
            <div class="mt-5">
                <p class="lead text-center text-muted">
                    سبد محصولات نورث فیس شامل انواع کاپشن، کفش، کوله‌پشتی و تجهیزات کمپینگ می‌شود. این برند با حمایت از ورزشکاران حرفه‌ای و پروژه‌های اکتشافی، نقش فعالی در دنیای ماجراجویی ایفا می‌کند. همچنین توجه به حفظ محیط زیست و توسعه پایدار از ارزش‌های اصلی نورث فیس به شمار می‌رود. امروزه محصولات این برند در سراسر جهان مورد استقبال علاقه‌مندان به طبیعت و فعالیت‌های فضای باز قرار گرفته است.
                </p>
            </div>
        </div>
    </section>

    <!-- Iran Representative Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4 text-success">نمایندگی رسمی در ایران</h2>
                    <p class="lead text-muted">
                        پس از سال ها فعالیت در زمینه واردات انواع لوازم کوهنوردی و تجهیزات ورزشی مفتخریم که نمایندگی نورث فیس در ایران باشیم تا با خیال راحت بتوانید محصولات اصلی این برند با اصالت را خرید کنید و از تخفیفات ویژه و آفر های سایت اصلی استفاده کنید.
                    </p>
                    <p class="lead text-muted">
                        ما متعهد به ارائه محصولات اورجینال با ضمانت اصالت کالا هستیم و ارسال رایگان به سراسر کشور داریم.
                    </p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{asset('front/assets/mountain.jpg')}}" alt="ماجراجویی در کوهستان" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 text-center" style="background-color: #000; color: white;">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4">آماده ماجراجویی هستید؟</h2>
            <a href="{{ route('home.index') }}" class="btn btn-warning btn-lg px-5 py-3">مشاهده محصولات</a>
        </div>
    </section>

@endsection
