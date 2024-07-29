<div class="modal fade" id="users_update" tabindex="-1" aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{route('admin.user.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="fullscreeexampleModalLabel">
                        Full Screen Modal
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card border border-end-1" style="margin-top: 8px;">
                        <div class="card-body">
                            <div class="needs-validation" novalidate>
                                <div class="row g-2">
                                    <div class="mb-3 col-md-3">
                                        <label for="inputEmail4" class="form-label">Username</label>
                                        <input type="hidden" name="user_id" id="user_id">
                                        <input type="text" class="form-control form-control-sm @error('username') form-control border-danger @enderror" id="username" name="username" placeholder="Last Name">
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
                                        <select name="position" id="position" class="form-control form-control-sm @error('position') form-control border-danger @enderror">
                                            <option>Choose</option>
                                            <option value="1">Admin</option>
                                            <option value="0">User</option>
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
                                        <select id="province" name="province" class="form-control form-control-sm">
                                            <option value="">Choose Province</option>
                                            @foreach ($province as $province_data )
                                            <option value="{{$province_data->id}}">{{$province_data->province_english}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label for="inputEmail4" class="form-label">District</label>
                                        <select name="district" id="district" class="form-control form-control-sm ">
                                            <option value="">Choose District</option>
                                            <option value="b">Choose District</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label for="inputState" class="form-label">Commune</label>
                                        <select name="commune" id="commune" class="form-control form-control-sm ">
                                            <option value="">Choose Commune</option>
                                            <option value="c">Choose Commune</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label for="inputState" class="form-label">Village</label>
                                        <select name="village" id="village" class="form-control form-control-sm">
                                            <option value="">Choose Village</option>
                                            <option value="d">Choose Village</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="mb-3 col-md-3">
                                        <label for="inputEmail4" class="form-label">Phone</label>
                                        <input type="text" class="form-control form-control-sm @error('phone') form-control border-danger @enderror" id="phone" name="phone" placeholder="Full Name">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label for="inputEmail4" class="form-label">Email </label>
                                        <input type="text" class="form-control form-control-sm @error('email') form-control border-danger @enderror" id="email" name="email" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="mb-3 col-md-12">
                                        <label for="inputEmail4" class="form-label">Address</label>
                                        <input type="text" class="form-control form-control-sm" id="address" name="address" placeholder="First Name">
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
                                <div class="mb-12 col-md-12" id="data_image" style="display: none;">
                                    <div class="card-body card mb-0 shadow-none border mb-3 col-12">
                                        <div class="d-flex align-items-center">
                                            <img src="" alt="image" id="image" class="me-3" style="width: 150px;border-radius: 10px;">
                                            <div class="row">
                                                <h5 class="mb-1 mt-1" id="title_image" name="old_image">James M. Short</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-light" data-bs-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary upload">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@include("admins.include.script")