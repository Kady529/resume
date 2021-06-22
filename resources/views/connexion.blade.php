
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
    <title>Connexion</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/bootstrap/dist/css/styles.css') }}" />

</head>
<body>

<section class="container">
    <section class="login-form">
        <form method="post" action="{{route('traitement')}}"  enctype="multipart/form-data" role="login">
            @csrf
              <div class="navbar nav_title"><img src="theme/production/images/logo_enabel.png" class="" alt="" width="120px" height="60px"/></div>
              <input type="email" name="email" placeholder="Email" required class="form-control input-lg" />
              <input type="password" name="password" placeholder="Password" required class="form-control input-lg" />
              <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Connexion</button>
        </form>
        <div class="form-links">
            <a href="http://127.0.0.1:8000">Sanita Indicateurs</a>
        </div>
    </section>
</section>


</body>
</html>
