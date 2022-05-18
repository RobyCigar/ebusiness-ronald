@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endpush

@section('content')


<div class="" role="alert" style="display:none;">
</div>

<!--Bagian Card Log In dan Sign Up-->
<section class="row d-flex align-items-center vh-100 justify-content-center" style="color:white;" >
    <form class="card px-5 py-4 shadow col-12 col-sm-6 col-md-5 col-lg-3 center-this-shit" style="background-color:#001D49;">
        <div id="namelogin">
            <h2 class="fw-bold text-center" style="color:white;">Login</h2>
        </div>
        <div class="my-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="my-2" id="inputPassword">
            <label for="inputPassword">Password</label>
            <div class="col-sm-20">
                <input type="password" class="form-control" id="password">
            </div>
        </div>
        <label class="mb-2">Buat akun? <a href="{{route('register')}}"> Klik disini</a></label>
        <div class="my-2 mb-5">
            <div class="col-sm-20">
            <button type="button" class="btn btn-primary my-2" style="align-items: center;" id="buttonlogin">Login</button>
            </div>
        </div>
    </form>
</section>
<!--End Bagian Card Log In dan Sign Up-->



<div class="copyright">
    <p>
        <img width="10" src="{{asset('assets/copyright.svg')}}" alt="logo copyright">
        Copyright Kasironald 2022
    </p>
</div>

<script defer>
    $(document).ready(function() {
        $('#buttonlogin').click(function() {
            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                url: "{{route('api.login')}}",
                type: "POST",
                data: {
                    email: email,
                    password: password,
                    _token: "{{csrf_token()}}"
                },
                success: function(data) {
                    console.log(data)

                    localStorage.setItem('token', data.access_token);
                    window.location.href = "{{route('dashboard')}}";
                },
                error: function(data) {
                    let alert = $('div[role="alert"]')
                    alert.addClass('alert alert-danger alert-dismissible')
                    alert.html(data.responseJSON.message)
                    alert.show()
                }
            });
        });
    });
</script>

@endsection


@push('scripts')

<script src="{{asset('js/app.js')}}"></script>
@endpush