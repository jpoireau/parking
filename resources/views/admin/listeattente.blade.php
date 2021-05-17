@extends('head.admin')
@section('content')
<div class="shadow-lg p-3 mb-5 bg-white rounded">
    <h3 align="center" style="color:#FFBF00" ;>LISTE D'ATTENTE</h3>
</div>
<div style="text-align: center;">
    <div class="container mb-3 mt-3">
        <table class="table">
            <thead>
                <th scope="col">Pseudonyme de l'utilisateur</th>
                <th scope="col">Position dans la file d'attente</th>
                <th scope="col">Modifier la position dans la file d'attente</th>
            </thead>
           <tbody>
                @foreach ($utilisateursFileAttente as $value)
                <form action="modificationFileAttente/{{$value->idReservation}}" method="get">
                    <tr>
                        <td>{{$value->nomUtilisateur}}</td>
                        <td>{{$value->positionFileAttente}}</td>
                        <td><button type="submit" class="btn btn-warning">modifier la file attente</button></td>
                        <input type="hidden" name="id" value={{$_POST['id']}}>
                        {{-- <td><a class="btn btn-warning" href="modificationFileAttente/{{$value->idReservation}}"> modifier la file attente</a></td> --}}
                    </tr>
                </form>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
