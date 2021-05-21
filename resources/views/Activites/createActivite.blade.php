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
                            <label for="compteRendu"
                                class="col-md-4 col-form-label text-md-right">{{ __('Compte rendu') }}</label>

                            <div class="col-md-6">
                                <input id="compteRendu" type="text"
                                    class="form-control @error('compteRendu') is-invalid @enderror" name="compteRendu"
                                    value="{{ old('compteRendu') }}" required autocomplete="compteRendu" autofocus>

                                @error('compteRendu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="theme"
                                class="col-md-4 col-form-label text-md-right">{{ __('Theme	') }}</label>

                            <div class="col-md-6">
                                <input id="theme" type="text"
                                    class="form-control @error('theme') is-invalid @enderror" name="theme"
                                    value="{{ old('theme') }}" required autocomplete="theme" autofocus>

                                @error('theme	')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cocktailOffert"
                                class="col-md-4 col-form-label text-md-right">{{ __('Cocktail Offert') }}</label>

                            <div class="col-md-6">
                                <input id="cocktailOffert" type="text"
                                    class="form-control @error('cocktailOffert') is-invalid @enderror" name="cocktailOffert"
                                    value="{{ old('cocktailOffert') }}" required autocomplete="cocktailOffert" autofocus>

                                @error('cocktailOffert')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <input type="hidden" class="form-control" name="idVisiteur"
                                value="{{$unVisiteur->idVisiteur}}" />
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
