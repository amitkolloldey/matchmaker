</div>
<footer>
    <div class="la-footer">
        <div>Matchmkr © 2018</div>
        <div>Friend-powered connections</div>
    </div>
</footer>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({selector: "#lfmce"});
</script>
@yield('script')
</body>
</html>