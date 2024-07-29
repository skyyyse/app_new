<script>
    globalThis.ip="192.168.100.36:8000";
    $("#province").change(function() {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('admin.script.district') }}",
            type: "GET",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                $('#district').find("option").not(":first").remove();
                $.each(data['district'], function(key, item) {
                    $('#district').append(`<option value='${item.id}'>${item.district_english}</option>`);
                });
                $('#district').trigger('change');
            }
        });
    });

    $("#district").change(function() {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('admin.script.commune') }}",
            type: "GET",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                $('#commune').find("option").not(":first").remove();
                $.each(data['commune'], function(key, item) {
                    $('#commune').append(`<option value='${item.id}'>${item.commune_english}</option>`);
                });
                $('#commune').trigger('change');
            }
        });
    });

    $("#commune").change(function() {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('admin.script.village') }}",
            type: "GET",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                $('#village').find("option").not(":first").remove();
                $.each(data['village'], function(key, item) {
                    $('#village').append(`<option value='${item.id}'>${item.village_english}</option>`);
                });
                $('#village').trigger('change');
            }
        });
    });

    $("#village").change(function() {
        var province = document.getElementById("province");
        var district = document.getElementById("district");
        var commune = document.getElementById("commune");
        var village = document.getElementById("village");
        var selected_province = province.options[province.selectedIndex].textContent;
        var selected_district = district.options[district.selectedIndex].textContent;
        var selected_commune = commune.options[commune.selectedIndex].textContent;
        var selected_village = village.options[village.selectedIndex].textContent;
        const data = "Province." + selected_province + ",District." + selected_district + ",Commune." + selected_commune + ",Village." + selected_village;
        $("#address").val(data);
    });

    function showImagePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                uploadedImage.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
            imageName.textContent = input.files[0].name;
            imagePreview.style.display = 'block';
        } else {
            imagePreview.style.display = 'none';
        }
    }
    ////=====================================================================================================
    ////slider
    $(document).ready(function() {
        $(document).on('click', '.slider_delete', function() {
            var id = $(this).val();
            console.log('1111111111111111');
            console.log(id);
            $("#id").val(id);
        });
    });
    $(document).ready(function() {
        $(document).on('click', '.slider_update', function() {
            var id = $(this).val();
            $.ajax({
                url: "{{route('admin.script.slider')}}",
                data: {
                    id: id
                },
                method: "get",
                success: function(response) {
                    console.log(response);
                    $("#slider_id").val(response.slider[0].id);
                    $("#title").val(response.slider[0].slider_title);
                    $("#active").val(response.slider[0].slider_active);
                    const data_image=document.getElementById('data_image');
                    const image=document.getElementById('image');
                    const title_image=document.getElementById('title_image');
                    if(response.slider[0].slider_image==null){
                        data_image.style.display = 'none';
                    }else{
                        data_image.style.display = 'block';
                        title_image.innerHTML = response.slider[0].slider_image;
                        image.src = "http://"+ip+"/file/slider/image/" + response.slider[0].slider_image;
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    //////===================================================================================================
        ////=====================================================================================================
    ////movie
    $(document).ready(function() {
        $(document).on('click', '.movie_delete', function() {
            var id = $(this).val();
            $("#movie_id").val(id);
        });
    });
    $(document).ready(function() {
        $(document).on('click', '.movie_update', function() {
            var id = $(this).val();
            $.ajax({
                url: "{{route('admin.script.movie')}}",
                data: {
                    id: id
                },
                method: "get",
                success: function(response) {
                    console.log(response);
                    $("#id").val(response.movie[0].movie_id);
                    $("#movie_title").val(response.movie[0].movie_title);
                    $("#movie_subtitle").val(response.movie[0].movie_subtitle);
                    $("#movie_active").val(response.movie[0].movie_active);
                    $("#movie_description").val(response.movie[0].movie_description);
                    $("#mp4").val("http://"+ip+"/file/movie/image/"+response.movie[0].movie_mp4);
                    var movie_type = response.movie[0].movie_type;
                    $("#movie_type").val(movie_type);
                    $("#movie_type option").each(function() {
                        if ($(this).val() == movie_type) {
                            $(this).prop("selected", true);
                        }
                    });
                    globalThis.mp4=response.movie[0].movie_mp4;
                    const data_image=document.getElementById('data_image');
                    const image=document.getElementById('image');
                    const title_image=document.getElementById('title_image');
                    if(response.movie[0].movie_image==null){
                        data_image.style.display = 'none';
                    }else{
                        data_image.style.display = 'block';
                        title_image.innerHTML = response.movie[0].movie_image;
                        image.src = "http://"+ip+"/file/movie/image/" + response.movie[0].movie_image;
                    }

                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    function test(){
        window.open("http://"+ip+"/file/movie/mp4/"+globalThis.mp4);
    }
    //////===================================================================================================
    ///users
    $(document).ready(function() {
        $(document).on('click', '.users_delete', function() {
            var id = $(this).val();
            $("#id").val(id);
        });
    });
    $(document).ready(function() {
        $(document).on('click', '.users_update', function() {
            var id = $(this).val();
            $.ajax({
                url: "{{route('admin.script.users')}}",
                data: {
                    id: id
                },
                method: "get",
                success: function(response) {
                    console.log(response);
                    $("#user_id").val(response.users[0].id);
                    $("#username").val(response.users[0].name);
                    $("#gender").val(response.users[0].gender);
                    $("#position").val(response.users[0].role);
                    $("#phone").val(response.users[0].phone);
                    $("#email").val(response.users[0].email);
                    $("#address").val(response.users[0].address);
                    $("#image_title").val(response.users[0].image);
                    const data_image=document.getElementById('data_image');
                    const image=document.getElementById('image');
                    const title_image=document.getElementById('title_image');
                    if(response.users[0].image==null){
                        data_image.style.display = 'none';
                    }else{
                        data_image.style.display = 'block';
                        title_image.innerHTML = response.users[0].image;
                        image.src = "http://"+ip+"/file/user/image/" + response.users[0].image;
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    /////=====================================================================================================
    ///category
    $(document).ready(function() {
        $(document).on('click', '.category_delete', function() {
            var id = $(this).val();
            $("#idd").val(id);
            console.log(id);
        });
    });
    $(document).ready(function() {
        $(document).on('click', '.category_update', function() {
            var id = $(this).val();
            console.log(id);
            $.ajax({
                url: "{{route('admin.script.category')}}",
                data: {
                    id: id
                },
                method: "get",
                success: function(response) {
                    console.log(response);
                    $("#category_id").val(response.category[0].id);
                    $("#title").val(response.category[0].category_title);
                    $("#active").val(response.category[0].category_active);
                    const data_image=document.getElementById('data_image');
                    const image=document.getElementById('image');
                    const title_image=document.getElementById('title_image');
                    if(response.category[0].category_image==null){
                        data_image.style.display = 'none';
                    }else{
                        data_image.style.display = 'block';
                        title_image.innerHTML = response.category[0].category_image;
                        image.src = "http://"+ip+"/file/category/image/" + response.category[0].category_image;
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>