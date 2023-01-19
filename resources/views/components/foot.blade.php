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