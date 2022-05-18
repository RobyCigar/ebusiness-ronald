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
                                        <select id="shift" class="form-select form-select-md mb-3">
                                            <option value="1" selected>08.00-16.00</option>
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
            let shift = $('#shift').val();

            let start_session = '';
            let end_session = '';

            if(shift = "1") {
                start_session = 8;
                end_session = 16;
            } else if(shift = "2"){
                start_session = 15
                end_session = 22
            } else {
                console.error("pemberian shift salah, value harus 1 atau 2");
            }

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
                    start_session: start_session,
                    end_session: end_session,
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