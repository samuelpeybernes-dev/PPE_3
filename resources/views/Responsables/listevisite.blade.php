@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{url('home')}}"><button type="button" class="btn btn-primary">Retour</button></a>
            <br>
            <br>

            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">{{ __('Gestion des visites') }}</div>
            </div>
            <table class="table table-hover table-light">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Médicament présenté</th>
                        <th scope="col">Bilan</th>                        
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach ($UneVisite as $UneVisite)
                <tbody>
                    <tr>
                        @if ($visiteur == $UneVisite->idVisiteur)
                        <td>{{$UneVisite->dateVisite}}</td>
                        <td>{{$UneVisite->medocPresente}}</td>
                        <td>{{$UneVisite->bilanVisite}}</td>                        
                        <td><a href="{{route('visites.edit', $UneVisite->idVisite)}}"><button type="button"
                                    class="btn btn-primary">Modifier</button></a></td>
                        <td><a href="{{route('visites.show', $UneVisite->idVisite)}}"><button type="button"
                                    class="btn btn-info">Information</button></a></td>
                        <td>
                            <form action="{{route('visites.destroy', $UneVisite->idVisite)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>
<br>
<br>


            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">{{ __('Gestion des activitées complémentaires') }}</div>
            </div>
        
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
                        <td><a href="{{route('activite.edit', $visiteur)}}"><button type="button" class="btn btn-success">Donner accord</button></a></td>
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