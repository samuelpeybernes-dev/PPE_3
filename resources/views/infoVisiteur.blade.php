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
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Matricule</th>
      <th scope="col">Email</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row">{{$UnVisiteur->idPersonnel}}</th>
      <td>{{$UnVisiteur->nomPersonnel}}</td>
      <td>{{$UnVisiteur->prenomPersonnel}}</td>
      <td>{{$UnVisiteur->matriculePersonnel}}</td>
      <td>{{$UnVisiteur->email}}</td>
    </tr>
  </tbody>

</table>  


        </div>
    </div>
</div>
@endsection
