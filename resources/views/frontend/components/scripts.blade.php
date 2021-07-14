<script type="text/javascript" src="{{ asset('frontend/js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.themepunch.plugins.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/engo-plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/store.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap-toastr/toastr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap-toastr/ui-toastr.js')}}"></script>
<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "url": "http://damashop.ga/",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "http://damashop.ga/",
            "query-input": "required name=search_term"
        },
        "name": "My shop",
        "description": "The best technology all over the world!",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Ho Chi Minh City, VN",
            "streetAddress": "351 Lạc Long Quân ,Phường 5, Quận 11, Thành phố Hồ Chí Minh Việt Nam"
        },
        "openingHours": [
            "Mo-Sa 09:00-22:30",
            "Su 09:00-23:00"
        ],
        "telephone": "+84345197641",
        "image": "http://damashop.ga/frontend/images/banner-sale.jpg",
        "priceRange": "100"
    }
</script>
<script>
    jQuery(document).ready(function() {
        UIToastr.init();
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'success') }}";
        switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
        default:
            toastr.success("{{ Session::get('message') }}");
            break;
        }
        @endif
    });
    $(document).on("click", ".add_to_cart", function () {
        let product_id = $(this).attr("data-id");
        let product_sku_id = $(this).attr("data-sku_id");
        let quantity = 1;
        url = '{{ route('cart.add_to_cart') }}';
        body = {
            id: product_id,
            product_sku_id: product_sku_id,
            quantity: quantity
        }
        postData(url, body).then(response => {
            if (response.cart_count) {
                $('#cart-count').html(response.cart_count);
                toastr.success('Add to cart successful!');
            } else {
                toastr.error('Add to cart error!');
            }
        })
    });
    async function postData(url = '', data = {}) {
        // Default options are marked with *
        const response = await fetch(url, {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        return response.json();
    }
</script>
@yield('scripts')
