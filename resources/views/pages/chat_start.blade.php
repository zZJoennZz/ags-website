<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="front page-chat.css">
<title>Start your chat interview | Alphalink Global Solutions</title>
</head>

<body>
	<div class="bg" style="display: flex; justify-content: center;">
        <a href="{{ route('chat.start') }}" class="chat">
            <img src="{{ asset('img/chat-start.jpg') }}" alt="Click here to start chat">
        </a>
	</div>
 <!-- jQuery -->
    <script src="{{ asset('js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/popper.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{ asset('js/owl-carousel.js')}}"></script>
    <script src="{{ asset('js/scrollreveal.min.js')}}"></script>
    <script src="{{ asset('js/waypoints.min.js')}}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('js/imgfix.min.js')}}"></script>

    <!-- Global Init -->
    <script src="{{ asset('js/custom.js')}}"></script>
</body>
</html>
