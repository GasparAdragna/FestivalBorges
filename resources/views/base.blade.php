<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Festival Borges">
    <meta name="language" content="spanish">
    <meta name="audience" content="all">
    <meta name="description" content="Festival para homenajear a uno de los máximos exponentes de la literatura argentina a los 123 años de su nacimiento. Actividades libres y gratuitas">
    <meta name="keywords" content="Festival Borges, Jorge Luis Borges, Borges">
    <meta name="robots" content="index, all, follow">
    <!-- Hotjar Tracking Code for My site -->
    <script>
      (function(h,o,t,j,a,r){
          h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
          h._hjSettings={hjid:2490054,hjsv:6};
          a=o.getElementsByTagName('head')[0];
          r=o.createElement('script');r.async=1;
          r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
          a.appendChild(r);
      })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <link href="/css/landing-page.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="/css/custom.css" rel="stylesheet">
    <link href="/css/all.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CC0G7GXGP6"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-CC0G7GXGP6');
    </script>
    @yield('title')
  </head>
  <body>
    @include('partials/header')
    @yield('main')
    @yield('others')
    @include('partials/footer')
    @include('partials/scripts')
    @yield('js')
  </body>
</html>
