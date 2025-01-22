<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form" >
                                  <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                    <img class="text-center" src="{{asset('images/abc_shopy.png')}}" alt="" style="height: 150px;">
                                  </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form id="loginForm" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="hello@example.com" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" id="password" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('js/quixnav-init.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        document.getElementById('loginButton').addEventListener('click', function() {
            let formData = {
                email   : $('#email').val(),
                password: $('#password').val(),
                _token  : '{{ csrf_token() }}'
            };
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('login') }}",
                data: formData,
                success: function(response) {
                    console.log('login',response);
                    if (response.success) {
                        toastr.success('Login Success');
                        window.location.href = response.redirect_url;
                    } else {
                        toastr.error('Login Failed');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('An error occurred while processing your request.');
                }
            });
        });

    </script>
</body>

</html>