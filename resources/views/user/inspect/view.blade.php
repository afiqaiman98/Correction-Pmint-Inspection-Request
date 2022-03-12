@include('user.head')

<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
  <div class="site-preloader-wrap">
    <div class="spinner"></div>
  </div>
  @include('user.header')


  @if (session()->has('message'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">X</button>
    {{ session()->get('message') }}

  </div>

  @endif

  <div class="container">
    <div allign="center">
      <table class="table">
        <tr class="table-dark">
          <th scope="col">Location</th>
          <th scope="col">Date/Time of Inspection</th>
          <th scope="col">Name</th>
          <th scope="col">Engineer</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>

        @foreach ($inspects as $inspect)
        <tr>
          <td class="primary">{{ $inspect->location }}</td>
          {{-- <td class="primary">{{ $inspect->date }}</td> --}}
          <td>{{ Carbon\Carbon::parse($inspect->date)->format('d-m-Y ') }}/{{
            Carbon\Carbon::parse($inspect->date)->format('H:i') }}</td>
          <td class="primary">{{ $inspect->name }}</td>
          <td class="primary">{{ $inspect->engineer()->first()->name }}</td>
          <td class="primary"><span @class(['badge badge-primary'=>
              $inspect->status == "In Progress", 'badge
              badge-success'
              =>
              $inspect->status == "Approved",'badge
              badge-danger'
              =>
              $inspect->status ==
              "Rejected"]) >{{
              $inspect->status }}</span></td>
          <td class="primary">

            <div class="d-flex align-items-center">
              <a href="{{ route('user.inspect.show',$inspect->id)}}" type="button" class="btn btn-info btn-sm ">
                Detail
                <i class="fa fa-eye"></i>
              </a>
              <form action="{{ route('user.inspect.destroy',$inspect->id) }}" method="POST">
                @method('Delete')
                @csrf
                @if ($inspect->status == 'In Progress')

                <button type="submit" class="btn btn-danger btn-sm"
                  onclick="return confirm('Are you sure to cancel inspection request?')">Cancel<i
                    class="fa fa-trash"></i></button>

                @else
                <button title="Cannot delete approved inspection" disabled type="submit"
                  class="btn btn-danger btn-sm">Cancel<i class="fa fa-trash"></i></button>

                @endif
              </form>


            </div>


          </td>




        </tr>
        @endforeach
      </table>
    </div>
  </div>


  @include('user.script')

</body>



</html>