@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{url('home')}}"><button type="button" class="btn btn-primary">Retour</button></a>
        <br>
        <br>

                
        <table class="table table-hover table-light ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Date de Visite</th>
      <th scope="col">Motif de visite</th>
      <th scope="col">Medicament Présenté</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>{{$UneVisite->idVisite}}</td>
      <td>{{$UneVisite->dateVisite}}</td>
      <td>{{$UneVisite->motifVisite}}</td>
      <td>{{$UneVisite->medocPresente}}</td>

    
    </tr>
  </tbody>

</table>   


        </div>
    </div>
</div>
@endsection
