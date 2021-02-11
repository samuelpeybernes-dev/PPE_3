@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{url('home')}}"><button type="button" class="btn btn-primary">Retour</button></a>
        <br>
        <br>
            <div class="card">
          
                <div class="card-header">{{ __("Ajouter une visite") }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('visites.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="dateVisite" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="dateVisite" type="date" class="form-control @error('dateVisite') is-invalid @enderror" name="dateVisite" value="{{ old('dateVisite') }}" required autocomplete="dateVisite" autofocus>

                                @error('dateVisite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="motifVisite" class="col-md-4 col-form-label text-md-right">{{ __('motif de visite') }}</label>

                            <div class="col-md-6">
                                <input id="motifVisite" type="text" class="form-control @error('motifVisite') is-invalid @enderror" name="motifVisite" value="{{ old('motifVisite') }}" required autocomplete="motifVisite" autofocus>

                                @error('motifVisite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
            <label for="idVisiteur" class="col-md-4 col-form-label text-md-right">Visiteur:</label>
            <select class="form-control col-sm-6" name="idVisiteur">
            @foreach ($visiteur as $visiteur)
            <option value="{{$visiteur['idVisiteur']}}">{{$visiteur['idVisiteur']}}</option>
            @endforeach
            </select>
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
                                    {{ __("Ajouter") }}
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

