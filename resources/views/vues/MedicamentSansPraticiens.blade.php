@extends('layouts.master')
@section('content')
    <h1>Medicaments non prescrie</h1>
    @if (Session::get('type')!="")
        @if($mesMed->isEmpty())
            <h2 style="color: red">Tous les medicaments ont ete prescrits</h2>
        @else
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th style="widht:60%">Nom</th>

                </tr>
                </thead>
                @foreach($mesMed as $unMedicament)
                    <tr>
                        <td>
                            {{$unMedicament->nom_commercial}}
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    @endif
@stop
