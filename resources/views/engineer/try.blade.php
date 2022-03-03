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

                <tr>
                    <td>
                        <select class="form-control" name="nasi" id="nasi" onchange="onChangeNasi()">
                            <option selected disabled>-- Sila Pilih Nasi --</option>
                            <option value="lemak">Nasi Lemak</option>
                            <option value="minyak">Nasi Minyak</option>
                            <option value="ayam">Nasi Ayam</option>
                        </select>
                    </td>
                </tr>

            </table>

        </div>


    </div>



</body>
<script>
    function onChangeNasi(){
        const valueNasi = $("#nasi").val();
        if (valueNasi == "lemak"){
          alert('sure???');
            $("#lemak").css("display", "block");
        }
        if (valueNasi == "minyak"){
            $("#minyak").css("display", "block");
        }
        if (valueNasi == "ayam"){
            $("#ayam").css("display", "block");
        }
        console.log(valueNasi);
    }
</script>


@include('engineer.script')


</html>