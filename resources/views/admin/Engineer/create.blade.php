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

            <div class="main-panel">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{ session()->get('message') }}

                </div>
                @elseif ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                @endif
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Basic form elements</h4>
                                    <p class="card-description">
                                        Basic form elements
                                    </p>
                                    <form action="{{ route('engineer.store') }}" method="POST"
                                        enctype="multipart/form-data" class="forms-sample">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Name"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="Confirm Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    @include('admin.layout.script')
    <!-- End custom js for this page-->
</body>

</html>