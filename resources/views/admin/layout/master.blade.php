<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="">
    <link rel="icon" type="image/png" href="">

    <!-- برای دستگاه‌های اپل -->
    <link rel="apple-touch-icon" href="">

    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/css/persian-datepicker.min.css')}}"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <!-- FixedHeader و FixedColumns (آخرین نسخه) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>



    <style>
        #exitBtn:hover {
            background-color: darkred;
            border-radius: 10px;
        }
    </style>

</head>
<body>
<button id="toggleSidebar">
    <i class="fas fa-bars"></i>
</button>

<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">

        </div>
        <div class="admin-info">

            <div class="admin-details">
                <span class="admin-name"></span>
                <span class="admin-role"> </span>
            </div>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-item">
            <a href="{{route('admin.index')}}"  >
                <i class="bi bi-house-fill"></i>
                <span>خانه</span>
            </a>
        </li>


            <li class="menu-item">
                <a href="{{route('admin.list')}}"  >
                    <i class="bi bi-person-gear"></i>
                    <span> مدیریت ادمین ها</span>
                </a>
            </li>
        <li class="menu-item">
            <a href="{{route('admin.category.list')}}"  >
                <i class="bi bi-tags"></i>
                <span>   دسته بندی محصولات</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.product.index')}}"  >
                <i class="bi bi-basket"></i>
                <span>    محصولات</span>
            </a>
        </li>




        <form method="post" action="{{route('logout')}}">
          @csrf
            <li class="menu-item" id="exitBtn">
                <button  type="submit" class="btn  " style="color: lightgrey;" >
                    <i class="fas fa-sign-out-alt"></i>
                    <span>خروج </span>


                </button>
            </li>
        </form>

    </ul>
</div>

<div class="main-content">
    <div  class="dynamic-content">


        <!-- محتوای پیش‌فرض (داشبورد) -->
        <div class="page-header">
            <h1 class="page-title">
                @yield('title')

            </h1>

        </div>

        <div class="stats-container">
            @yield('content')
        </div>

    </div>
</div>
<script src="{{asset('admin/js/persian-date.min.js')}}"></script>
<script src="{{asset('admin/js/persian-datepicker.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.7/i18n/fa.json"
            },
            "paging": true,
            "ordering": true,
            "info": true,
            "responsive": true,
            "autoWidth": false,
            "order": [[1, "asc"]] // مثلاً بر اساس نام دسته‌بندی مرتب کنه
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#persianDate').persianDatepicker({
            format: 'YYYY/MM/DD', // فقط سال/ماه/روز
            timePicker: {
                enabled: false // غیرفعال کردن انتخاب زمان
            },
            toolbox: {
                calendarSwitch: {
                    enabled: false // غیرفعال کردن سوئیچ تقویم
                }
            },
            observer: true,
            altField: '#dateInput'
        });
    });
</script>
<script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('active');

        // اختیاری: وقتی سایدبار باز میشه، یه اورلی تیره بذاریم که با کلیک خارج از منو بسته بشه
        document.body.classList.toggle('sidebar-open');
    });

    // بستن منو با کلیک بیرون از آن (در موبایل)
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 992) {
            if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                sidebar.classList.remove('active');
                document.body.classList.remove('sidebar-open');
            }
        }
    });

    // وقتی اندازه صفحه تغییر کرد و بزرگ شد، مطمئن بشیم سایدبار باز باشه
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992) {
            sidebar.classList.remove('active');
            document.body.classList.remove('sidebar-open');
        }
    });
</script>
</body>
</html>

