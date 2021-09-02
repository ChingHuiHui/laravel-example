<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Hui testing</title>
  </head>
  <body>
    <main class="min-h-screen bg-red-100">   
      @yield('content')
    </main>
  </body>
</html>