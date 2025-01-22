<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('vendor/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset("vendor/chartist/css/chartist.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

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

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi {{ auth()->user()->name ?? '' }}, welcome back!</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Total Orders</div>
                                    <div class="stat-digit">{{ $counts->total_order }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa-solid fa-clock"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Pending</div>
                                    <div class="stat-digit">{{ $counts->pending_orders }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa-solid fa-truck-fast"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Dispatched</div>
                                    <div class="stat-digit">{{ $counts->dispatched_orders }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa-solid fa-handshake-angle"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Delivered</div>
                                    <div class="stat-digit">{{ $counts->delivered_orders }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Categories</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <tbody id="product-category">
                                            <tr>
                                                <td>Class Test</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>

    <script src="{{ asset('vendor/chartist/js/chartist.min.js') }}"></script>

    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/pg-calendar/js/pignose.calendar.min.js') }}"></script>


    <script src="{{ asset('js/dashboard/dashboard-2.js') }}"></script>
    <!-- Circle progress -->

    <script>
        const productCategories = () => {
            const tbody = $('#product-category');
            tbody.empty();

            $.ajax({
                url: '{{ route('category-listing') }}',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    response.forEach(function(category) {
                        const url = `{{ route('product-details', ':id') }}`.replace(':id', category.id);
                        const tr = $('<tr></tr>');
                        const a = $('<a></a>')
                            .text(category.category_name)
                            .attr('href', url)
                        const td = $('<td></td>').append(a);
                        tr.append(td);
                        tbody.append(tr);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching categories:', error);
                }
            });
        };
        productCategories();

    </script>
</body>

</html>