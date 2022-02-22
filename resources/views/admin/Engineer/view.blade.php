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
                  <h4 class="card-title">Engineer List</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Delete</th>
                          <th>Update</th>
                        </tr>
                      </thead>
                      <tbody>

                        {{-- {{ dd($engineer) }} --}}

                        @foreach ($engineer as $engineers)

                        <tr>
                          <td>{{ $engineers->name }}</td>
                          <td>{{ $engineers->email }}</td>
                          <td class="table-primary">
                            <form action="{{ route('engineer.destroy',$engineers->id) }}" method="POST">
                              @method('Delete')
                              @csrf
                              <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure to remove engineer?')">Delete</button>
                            </form>
                          </td>
                          <td class="table-primary">
                            <a class=" btn btn-info" href="{{ route('engineer.edit',$engineers->id) }}">Edit</a>
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