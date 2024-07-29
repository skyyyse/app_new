@extends("admins.layouts.layouts")
@section("content")
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top: 20px;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="row g-2">
                                        <div class="mb-3 col-md-3">
                                            <label for="inputEmail4" class="form-label">Username</label>
                                            <input type="text" class="form-control form-control-sm @error('username') form-control border-danger @enderror" name="username" placeholder="Last Name">
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="inputState" class="form-label">Gender</label>
                                            <select id="gender" name="gender" class="form-control form-control-sm @error('gender') form-control border-danger @enderror">
                                                <option value="">Choose</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="inputState" class="form-label">Position</label>
                                            <select name="position" class="form-control form-control-sm @error('position') form-control border-danger @enderror">
                                                <option value="">Choose</option>
                                                <option value="1">admin</option>
                                                <option value="0">user</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="exampleInputEmail1" class="form-label">Image</label>
                                            <input type="file" name="fileInput" id="fileInput" onchange="showImagePreview(this)" class="form-control form-control-sm @error('movie_title')border-danger  @enderror" id="movie_title" name="movie_title" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="mb-3 col-md-3">
                                            <label for="inputEmail4" class="form-label">Province</label>
                                            <select id="province" name="province" class="form-control form-control-sm @error('province') form-control border-danger @enderror">
                                                <option value="">Choose Province</option>
                                                @foreach ($province as $province_data )
                                                <option value="{{$province_data->id}}">{{$province_data->province_english}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="inputEmail4" class="form-label">District</label>
                                            <select name="district" id="district" class="form-control form-control-sm  @error('district') form-control border-danger @enderror">
                                                <option value="">Choose District</option>
                                                <option value="b">Choose District</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="inputState" class="form-label">Commune</label>
                                            <select name="commune" id="commune" class="form-control form-control-sm @error('commune') form-control border-danger @enderror">
                                                <option value="">Choose Commune</option>
                                                <option value="c">Choose Commune</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="inputState" class="form-label">Village</label>
                                            <select name="village" id="village" class="form-control form-control-sm @error('village') form-control border-danger @enderror">
                                                <option value="">Choose Village</option>
                                                <option value="d">Choose Village</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="mb-3 col-md-3">
                                            <label for="inputEmail4" class="form-label">Phone</label>
                                            <input type="text" class="form-control form-control-sm @error('phone') form-control border-danger @enderror" name="phone" placeholder="Full Name">
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="inputEmail4" class="form-label">Email </label>
                                            <input type="text" class="form-control form-control-sm @error('email') form-control border-danger @enderror" name="email" placeholder="Full Name">
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="inputEmail4" class="form-label">Password</label>
                                            <input type="password" class="form-control form-control-sm @error('password') form-control border-danger @enderror" name="password" placeholder="Full Name">
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="inputEmail4" class="form-label">Confirm Password </label>
                                            <input type="hidden" name="address" id="address">
                                            <input type="password" class="form-control form-control-sm @error('confirm_password') form-control border-danger @enderror" name="confirm_password" placeholder="Full Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="mb-12 col-md-12" id="imagePreview" style="display: none;">
                                        <div class="card-body card mb-0 shadow-none border mb-3 col-12">
                                            <div class="d-flex align-items-center">
                                                <img src="#" alt="image" id="uploadedImage" class="me-3" style="width: 150px;border-radius: 10px;">
                                                <div class="row">
                                                    <h5 class="mb-1 mt-1" id="imageName">James M. Short</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Create users</button>
                                <a href="{{route('admin.user.index')}}" class="btn btn-primary" style="margin-left: 10px;">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("admins.include.script")
@endsection