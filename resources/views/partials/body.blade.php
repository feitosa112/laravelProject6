<body>
<div id="app">
   @include('partials.navbar')
   @include('flash-message')
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
