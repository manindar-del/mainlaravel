<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <!-- Styles -->
           <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
        <body>
               <div id="app">
                  @yield('content')
                </div>

                   <!-- Scripts -->
                  <script src="{{ asset('js/app.js') }}"></script>

                      @stack('footer-top')
                      @stack('footer')
                      @stack('footer-bottom')
        </body>
   </html>
