<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Order List</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('vendor/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/chartist/css/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>
    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="index.html" class="brand-logo">
            <img class="logo-abbr" src="{{asset('images/abc_shopy.png')}}" alt="">
            <img class="logo-compact" src="{{asset('images/abc_shopy.png')}}" alt="">
            <img class="brand-title" src="{{asset('images/abc_shopy.png')}}" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->
    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="quixnav">
        <div class="quixnav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label first">Main Menu</li>
                <li><a href="{{ route('dashboard') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                    class="nav-text">Dashboard</span></a></li>
                
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-chart-bar-33"></i><span class="nav-text">Product</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('product-category') }}">Category</a></li>
                        <li><a href="{{ route('product-listing') }}">Details</a></li>
                    </ul>
                </li>  
                <li><a href="{{ route('order-report') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                    class="nav-text">Orders</span></a></li>
                <li><a href="{{ route('logout') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                    class="nav-text">LogOut</span></a></li>
            </ul>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->
    <div id="main-wrapper">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Order List</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Orders</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">Sl No</th>
                                                <th>Order Id</th>
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                                <th>Status</th>
                                                <th>Order Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $key => $order)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $order->order_id ?? '--' }}</td>
                                                    <td>{{ $order->product->product_name ?? '--' }}</td>
                                                    <td>{{ $order->product->category->category_name ?? '--' }}</td>
                                                    <td>{{ $order->quantity ?? '--' }}</td>
                                                    <td>RS {{ $order->total_price ?? '--' }}</td>
                                                    <td>{{ $order->order->status ?? '--' }}</td>
                                                    <td>{{ $order->order->order_date ?? '--' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed & Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('vendor/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/dashboard-2.js') }}"></script>
</body>

</html>
