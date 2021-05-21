@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{url('home')}}"><button type="button" class="btn btn-primary">Retour</button></a>
            <br>
            <br>
            <div class="card">

                <div class="card-header">{{ __("Editer le bilan") }}</div>

                <div class="card-body">

                    <form method="post" action="{{ route('listevisite.update', $visite->idVisite) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT')}}
                        <div class="form-group row">
                            <label for="dateVisite" class="col-md-4 col-form-label text-md-right">Date de la visite
                                :</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" disabled="disabled" value="{{$visite->dateVisite}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dateVisite" class="col-md-4 col-form-label text-md-right">Motif de la visite
                                :</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" disabled="disabled" value="{{$visite->motifVisite}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="idProduit" class="col-md-4 col-form-label text-md-right">Medicament :</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" disabled="disabled" value="{{$visite->medocPresente}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="bilanVisite">Bilan de la visite :</label>
                            <div class="col-md-6">
                                <input id="bilan" type="text" class="form-control"
                                    name="bilanVisite" value="{{$visite->bilanVisite}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <input id="visiteur" type="hidden" class="form-control"
                                name="idVisiteur" value="{{$visite->idVisiteur}}" />
                        </div>

                        <div class="form-group row">
                            <label for="idPraticien" class="col-md-4 col-form-label text-md-right">Praticien :
                            </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" disabled="disabled" value="{{$praticien->nomPratic}}" />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                {{ __("Modifier") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection