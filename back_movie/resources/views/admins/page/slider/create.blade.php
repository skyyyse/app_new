@extends("admins.layouts.layouts")
@section("content")
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <i class="ri-check-line me-1 align-middle fs-16"></i>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                                @endif
                                <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Title</label>
                                        <input type="text" class="form-control @error('title')border-danger  @enderror" id="title" name="title" aria-describedby="emailHelp" placeholder="{{ $errors->has('title') ? 'Invoice Is not Empty' : 'title'}}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputPassword1" class="form-label">Active</label>
                                        <select id="active" name="active" class="form-select @error('active')border-danger  @enderror">
                                            <option value="">Select Status</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="dropzone @error('fileInput')border-danger  @enderror" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                        <div class="fallback">
                                            <input type="file" name="fileInput" id="fileInput" onchange="showImagePreview(this)" style="display: none;" />
                                        </div>
                                        <div class="dz-message needsclick">
                                            <label for="fileInput">
                                                <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                                <h3>Drop files here or click to upload.</h3>
                                                <span class="text-muted fs-13">(This is just a demo dropzone. Selected picture are<strong>not</strong> actually uploaded only.)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="dropzone-previews mt-3" id="file-previews"></div>
                                    <div class="card mb-0 shadow-none border mb-3" id="imagePreview" style="display: none;">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                        <img src="#" alt="Uploaded Image" id="uploadedImage" style="max-width: 50px;border-radius: 5px;">
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold" id="imageName"></a>
                                                    <p class="mb-0" id="imageSize"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admins.slider.index')}}" class="btn btn-primary">Back</a>
                                </div>
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