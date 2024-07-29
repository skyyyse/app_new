<html>
    <head>
        <title>Laravel</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div class="container">
            <div class="content">

                <h1>File Upload</h1>
                <form action="{{ route('admin.movie.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label>Select image to upload:</label>
                    <input type="file" name="file" id="file">
                    <input type="submit" value="Upload" name="submit">
                </form>
            </div>
        </div>
    </body>
</html>