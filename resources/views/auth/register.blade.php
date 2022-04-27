@extends('layouts.app')

@push('styles')
<style>
    form {
        position: relative;
        top: -5%;
    }

    .copyright {
        position: relative;
        top: -10%;
        right: 10px;
        text-align: right;
    }
</style>
@endpush
@section('content')
<!-- Alert with jquery -->
<div class="" role="alert" style="display:none;">
</div>

<div class="container-fluid d-flex justify-content-center">
        <div style="margin-top:40px;">
            <h2 class="fw-bold">Register</h2>
        </div>   
    </div> 

<!--Bagian Card Log In dan Sign Up-->

<div class="container d-flex justify-content-center">
            <div class="card" style="width: 25rem; background-color:#001D49; color: aliceblue; border-radius: 10px;
            margin-top:30px; padding-top:30px">
                <div class="card-body">
                    <form>
                        <div class="mb-3 px-5 pe-5 ps-9">
                          <div class="container text-center ">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" class="form-control" id="email">
                        </div>
                        </div>
                        <div class="container" >
                            <div class="row">
                                <div class="col-lg-6 px-0 pe-2">
                                    <div class="mb-3">
                                    <label for="username" class="form-label">Username*</label>
                                    <input type="text" class="form-control" id="username">
                                      </div>
                                </div>
                                <div class="col-lg-6 px-0 pe-2 mt-2">
                                    <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password">
                                      </div>
                                </div>
                                <div class="col-lg-6 px-0 pe-2">
                                    <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Shift</label>
                                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id=shift>
                                            <option selected>08.00-16.00</option>
                                            <option value="2">15.00-22.00</option>
                                          </select>
                                      </div>
                                </div>
                                <div class="col-lg-6 px-0 pe-2 mt-2">
                                    <div class="mb-3">
                                    <label for="confirmpassword">Confirm Password</label>
                                      <input type="password" class="form-control" id="confirmpassword">
                                      <p style="font-size: 8px;">Buat Password dengan 8 huruf/karakter</p>
                                      </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="d-flex justify-content-center">
                        <label class="mb-3 px-5 pe-5 ps-9">Ingin login? <a href="{{route('login')}}"> Klik disini</a></label>
                        </div>
                        <div class="d-flex justify-content-center mb-3 px-3 ">
        
                        <button type="button" class="btn btn-primary" id="buttonregister">Register</button>
        
                        
                        </div>
                        
                      </form>
                </div>
              </div>
           </div>
<!--End Bagian Card Log In dan Sign Up-->

<!-- <section class="row d-flex align-items-center vh-100 justify-content-center">
    <form class="card px-5 py-5 shadow col-12 col-sm-6 col-md-5 col-lg-3 center-this-shit">
        <div id="namelogin">
            <h2 class="fw-bold text-center">Register</h2>
        </div>
        <div class="my-2">
            <label for="email" class="form-label">Email*</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="my-2">
            <label for="username" class="form-label">Username*</label>
            <input type="text" class="form-control" id="username">
        </div>
        <div class="my-2">
            <label for="password">Password</label>
            <div class="col-sm-20">
                <input type="password" class="form-control" id="password">
            </div>
        </div>
        <div class="my-2">
            <label for="confirmpassword">Confirm Password</label>
            <div class="col-sm-20">
                <input type="password" class="form-control" id="confirmpassword">
            </div>
        </div>
        <label class="mb-2">Ingin login? <a href="{{route('login')}}"> Klik disini</a></label>
        <div class="my-2">
            <button type="button" class="btn btn-primary" id="buttonregister">Register</button>
        </div>
    </form>
</section> -->


<div class="copyright">
    <p>
        <img width="10" src="{{asset('assets/copyright.svg')}}" alt="">

        Copyright Kasironald 2022
    </p>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#buttonregister').click(function() {
            let email = $('#email').val();
            let name = $('#username').val();
            let password = $('#password').val();
            let confirmpassword = $('#confirmpassword').val();

            console.log('here', password, confirmpassword)
            if (password !== confirmpassword) {
                let alert = $('div[role="alert"]');
                alert.addClass('alert alert-danger');
                alert.html('Password dan Confirm Password tidak sama');
                alert.show()

                return false;
            }

            $.ajax({
                url: "{{route('api.register')}}",
                type: "POST",
                data: {
                    email: email,
                    name: name,
                    password: password,
                    confirmpassword: confirmpassword,
                    _token: "{{csrf_token()}}"
                },
                success: function(data) {
                    let alert = $('div[role="alert"]');
                    alert.addClass('alert alert-success');
                    alert.html('User berhasil dibuat');
                    alert.show()

                    return false;
                },
                error: function(data) {
                    console.log(data);
                    let alert = $('div[role="alert"]');
                    alert.addClass('alert alert-danger alert-dismissible');
                    alert.html(data.responseJSON.message);
                    alert.show()

                    return false;
                }
            })
        })
    })
</script>
@endpush