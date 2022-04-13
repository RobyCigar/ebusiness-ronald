<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>KASIRONALD</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/atas.css') }}" type="text/css"> -->


</head>

<body>
    <!--Bagian Atas Kasironald-->
    <div class="container-fluid" id="atas">
        <div>
            <h1>KASIRONALD</h1>
        </div>
    </div>
    <!--End Bagian Atas Kasironald-->

    <!--Bagian Card Log In dan Sign Up-->
    <div class="container-fluid" id="login">
        <div id="namelogin">
            <h2>Login</h2>
        </div>
        <div id="cardlogin" style="align-items: center;">
            <div class="row">
                <div id="formlogin">
                    <div class="mb-3 row" id="username">
                        <label for="staticUsername">Username</label>
                        <div class="col-sm-20">
                            <input type="text" value="">
                        </div>
                    </div>
                    <div class="mb-3 row" id="inputPassword">
                        <label for="inputPassword">Password</label>
                        <input type="password">
                    </div>
                    <div class="mb-3 row">
                        <a href=""> <button type="button" class="btn center-block" id="buttonlogin">Login</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Bagian Card Log In dan Sign Up-->

    <!--Tombol menuju Sign Up-->
    <div id="tosignup">
        <p>Buat Akun?
            <br><a href="">Klik Disini</a>
        </p>
    </div>

    <div class="copyright">
        <p>
            <img width="15" src="{{asset('assets/copyright.svg')}}" alt="">

            Copyright Kasironald 2022
        </p>
    </div>

    <script src="{{asset('js/jquery.js')}}"></script>
    <!-- <script language="JavaScript" type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script> -->
    <script src="{{asset('js/axios.js')}}"></script>
    <script defer>
     (async function() {
         await axios.get('http://localhost:8000/api').then(function(response) {
             console.log(response.data);
         });
     })()
    </script>
</body>

</html>