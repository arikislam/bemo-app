<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Primary Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Laravel Vue App</title>
    <meta name="description" content="A brief description of your page">
    <meta name="keywords" content="keyword1, keyword2, keyword3">
    <meta name="author" content="Your Name or Company Name">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
{{--    <meta property="og:url" content="https://yourwebsite.com/">--}}
    <meta property="og:title" content="My Laravel Vue App">
    <meta property="og:description" content="A brief description of your page">
{{--    <meta property="og:image" content="https://yourwebsite.com/image.jpg">--}}

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
{{--    <meta property="twitter:url" content="https://yourwebsite.com/">--}}
    <meta property="twitter:title" content="My Laravel Vue App">
    <meta property="twitter:description" content="A brief description of your page">
{{--    <meta property="twitter:image" content="https://yourwebsite.com/image.jpg">--}}

    <!-- CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Replace with the path to your CSS file -->
    <!-- You can also add additional CSS files here -->
</head>
<body>

<div id="app">
    <example-component></example-component>
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
