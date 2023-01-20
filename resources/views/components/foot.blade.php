<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="logo">
                    
                    <a class="logo-ft scroll-top" href="#"><img src="{{ asset('img/logo-ft.png') }}" alt=""></a>
                    <p>Copyright &copy; {{ date('Y') }} Alphalink Global Solutions</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="location">
                    <h4>Location</h4>
                    <ul>
                        <li>{{ getDefaults()[0]->full_address }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="contact-info">
                    <h4>More Info</h4>
                    <ul>
                        <li><em>Phone</em>: {{ getDefaults()[0]->phone_number }}</li>
                        <li><em>Email</em>: {{ getDefaults()[0]->email_address }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="connect-us">
                    <h4>Get Social with us</h4>
                    <ul>
                        <li><a href="{{ getDefaults()[0]->twitter_url }}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ getDefaults()[0]->facebook_url }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="mailto:{{ getDefaults()[0]->email_address }}"><i class="fa fa-google"></i></a></li>
                        <li><a href="{{ getDefaults()[0]->rss_url }}"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@if ($errors->any())
    @foreach($errors->all() as $error)
        <script defer>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text:  '{{$error}}',
            })
        </script>
    @endforeach
@endif

@if( Session::has('success') )
    <script defer>
        Swal.fire({
            icon: 'success',
            title: 'Yay...',
            text:  '{!! Session::get('success') !!}',
        })
    </script>
@endif
</body>

</html>