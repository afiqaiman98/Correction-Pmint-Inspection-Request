<!DOCTYPE html>
<html lang="en">

@include('admin.layout.head')

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.layout.nav')
        <!-- partial -->
        @include('admin.layout.nav2')


        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            @include('admin.layout.navbarright1')

            {{-- The important button to register engineer is right here --}}
            @include('admin.layout.navbarright')
            <!-- partial -->



        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    @include('admin.layout.script')
    <!-- End custom js for this page-->
</body>

</html>