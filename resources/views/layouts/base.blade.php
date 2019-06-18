<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="developer" content="Michael James Turiano Albatana">
    <meta name="languages" content="HTML,CSS,SASS,JavaScript,PHP,Laravel,MySQL">

    <title>Inventory App | {{$webheader}}</title>
    <link rel="stylesheet" href="assets/scss/style.css">
    <script src="assets/js/script.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/interactive.js"></script>

    @if(str_contains(url()->current(), ['127.0.0.1', 'localhost', '192.168.']))
      <link rel="icon" href="dev-assets/proprietary_logo/mjta-v01.ico" type="image/x-icon">
      <link rel="stylesheet" href="dev-libraries-localized/bootstrap/bootstrap-4.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
      <script src="dev-libraries-localized/jquery/jquery-3.3.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
      <script src="dev-libraries-localized/popper.js/popper.js-1.14.3/dist/umd/popper.min.js" crossorigin="anonymous"></script>
      <script src="dev-libraries-localized/bootstrap/bootstrap-4.1.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
      <script src="dev-libraries-localized/greensock-js/greensock-js-1.20.4/src/minified/TweenMax.min.js" crossorigin="anonymous"></script>
    @else
      <link rel="icon" href="https://bitbucket.org/mjtalbatana/dev-assets/raw/70c959a0e56681f63ce794b352481abdc632d02e/selection/mjta-v01.ico" type="image/x-icon">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.0/TweenMax.min.js" integrity="sha256-unS2S17N+s6Ms2ZlNb6Xsuw3sbIKPrtQiooRgB63asA=" crossorigin="anonymous"></script>
    @endif

  </head>

  <body onload="onload()">
    @include('layouts.partials.panel')
    @include('layouts.partials.snackbar')

    @yield('body')

    @include('layouts.partials.footer')
    @include('layouts.partials.modal')
  </body>
</html>
