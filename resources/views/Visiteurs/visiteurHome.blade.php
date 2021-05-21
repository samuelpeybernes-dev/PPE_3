@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Espace visiteur') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Vous êtes connecté en tant que visiteur!') }}
                </div>

            </div>
            <br>
            <br>

            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">{{ __('Visites') }}</div>
            </div>

            <table class="table table-hover table-light ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Date de Visite</th>
                        <th scope="col">Medicament Présenté</th>
                        <th scope="col">Bilan Visite</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach ($UneVisite as $UneVisite)

                @if ($visiteur == $UneVisite->idVisiteur)
                <tbody>
                    <tr>
                        <th scope="row">{{$UneVisite->idVisite}}</th>
                        <td>{{$UneVisite->dateVisite}}</td>
                        <td>{{$UneVisite->medocPresente}}</td>
                        <td>{{$UneVisite->bilanVisite}}</td>
                        <td><a href="{{route('listevisite.edit', $UneVisite->idVisite)}}"><button type="button"
                                    class="btn btn-primary">Modifier bilan</button></a></td>
                        <td><a href="{{route('visites.show', $UneVisite->idVisite)}}"><button type="button"
                                    class="btn btn-info">Information</button></a></td>
                        <td>
                            <form action="{{route('visites.destroy', $UneVisite->idVisite)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>

                    </tr>
                </tbody>
                @endif

                @endforeach
            </table>
            <br>
            <br>

            

            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">{{ __('Activites complémentaires') }}</div>
            </div>

            <div class="text-center">
                <a href="{{route('activite.show', $visiteur)}}"><button type="button" class=" btn btn-success ">Demande d'activitée</button></a>
            </div>
            <br>
            <table class="table table-hover table-light ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">compteRendu</th>
                        <th scope="col">numAccord</th>
                        <th scope="col">theme</th>
                        <th scope="col">cocktailOffert</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach ($UneActivite as $UneActivite)

                @if ($visiteur == $UneActivite->idVisiteur)
                <tbody>
                    <tr>
                        <th scope="row">{{$UneActivite->idActivite}}</th>
                        <td>{{$UneActivite->compteRendu}}</td>
                        <td>{{$UneActivite->numAccord}}</td>
                        <td>{{$UneActivite->theme}}</td>
                        <td>{{$UneActivite->cocktailOffert}}</td>
                        @if($UneActivite->numAccord == true)
                        <td><button class="btn btn-success">Validé</button></td>
                        @else
                        <td> <button class="btn btn-primary">En attente..</button></td>
                        @endif
                        <td>
                            <form action="{{route('activite.destroy', $UneActivite->idActivite)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>

                    </tr>
                </tbody>
                @endif

                @endforeach
            </table>



        </div>
    </div>
</div>
@endsection