<div class="modal fade" id="movie_update" tabindex="-1" aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{route('admin.movie.update')}}" method="post" enctype="multipart/form-data">
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
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Title</label>
                                    <input type="hidden" name="id" id="id">
                                    <input type="text" class="form-control form-control-sm @error('movie_title')border-danger  @enderror" id="movie_title" name="movie_title" aria-describedby="emailHelp" placeholder="{{ $errors->has('title') ? 'Invoice Is not Empty' : 'title'}}">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Subtitle</label>
                                    <input type="text" class="form-control form-control-sm @error('movie_subtitle')border-danger  @enderror" id="movie_subtitle" name="movie_subtitle" aria-describedby="emailHelp" placeholder="Subtitle">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="exampleInputPassword1" class="form-label">Type movie</label>
                                    <select id="movie_type" name="movie_type" class="form-control form-control-sm @error('movie_type')border-danger  @enderror">
                                        <option value="">Select Status</option>
                                        @foreach ($category as $category_data )
                                        <option value="{{$category_data->id}}">{{$category_data->category_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="exampleInputPassword1" class="form-label">Active</label>
                                    <select id="movie_active" name="movie_active" class="form-control form-control-sm @error('movie_active')border-danger  @enderror">
                                        <option value="">Select Status</option>
                                        <option value="1">Enable</option>
                                        <option value="0">Disable</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Image</label>
                                    <input type="file" name="fileInput" id="fileInput" onchange="showImagePreview(this)" class="form-control form-control-sm @error('fileInput')border-danger  @enderror" id="fileInput" name="fileInput" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Mp4</label>
                                    <input type="file" name="file_mp4" id="file_mp4" class="form-control form-control-sm @error('file_mp4')border-danger  @enderror" id="file_mp4" name="file_mp4" aria-describedby="emailHelp" placeholder="{{ $errors->has('title') ? 'Invoice Is not Empty' : 'title'}}">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-10">
                                    <label for="exampleInputPassword1" class="form-label">Mp4</label>
                                    <input type="text" class="form-control form-control-sm" id="mp4" aria-describedby="emailHelp" Disable>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <label for="exampleInputPassword1" class="form-label">Buton</label>
                                    <button type="button" onclick="test()" class="form-control form-control-sm ">
                                        Play
                                    </button>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <div class="mb-3">
                                        <label>Movie Description</label>
                                        <textarea name="movie_description" id="movie_description" class="form-control form-control-sm @error('movie_description')border-danger  @enderror" cols="30" rows="5"></textarea>
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