        @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{url('home')}}"><button type="button" class="btn btn-primary">Retour</button></a>
        <br>
        <br>
            <div class="card">
          
                <div class="card-header">{{ __("Ajouter un visiteur") }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('visiteurs.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nomPersonnel" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nomPersonnel" type="text" class="form-control @error('nomPersonnel') is-invalid @enderror" name="nomPersonnel" value="{{ old('nomPersonnel') }}" required autocomplete="nomPersonnel" autofocus>

                                @error('nomPersonnel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenomPersonnel" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>

                            <div class="col-md-6">
                                <input id="prenomPersonnel" type="text" class="form-control @error('prenomPersonnel') is-invalid @enderror" name="prenomPersonnel" value="{{ old('prenomPersonnel') }}" required autocomplete="prenomPersonnel" autofocus>

                                @error('prenomPersonnel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mdp" class="col-md-4 col-form-label text-md-right">{{ __('Mot de Passe') }}</label>

                            <div class="col-md-6">
                                <input id="mdp" type="mdp" class="form-control @error('mdp') is-invalid @enderror" name="mdp" required autocomplete="new-mdp">

                                @error('mdp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

