<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clover Admin</title>
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container" style="margin-top: 30px;">
        <form method="post" action="{{url('/login/checkLogin')}}" enctype="multipart/form-data">
            {{ csrf_field() }}


            @if($message = Session::get('error'))
            <div class="alert alert-dismissible alert-primary">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>
                    {{ $message }}
                </strong>
            </div>
            @endif


            @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
            <div class="alert alert-dismissible alert-primary">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{ $error }}</strong>
            </div>
            @endforeach
            @endif

            <fieldset style="width: 480px;margin: 10% auto;">
                <legend>Login</legend>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter User Name" />

                        @if ($errors->has('name'))
                        <small class="form-text invalid-feedback">
                            {{ $errors->first('name') }}
                        </small>
                        @endif

                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter Password" />

                        @if ($errors->has('password'))
                        <small class="form-text invalid-feedback">
                            {{ $errors->first('password') }}
                        </small>
                        @endif

                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </fieldset>
        </form>
    </div>

    @include('includes.footer')