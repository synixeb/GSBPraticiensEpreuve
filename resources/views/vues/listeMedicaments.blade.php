@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'postListePraticien', 'files' => true]) !!}
<div class="col-md-12 well well-sm">
    <div class="form-group">
        <select type="text" name="idMed" value="idMed" class="form-control" required autofocus />
        @foreach($mesMed as $unMed)
            <option value="{{$unMed->id_medicament}}">{{$unMed->nom_commercial}}</option>
            @endforeach
            </select>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span> Valider</button>
        &nbsp
        <button type="button" class="btn btn-default btn-primary" onclick="{ window.location = '{{url('/')}}';}">
            <span class="glyphicon glyphicon-remove"></span>Annuler
        </button>
    </div>
</div>
{!! Form::close() !!}
@stop
