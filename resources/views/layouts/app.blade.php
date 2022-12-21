@include('layouts.head')

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

@include('layouts.nav')

    @yield('content')

@include('layouts.footer')

@include('layouts.scripts')
