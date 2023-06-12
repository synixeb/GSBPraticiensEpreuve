@extends('layouts.master')
@section('content')
    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th style="width: 60%">nom</th>
            @if (Session::get('type')=="A")
                <th style="width: 20%">spécialités</th>
                <th style="width: 20%">supprimer</th>
            @endif
        </tr>
        </thead>
        @foreach($mesSpe as $uneSpe)
            <tr>
                <td>
                    {{$uneSpe->lib_specialite}}
                </td>
                @if (Session::get('type')=="A")
                    <td style="text-align: center;">
                        <a href="{{url('/modifSpe')}}/{{$uneSpe->id_specialite}}"> <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a>
                    </td>
                    <td style="text-align: center;">
                        <a href="{{url('/supprSpe')}}/{{$uneSpe->id_specialite}}"> <span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Supprimer"></span></a>
                    </td>
                @endif
            </tr>
        @endforeach
    </table>
    @if (Session::get('type')=="A")
        <div class="well">
            {!! Form::open(['url' => 'postAjouterSpe', 'files' => true]) !!}
                <div class="col-md-12 well well-sm">
                    <div class="form-group">
                        <select type="text" name="idSpe" value="idSpe" class="form-control" required autofocus />
                            @foreach($AllSpe as $Spe)
                                <option value="{{$Spe->id_specialite}}">{{$Spe->lib_specialite}}</option>
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
        </div>
    @endif
@stop
