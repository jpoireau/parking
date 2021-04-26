<?php $error = 0 ?>
@if (isset($_POST['error']))
    <?php $error = $_POST['error'] ?>
@endif
<?php Log::debug($error); ?>
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
@extends('head.user')
@section('content')
<div class="login-form">
    @if ($error == 1)
    <center>
        <p class="bg-light border border-danger">
            Mot de passe incorrect
        </p>
    </center>
    @elseif($error == 2)
    <center>
        <p class="bg-light border border-primary">
            Mot de passe changer
        </p>
    </center>
    @endif
    <form action="ModificationConfirmation" method="post">
        @csrf
        <input type="hidden" name="iduser" value={{$info[0]}}>
        <h2 class="text-center">Modification du mot de passe</h2>
        <div class="form-group">
            Ancien mot de passe
            <input type="password" name="old" class="form-control" required>
        </div>
        <div class="form-group">
            Nouveau mot de passe
            <input type="password" name="new" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Changer le mot de passe</button>
        </div>
    </form>
</div>
@endsection
