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

            .interval-name {
                padding: 0.5em;
                background: #fff;
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
            <div class="scale scale-{{$scale->id}}">
                <div class="scale-title">{{ $scale->name }}</div>
                <table class="scale-intervals">
                @foreach ($intervals as $interval)
                    <tr class="scale-interval">
                        <th class="interval-length">{{$interval->length}}</th>
                        <td class="interval-name">{{$interval->name}}</td>
                    </tr>
                @endforeach
                </table>
            </div>
        </div>
    </body>
</html>
