@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{url('home')}}"><button type="button" class="btn btn-primary">Retour</button></a>
            <br>
            <br>
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
        </div>
    </div>
</div>

@endsection