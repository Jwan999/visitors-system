<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IoT Maker</title>
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{--    <link href="css/app.css" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-200">
<div class="flex justify-center mt-14 px-4">
    <div class="bg-white rounded-lg p-6 md:w-4/12 w-full">
        <h1 class="font-bold text-2xl mb-6">Visitors Form</h1>
        <div class="space-y-3">
{{--          todo get only the sessions happening in this current day--}}
            <h1 class="text-sm text-gray-700">Session Title</h1>
            <input
                class="text-gray-800 px-6 py-3 rounded-lg w-full border-2 border-blue-200 focus:border-blue-500 outline-none"
                type="text" placeholder="Session title">
            <h1 class="text-sm text-gray-700">Enter your <span class="text-blue-500">Email</span> or your <span
                    class="text-blue-500">Phone Number</span></h1>
            <input
                class="text-gray-800 px-6 py-3 rounded-lg w-full border-2 border-blue-200 focus:border-blue-500 outline-none"
                type="text" placeholder="Email or Phone number">
        </div>
        <button
            class="bg-blue-500 border-2 border-blue-500 text-white text-sm font-bold rounded-lg py-3 w-full mt-6 outline-none focus:bg-blue-100 focus:text-blue-500">
            Submit
        </button>
    </div>

</div>
</body>
</html>
