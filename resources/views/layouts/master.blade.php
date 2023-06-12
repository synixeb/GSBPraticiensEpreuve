<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/bootstrap-theme.css') !!}
        {!! Html::style('assets/css/gsb .css') !!}
        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    </head>
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar+ bvn"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}">GSB Frais</a>
                    </div>

                    @if (Session::get('id')==0)
                        <div class="collapse navbar-collapse" id="navbar-collapse-target">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{url('/login')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
                            </ul>
                        </div>
                    @endif

                    @if (Session::get('id')>0)
                        @if (Session::get('type')=="V")
                            <div class="collapse navbar-collapse" id="navbar-collapse-target">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{url('/listePraticiens')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister</a></li>
                                    <li><a href="{{url('/listeMed')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister</a></li>
                                    <li><a href="{{url('/SansPra')}}" data-toggle="collapse" data-target=".navbar-collapse.in">medicaments non prescrie</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">

                                    <li><a href="{{url('/logout')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Se déconnecter</a></li>
                                </ul>
                            </div>
                        @endif

                        @if (Session::get('type')=="A")
                            <div class="collapse navbar-collapse" id="navbar-collapse-target">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{url('/listePraticiens')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister Praticiens</a></li>
                                    <li><a href="{{url('/listeMed')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister Medicaments</a></li>
                                    <li><a href="{{url('/SansPra')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Non prescrie</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li data-toggle="collapse" data-target=".navbar-collapse.in">
                                        {!! Form::open(['url' => 'postSearch', 'files' => true]) !!}
                                        <input type="search" name="nom">
                                        <input type="submit" name="button" value="Rechercher">
                                        {!! Form::close() !!}
                                    </li>
                                    <li><a href="{{url('/logout')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Se déconnecter</a></li>
                                </ul>
                            </div>
                        @endif
                    @endif
                </div>
            </nav>
        </div>
        <br><br><br><br>
        <div class="container">
            @yield('content')
        </div>
        {!! Html::script('assets/js/bootstrap.min.js') !!}
        {!! Html::script('assets/js/jquery-2.1.3.min.js')  !!}
        {!! Html::script('assets/js/ui-bootstrap-tpls.js')  !!}
    </body>
</html>
