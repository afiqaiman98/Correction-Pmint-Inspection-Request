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
                    <th scope="col">Chechklist Serial No</th>
                    <th scope="col">Location</th>
                    <th scope="col">Date/Time of Inspection</th>
                    <th scope="col">Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Engineer</th>
                    <th scope="col">Status</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Update</th>
                    <th scope="col">Cancel Appointment</th>
                </tr>

                @foreach ($inspects as $inspect)
                    <tr>
                        <td class="primary">{{ $inspect->serial }}</td>
                        <td class="primary">{{ $inspect->location }}</td>
                        {{-- <td class="primary">{{ $inspect->date }}</td> --}}
                        <td>{{ Carbon\Carbon::parse($inspect->date)->format('d-m-Y ') }}/{{ Carbon\Carbon::parse($inspect->date)->format('H:i') }}
                        </td>
                        <td class="primary">{{ $inspect->name }}</td>
                        <td class="primary">{{ $inspect->company }}</td>
                        <td class="primary">{{ $inspect->engineer()->first()->name }}</td>
                        <td class="primary">{{ $inspect->status }}</td>
                        <td class="primary">{{ $inspect->comment }}</td>
                        <td class="primary">
                            @if ($inspect->status == 'Rejected')
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('user.inspect.edit', $inspect->id) }}">Update</a>
                            @endif

                        </td>
                        <td class="primary">
                            <form action="{{ route('user.inspect.destroy', $inspect->id) }}" method="POST">
                                @method('Delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure to cancel?')">Delete</button>
                            </form>
                        </td>

                        {{-- <td class="primary"><a class="btn btn-danger" onclick="return confirm('Sungguh nk delete ea???')"
              href="{{ route('form.destroy',$forms->id]) }}">Cancel</a></td> --}}


                    </tr>
                @endforeach
            </table>
        </div>
    </div>


    @include('user.script')

</body>



</html>
