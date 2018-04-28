@extends('front.layouts.master') @section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="title-page profile_title text-center">
                    <h2>{{$user->name}}'s Profile</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        @include('front.partials.profilelinks')
                    </div>
                    <div class="col-md-8">
                        <div class="profile_info row">
                            <div class="col-md-12">
                                <div class="row public-link-title">
                                     <h1>Send your link to friends to start receiving matches</h1>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 content-block public-link">
                                            <h2>Facebook Share:</h2>
                                            <a href="{{route('user.profile.show',$user->id)}}">{{route('user.profile.show',$user->id)}}</a>
                                         <a class="share-btn share-fb-btn" href="https://www.facebook.com/sharer/sharer.php?u={{route
                                         ('user.profile.show',$user->id)}}"
                                            target="_blank">
                                            Share
                                        </a>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-12 content-block public-link">
                                            <h2>Whatsapp Share:</h2>
                                            <a href="{{route('user.profile.show',$user->id)}}">{{route('user.profile.show',$user->id)}}</a>
                                            <div class="col-xs-12 text-right ">
                                                <a class="share-btn share-wa-btn" href="whatsapp://send?text={{route
                                                ('user.profile.show',$user->id)}}" data-action="share/whatsapp/share">Share</a>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row lf_tab">
                                    <div class="col-md-12">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#share_email">Share Via Email</a></li>
                                            <li ><a data-toggle="tab" href="#share_phone">Share Via SMS</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="share_email" class="tab-pane fade in active show">
                                                <form action="#" class="lf_form">
                                                    <input type="email" class="lf_form_input" placeholder="Email">
                                                    <textarea name="" id="" cols="30" rows="10"
                                                              placeholder="Message"></textarea>
                                                    <input type="submit" class="lf_pink_button" value="Send Email">
                                                </form>
                                            </div>
                                            <div id="share_phone" class="tab-pane fade">
                                                <form action="#" class="lf_form">
                                                    <input type="text" class="lf_form_input" placeholder="Phone no">
                                                    <textarea name="" id="" cols="30" rows="10"
                                                              placeholder="Message"></textarea>
                                                    <input type="submit" class="lf_pink_button" value="Send SMS">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection