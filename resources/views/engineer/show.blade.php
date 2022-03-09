@include('engineer.head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    @include('engineer.header')


    <div style="color:black; margin: 25px 100px; padding: 25px 300px;">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Inspection Detail</h2>
                <div class="row">
                    <div class="col">

                        <label class="font-weight-bold">Inspection Status</label>
                        <p><span @class(['badge badge-primary'=>
                                $inspect->status == "In Progress", 'badge
                                badge-success'
                                =>
                                $inspect->status == "Approved",'badge
                                badge-danger'
                                =>
                                $inspect->status ==
                                "Rejected"]) >{{
                                $inspect->status }}</span></p>

                        <label class="font-weight-bold">Location</label>
                        <p>{{ $inspect->location }}</p>

                        <label class="font-weight-bold">Date/Time</label>
                        <p>{{ Carbon\Carbon::parse($inspect->date)->format('d-m-Y ') }}</p>


                        <p>{{ Carbon\Carbon::parse($inspect->date)->format('H:i') }}</p>


                    </div>

                    <div class="col">

                        <label class="font-weight-bold">Name</label>
                        <p>{{ $inspect->name }}</p>

                        <label class="font-weight-bold">Company</label>
                        <p>{{ $inspect->company }}</p>


                    </div>
                </div>

                @if ($inspect->status == "In Progress")


                <form action="{{ route('engineer.inspect.store',$inspect->id) }}" class="form-control" method="POST">
                    @method('POST')
                    @csrf
                    <label class="font-weight-bold">Engineer Action</label>
                    <button name="status" value="Approved"
                        onclick="return confirm('Are you sure to approve inspection? This cant be undo')"
                        class="btn btn-success btn-rounded">Approve</button>


                    <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal"
                        data-target="#exampleModalCenter">Reject</button>

                    {{-- Modal after user click reject --}}

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Rejection of inspection due to:
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" name="comment">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="status" value="Rejected" class="btn btn-primary"
                                        onclick="return confirm('Are you sure to reject inspection? This cant be undo')">Reject
                                        Inspection</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>




            </div>

            @elseif ($inspect->status == "Rejected")

            <div class="card-body">
                <h4 class="card-title">Engineer Comment:</h4>

                <p>
                    {{ $inspect->comment }}
                </p>
            </div>
            @endif
        </div>
    </div>




    {{-- <script>
        function onChangeApproved(){
            console.log("meow"); --}}
            {{-- // const valueApproved = $("#approved").val;

            // if(!return confirm("are you sure to approved this isnpection this cant be undo")){
            //     return false;
            // }
            // console.log(valueApproved);
            // this.form.submit();
    //     } --}}
    {{-- // 
    </script> --}}


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