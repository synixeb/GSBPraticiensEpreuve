
@extends('layouts.master')
@section('content')
    @if (Session::get('type')!="")
        <h1>Les Praticiens</h1>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
            <tr>
                <th style="widht:60%">nom</th>
                <th style="widht:60%">prenom</th>
                <th style="widht:60%">adresse</th>

                @if (Session::get('id')>0)
                    <th style="widht:60%">spécialités</th>
                @endif
            </tr>
            </thead>
            @foreach($SearchPra as $unPraticien)
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

        <h1>Les Spécialité</h1>
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
            @foreach($SearchSpe as $uneSpe)
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
    @endif
@stop
