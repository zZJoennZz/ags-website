@if ($errors->any())
    @php
        $compiledErr = "";
    @endphp
    @foreach($errors->all() as $error)
        @php
            $compiledErr .= $error . ". ";
        @endphp
        <script defer>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text:  '{{$compiledErr}}',
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