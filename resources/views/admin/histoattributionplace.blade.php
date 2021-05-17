@extends('head.admin')
@section('content')
<div style="text-align: center;">
<div class="shadow-lg p-3 mb-5 bg-white rounded">
    <h3 align="center" style="color:#FFBF00";>HISTORIQUE DES RESERVATIONS</h3>
</div>
<div class="container mb-3 mt-3">
        <table class="table">
            <thead>
           <th scope="col">Id de la réservation</th>
           <th scope="col">position dans la file d'attente</th>
           <th scope="col">Numero de la place attribuée</th>
           <th scope="col">utilisateur</th>
           <th scope="col">Etat de la réservation</th>
           <th scope="col">Date début de la réservation</th>
           <th scope="col">Date fin de la réservation</th>
        </thead>
        <tbody>
            @foreach ($listeHistoReservation as $listeHistoReservationdata)
            <tr>
                <td>{{$listeHistoReservationdata->idReservation}}</td>
                <td>{{$listeHistoReservationdata->positionFileAttente}}</td>
                <td>{{$listeHistoReservationdata->numeroPlace}}</td>
                <td>{{$listeHistoReservationdata->nomUtilisateur}}</td>
                <td>
                    @if ($listeHistoReservationdata -> etatReservation == 1)
                        Annulée
                    @elseif($listeHistoReservationdata -> dateFin < date("Y-m-d"))
                        Expirée
                    @elseif($listeHistoReservationdata -> dateDebut == NULL)
                        En attente
                    @else
                        Validée
                    @endif
                </td>
                <td>{{$listeHistoReservationdata->dateDebut}}</td>
                <td>{{$listeHistoReservationdata->dateFin}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
