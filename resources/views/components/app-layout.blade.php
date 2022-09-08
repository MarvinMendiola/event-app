<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <style>
        .textarea-note {
            width: 100%;
            height: 250px;
            border-radius: 10px;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-200 flex flex-col">
    <nav class="bg-white h-16 py-4 px-6 shadow-lg ">
        <a href="{{ route('events.index') }}">
            <h1 class="italic font-bold text-xl">Event App</h1>
        </a>
    </nav>
    <main class="container max-w-5xl mx-auto pt-8">
        {{ $slot }}
    </main>

    @if (session()->has('status'))
        <script>
            const notyf = new Notyf({
                dismissable: false
            });
            notyf.success('{{ session('status') }}')
        </script>
    @endif
</body>

</html>
