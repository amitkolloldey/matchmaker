@extends('front.layouts.master')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                    {{--user profile--}}
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mm_image">
                            @if(!is_null($user->image))
                                <img src="{{asset('uploads/'.$user->image)}}" alt="{{$user->name}}"/>
                            @else
                                <img src="{{asset('images/anonymous_pro.png')}}" alt="{{$user->name}}"/>
                            @endif
                        </div>
                        <div class="com_view">
                            <p id="profile_1" data-profile="{{$user->id}}">Name:</p>
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
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <div class="mm_image" id="com_img">
                        </div>
                        <div class="com_view" id="com_name">
                        </div>
                        <div class="com_view" id="com_email">
                        </div>
                        <div class="com_view" id="com_age">
                        </div>
                        <div class="com_view" id="com_gender">
                        </div>
                        <div class="com_view" id="com_preferances">
                        </div>
                        <div class="com_view" id="com_other">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <form action="{{route('matchmaker.matched')}}" method="post" id="matched_form">
                        {{csrf_field()}}
                        <input type="hidden" name="profile_1" value="" required>
                        <input type="hidden" name="profile_2" value="" required>
                        <button id="matched" class="lf_pink_button">Match</button>
                    </form>
                </div>
            </div>
            {{--users profile--}}
            <div class="col-lg-6  col-md-6 col-sm-12">
                <div>
                    <div class="gender_radio">
                        <label>Gender:</label>
                        <input type="radio" value="Male" name="gender" id="gen_m" checked><label
                                for="gen_m">Male</label>
                        <input type="radio" value="Female" name="gender" id="gen_f"><label for="gen_f">Female</label>
                    </div>
                    <div class="age_group">
                        <label for="selectAgeGroupFrom">Age Group</label>
                        <select id="selectAgeGroupFrom">
                            @for($i = 18;$i<70;$i++)
                                <option>{{$i}}</option>
                            @endfor
                        </select>
                        <label for="selectAgeGroupTo">To</label>
                        <select id="selectAgeGroupTo">
                            @for($i = 18;$i<70;$i++)
                                <option>{{$i}}</option>
                            @endfor
                        </select>
                        <button id="go">Filter</button>
                    </div>
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
            var dataJSON = '';
            $.post(url,
                {
                    // _token: _token
                },
                function (data, status) {
                    if (status == 'success') {
                        var usersDiv = "";
                        dataJSON = JSON.parse(data);
                        $.each(dataJSON, function (index, item) {
                            var image_name = item.image;
                            var image_path = '{!! asset('uploads') !!}' + '/' + image_name;
                            var id = item.id;
                            var name = item.name;
                            var age = item.age;
                            var gender = item.gender;

                            var singleDiv = "";
                            var row_1_start = '<div class="row sin_user" onclick="selectedUser(' + id + ')">';
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

            $("#matched").click(function (e) {
                e.preventDefault();
                var profile_1 = $("#profile_1").data('profile');
                var profile_2 = $("#profile_2").data('profile');

                if (profile_1 != null && profile_2 != null) {
                    $("input[name='profile_1']").val(profile_1);
                    $("input[name='profile_2']").val(profile_2);
                    $("#matched_form").submit();
                } else {
                    alert("Please Select a profile.");
                }
            });

            //sort by
            $("#go").click(function (e) {
                var genderC = $("input[name=gender]:checked").val();
                var ageFrom = $("#selectAgeGroupFrom").find(":selected").text();
                var ageTo = $("#selectAgeGroupTo").find(":selected").text();


                var usersDiv = "";
                console.log(dataJSON);
                $.each(dataJSON, function (index, item) {
                    var image_name = item.image;
                    var image_path = '{!! asset('uploads') !!}' + '/' + image_name;
                    var id = item.id;
                    var name = item.name;
                    var age = item.age;
                    var gender = item.gender;

                    if (gender.toUpperCase() == genderC.toUpperCase() && age >= ageFrom && age <= ageTo) {
                        var singleDiv = "";
                        var row_1_start = '<div class="row sin_user" onclick="selectedUser(' + id + ')">';
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
                    }
                });
                users.html(usersDiv);


            });

        });

        function selectedUser(id) {
            var url = "{!! route('matchmaker.user') !!}";
            $.post(url,
                {
                    id: id
                },
                function (data, status) {
                    if (status == 'success') {
                        var dataJSON = JSON.parse(data);
                        var image_path = '{!! asset('uploads') !!}' + '/' + dataJSON.image;
                        var image = '';
                        if (dataJSON.image != null) {
                            image = '<img src="' + image_path + '" alt="' + dataJSON.name + '"/>';
                        } else {
                            image = '<img src="{!! asset("images/anonymous_pro.png") !!}" alt="' + name + '"/>';
                        }
                        $("#com_img").html(image);
                        $("#com_name").html('<p  id="profile_2" data-profile="' + id + '">Name:</p> <p>' + dataJSON.name + '</p>');
                        $("#com_email").html('<p>Email:</p> <p>' + dataJSON.email + '</p>');

                        if (dataJSON.age != null) {
                            $("#com_age").html('<p>Age:</p> <p>' + dataJSON.age + '</p>');
                        } else {
                            $("#com_age").html('');
                        }

                        if (dataJSON.gender != null) {
                            $("#com_gender").html('<p>Gender:</p> <p>' + dataJSON.gender + '</p>');
                        } else {
                            $("#com_gender").html('');
                        }

                        if (dataJSON.preferances != null) {
                            $("#com_preferances").html('<p>Preferances:</p> <p>' + dataJSON.preferances + '</p>');
                        } else {
                            $("#com_preferances").html('');
                        }

                        if (dataJSON.other != null) {
                            $("#com_other").html('<p>Others:</p> <p>' + dataJSON.other + '</p>');
                        } else {
                            $("#com_other").html('');
                        }
                    } else {
                        alert("data not found");
                    }
                }
            );
        }


    </script>
@endsection