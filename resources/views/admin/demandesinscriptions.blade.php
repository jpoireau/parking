@extends('head.admin')
@section('content')

<div style="text-align: center;">
<div class="shadow-lg p-3 mb-5 bg-white rounded">
    <h3 align="center" style="color:#FFBF00";>DEMANDES INSCRIPTIONS</h3>
    <br><br>
    <a href = "toutaccepter" class="btn btn-primary">Accepter toutes les inscriptions </a>
    <a href = "toutrefuser" class="btn btn-danger">Refuser toutes les inscriptions </a>
    <div class="container mb-3 mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="9">Liste D'attente</th>
                </tr>
                <tr>
                    <th scope="col">Id de l'utilisateur</th>
                    <th scope="col">Pseudonyme de l'utilisateur</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Accepter</th>
                    <th scope="col">Refuser </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($utilisateurNonInscrits as $value)
                    <tr>
                        <td>{{$value->idUtilisateur}}</td>
                        <td>{{$value->nomUtilisateur}}</td>
                        <td>{{$value->nom}}</td>
                        <td>{{$value->prenom}}</td>
                        <td>{{$value->mail}}</td>
                        <td><a class="btn btn-primary" href="accepterInscription/{{$value->idUtilisateur}}">Accepter</td>
                        <td><a class="btn btn-danger" href="refuserInscription/{{$value->idUtilisateur}}">Refuser</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
