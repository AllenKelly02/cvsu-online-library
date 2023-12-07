<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVSU Onlibrary Response</title>

    <style>
        :root {
            --base-100: #e2e8f0
        }

        body {
            padding: 0px;
            margin: 0px;
        }

        .content {
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 100vw;
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            display: flex;
            justify-content: center;
        }

        .header-content {
            padding: 2rem;
            display: flex;
            align-items: center;
            gap: 2rem;
            font-size: small;
        }

        .logo {
            height: 5rem;
            width: auto;
            object-position: center;
        }

        .content-body{
            display: flex;
            justify-content: center;
        }

        .content-p, p {
            width: 100%;
            text-align: justify;
            white-space: pre-line;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="header">
            <div class="header-content">
                <img src="data:image/jpeg;base64,{{base64_encode(file_get_contents(public_path('img/logo.png')))}}" alt="" srcset="" class="logo">
                <div>
                    <h1>Cavite State University Online Library</h1>
                    <p>Phase 2, Soldiers Hills 4, Molino 6,
                        City of Bacoor, Cavite
                         (046) 476 - 5029
                    </p>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="content-p">
                {{$slot}}
            </div>
        </div>
    </div>
</body>

</html>
