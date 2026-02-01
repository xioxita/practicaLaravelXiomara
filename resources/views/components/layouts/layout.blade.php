<!DOCTYPE html>
<html lang="en"data-theme="cupcake">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    @vite(["resources/css/app.css", "resources/js/app.js"])

</head>
<body class="flex flex-col min-h-screen">
<x-layouts.header />
<x-layouts.nav />

<main class="flex-grow">
    {{ $slot }}
</main>

<x-layouts.footer />
</body>
</html>
