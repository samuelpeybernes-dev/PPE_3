@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{url('home')}}"><button type="button" class="btn btn-primary">Retour</button></a>
            <br>
            <br>
            <div class="card">

                <div class="card-header">{{ __("Editer une visite") }}</div>

                <div class="card-body">

                    <form method="post" action="{{ route('visites.update', $visite->idVisite) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT')}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="dateVisite">Date:</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="dateVisite"
                                    value="{{$visite->dateVisite}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="motifVisite">Motif:</label>
                            <div class="col-md-6">
                                <input id="motif" type="text" class="form-control" name="motifVisite"
                                    value="{{$visite->motifVisite}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="medocPresente" class="col-md-4 col-form-label text-md-right">Medicament</label>
                            <select class="form-control col-sm-6" name="medocPresente">
                                @foreach ($medoc as $medoc)
                                <option value="{{$medoc['nom_commercial']}}">{{$medoc['nom_commercial']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" name="idVisiteur"
                                    value="{{$visiteur['idPersonnel']}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="idPraticien" class="col-md-4 col-form-label text-md-right">Praticien</label>
                            <select class="form-control col-sm-6" name="idPraticien">
                                @foreach ($praticien as $praticien)
                                <option value="{{$praticien['idPraticien']}}">{{$praticien['nomPratic']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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