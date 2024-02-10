@include('user.head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

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
    <div class="container">
        <form action="{{ route('user.inspect.update', $inspect->id) }}" method="POST"
            style="padding: 100px; color:black">

            @csrf
            @method('PUT')
            <input type="hidden" name="engineer" class="form-control" value="{{ $inspect->engineerId }}" readonly>
            <div class="form-group">
                <label>Checklist Serial No</label>
                <input type="text" name="serial" class="form-control" value="{{ $inspect->serial }}" readonly>
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="{{ $inspect->location }}" readonly>
            </div>

            <div class="form-group">
                <label>Date/Time of Inspection </label>
                <div class='input-group date' id='datetimepicker'>
                    <input type='text' name="date" class="form-control" required>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $inspect->name }}" readonly>
            </div>

            <div class="form-group">
                <label>Company</label>
                <input type="text" name="company" class="form-control" value="{{ $inspect->company }}" readonly>
            </div>


            {{-- To choose Enginner for futher deveploment --}}
            <div class="form-group">
                <label>Engineer For Inspection</label>
                <input type="text" class="form-control" value="{{ $inspect->engineer->name }}"
                    readonly>
            </div>




            <div class="form-group">
                <input type="submit" class="btn ">
            </div>
        </form>
    </div>


    @include('user.script')


</body>



</html>
