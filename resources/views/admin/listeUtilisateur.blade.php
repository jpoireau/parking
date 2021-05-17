@extends('head.admin')
@section('content')


<div class="shadow-lg p-3 mb-5 bg-white rounded">
    <form action="demandesinscriptions" method="get">
        @csrf
        <input type="hidden" name="id" value={{$_POST['id']}}>
        <button type="submit" class="btn btn-warning">Voir demandes d'inscription</button>
    </form>
    <h3 align="center" style="color:#FFBF00">LISTE DES UTILISATEURS</h3>
</div>
    <table class="table">

        <th scope="col">Id de l'utilisateur </th>
        <th scope="col">Pseudo de l'utilisateur </th>
        <th scope="col">Nom de l'utilisateur </th>
        <th scope="col">Prénom de l'utlisateur </th>
        <th scope="col">Mail de l'utilisateur </th>
        <th scope="col">MDP Oublié? </th>
        </tr>
        @foreach ($listeUtilisateur as $listeUtilisateurdata)
        <?php $idUtilisateur = $listeUtilisateurdata->idUtilisateur; ?>
        <form action="modificationMdpUtilisateur/{{$idUtilisateur}}" method="get">
            <input type="hidden" name="id" value={{$_POST['id']}}>
            <input type="hidden" name="idUtilisateur" value={{$idUtilisateur}}>
            <tr>
                <td>{{$idUtilisateur}}</td>
                <td>{{$listeUtilisateurdata->nomUtilisateur}}</td>
                <td>{{$listeUtilisateurdata->nom}}</td>
                <td>{{$listeUtilisateurdata->prenom}}</td>
                <td>{{$listeUtilisateurdata->mail}}</td>
                <td>
                    @if ($listeUtilisateurdata->motDePasseOublie == 0)
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    @else
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    @endif
                </td>
            </tr>
        </form>
        @endforeach
        </tbody>
    </table>
@endsection
