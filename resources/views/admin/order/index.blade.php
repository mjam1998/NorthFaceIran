@extends('admin.layout.master')

@section('title', 'مدیریت سفارش‌های پرداخت‌شده')

@section('content')

    <div class="container-fluid">
        <h3 class="mb-4">سفارشات </h3>
       @if(session()->has('success'))
           <p class="alert alert-success">{{session('success')}}</p>
       @endif

                <div class="table-container  " style="margin-top: 50px;">
                    <table id="datatable" class=" table table-hover table-bordered mt-3  mb-3  ">
                        <thead class="table-dark">
                        <tr >
                            <th  style="text-align: center;">کد پیگیری</th>
                            <th  style="text-align: center;">وضعیت پرداخت</th>
                            <th  style="text-align: center;">وضعیت ارسال</th>
                            <th  style="text-align: center;">تاریخ پرداخت</th>
                            <th  style="text-align: center;">مبلغ کل</th>
                            <th  style="text-align: center;">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td  style="text-align: center;"><strong>{{ $order->track_number }}</strong></td>
                                <td  style="text-align: center;">
                                    <span class="badge {{ $order->is_paid ? 'bg-success' : 'bg-danger' }}">
                                        {{ $order->is_paid ? 'پرداخت شده' : 'پرداخت نشده' }}
                                    </span>
                                </td>
                                <td  style="text-align: center;">
                                    @php
                                        $statusText = [1 => 'ارسال شده', 2 => 'در انتظار ارسال', 3 => 'کنسل شده'][$order->status] ?? 'نامشخص';
                                        $statusColor = [1 => 'bg-info', 2 => 'bg-warning', 3 => 'bg-danger'][$order->status] ?? 'bg-secondary';
                                    @endphp
                                    <span class="badge {{ $statusColor }}">{{ $statusText }}</span>
                                </td  >
                                <td  style="text-align: center;" dir="ltr">
                                    {{ $order->paid_at ? \Morilog\Jalali\Jalalian::forge($order->paid_at)->format('Y/m/d H:i') : '-' }}
                                </td>
                                <td  style="text-align: center;">{{ number_format($order->total_amount) }} تومان</td>
                                <td  style="text-align: center;">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">
                                        <i class="bi bi-eye"></i> جزئیات
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


        <!-- تمام مودال‌ها اینجا، خارج از جدول -->
        @foreach($orders as $order)
            <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">جزئیات سفارش #{{ $order->id }} - کد پیگیری: {{ $order->track_number }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <!-- اطلاعات مشتری -->
                            <div class="row mb-4">
                                <div class="col-md-6"><strong>نام:</strong> {{ $order->name }}</div>
                                <div class="col-md-6"><strong>موبایل:</strong> {{ $order->mobile }}</div>
                                <div class="col-md-6"><strong>شماره پیگیری درگاه بانکی:</strong> {{ $order->trans_id }}</div>
                                <div class="col-md-6"><strong>وضعیت پرداخت:</strong>
                                   @if($order->is_paid == 1)
                                       پرداخت شده {{    \Morilog\Jalali\Jalalian::forge($order->paid_at)->format('Y/m/d h:i' )  }}
                                   @endif
                                    @if($order->is_paid == 0)
                                        پرداخت نشده
                                    @endif

                                </div>
                                <div class="col-md-6"><strong>کد پستی:</strong> {{ $order->postal_code }}</div>
                                <div class="col-md-6"><strong>وضعیت ارسال:</strong>
                                    @if($order->status ==1)
                                       ارسال شده {{    \Morilog\Jalali\Jalalian::forge($order->send_at)->format('Y/m/d')  }}

                                    @else
                                        ارسال نشده
                                    @endif


                                </div>
                                <div class="col-12 mt-2"><strong>آدرس:</strong> {{ $order->state }}، {{ $order->city }}، {{ $order->address }}</div>
                                <div class="col-12 mt-2"><strong>روش ارسال:</strong> {{ $order->send_method->name }}، {{$order->send_method->description }}</div>
                            </div>

                            <!-- محصولات -->
                            <h6 class="fw-bold mb-3">محصولات سفارش</h6>
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                    <tr >
                                        <th >محصول</th>
                                        <th>رنگ</th>
                                        <th>سایز</th>
                                        <th>تعداد</th>
                                        <th>قیمت واحد</th>
                                        <th>جمع</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->product_color->name ?? '-' }}</td>
                                            <td>{{ $item->product_size->name ?? '-' }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->price - $item->discount) }} تومان</td>
                                            <td>{{ number_format(($item->price - $item->discount) * $item->quantity) }} تومان</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- مالی -->
                            <div class="row text-lg mb-4">
                                <div class="col-md-6"><strong>مبلغ کل کالا:</strong> {{ number_format($order->total_amount) }} تومان</div>
                                <div class="col-md-6"><strong>مبلغ پرداختی:</strong> <span class="text-success fw-bold">{{ number_format($order->pay_amount) }} تومان</span></div>
                                @if($order->total_amount > $order->pay_amount)
                                    <div class="col-12 text-danger mt-2"><strong>تخفیف اعمال شده:</strong> {{ number_format($order->total_amount - $order->pay_amount) }} تومان</div>
                                @endif
                            </div>

                            <hr>

                            <!-- تغییر وضعیت ارسال -->
                            <form action="{{ route('admin.order.update-status', $order) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">تعیین وضعیت ارسال</label>
                                        <select name="status" class="form-select" id="statusSelect{{ $order->id }}" onchange="toggleSendDate({{ $order->id }})">
                                            <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>در انتظار ارسال</option>
                                            <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>ارسال شده</option>
                                            <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>کنسل شده</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6" id="sendDateContainer{{ $order->id }}" style="display: {{ $order->status == 1 ? 'block' : 'none' }};">
                                        <label class="form-label fw-bold">تعیین تاریخ ارسال  </label>
                                        <input type="text" name="send_at" class="form-control persian-datepicker" >
                                    </div>
                                </div>
                                <div class=" text-end" style="margin-top: 180px;">
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-check-lg"></i> بروزرسانی وضعیت
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function toggleSendDate(orderId) {
            const select = document.getElementById('statusSelect' + orderId);
            const container = document.getElementById('sendDateContainer' + orderId);

            if (select.value == '1') {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
                container.querySelector('input').value = '';
            }
        }

        $(document).ready(function() {
            // فعال کردن Persian Datepicker
            $('.persian-datepicker').persianDatepicker({
                format: 'YYYY/MM/DD',
                autoClose: true,
                observer: true
            });

            // فعال کردن DataTables
            $('#ordersTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/fa.json'
                },
                responsive: true,
                order: [[3, 'desc']], // مرتب‌سازی بر اساس تاریخ پرداخت
                pageLength: 25
            });
        });



    </script>

@endsection
