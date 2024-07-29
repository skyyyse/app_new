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
                                    <a class="btn btn-success" href="{{route('admin.user.create')}}"><i class=" ri-account-circle-fill"></i></a>
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
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Username</th>
                                                <th>Gender</th>
                                                <th>Position</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $key=> $users_data )
                                            <tr>
                                                <td>{{ $key+1}}</td>
                                                <td style="display: flex;align-items: center;justify-content: center;margin: 0;height: 1005;"><img src="{{ asset('file/user/image/' . $users_data->image) }}" alt="" style="height: 30px;border-radius: 2px;"></td>
                                                <td>{{ $users_data->name}}</td>
                                                <td>{{ $users_data->gender }}</td>
                                                <td style="color: <?php echo $users_data->role==0?'red':'blue'?>;">{{ $users_data->role==0?'Disable':'Enable'}}</td>
                                                <td>{{ $users_data->phone }}</td>
                                                <td>{{ $users_data->email }}</td>
                                                <td>{{ $users_data->created_at }}</td>
                                                <td style="margin: 30px;padding: 10px;">
                                                    <button type="button" value="{{$users_data->id}}" class="btn btn-outline-danger users_delete" data-bs-toggle="modal" data-bs-target="#users_delete">
                                                        <i class="ri-delete-bin-2-line"></i>
                                                    </button>
                                                    <button type="button" value="{{$users_data->id}}" class="btn btn-outline-secondary users_update" data-bs-toggle="modal" data-bs-target="#users_update">
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
    @include('admins.page.users.delete')
    @include('admins.page.users.update')
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