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

        <script type="text/javascript">
        function playScale(scale, octaveBegin = 48) {
            var delay = 0;
            var lastNote = 0;
            if(scale.length < 8) {
                scale.push(scale[0]);
            }
            scale.forEach(function(note) {
                note += octaveBegin;
                if (note < lastNote) note += 12;
                lastNote = note;
                delay++;
                var velocity = 127; // how hard the note hits
                // play the note
                MIDI.setVolume(0, 127);
                MIDI.noteOn(0, note, velocity, delay);
                MIDI.noteOff(0, note, delay + 0.75);
            });
        }
        window.onload = function () {
            MIDI.loadPlugin({
                soundfontUrl: "/soundfont/",
                instrument: "acoustic_guitar_nylon",
                onprogress: function(state, progress) {
                    console.log(state, progress);
                },
                onsuccess: function() {
                    MIDI.programChange(0, MIDI.GM.byName["acoustic_guitar_nylon"].number);
                    window.noteOnCallback = function(note) {
                        document.querySelector(".KeyboardLayout-key.key-" + (note % 12)).classList.add('is-playing');
                        window.setTimeout(
                            "document.querySelector('.KeyboardLayout-key.key-" + (note % 12) + "').classList.remove('is-playing')",
                            750
                        );
                    };
                    document.querySelector('.loadingNotify').innerHTML = "Note: First play may be out of order";
                    document.querySelector('.playButton').classList.remove('is-hidden');
                }
            });
        };
        </script>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                font-weight: 300;
                font-size: 2rem;
                font-family: 'Lato';
                background: #333;
            }

            .container {
                display: flex;
                flex-direction: column;
                text-align: center;
            }

            .scale {
                border-bottom: 1px solid #333;
                display: flex;
                flex-direction: column;
            }

            .scale-1 .scale-title {
                background-color: #aaeeee;
            }

            .scale-2 .scale-title {
                background-color: #eeaaaa;
            }

            .scale-3 .scale-title {
                background-color: #eeeeaa;
            }

            .scale-4 .scale-title {
                background-color: #aaaaee;
            }

            .scale-5 .scale-title {
                background-color: #aaeeee;
            }

            .scale-6 .scale-title {
                background-color: #aacccc;
            }

            .scale-7 .scale-title {
                background-color: #aaccaa;
            }

            .scale-8 .scale-title {
                background-color: #ccaacc;
            }

            .scale-9 .scale-title {
                background-color: #eeaaee;
            }

            .scale-10 .scale-title {
                background-color: #eeaaaa;
            }

            .scale-11 .scale-title {
                background-color: #aaaaaa;
            }

            .scale-title {
                padding: 1rem;
            }

            .scale-intervals {
                width: 100%;
                font-size: 1.5rem;
                border-spacing: 0.5em 0.2em;
                margin-top: 0.5em;
            }

            .interval-length {
                padding: 0.5em;
                background: #222;
                color: #fff;
            }

            .interval-note {
                padding: 0.5em;
                background: #222;
                color: #fff;
                font-weight: 600;
            }

            .interval-name {
                padding: 0.5em;
                background: #fff;
            }

            .notes-choices {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
            }

            .note-box {
                display: block;
                padding: 0.2em;
                min-width: 1.5em;
                background: #222;
                margin: auto;
                text-decoration: none;
            }

            .note-0 {
                border: 2px solid #fff123;
                color: #fff123;
            }

            .note-1 {
                border: 2px solid #ffa923;
                color: #ffa923;
            }

            .note-2 {
                border: 2px solid #ff4c30;
                color: #ff4c30;
            }

            .note-3 {
                border: 2px solid #ff2624;
                color: #ff2624;
            }

            .note-4 {
                border: 2px solid #ff47ca;
                color: #ff47ca;
            }

            .note-5 {
                border: 2px solid #9861ff;
                color: #9861ff;
            }

            .note-6 {
                border: 2px solid #4c69ff;
                color: #4c69ff;
            }

            .note-7 {
                border: 2px solid #4eb9ff;
                color: #4eb9ff;
            }

            .note-8 {
                border: 2px solid #5cffea;
                color: #5cffea;
            }

            .note-9 {
                border: 2px solid #45ff84;
                color: #45ff84;
            }

            .note-10 {
                border: 2px solid #a8ff51;
                color: #a8ff51;
            }

            .note-11 {
                border: 2px solid #ecff48;
                color: #ecff48;
            }

            .notes-explain {
                display: block;
                color: white;
                margin: 0.5em 0;
            }

            .homebar {
                text-align: left;
                padding: 1em;
                background: #111;
                font-weight: bold;
            }

            .homebar a {
                color: #fff;
            }
            
            .KeyboardLayout {
                margin: 0.3em auto 0 auto;
                padding: 0 0.2em 0.2em 0.2em;
                height: 6.5em;
                display: flex;
                background: #555;
                border-radius: 0 0 0.2em 0.2em;
                border-top: 3px solid goldenrod;
            }
            
            @media (max-width: 35em) {
                .KeyboardLayout {
                    font-size: 0.7em;
                }
            }
            
            @media (max-width: 24em) {
                .KeyboardLayout {
                    font-size: 0.6em;
                }
            }
            
            .KeyboardLayout-key {
                background: #fff;
                width: 2em;
                margin: 0.1em;
            }
            
            .KeyboardLayout-key, .KeyboardLayout-key-internal {
                border-radius: 0 0 0.2em 0.2em;
                box-shadow: 2px 0px 1px #222;
                box-sizing: border-box;
            }
            
            .key-sharp {
                width: 0;
                margin: 0;
                position: relative;
            }

            .key-sharp .KeyboardLayout-key-internal {
                position: absolute;
                width: 1.5em;
                background: #111;
                height: 4em;
                left: -0.75em;
            }
            
            .key-active, .key-active.key-sharp .KeyboardLayout-key-internal {
                border-bottom-width: 0.4em;
                border-bottom-style: solid;
            }
            
            .is-playing, .is-playing.key-sharp .KeyboardLayout-key-internal {
                border-bottom-width: 2em;
            }
            
            .key-active.key-sharp, .key.is-playing.key-sharp {
                border: none;
            }
            
            .is-hidden {
                display: none;
            }

            .key-0 {
                border-color: #fff123;
            }

            .key-1, .key-1 .KeyboardLayout-key-internal {
                border-color: #ffa923;
            }

            .key-2, .key-2 .KeyboardLayout-key-internal {
                border-color: #ff4c30;
            }

            .key-3, .key-3 .KeyboardLayout-key-internal {
                border-color: #ff2624;
            }

            .key-4, .key-4 .KeyboardLayout-key-internal {
                border-color: #ff47ca;
            }

            .key-5, .key-5 .KeyboardLayout-key-internal {
                border-color: #9861ff;
            }

            .key-6, .key-6 .KeyboardLayout-key-internal {
                border-color: #4c69ff;
            }

            .key-7, .key-7 .KeyboardLayout-key-internal {
                border-color: #4eb9ff;
            }

            .key-8, .key-8 .KeyboardLayout-key-internal {
                border-color: #5cffea;
            }

            .key-9, .key-9 .KeyboardLayout-key-internal {
                border-color: #45ff84;
            }

            .key-10, .key-10 .KeyboardLayout-key-internal {
                border-color: #a8ff51;
            }

            .key-11, .key-11 .KeyboardLayout-key-internal {
                border-color: #ecff48;
            }
            
            .ScaleControls {
                display: flex;
                flex-direction: column;
                padding: 0.5em;
                text-align: center;
            }
            
            .loadingNotify {
                color: white;
                margin: 1em auto;
                font-size: 0.6em;
            }
            
            .playButton {
                padding: 0.5em 1em;
                background: #000;
                border: 2px solid #ccc;
                color: #fff;
                font-weight: 300;
                font-size: 1.5rem;
                font-family: 'Lato';
                margin: 1em auto;
            }

        </style>
        <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.scale-title').on('click', function(event) {
                    document.location = '/scales/' + $(this).parent().attr('class').match(/scale-(\d+)/)[1];
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="homebar"><a href="/scales">« Home</a></div>
        @yield('content')
        </div>
    </body>
</html>
