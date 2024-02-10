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
                @endif
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Status Inspection</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contractor Name</th>


                                                </tr>
                                            </thead>
                                            <tbody>




                                                @foreach ($engineers as $engineer)
                                                    <tr>
                                                        <td>{{ $engineer->name }}</td>
                                                        <td>{{ $engineer->email }}</td>
                                                        <td>
                                                            <ul>
                                                                @foreach ($engineer->inspects as $inspect)
                                                                    <li class="d-flex justify-content-between mb-3">
                                                                        <div><svg xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 16 16" width="16"
                                                                                height="16">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8z">
                                                                                </path>
                                                                            </svg><span
                                                                                class="ml-2">{{ $inspect->name }}</span>
                                                                        </div>

                                                                        <div>
                                                                            <span
                                                                                @class([
                                                                                    'badge badge-primary' => $inspect->status == 'In Progress',
                                                                                    'badge
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        badge-success' =>
                                                                                        $inspect->status == 'Approved',
                                                                                ])>{{ $inspect->status }}
                                                                            </span>(<a
                                                                                href="{{ route('admin.view.timeline', $inspect->id) }}">Timeline</a>)
                                                                        </div>


                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </td>


                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
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
