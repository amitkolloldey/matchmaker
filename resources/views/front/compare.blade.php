@extends('front.layouts.master')

@section('content')
    <div class="container">
        <div class="row ">
            {{--user profile--}}
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="mm_image">
                    @if(!is_null($user->image))
                        <img src="{{asset('uploads/'.$user->image)}}" alt="{{$user->name}}"/>
                    @else
                        <img src="{{asset('images/anonymous_pro.png')}}" alt="{{$user->name}}"/>
                    @endif
                </div>
                <div class="com_view">
                    <p>Name:</p>
                    <p>{{$user->name}}</p>
                </div>
                <div class="com_view">
                    <p>Email:</p>
                    <p>{{$user->email}}</p>
                </div>
                @if(!is_null($user->age))
                    <div class="com_view">
                        <p>Age:</p>
                        <p>{{$user->age}}</p>
                    </div>
                @endif

                @if(!is_null($user->gender))
                    <div class="com_view">
                        <p>Gender:</p>
                        <p>{{$user->gender}}</p>
                    </div>
                @endif

                @if(!is_null($user->preferances))
                    <div class="com_view">
                        <p>Preferances:</p>
                        <p>{{$user->preferances}}</p>
                    </div>
                @endif

                @if(!is_null($user->other))
                    <div class="com_view">
                        <p>Others:</p>
                        <p>{{$user->other}}</p>
                    </div>
                @endif
            </div>
            {{--compair profile--}}
            <div class="col-lg-3  col-md-3 col-sm-12">
                @if(!is_null($compareUser))
                    <div class="mm_image">
                        @if(!is_null($compareUser->image))
                            <img src="{{asset("uploads/".$compareUser->image)}}" alt="{{$compareUser->name}}"/>
                        @else
                            <img src="{{asset("images/anonymous_pro.png")}}" alt="{{$compareUser->name}}"/>
                        @endif
                    </div>
                    <div class="com_view">
                        <p>Name:</p>
                        <p>{{$compareUser->name}}</p>
                    </div>
                    <div class="com_view">
                        <p>Email:</p>
                        <p>{{$compareUser->email}}</p>
                    </div>
                    @if(!is_null($compareUser->age))
                        <div class="com_view">
                            <p>Age:</p>
                            <p>{{$compareUser->age}}</p>
                        </div>
                    @endif

                    @if(!is_null($compareUser->gender))
                        <div class="com_view">
                            <p>Gender:</p>
                            <p>{{$compareUser->gender}}</p>
                        </div>
                    @endif

                    @if(!is_null($compareUser->preferances))
                        <div class="com_view">
                            <p>Preferances:</p>
                            <p>{{$compareUser->preferances}}</p>
                        </div>
                    @endif

                    @if(!is_null($compareUser->other))
                        <div class="com_view">
                            <p>Others:</p>
                            <p>{{$compareUser->other}}</p>
                        </div>
                    @endif
                @endif
            </div>
            {{--users profile--}}
            <div class="col-lg-6  col-md-6 col-sm-12">
                <div>
                    <input type="text" name="search" placeholder="Search">
                </div>
                <div id="users">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            var url = "{!! route('matchmaker.users') !!}";
            var users = $("#users");
            $.post(url,
                {
                    // _token: _token
                },
                function (data, status) {
                    if (status == 'success') {
                        var usersDiv = "";
                        var dataJSON = JSON.parse(data);
                        $.each(dataJSON, function (index, item) {
                            var image_name = item.image;
                            var image_path = '{!! asset('uploads') !!}' + '/' + image_name;
                            var id = item.id;
                            var name = item.name;
                            var age = item.age;
                            var gender = item.gender;

                            var singleDiv = "";
                            var row_1_start = '<div class="row sin_user" data-id=' + id + '>';
                            var row_2_start = '<div class="row com_view">';
                            var div_end = '</div>';
                            var col_1_start = '<div class="col-lg-4 col-md-6 col-sm-12">';
                            var col_2_start = '<div class="col-lg-8 col-md-6 col-sm-12">';
                            var img_div_start = '<div class="list_image">';

                            var img = '<img src="' + image_path + '" alt="' + name + '"/>';
                            var not_f_img = '<img src="{!! asset("images/anonymous_pro.png") !!}" alt="' + name + '"/>';

                            singleDiv += row_1_start;
                            singleDiv += col_1_start;
                            singleDiv += img_div_start;
                            if (image_name != null) {
                                singleDiv += img;
                            } else {
                                singleDiv += not_f_img;
                            }
                            singleDiv += div_end;
                            singleDiv += div_end;

                            singleDiv += col_2_start;
                            singleDiv += row_2_start;
                            singleDiv += name;
                            singleDiv += div_end;

                            singleDiv += row_2_start;
                            singleDiv += age;
                            singleDiv += div_end;

                            singleDiv += row_2_start;
                            singleDiv += gender;
                            singleDiv += div_end;

                            singleDiv += div_end;
                            singleDiv += div_end;

                            usersDiv += singleDiv;
                        });
                        users.html(usersDiv);

                    } else {
                        console.log("failed");
                    }
                }
            );
            $(".sin_user").click(function (e) {
                alert("p");
            });
        });
    </script>
@endsection