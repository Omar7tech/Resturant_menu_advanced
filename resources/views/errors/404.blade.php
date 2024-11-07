<!doctype html>
<html data-theme="night">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="min-h-full bg-base-100 mb-5">
        <div class="sm:flex mid:flex mx-auto max-w-screen-xl px-10 py-10  lg:flex lg:items-center">
            <div class="mx-auto max-w-3xl text-center">
                <h1 class="text-7xl font-extrabold mb-5">Big Bunz</h1>
                <h1 class="text-3xl font-extrabold sm:text-5xl gradient-text light-gradient">
                    404
                </h1>
                <h1>Page No Found !</h1>
                <a href="{{ route('home') }}" class="link-hover link-primary">Go Home</a>
            </div>
        </div>
    </section>
</body>

</html>
