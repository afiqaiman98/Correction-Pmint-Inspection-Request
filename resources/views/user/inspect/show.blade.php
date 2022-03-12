@include('user.head')

<body>

    @include('user.header')
    <div class="container">

        <h4 class="card-title">Horizontal Form</h4>
        <p class="card-description">
            Horizontal form layout
        </p>

        <div class="row">
            <label class="col-md-2 col-form-label">Status:</label>
            <div class="col-md-10">
                <input class="form-control" value="{{ $inspect->status }}" disabled>
            </div>
        </div>
        <div class="row">
            <label class="col-md-2 col-form-label">Serial</label>
            <div class="col-md-10">
                <input type="email" class="form-control" disabled>
            </div>
        </div>
        <div class="row">
            <label class="col-md-2 col-form-label">Location</label>
            <div class="col-md-10">
                <p type="text" class="form-control"></p>
            </div>
        </div>
        <div class="row">
            <label class="col-md-2 col-form-label">Date</label>
            <div class="col-md-10">
                <p type="text" class="form-control"></p>
            </div>
        </div>
        <div class="row">
            <label class="col-md-2 col-form-label">Name</label>
            <div class="col-md-10">
                <p type="text" class="form-control"></p>
            </div>
        </div>
        <div class="row">
            <label class="col-md-2 col-form-label">Company</label>
            <div class="col-md-10">
                <p type="text" class="form-control"></p>
            </div>
        </div>
        <div class="row">
            <label class="col-md-2 col-form-label">Comment</label>
            <div class="col-md-10">
                <p type="text" class="form-control"></p>
            </div>
        </div>

    </div>
    @include('engineer.script')

</body>