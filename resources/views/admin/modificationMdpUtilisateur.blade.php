<style>
    .login-form {
        width: 340px;
        margin: 50px auto;
        font-size: 15px;
    }

    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }

    .login-form h2 {
        margin: 0 0 15px;
    }

    .form-control,
    .btn {
        min-height: 38px;
        border-radius: 2px;
    }

    .btn {
        font-size: 15px;
        font-weight: bold;
    }

</style>
@extends('head.admin')
@section('content')
<div class="shadow-lg p-3 mb-5 bg-white rounded">
    <h3 align="center" style="color:#FFBF00";>MODIFICATION DU MOT DE PASSE DE L'UTILISATEUR : </h3>
  </div>
  <div class="login-form">
    <form action="/updateMotDePasse" method="post">
        @csrf
        <input type="hidden" name="id" value={{$_GET['id']}}>
        <input type="hidden" name="idUtilisateur" value={{$_GET['idUtilisateur']}}>
        <h2 class="text-center">Modification du mot de passe</h2>
        <div class="form-group">
            Nouveau mot de passe
            <input type="password" name="motDePasse" class="form-control" maxlength="30" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info btn-block">Changer le mot de passe</button>
        </div>
    </form>
</div>
@endsection
