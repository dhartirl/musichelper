<!DOCTYPE html>
<html>
    <head>
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
                background: #fff;
            }

            .scale {
                border-bottom: 1px solid #333;
                padding: 0.5rem;
            }

            .scale-1 {
                background-color: #aaeeee;
            }

            .scale-2 {
                background-color: #eeaaaa;
            }

            .scale-3 {
                background-color: #eeeeaa;
            }

            .scale-4 {
                background-color: #aaaaee;
            }

            .scale-5 {
                background-color: #aaeeee;
            }

            .scale-6 {
                background-color: #aacccc;
            }

            .scale-7 {
                background-color: #aaccaa;
            }

            .scale-8 {
                background-color: #ccaacc;
            }

            .scale-9 {
                background-color: #eeaaee;
            }

            .scale-10 {
                background-color: #eeaaaa;
            }

            .scale-11 {
                background-color: #aaaaaa;
            }

        </style>
        <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.scale').on('click', function(event) {
                    document.location = '/scales/' + $(this).attr('class').match(/scale-(\d)/)[1];
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            @foreach ($scales as $scale)
            <div class="scale scale-{{$scale->id}}">
                <div class="scale-title">{{ $scale->name }}</div>
            </div>
            @endforeach
        </div>
    </body>
</html>
