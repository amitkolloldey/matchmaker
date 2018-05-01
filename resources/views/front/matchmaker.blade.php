@extends('front.layouts.master')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 col-sm-12 col-md-8 col-lg-push-3 col-md-push-2">

                <form id="mm_profile_form" action="{{route('matchmaker.store')}}" method="post"
                      class="row lf_form">

                    <div class="profile_pic_upload">
                        <div id="upload_image" class="upload_image" action="{{ route('image.upload') }}">
                            <div class="dropzone">
                                <div class="dz-message">
                                    <img id="post-thumb-prev" src="{{asset('images/add_pro_pic.png')}}"
                                         alt="Drop images here or click to upload"/>
                                    <div>click to upload your image.</div>
                                </div>
                            </div>
                        </div>
                        <input id="post-thumb-input" type="hidden" class="form-control" name="thumb" value="">
                    </div>

                    <input hidden value="{{ csrf_token() }}" name="_token" type="text">
                    <div class="lf_form_input col-md-12">
                        <label for="name">Name (Required*)</label>
                        <input type="text" name="name" placeholder="Enter your Name" required><span
                                class="err_name"></span>
                    </div>
                    <div class="lf_form_input col-md-12">
                        <label for="email">Email (Required*)</label>
                        <input type="email" name="email" placeholder="Enter your Email" required><span
                                class="err_email"></span>
                    </div>
                    <div class="lf_form_input col-md-12">
                        <label for="password">Password (Required*)</label>
                        <input type="password" name="password_1" placeholder="Enter your Password" required><span
                                class="err_password"></span>
                    </div>
                    <div class="lf_form_input col-md-12">
                        <label for="password">Re-Password (Required*)</label>
                        <input type="password" name="password_2" placeholder="Re-Enter your Password" required><span
                                class="err_password"></span>
                    </div>
                    <div class="col-md-12">
                        <div class="la-button-default la-btn2 iam-btn" style="">
                            <input id="mm_create_profile" type="submit" value="Create Profile">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#mm_create_profile").click(function (e) {
            e.preventDefault();
            var name = $("input[name=name]");
            var email = $("input[name=email]");
            var password_1 = $("input[name=password_1]");
            var password_2 = $("input[name=password_2]");
            var form = $("#mm_profile_form");
            var n = checkName(name);
            var e = checkEmail(email);
            var p = checkPassword(password_1, password_2);
            if (n && e && p) {
                form.submit();
            }
        });

        function checkName(n) {
            var name = n.val();
            var regex = new RegExp(/^[a-zA-Z\s]+$/);
            if (name.length > 3 && regex.test(name)) {
                $(".err_name").html("");
                return true;
            } else {
                $(".err_name").html("<div style='color:red'>***Name is only contains space and letter.***</div>");
                return false;
            }
        }

        function checkEmail(e) {
            var email = e.val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if (email.length > 5 && emailReg.test(email)) {
                $(".err_email").html("");
                return true;
            }
            $(".err_email").html("<div style='color:red'>***Email is not valid.***</div>");
            return false;
        }

        function checkPassword(p1, p2) {
            var password_1 = p1.val();
            var password_2 = p2.val();
            if (password_1.length > 6 && password_1 == password_2) {
                $(".err_password").html("");
                return true;
            }
            $(".err_password").html("<div style='color:red'>***Password not match or less then 6 character.***</div>");
            return false;
        }


        var actionUrl = $(".upload_image").attr('data-action');
        Dropzone.autoDiscover = false;
        $("#upload_image").dropzone({
            paramName: "thumb",
            url: actionUrl,
            uploadMultiple: false,
            previewsContainer: false,
            addRemoveLinks: true,
            sending: function (file, xhr, formData) {
                formData.append('_token', $("input[name=_token]").val());
            },
            success: function (file, response, done) {
                $('#post-thumb-input').attr("value", response.imageName);
                $('#post-thumb-prev').attr("src", response.image);
            }
        });
    </script>
@endsection