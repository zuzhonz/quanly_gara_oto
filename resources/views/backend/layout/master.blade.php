<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.partials._head')
    @yield('page-head')


</head>

<body>

    @include('backend.partials._header')

    @include('backend.partials._navbar')

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        @yield('page-content')
    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    @include('backend.partials._footer')

    @yield('script')
    @include('backend.partials._script')

</body>

<script>
    $(function() {
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $(selector).attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#hinhanh").change(function() {
            readURL(this, '#anh');
        });
    });
</script>

</html>
