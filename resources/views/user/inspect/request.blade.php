@include('user.head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
        <form action="{{ route('inspect.store') }}" method="POST" enctype="multipart/form-data"
            style="padding: 100px; color:black">

            @csrf
            <div class="form-group">
                <label>Checklist Serial No</label>
                <input type="text" name="serial" class="form-control" placeholder="Please enter location" required>
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" placeholder="Please enter location" required>
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
                <input type="text" name="name" class="form-control" placeholder="Please enter location" required>
            </div>

            <div class="form-group">
                <label>Company</label>
                <input type="text" name="company" class="form-control" placeholder="Please enter location" required>
            </div>


            {{-- To choose Enginner for futher deveploment --}}
            <div class="form-group">


                <label>Engineer For Inspection</label>
                <select name="engineer" class="form-select">

                    <option class="hidden">-Select Engineer-</option>
                    @foreach ($engineers as $engineer)
                    {{-- {{ dd($engineers) }} --}}
                    <option value="{{ $engineer->id }}">
                        {{ $engineer->name }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label>Signature</label>
                <br>
                <input type="file" name="file" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn ">
            </div>
        </form>
    </div>


    @include('user.script')


</body>



</html>