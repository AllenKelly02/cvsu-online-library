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
            padding: 1in;
            margin: 1in;
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
        <div class="header h-auto w-full flex justify-center">
            <div class="header-content items-center justify-center mt-4">
                <div class="flex items-center">
                    <!-- Logo on the left -->
                    <img class="w-36 h-auto logo" src="data:image/jpeg;base64,{{base64_encode(file_get_contents(public_path('img/logo.png')))}}" alt="">

                    <!-- Text on the right -->
                    <div class="ml-4 text-center">
                        <p class="text-black">Republic of the Philippines</p>
                        <b>
                            <p class="text-black">CAVITE STATE UNIVERSITY</p>
                        </b>
                        <p class="text-black"><b>Bacoor City Campus</b></p>
                        <p class="text-black">SHIV, Molino VI, City of Bacoor</p>
                        <p class="text-black">🕾 (046) 476-5029</p>
                        <p class="text-black"><i class="mdi mdi-email-outline text-black text-lg px-1"></i>cvsubacoor@cvsu.edu.ph</p>
                    </div>
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
