<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome - Chess Bounx</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/board.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height welcome-background-img">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md justify-content-center">
                Chess Bounx
                <div class=" container rounded welcome-box" >
                    <p class="decription-text text-justify"> Hello, It is such a pleasure to come up with a wonderful task. Here I am supposed to show a chess board. Which has different board for white and black. Thus, I came up with multiple solution to solve this task.</p>
                    <p class="decription-text text-justify">I thought to use Images because my task is to show just the board for now. Whereas, I thought reasonably and found that I can create a chess board using the clean code too.</p>
                    <p class="decription-text text-justify">Since, the requirements in this agile world changes rapidly. looking at the earlier requirements we could have been managed <b>only</b> with the images too. Therefore, I came up with three different approaches. There were two approaches working with images and the <b>third</b> and my prefered <a href="Approach-3">approach</a> for future of the board. I tried to keep my <a href="git/link/to/repo">code</a> clean and easily understandable, readble. Hope you will love it.</p>
                    <p class="decription-text text-justify"><a href="Approach-2">Second Approach</a> is about the image manipulation. Nothing much could have been there to do so I just rotated the image. But it will be fun to look at the <a href="git/link/to/repo/approach-2/view">code</a></p>
                    <p class="decription-text text-justify"><a href="Approach-1">First Approach</a> is frankly nothing but an ease of solving a very complex looking issue. If we divide the problems into two parts white and black then it will be jusst two images to load on one condition. Feel free to browse the <a href="git/link/to/repo/approach-1/view">code</a> for it too.</p>
                    <p class="decription-text text-justify">Very thankful to you for giving me a chance to show up a few of capabilities. Hope to hear from you soon.</p>
                </div>

            </div>
        </div>
    </div>
</body>

</html>