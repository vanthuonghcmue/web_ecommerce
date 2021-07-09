<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    @include('frontend.components.meta')
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" />
    @include('frontend.components.styles')
    @yield('title')
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60dc7fd8315d7b0012983500&product=sticky-share-buttons" async="async"></script>
</head>
<body>
    @include('frontend.components.header')
    @include('frontend.components.content')
    @include('frontend.components.share_this')
    @include('frontend.components.footer')
    @include('frontend.components.scripts')
    @include('frontend.components.live_chat')
</body>
</html>
