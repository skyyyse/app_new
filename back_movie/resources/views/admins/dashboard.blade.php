@extends("admins.layouts.layouts")
@section("content")
<div class="content-page">
    <div class="content">
        <div class="container-fluid" style="margin-top: 20px;">
            <div class="row row-cols-1 row-cols-xxl-4 row-cols-lg-3 row-cols-md-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Order</h5>
                                    <h3 class="my-3">+</h3>
                                </div>
                                <div class="flex-shrink-0">
                                    <div id="widget-customers" class="apex-charts" data-colors="#47ad77,#e3e9ee"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Total Customer</h5>
                                    <h3 class="my-3">+ </h3>
                                </div>
                                <div id="widget-orders" class="apex-charts" data-colors="#3e60d5,#e3e9ee"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Total Employee</h5>
                                    <h3 class="my-3">ssssssssssssssssssssssssss</h3>
                                </div>
                                <div id="widget-revenue" class="apex-charts" data-colors="#16a7e9,#e3e9ee"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3">
                    <a href="">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="text-muted fw-normal mt-0" title="Products">Total User</h5>
                                        <h3 class="my-3">1000</h3>
                                    </div>
                                    <div id="widget-growth" class="apex-charts" data-colors="#ffc35a,#e3e9ee"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h4 class="header-title">Revenue</h4>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-2-fill"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="bg-light-subtle border-top border-bottom border-light">
                                <div class="row text-center">
                                    <div class="col">
                                        <p class="text-muted mt-3"><i class="ri-donut-chart-fill"></i> Current Week</p>
                                        <h3 class="fw-normal mb-3">
                                            <span>$1705.54</span>
                                        </h3>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted mt-3"><i class="ri-donut-chart-fill"></i> Previous Week</p>
                                        <h3 class="fw-normal mb-3">
                                            <span>$6,523.25 <i class="ri-corner-right-up-fill text-success"></i></span>
                                        </h3>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted mt-3"><i class="ri-donut-chart-fill"></i> Conversation</p>
                                        <h3 class="fw-normal mb-3">
                                            <span>8.27%</span>
                                        </h3>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted mt-3"><i class="ri-donut-chart-fill"></i> Customers</p>
                                        <h3 class="fw-normal mb-3">
                                            <span>69k <i class="ri-corner-right-down-line text-danger"></i></span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div dir="ltr">
                                <div id="revenue-chart" class="apex-charts mt-3" data-colors="#3e60d5,#47ad77"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h4 class="header-title">Total Sales</h4>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-2-fill"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="alert alert-warning rounded-0 mb-0 border-end-0 border-start-0" role="alert">
                                Something went wrong. Please <strong><a href="#!" class="alert-link text-decoration-underline">refresh</a></strong> to get new data!
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div id="average-sales" class="apex-charts mb-3" data-colors="#3e60d5,#47ad77,#fa5c7c,#16a7e9"></div>

                            <h5 class="mb-1 mt-0 fw-normal">Brooklyn, New York</h5>
                            <div class="progress-w-percent">
                                <span class="progress-value fw-bold">72k </span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <h5 class="mb-1 mt-0 fw-normal">The Castro, San Francisco</h5>
                            <div class="progress-w-percent">
                                <span class="progress-value fw-bold">39k </span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <h5 class="mb-1 mt-0 fw-normal">Kovan, Singapore</h5>
                            <div class="progress-w-percent mb-0">
                                <span class="progress-value fw-bold">61k </span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-xxl-1 row-cols-lg-3 row-cols-md-2">
                <div class="col col-lg-3">
                    <a href="">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="text-muted fw-normal mt-0" title="Products">Total User</h5>
                                        <h3 class="my-3">{{$user}}</h3>
                                        <p class="mb-0 text-muted text-truncate">
                                            <span class="badge bg-success me-1"><i class="ri-arrow-up-line"></i> 4.87%</span>
                                            <span>Since last month</span>
                                        </p>
                                    </div>
                                    <div id="widget-growth" class="apex-charts" data-colors="#ffc35a,#e3e9ee"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection