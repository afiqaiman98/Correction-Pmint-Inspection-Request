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
        <form onsubmit="event.preventDefault(); submitForm(event)" style="padding: 100px; color:black">

            @csrf
            <input type="hidden" id="id" name="id" value="{{ $inspect->id }}">
            <div class="form-group">
                <label>Checklist Serial No</label>
                <input type="text" name="serial" id="serial" class="form-control" value="{{ $inspect->serial }}" placeholder="Please enter location" required>
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $inspect->location }}" placeholder="Please enter location" required>
            </div>

            <div class="form-group">
                <label>Date/Time of Inspection </label>
                <div class='input-group date' id='datetimepicker'>
                    <input type='text' name="date" id="date" class="form-control" value="{{ $inspect->date }}" required>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $inspect->name }}" placeholder="Please enter location" required>
            </div>

            <div class="form-group">
                <label>Company</label>
                <input type="text" name="company" id="company" class="form-control" value="{{ $inspect->company }}" placeholder="Please enter location" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn ">
            </div>
        </form>
    </div>


    
    @include('user.script')
    <script>
        function submitForm(event){
            var formData = {
                serial: $("#serial").val(),
                location: $("#location").val(),
                date: $("#date").val(),
                email: $("#email").val(),
                company: $("#company").val(),
                name: $("#name").val()
            };

            $.ajax({
                type: "PATCH",
                url: `/inspect/${$("#id").val()}`,
                headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
                data: formData,
                encode: true, 
            }).done(function (data) {
                console.log("SUCCESS");
                $("form").append(`
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    Successfully Update
                </div>`
                );
            }).fail(function (error){
                console.log("ERROR");
                console.error(error)
            });
        }
    </script>

</body>



</html>