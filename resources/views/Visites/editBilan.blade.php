@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Entrer le bilan de la visite</h1>
  <div>
      <form method="post" action="{{ route('listevisite.update', $visite->idVisite) }}">
          {{ csrf_field() }}
          {{ method_field('PUT')}}
          <div class="form-group">
              <label for="dateVisite" class="form-control"><b>Date de la visite :</b> {{$visite->dateVisite}}</label>
          </div>

          <div class="form-group">
              <label for="dateVisite" class="form-control"><b>Motif de la visite :</b> {{$visite->motifVisite}}</label>
          </div>

          <div class="form-group">
            <label for="idProduit" class="form-control"><b>Medicament :</b> {{$visite->medocPresente}}</label>
          </div>

          <div class="form-group">
              <label for="bilanVisite"><b>Bilan de la visite : </b></label>
              <input id="bilan" type="text" class="form-control" name="bilanVisite" value="{{$visite->bilanVisite}}"/>
          </div>

          <div class="form-group">
              <input id="visiteur" type="hidden" class="form-control" name="idVisiteur" value="{{$visite->idVisiteur}}"/>
          </div>

          <div class="form-group">
            <label for="idPraticien" class="form-control"><b>Praticien :</b> {{$praticien->nomPratic}}</label>
          </div>
          
          <button type="submit" class="btn btn-info">Modifier visite</button>
      </form>
  </div>
</div>
</div>
@endsection