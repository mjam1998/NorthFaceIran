
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title با پیش‌فرض -->
    <title>@yield('page_title', 'Northface Iran - تجهیزات حرفه‌ای کوهنوردی و طبیعت‌گردی نورث فیس')</title>

    <!-- Meta Description با پیش‌فرض -->
    <meta name="description" content="@yield('meta_description', 'فروشگاه رسمی نورث فیس ایران | کاپشن، کفش کوهنوردی، کوله‌پشتی و تجهیزات کمپینگ اورجینال با ضمانت اصالت و ارسال رایگان')">

    <!-- سایر متا تگ‌های پایه برای SEO بهتر -->
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="نورث فیس, کاپشن نورث فیس, کفش کوهنوردی, کوله پشتی, تجهیزات کوهنوردی, northface iran">

    <!-- Open Graph پایه (برای اشتراک در شبکه‌های اجتماعی) -->
    <meta property="og:title" content="@yield('page_title', 'Northface Iran')">
    <meta property="og:description" content="@yield('meta_description', 'تجهیزات حرفه‌ای کوهنوردی و طبیعت‌گردی نورث فیس')">
    <meta property="og:image" content="{{ asset('front/assets/default.svg') }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="website">


    <!-- Bootstrap 5 RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Google Fonts - Vazirmatn -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <!-- Swiper.js for slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('front/assets/app.css')}}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <!-- لوگو -->
        <a class="navbar-brand" href="#">
            <img src="{{asset('front/assets/default.svg')}}" style="height: 60px; width: 60px;" alt="northFace iran">
        </a>

        <!-- دکمه همبرگری + آیکون‌های موبایل (همیشه در موبایل نمایش داده میشه) -->
        <div class="d-flex align-items-center gap-3 d-lg-none">
            <!-- جستجوی موبایل -->
            <div class="position-relative">
                <form method="get" action="{{ route('front.search') }}">
                    <input type="text" placeholder="جستجو..." name="search" class="search-input-clean mobile-search" autocomplete="off">
                    <i class="bi bi-search search-icon-submit position-absolute end-0 top-50 translate-middle-y" style="font-size: 18px; color: #ccc;"></i>
                </form>

            </div>

            <!-- سبد خرید موبایل -->
            <a href="{{route('front.cart.list')}}" class="text-white position-relative">
                <i class="bi bi-bag" style="font-size: 24px;"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-badge-count">
    0
</span>

            </a>

            <!-- دکمه منو موبایل -->
            <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- منوی اصلی + جستجو و سبد در دسکتاپ -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{route('home.index')}}">صفحه اصلی</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">محصولات</a>
                    <ul class="dropdown-menu">
                        @foreach($menuCategories as $category)
                            <li><a class="dropdown-item" href="{{route('front.category.show', $category->slug)}}">{{$category->name}}</a></li>
                        @endforeach


                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route('order.track.form')}}">پیگیری سفارش</a></li>
                <li class="nav-item"><a class="nav-link" href="#">تماس با ما</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('front.articles.show')}}">بلاگ</a></li>
            </ul>

            <!-- فقط در دسکتاپ: جستجو + سبد خرید -->
            <div class="d-none d-lg-flex align-items-center gap-4">
                <div class="position-relative">
                    <form method="get" action="{{ route('front.search') }}">
                        <input type="text" name="search" placeholder="جستجو در فروشگاه..." class="search-input-clean" autocomplete="off">
                        <button type="submit"
                                class="bg-transparent border-0 position-absolute end-0 top-50 translate-middle-y"
                                style="z-index: 3;">
                            <i class="bi bi-search" style="font-size: 18px; color: #ccc;"></i>
                        </button>

                    </form>

                </div>

                <!-- پیش‌نمایش سبد خرید در دسکتاپ -->
                <a href="{{route('front.cart.list')}}" class="text-white position-relative">
                    <i class="bi bi-bag" style="font-size: 24px;"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-badge-count">
    0
</span>

                </a>
            </div>
        </div>
    </div>
</nav>


@yield('content')


<hr class="bg-secondary" style="border-top: 1px solid black;">
<!-- Footer -->
<footer >
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <a  href="#">
                    <img src="{{asset('front/assets/default.svg')}}" style="height: 80px; width: 80px;" alt="لوگو">
                </a>
                <p style="color: black;">تجهیزات حرفه‌ای کوهنوردی و طبیعت‌گردی  نورث فیس با ضمانت اصالت و کیفیت</p>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class=" mb-4" style="color: black;">لینک‌های سریع</h5>
                <ul class="list-unstyled">
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">تماس با ما</a></li>
                    <li><a href="#">قوانین سایت</a></li>
                    <li><a href="#">حریم خصوصی</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6 mb-4">
                <h5  class=" mb-4" style="color: black;">ارتباط با ما</h5>
                <p style="color: black;">تلفن: ۰۲۱-۸۸۷۷۶۶۵۵</p>
                <p style="color: black;">ایمیل: info@diaco.shop</p>
                <div class="mt-3">
                    <a href="#" class=" me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" ><i class="fab fa-telegram fa-lg"></i></a>
                    <a href="#" ><i class="fab fa-whatsapp fa-lg"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <h5  class=" mb-4" style="color: black;">مجوزها و اینماد</h5>

            </div>
        </div>
        <hr class="bg-secondary" style="border-top: 1px solid black; width: 100%;" >
        <div class="text-center py-3">
            <p style="color: black;">&copy; ۱۴۰۴ Northface Iran - تمامی حقوق محفوظ است.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap + Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.navbar');

        if (window.scrollY > 120) { // بعد از ۱۲۰ پیکسل اسکرول
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // اگر کاربر صفحه رو رفرش کرد وسط صفحه
    window.addEventListener('load', function () {
        if (window.scrollY > 120) {
            document.querySelector('.navbar').classList.add('scrolled');
        }
    });
    document.querySelectorAll('.search-icon-submit').forEach(icon => {
        icon.addEventListener('click', function () {
            this.closest('form').submit();
        });
    });
</script>
<script>
    function updateCartBadge(totalItems) {
        const badges = document.querySelectorAll('.badge.bg-danger'); // یا '.cart-badge-count' اگر class خاص دادی

        badges.forEach(badge => {
            if (totalItems > 0) {
                badge.textContent = totalItems;
                badge.style.display = 'inline'; // یا 'block' بسته به موقعیت
            } else {
                badge.style.display = 'none';
            }
        });
    }

    // وقتی صفحه لود شد، بج رو با تعداد اولیه پر کن
    document.addEventListener('DOMContentLoaded', function () {
        const initialCount = {{ array_sum(array_column(session('cart', []), 'quantity')) }};
        updateCartBadge(initialCount);
    });
</script>

</body>
</html>

