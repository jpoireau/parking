@extends('head.connexion')
@section('content')
<div class="login-form">
    @if (isset($error) && $error == 1)
        <center>
            <p class="bg-light border border-danger">
                Erreur dans le nom d'utilisateur ou tu mot de passe
            </p>
        </center>
    @elseif(isset($error) && $error == 2)
    <center>
        <p class="bg-light border border-danger">
            Compte non activé
        </p>
    </center>
    @elseif(isset($error) && $error == 4)
    <center>
        <p class="bg-light border border-primary">
            Demande d'inscription envoyé
        </p>
    </center>
    @elseif(isset($error) && $error == 5)
    <center>
        <p class="bg-light border border-primary">
            La demande de modification de mot de passe à était envoyée
        </p>
    </center>
    @endif
    <form action="/" method="post">
        @csrf
        <h2 class="text-center">Connexion</h2>
        <div class="form-group">
            <input type="text" name="user" class="form-control" placeholder="Utilisateur" required>
        </div>
        <div class="form-group">
            <input type="password" name="pswd" id="mdp" class="form-control" placeholder="Mot de passe" maxlength="30" required>
            <br>
            <input type="checkbox" onclick="myFunction()">Montrer mot de passe

            <script>
                function myFunction() {
                    var x = document.getElementById("mdp");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
        </div>
    </form>
    <div class="clearfix">
        <a href="mdpoublie" class="float-right">Mot de passe oublié ?</a>
    </div>
</div>
@endsection
