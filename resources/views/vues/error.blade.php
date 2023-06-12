@extends('layouts.master')
@section('content')
    @if ($erreur !="")
        <div class="alert-danger" role="alert">
            <span class="glyficon glyphicon-exclamation-sign" aria-hidden="true"></span>{{"$erreur"}}
        </div>
    @endif
@stop
