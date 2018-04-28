<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
</head>
<body>

<div class="wrapper" style="padding-bottom:0;">
    <header class="header2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <img src="http://matchmkr.co/images/logo.png" class="matchmkr-logo" style=""/>
                </div>
                <div class="col-md-6 text-right">
                    @guest
                        <a href="#" >
                            <div class="la-button-default la-btn2 iam-btn" style="">I am a Matchmaker</div>
                        </a>
                    @else
                        <div class="nav-item dropdown lf_dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="lf_dropdown_item">
                                    <a class="dropdown-item" href="{{ route('user.profile',Auth::user()->id) }}">
                                        {{ __('Profile') }}
                                    </a>
                                </div>
                                <div class="lf_dropdown_item">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </header>
