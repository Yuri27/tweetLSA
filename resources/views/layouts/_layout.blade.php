<!DOCTYPE HTML>
<html>
<head>
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    @include('layouts.styles')
</head>
<body class="is-loading">

<!-- Wrapper -->
<div id="wrapper" class="fade-in">

    <!-- Intro -->
    <div id="intro">
        <h1>Визначення соціального настрою користувача</h1>
        <ul class="actions">
            <li><a href="#header" class="button icon solo fa-arrow-down scrolly">Продовжити</a></li>
        </ul>
    </div>

    <!-- Header -->
    @include('layouts/header')

    <!-- Main -->
    @yield('content')

    <!-- Footer -->
    @include('layouts/footer')

    <!-- Copyright -->
    <div id="copyright">
        <ul><li>&copy; Yurii Nahotniuk</li><li>Design: <a href="https://html5up.net">Yurii</a></li></ul>
    </div>

</div>

<!-- Scripts -->
@include('layouts/scripts')

</body>
</html>