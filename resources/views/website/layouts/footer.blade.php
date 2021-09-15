<footer>

    <div class="container">
        <div class="footer-bottom">
            <div class="fb-copyright">
                <p>Copyright © <script>document.write(new Date().getFullYear())</script> PAN AFRICAN CHEMICALS <br><small>Designed by <a href="www.codeisystems.co.ke" target="_blank" style="color:#FFA600">Codei Systems</a></small></p>
            </div>
            <div class="fb-social">
                <div class="span-fb-social"><a href="{{ $facebook->value }}" target="_blank"><i class="fab fa-facebook-f"></i></a></div>
                <div class="span-fb-social"><a href="{{ $linkedin->value }}"><i class="fab fa-linkedin-in"></i></a></div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('theme/js/modernizr-custom.js') }}"></script>
<script src="{{ asset('theme/js/plugins.js') }}"></script>
<script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('theme/js/main.js') }}"></script>
<script src="{{ asset('theme/js/navigation.js') }}"></script>
<!-- JAVASCRIPTS END -->
@section('footerSection')
@show
