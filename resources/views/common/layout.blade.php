<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Music Theory Helper</title>
        
        <!-- polyfill -->
    	<script src="/js/shim/Base64.js" type="text/javascript"></script>
    	<script src="/js/shim/Base64binary.js" type="text/javascript"></script>
    	<script src="/js/shim/WebAudioAPI.js" type="text/javascript"></script>
    	<!-- midi.js package -->
    	<script src="/js/midi/audioDetect.js" type="text/javascript"></script>
    	<script src="/js/midi/gm.js" type="text/javascript"></script>
    	<script src="/js/midi/loader.js" type="text/javascript"></script>
    	<script src="/js/midi/plugin.audiotag.js" type="text/javascript"></script>
    	<script src="/js/midi/plugin.webaudio.js" type="text/javascript"></script>
    	<script src="/js/midi/plugin.webmidi.js" type="text/javascript"></script>
    	<!-- utils -->
    	<script src="/js/util/dom_request_xhr.js" type="text/javascript"></script>
    	<script src="/js/util/dom_request_script.js" type="text/javascript"></script>

        <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="/js/main.js"></script>

        <link rel="stylesheet" href="/css/main.css" type="text/css">
        <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
        @yield('head')
    </head>
    <body>
        <div class="container">
            <div class="homebar"><a href="../">« Back</a></div>
        @yield('content')
        </div>
    </body>
</html>
