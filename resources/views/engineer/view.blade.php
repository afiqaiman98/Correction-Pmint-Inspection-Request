@include('engineer.head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                    <th scope="col">Location</th>
                    <th scope="col">Date/Time of Inspection</th>
                    <th scope="col">Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Status</th>
                    <th scope="col">Detail</th>
                </tr>

                @foreach ($inspects as $inspect)
                <tr>
                    <td class="primary">{{ $inspect->location }}</td>
                    <td class="primary">{{ Carbon\Carbon::parse($inspect->date)->format('d-m-Y') }}</td>
                    <td class="primary">{{ $inspect->name }}</td>
                    <td class="primary">{{ $inspect->company }}</td>
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


                    {{-- @if ($inspect->status != ["Approved"]) --}}

                    {{-- @if (!in_array($inspect->status,["Approved","Rejected"])) --}}


                    {{-- <td class="primary">
                        <form id="{{ $inspect->id }}" action="{{ route('engineer.inspect.store',$inspect->id) }}"
                            method="POST">
                            @method('POST')
                            @csrf
                            <select class="form-control" hello="{{ $inspect->id }}" name="status" id="status"
                                onchange="onChangeStatus(this)">
                                <option selected disabled>Action</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Reject</option>
                            </select>
                        </form>
                    </td> --}}
                    <td class="primary">
                        <a href="{{ route('engineer.inspect.show',$inspect->id)}}"><i class="fa fa-eye"></i></a>

                    </td>
                    {{-- @endif --}}


                </tr>
                @endforeach
            </table>

        </div>


    </div>



    {{-- <script type="text/javascript">
        function onChangeStatus(status){
            const formId = status.getAttribute("hello");
            if(status.value == "Approved"){
                if(!confirm("Are you sure to approved this inspection?This cant be undo")) {
                return false;
                 }
                 console.log(status.value);
                 document.getElementById(formId).submit();
                 
            }
                
            }
    </script> --}}




    @include('engineer.script')
</body>




</html>