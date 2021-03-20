<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
body, html {
  padding: 0;
  margin: 0;
  width: 100%;
  min-height: 100vh;
}
body {
    background: rgb(6,200,203);
background: linear-gradient(0deg, rgba(6,200,203,1) 44%, rgba(45,150,253,1) 100%);}
</style>

    <title>Laravel</title>

<body>
    <div id="app" style="margin-top: 100px;">
        <app></app>
    </div>
</body>
<script src="{{ mix('js/app.js') }}"></script>
</html>
