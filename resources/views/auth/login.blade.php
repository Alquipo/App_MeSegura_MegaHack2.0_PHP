<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MESegura</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{-- <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{asset('css/custom.css')}}"></link>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page">
<div class="container">
    <br>
    <div class="col-md-4 offset-md-4 col-sm-12">

        <div class="card fundo" style="background-image: url('{{asset('img/fundo.jpeg')}}');min-height: 640px; min-width: 360px;">

            <div class="card-body">
            <div class="row d-flex justify-content-center">
                <h2 class="card-title ">MESegura</h2>    
            </div>
            
            <form action="{{url('/login')}}" method="POST" accept-charset="utf-8">
                @csrf
                <div class="form-group">
                    <label for="">Email</label>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    </div>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" name="email">
                     @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @enderror
                  </div>
                    
                    
                   
                </div>
                <div class="form-group">
                 
                    <label>Password</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></div>
                        </div>
                        <input name="password" class="form-control @error('password') is-invalid @enderror" type="password"></input>
                    @error('password')
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @enderror
                    </div>
                    
                       
                </div>
                <div class="row justify-content-between">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <button href="{{url('/')}}" class="btn btn-secondary">Criar cadastro</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- /.login-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
