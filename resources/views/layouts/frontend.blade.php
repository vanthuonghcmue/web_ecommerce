<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    @yield('title')
    @include('frontend.components.meta')
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" />
    @include('frontend.components.styles')
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60dc7fd8315d7b0012983500&product=sticky-share-buttons" async="async"></script>
    <meta name="google-site-verification" content="q-OSpHnocyz6yrS-Wj9RarASDK8OX_ty628zXMRSdLE" />
    <!-- Google Analytics -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'G-XTTKYEWPJY', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->
    <!-- mailchimp -->
    <script id="mcjs">
        ! function(c, h, i, m, p) {
            m = c.createElement(h), p = c.getElementsByTagName(h)[0], m.async = 1, m.src = i, p.parentNode.insertBefore(m, p)
        }(document, "script", "https://chimpstatic.com/mcjs-connected/js/users/c9722486df6571baf39cdd76e/70a24a03312d62ff5d8da5a8d.js");
    </script>
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
