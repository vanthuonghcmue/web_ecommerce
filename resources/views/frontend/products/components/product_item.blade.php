<div class="item-inner">
    <div class="product">
        <p class="product-title">{{ $product->name }}</p>
        <p class="product-price"><span>price: </span>$ {{ $product->sale_price }}</p>
        <a class="product-images" href="{{ route('product.details', $product->slug) }}" title="{{ $product->name }}">
            <img class="primary_image" src="{{ get_image($product->image, App\Models\Product::IMAGE_SIZE['list']) }}" alt="{{ $product->name }}"/>
            <img class="secondary_image" src="{{ get_image($product->image, App\Models\Product::IMAGE_SIZE['list']) }}" alt="{{ $product->name }}"/>
        </a>
        <p class="description"> {{$product->description}}</p>
        <div class="action">
            <a title="add-to-cart" class="add_to_cart" data-id="{{ $product->product_id }}" data-sku_id="{{ $product->id }}"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
        </div>
    </div>
</div>
