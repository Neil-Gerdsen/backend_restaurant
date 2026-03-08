<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Restaurants</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="max-w-5xl mx-auto p-10">

        <h1 class="text-4xl font-bold mb-8">
            Restaurants
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @foreach ($restaurants as $restaurant)

                <div class="bg-white p-6 rounded-lg shadow">

                    <h2 class="text-xl font-bold">
                        {{ $restaurant->name }}
                    </h2>

                    <p class="text-gray-500">
                        {{ $restaurant->location }}
                    </p>

                    <p class="mt-3">
                        {{ $restaurant->description }}
                    </p>

                </div>

            @endforeach

        </div>

    </div>

</body>

</html>