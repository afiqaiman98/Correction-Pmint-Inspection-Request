<!DOCTYPE html>
<html lang="en">

@include('admin.layout.head')

<style>
    ul.timeline {
        list-style-type: none;
        position: relative;
    }

    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }

    ul.timeline>li {
        margin: 20px 0;
        padding-left: 20px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
</style>

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
                @endif

                {{-- <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <h4>Latest News</h4>
                            
                        </div>
                    </div>
                </div> --}}

                <div class="content-wrapper mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Timeline</h4>
                                    <ul class="timeline">
                                        @foreach ($timelines as $timeline)
                                            {{-- {{ $timeline->description }}
                                            {{ $timeline->creator->name }}
                                            {{ $timeline->created_at }} --}}
                                            <li>
                                                <p style="padding-left: 15px;"">{{ $timeline->description }}
                                                    (by :
                                                    {{ $timeline->creator->name }}) -
                                                    {{ $timeline->created_at }}
                                                </p>
                                                <p>{{ $timeline->remark }}</p>
                                            </li>
                                        @endforeach

                                    </ul>
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
