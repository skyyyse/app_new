<!DOCTYPE html>
<html lang="en">

<head>
    <title>Category</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{asset('admin/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @include("admins.include.head")
</head>

<body>
    <div id="preloader">
        <div id="status">
            <div class="bouncing-loader">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        @include("admins.include.topbar")
        @include("admins.include.left_sidebar")
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <a class="btn btn-success" href="{{route('admins.slider.create')}}">New Slider</a>
                                </div>
                                <h4 class="page-title">Preloader</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="col-2'">No</th>
                                                <th class="col-2'">Image</th>
                                                <th class="col-2'">Title</th>
                                                <th class="col-2'">Active</th>
                                                <th class="col-2'">Date</th>
                                                <th class="col-2'">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($slider as $key=> $slider_data )
                                            <tr>
                                                <td>{{ $key+1}}</td>
                                                <td style="display: flex;align-items: center;justify-content: center;margin: 0;height: 1005;"><img src="{{ asset('file/slider/image/' . $slider_data->slider_image) }}" alt="" style="height: 30px;border-radius: 2px;"></td>
                                                <td>{{ $slider_data->slider_title }}</td>
                                                <td style="color: <?php echo $slider_data->slider_active == 0 ? 'red' : 'blue'; ?>">{{ $slider_data->slider_active ==0?"Disable":"Enable"}}</td>
                                                <td>{{ $slider_data->created_at }}</td>
                                                <td style="margin: 30px;padding: 10px;">
                                                    <button type="button" value="{{$slider_data->id}}" class="btn btn-outline-danger slider_delete" data-bs-toggle="modal" data-bs-target="#slider_delete">
                                                        <i class="ri-delete-bin-2-line"></i>
                                                    </button>
                                                    <button type="button" value="{{$slider_data->id}}" class="btn btn-outline-secondary slider_update" data-bs-toggle="modal" data-bs-target="#slider_update">
                                                        <i class="ri-ball-pen-line"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include("admins.include.footer")
        </div>
    </div>
    @include("admins.page.slider.update")
    @include("admins.page.slider.delete")
    @include("admins.include.script")
    <script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/pages/demo.datatable-init.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
</body>

</html>