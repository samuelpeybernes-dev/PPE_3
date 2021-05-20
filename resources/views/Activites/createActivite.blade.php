@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{url('home')}}"><button type="button" class="btn btn-primary">Retour</button></a>
            <br>
            <br>
            <div class="card">

                <div class="card-header">{{ __("Ajouter une activite") }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('activite.store') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="idVisiteur" class="col-md-4 col-form-label text-md-right">Nom
                                Visiteur</label>
                                
                            <div class="col-md-6">
                                <select class="form-control col-sm-6" name="idVisiteur">
                            
                                    @foreach ($personnel_sans_categorie as $personnel_sans_categorie)
                                    
                                    <option value="{{$personnel_sans_categorie['idPersonnel']}}">{{$personnel_sans_categorie['prenomPersonnel']}}
                                    </option>
                                    
                                    @endforeach  
                               
                                </select>
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="Objectif"
                                class="col-md-4 col-form-label text-md-right">{{ __('Objectif') }}</label>

                            <div class="col-md-6">
                                <input id="Objectif" type="text"
                                    class="form-control @error('Objectif') is-invalid @enderror" name="Objectif"
                                    value="{{ old('Objectif') }}" required autocomplete="Objectif" autofocus>

                                @error('Objectif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Prime"
                                class="col-md-4 col-form-label text-md-right">{{ __('Prime') }}</label>

                            <div class="col-md-6">
                                <input id="Prime" type="text"
                                    class="form-control @error('Prime') is-invalid @enderror" name="Prime"
                                    value="{{ old('Prime') }}" required autocomplete="Prime" autofocus>

                                @error('Prime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avantage"
                                class="col-md-4 col-form-label text-md-right">{{ __('Avantage') }}</label>

                            <div class="col-md-6">
                                <input id="avantage" type="text"
                                    class="form-control @error('avantage') is-invalid @enderror" name="avantage"
                                    value="{{ old('avantage') }}" required autocomplete="avantage" autofocus>

                                @error('avantage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="idBudget" class="col-md-4 col-form-label text-md-right">Budget</label>

                            <div class="col-md-6">
                                <select class="form-control col-sm-6" name="idBudget">
                                    @foreach ($budget as $budget)
                                    <option value="{{$budget['idBudget']}}">{{$budget['sold']}}</option>
                                    @endforeach
                                </select>
                            </div>
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
