<!doctype html>
<html data-theme="night">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-nav.main/>
    <section id="main" class="p-3 md:p-5 lg:p-10">
        {{ $slot }}
    </section>
    @if ($settings['show_footer'] == 'true' && !request()->is("login"))
        <x-sections.footer />
    @endif

</body>

</html>
