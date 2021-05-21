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

                    <form method="post" action="{{ route('activite.update', $activite->idActivite) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT')}}
                        <div class="form-group row">
                            <label for="compteRendu" class="col-md-4 col-form-label text-md-right">Compte rendu
                                :</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" disabled="disabled" value="{{$activite->compteRendu}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="numAccord">Num accord :</label>
                            <div class="col-md-6">
                                <input id="numAccord" type="text" class="form-control"
                                    name="numAccord" value="{{$activite->numAccord}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="theme" class="col-md-4 col-form-label text-md-right">Theme :</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" disabled="disabled" value="{{$activite->theme}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cocktailOffert" class="col-md-4 col-form-label text-md-right">Cocktail offert :
                            </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" disabled="disabled" value="{{$activite->cocktailOffert}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <input id="visiteur" type="hidden" class="form-control"
                                name="idVisiteur" value="{{$activite->idVisiteur}}" />
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