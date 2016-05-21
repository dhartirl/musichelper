<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">

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
                border: 2px solid #cc0000;
                color: #cc0000;
            }

            .note-1 {
                border: 2px solid #cccc00;
                color: #cccc00;
            }

            .note-2 {
                border: 2px solid #00cccc;
                color: #00cccc;
            }

            .note-3 {
                border: 2px solid #0000cc;
                color: #0000cc;
            }

            .note-4 {
                border: 2px solid #cc00cc;
                color: #cc00cc;
            }

            .note-5 {
                border: 2px solid #00cc00;
                color: #00cc00;
            }

            .note-6 {
                border: 2px solid #cc0000;
                color: #cc0000;
            }

            .note-7 {
                border: 2px solid #cc0000;
                color: #cc0000;
            }

            .note-8 {
                border: 2px solid #cc0000;
                color: #cc0000;
            }

            .note-9 {
                border: 2px solid #cc0000;
                color: #cc0000;
            }

            .note-10 {
                border: 2px solid #cc0000;
                color: #cc0000;
            }

            .note-11 {
                border: 2px solid #cc0000;
                color: #cc0000;
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
            
            .key-active.key-sharp {
                border: none;
            }
            

            .key-0 {
                border-color: #cc0000;
            }

            .key-1, .key-1 .KeyboardLayout-key-internal {
                border-color: #cccc00;
            }

            .key-2, .key-2 .KeyboardLayout-key-internal {
                border-color: #00cccc;
            }

            .key-3, .key-3 .KeyboardLayout-key-internal {
                border-color: #0000cc;
            }

            .key-4, .key-4 .KeyboardLayout-key-internal {
                border-color: #cc00cc;
            }

            .key-5, .key-5 .KeyboardLayout-key-internal {
                border-color: #00cc00;
            }

            .key-6, .key-6 .KeyboardLayout-key-internal {
                border-color: #cc0000;
            }

            .key-7, .key-7 .KeyboardLayout-key-internal {
                border-color: #cc0000;
            }

            .key-8, .key-8 .KeyboardLayout-key-internal {
                border-color: #cc0000;
            }

            .key-9, .key-9 .KeyboardLayout-key-internal {
                border-color: #cc0000;
            }

            .key-10, .key-10 .KeyboardLayout-key-internal {
                border-color: #cc0000;
            }

            .key-11, .key-11 .KeyboardLayout-key-internal {
                border-color: #cc0000;
            }

        </style>
        <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.scale-title').on('click', function(event) {
                    document.location = '/scales/' + $(this).parent().attr('class').match(/scale-(\d)/)[1];
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
