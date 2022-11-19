<template>
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome !</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Welcome !</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Sales</span>
                            <h4 class="mb-3">
                                $<span class="counter-value" data-target="354.5">0</span>k
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+$20.9k</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart1"  class="apex-charts"></div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Items</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="1256">0</span>
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart2" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col-->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Average Sales</span>
                            <h4 class="mb-3">
                                $<span class="counter-value" data-target="7.54">0</span>M
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+ $2.8k</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart3" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Order Delivery</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="18.34">0</span>%
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+5.32%</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart4" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->    
    </div><!-- end row-->

    <div class="row">
        <div class="col-xl-8">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <h5 class="card-title me-2">Market Overview</h5>
                        <div class="ms-auto">
                            <div>
                                <button type="button" class="btn btn-soft-primary btn-sm">
                                    ALL
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    1M
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    6M
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm active">
                                    1Y
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-xl-8">
                            <div>
                                <div id="market-overview" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="p-4">
                                <div class="mt-0">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm m-auto">
                                            <span class="avatar-title rounded-circle bg-light text-dark font-size-13">
                                                1
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <span class="font-size-14">Mobile Phones</span>
                                        </div>

                                        <div class="flex-shrink-0">
                                            <span class="badge rounded-pill badge-soft-success font-size-12 fw-medium">+5.4%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm m-auto">
                                            <span class="avatar-title rounded-circle bg-light text-dark font-size-13">
                                                2
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <span class="font-size-14">Smart Watch</span>
                                        </div>

                                        <div class="flex-shrink-0">
                                            <span class="badge rounded-pill badge-soft-success font-size-12 fw-medium">+6.8%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm m-auto">
                                            <span class="avatar-title rounded-circle bg-light text-dark font-size-13">
                                                3
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <span class="font-size-14">Protable Acoustics</span>
                                        </div>

                                        <div class="flex-shrink-0">
                                            <span class="badge rounded-pill badge-soft-danger font-size-12 fw-medium">-4.9%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm m-auto">
                                            <span class="avatar-title rounded-circle bg-light text-dark font-size-13">
                                                4
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <span class="font-size-14">Smart Speakers</span>
                                        </div>

                                        <div class="flex-shrink-0">
                                            <span class="badge rounded-pill badge-soft-success font-size-12 fw-medium">+3.5%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm m-auto">
                                            <span class="avatar-title rounded-circle bg-light text-dark font-size-13">
                                                5
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <span class="font-size-14">Camcorders</span>
                                        </div>

                                        <div class="flex-shrink-0">
                                            <span class="badge rounded-pill badge-soft-danger font-size-12 fw-medium">-0.3%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <a href="#" class="btn btn-primary w-100">See All Balances <i
                                            class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row-->

        <div class="col-xl-4">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <h5 class="card-title me-2">Sales by Locations</h5>
                        <div class="ms-auto">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted font-size-12">Sort By:</span> <span class="fw-medium">World<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                    <a class="dropdown-item" href="#">USA</a>
                                    <a class="dropdown-item" href="#">Russia</a>
                                    <a class="dropdown-item" href="#">Australia</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="sales-by-locations" data-colors='["#33c38e"]' style="height: 253px"></div>

                    <div class="px-2 py-2">
                        <p class="mb-1">USA <span class="float-end">75%</span></p>
                        <div class="progress mt-2" style="height: 6px;">
                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                            </div>
                        </div>

                        <p class="mt-3 mb-1">Russia <span class="float-end">55%</span></p>
                        <div class="progress mt-2" style="height: 6px;">
                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="55">
                            </div>
                        </div>

                        <p class="mt-3 mb-1">Australia <span class="float-end">85%</span></p>
                        <div class="progress mt-2" style="height: 6px;">
                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="85">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Customer List</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown">
                            <a class=" dropdown-toggle" href="#" id="dropdownMenuButton2"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted">All Members<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="#">Members</a>
                                <a class="dropdown-item" href="#">New Members</a>
                                <a class="dropdown-item" href="#">Old Members</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->

                <div class="card-body px-0">
                    <div class="px-3" data-simplebar style="max-height: 386px;">
                        <div class="d-flex align-items-center pb-4">
                            <div class="avatar-md me-4">
                                <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Randy Matthews</a></h5>
                                <span class="text-muted">Randy@gmail.com</span>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <div class="dropdown align-self-start">
                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded font-size-24 text-dark"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy</a>
                                        <a class="dropdown-item" href="#">Save</a>
                                        <a class="dropdown-item" href="#">Forward</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center pb-4">
                            <div class="avatar-md me-4">
                                <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Vernon Wood</a></h5>
                                <span class="text-muted">Vernon@gmail.com</span>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <div class="dropdown align-self-start">
                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded font-size-24 text-dark"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy</a>
                                        <a class="dropdown-item" href="#">Save</a>
                                        <a class="dropdown-item" href="#">Forward</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center pb-4">
                            <div class="avatar-md me-4">
                                <img src="{{ URL::asset('assets/images/users/avatar-5.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Howard Rhoades</a></h5>
                                <span class="text-muted">Howard@gmail.com</span>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <div class="dropdown align-self-start">
                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded font-size-24 text-dark"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy</a>
                                        <a class="dropdown-item" href="#">Save</a>
                                        <a class="dropdown-item" href="#">Forward</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center pb-4">
                            <div class="avatar-md me-4">
                                <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Arthur Zurcher</a></h5>
                                <span class="text-muted">Arthur@gmail.com</span>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <div class="dropdown align-self-start">
                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded font-size-24 text-dark"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy</a>
                                        <a class="dropdown-item" href="#">Save</a>
                                        <a class="dropdown-item" href="#">Forward</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center pb-4">
                            <div class="avatar-md me-4">
                                <img src="{{ URL::asset('assets/images/users/avatar-8.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Angela Palmer</a></h5>
                                <span class="text-muted">Angela@gmail.com</span>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <div class="dropdown align-self-start">
                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded font-size-24 text-dark"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy</a>
                                        <a class="dropdown-item" href="#">Save</a>
                                        <a class="dropdown-item" href="#">Forward</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center pb-3">
                            <div class="avatar-md me-4">
                                <img src="{{ URL::asset('assets/images/users/avatar-9.jpg') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Dorothy Wimson</a></h5>
                                <span class="text-muted">Dorothy@gmail.com</span>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <div class="dropdown align-self-start">
                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded font-size-24 text-dark"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy</a>
                                        <a class="dropdown-item" href="#">Save</a>
                                        <a class="dropdown-item" href="#">Forward</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        
        <div class="col-xl-5">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Selling Products</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown align-self-start">
                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-horizontal-rounded font-size-18 text-dark"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Copy</a>
                                <a class="dropdown-item" href="#">Save</a>
                                <a class="dropdown-item" href="#">Forward</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </div>

                </div><!-- end card header -->

                <div class="card-body px-0 pt-2">
                        <div class="table-responsive px-3" data-simplebar style="max-height: 395px;">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="avatar-md me-4">
                                                <img src="{{ URL::asset('assets/images/product/img-1.png') }}" class="img-fluid" alt="">
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-15"><a href="#" class="text-dark">Half sleeve T-shirt</a></h5>
                                                <span class="text-muted">$240.00</span>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="mb-1"><a href="#" class="text-dark">Available</a></p>
                                            <span class="text-muted">243K</span>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <ul class="mb-1 ps-0">
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                </ul>
                                                <span class="text-muted mt-1">145 Sales</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="avatar-md me-4">
                                                <img src="{{ URL::asset('assets/images/product/img-2.png') }}" class="img-fluid" alt="">
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-15"><a href="#" class="text-dark">Light blue T-shirt</a></h5>
                                                <span class="text-muted">$650.00</span>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="mb-1"><a href="#" class="text-dark">Out Of Stock</a></p>
                                            <span class="text-muted">1,253K</span>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <ul class="mb-1 ps-0">
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bx-star text-warning"></li>
                                                </ul>
                                                <span class="text-muted mt-1">260 Sales</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="avatar-md me-4">
                                                <img src="{{ URL::asset('assets/images/product/img-3.png') }}" class="img-fluid" alt="">
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-15"><a href="#" class="text-dark">Black Color T-shirt</a></h5>
                                                <span class="text-muted">$325.00</span>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="mb-1"><a href="#" class="text-dark">Available</a></p>
                                            <span class="text-muted">2,586K</span>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <ul class="mb-1 ps-0">
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                </ul>
                                                <span class="text-muted mt-1">220 Sales</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="avatar-md me-4">
                                                <img src="{{ URL::asset('assets/images/product/img-4.png') }}" class="img-fluid" alt="">
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-15"><a href="#" class="text-dark"></a>Hoodie (Blue)</h5>
                                                <span class="text-muted">$170.00</span>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="mb-1"><a href="#" class="text-dark">Available</a></p>
                                            <span class="text-muted">4,565K</span>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <ul class="mb-1 ps-0">
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                </ul>
                                                <span class="text-muted mt-1">165 Sales</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="avatar-md me-4">
                                                <img src="{{ URL::asset('assets/images/product/img-5.png') }}" class="img-fluid" alt="">
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-15"><a href="#" class="text-dark"></a>Half sleeve T-Shirt</h5>
                                                <span class="text-muted">$150.00</span>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="mb-1"><a href="#" class="text-dark">Out Of Stock</a></p>
                                            <span class="text-muted">5,265K</span>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <ul class="mb-1 ps-0">
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bx-star text-warning"></li>
                                                </ul>
                                                <span class="text-muted mt-1">165 Sales</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="avatar-md me-4">
                                                <img src="{{ URL::asset('assets/images/product/img-6.png') }}" class="img-fluid" alt="">
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-15"><a href="#" class="text-dark"></a>Green color T-shirt</h5>
                                                <span class="text-muted">$120.00</span>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="mb-1"><a href="#" class="text-dark">Available</a></p>
                                            <span class="text-muted">125K</span>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <ul class="mb-1 ps-0">
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bxs-star text-warning"></li>
                                                    <li class="bx bx-star text-warning"></li>
                                                </ul>
                                                <span class="text-muted mt-1">165 Sales</span>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Chat</h4>
                    <div class="flex-shrink-0">
                        <select class="form-select form-select-sm mb-0 my-n1">
                            <option value="Today" selected="">Today</option>
                            <option value="Yesterday">Yesterday</option>
                            <option value="Week">Last Week</option>
                            <option value="Month">Last Month</option>
                        </select>
                    </div>
                </div><!-- end card header -->

                <div class="card-body px-0">
                    <div class="px-3 chat-conversation" data-simplebar style="max-height: 350px;">
                        <ul class="list-unstyled mb-0">
                            <li class="chat-day-title"> 
                                <span class="title">Today</span>
                            </li>
                            <li>
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" class="rounded-circle avatar-sm" alt="">
                                        <div class="flex-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <div class="conversation-name"><span class="time">10:00 AM</span></div>
                                                    <p class="mb-0">Good Morning</p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </li>

                            <li class="right">
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <div class="flex-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <div class="conversation-name"><span class="time">10:02 AM</span></div>
                                                    <p class="mb-0">Good morning</p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}" class="rounded-circle avatar-sm" alt="">
                                    </div>
                                    
                                </div>
                                
                            </li>

                            <li>
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" class="rounded-circle avatar-sm" alt="">
                                        <div class="flex-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <div class="conversation-name"><span class="time">10:04 AM</span></div>
                                                    <p class="mb-0">
                                                        Hi there, How are you?
                                                    </p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" class="rounded-circle avatar-sm" alt="">
                                        <div class="flex-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <div class="conversation-name"><span class="time">10:04 AM</span></div>
                                                    <p class="mb-0">
                                                        Waiting for your reply.As I heve to go back soon. i have to travel long distance.
                                                    </p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </li>

                            <li class="right">
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <div class="flex-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <div class="conversation-name"><span class="time">10:08 AM</span></div>
                                                    <p class="mb-0">
                                                        Hi, I am coming there in few minutes. Please wait!! I am in taxi right now.
                                                    </p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}" class="rounded-circle avatar-sm" alt="">
                                    </div>
                                </div>
                                
                            </li>

                            <li>
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" class="rounded-circle avatar-sm" alt="">
                                        <div class="flex-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <div class="conversation-name"><span class="time">10:06 AM</span></div>
                                                    <p class="mb-0">
                                                        Thank You very much, I am waiting here at StarBuck cafe.
                                                    </p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </li>
                            

                            <li>
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" class="rounded-circle avatar-sm" alt="">
                                        <div class="flex-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <div class="conversation-name"><span class="time">10:09 AM</span></div>
                                                    <p class="mb-0">
                                                        img-1.jpg & img-2.jpg images for a New Projects
                                                    </p>

                                                    <ul class="list-inline message-img mt-3  mb-0">
                                                        <li class="list-inline-item message-img-list">
                                                            <a class="d-inline-block m-1" href="#">
                                                                <img src="{{ URL::asset('assets/images/small/img-1.jpg') }}" alt="" class="rounded img-thumbnail">
                                                            </a>                                                                  
                                                        </li>

                                                        <li class="list-inline-item message-img-list">
                                                            <a class="d-inline-block m-1" href="#">
                                                                <img src="{{ URL::asset('assets/images/small/img-2.jpg') }}" alt="" class="rounded img-thumbnail">
                                                            </a>                                                                 
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="px-3">
                        <div class="row">
                            <div class="col">
                                <div class="position-relative">
                                    <input type="text" class="form-control border bg-soft-light" placeholder="Enter Message...">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send float-end"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div><!-- end row -->
</template>