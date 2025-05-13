<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="text-center bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-4xl font-bold text-indigo-600 mb-4">Welcome to Laravel!</h1>

        <p class="text-lg mb-6 text-gray-700">This is your beautiful Laravel application!</p>

        <div class="space-y-4">
            <a href="{{ route('login') }}"
               class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700 transition duration-300">
                Login (Tailwind CSS)
            </a>
            <a href="{{ url('/user') }}"
               class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition duration-300">
                User CRUD (Bootstrap)
            </a>
        </div>
    </div>

</body>
</html>
