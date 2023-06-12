@extends('layouts.master')
@section('content')
    @if (Session::get('type')!="")
        <table class="table table-bordered table-striped table-responsive">
            <thead>
            <tr>
                <th style="widht:60%">Nom</th>
                <th style="widht:60%">Prenom</th>
                <th style="widht:60%">Ville</th>

                @if (Session::get('id')>0)
                    <th style="widht:60%">Spécialités</th>
                @endif
            </tr>
            </thead>
            @foreach($mesPra as $unPraticien)
                <tr>
                    <td>
                        {{$unPraticien->nom_praticien}}
                    </td>

                    <td>
                        {{$unPraticien->prenom_praticien}}
                    </td>

                    <td>
                        {{$unPraticien->ville_praticien}}
                    </td>

                    @if (Session::get('id')>0)
                        <td style="text-align: center;">
                            <a href="{{url('/listeSpe')}}/{{$unPraticien->id_praticien}}"> <span class="glyphicon glyphicon-book" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
    @endif

    @if (Session::get('id')>0)
        <a href="https://media.makeameme.org/created/felicitations.jpg">    </a>
    @endif
@stop

