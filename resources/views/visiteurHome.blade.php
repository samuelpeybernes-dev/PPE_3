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
        
            
            <table class="table table-hover table-light ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Date de Visite</th>
      <th scope="col">Motif de visite</th>
      <th scope="col">Medicament Présenté</th>
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
      <td>{{$UneVisite->motifVisite}}</td>
      <td>{{$UneVisite->medocPresente}}</td>
      <td><a href="{{route('visites.edit', $UneVisite->idVisite)}}"><button type="button" class="btn btn-primary">Modifier</button></a></td>
      <td><a href="{{route('visites.show', $UneVisite->idVisite)}}"><button  type="button" class="btn btn-info">Information</button></a></td>
      <td><form action="{{route('visites.destroy', $UneVisite->idVisite)}}" method="POST">
      @csrf
      @method('DELETE')

      <button type="submit" class="btn btn-danger">Supprimer</button>
      </form></td>
    
    </tr>
  </tbody>
  @endif

  @endforeach
</table>  


        </div>
    </div>
</div>
@endsection
