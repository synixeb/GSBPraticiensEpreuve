@extends('layouts.master')
@section('content')

    @if (Session::get('type')!="")
        @if($mesPraticiens->isEmpty())
            <h2 style="color: red">Il n'y a pas de praticiens ayant prescrit ce medicament</h2>
        @else
            <h1>Praticiens ayant prescrit le medicament</h1>
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th style="widht:60%">Nom</th>
                    <th style="widht:60%">Prenom</th>
                </tr>
                </thead>
                @foreach($mesPraticiens as $unPraticien)
                    <tr>
                        <td>
                            {{$unPraticien->nom_praticien}}
                        </td>

                        <td>
                            {{$unPraticien->prenom_praticien}}
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    @endif
@stop

