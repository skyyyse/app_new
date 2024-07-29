<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home page</title>
    @include("admins/include/head")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        @yield("content")
        @include("admins.include.footer")
    </div>
    @include("admins.include.right_sidebar")
    @include("admins.include.footer_javascript")
</body>
</html>