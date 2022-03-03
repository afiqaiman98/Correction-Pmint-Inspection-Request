@include('engineer.head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="site-preloader-wrap">
        <div class="spinner"></div>
    </div>
    @include('engineer.header')


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
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>

                @foreach ($inspects as $inspect)
                <tr>
                    <td class="primary">{{ $inspect->serial }}</td>
                    <td class="primary">{{ $inspect->location }}</td>
                    <td class="primary">{{ $inspect->date }}</td>
                    <td class="primary">{{ $inspect->name }}</td>
                    <td class="primary">{{ $inspect->company }}</td>
                    <td id="status" class="primary"><span @class(['badge badge-primary'=>
                            $inspect->status == "In Progress", 'badge
                            badge-success'
                            =>
                            $inspect->status ==
                            "Approved"]) >{{
                            $inspect->status }}</span></td>
                    <td class="primary">
                        <form action="{{ route('engineer.inspect.store',$inspect->id) }}" method="POST">
                            @method('POST')
                            @csrf
                            <select class="form-control" name="status" id="status" onchange="onChangeStatus()">
                                <option selected disabled>Action</option>
                                <option value="approved">Approved</option>
                                <option value="reject">reject</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>


    </div>



</body>

<script>
    function onChangeStatus(){
            const valueStatus = $("#status").val();
            if (valueStatus == "approved"){
          alert('sure???');

            }
            
        }
</script>


@include('engineer.script')


</html>