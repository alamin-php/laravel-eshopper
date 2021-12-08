<h2 class="title text-center">Features Items</h2>
@foreach($products as $product)
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
                <div class="productinfo text-center">
                    @if($product->image)
                    <img src="{{ asset($product->image) }}" alt="" />
                    @else
                    <img src="{{ asset('upload/default.png') }}" alt="" />
                    @endif
                    <h2>{{ $product->price }} TK</h2>
                    <p>{{ $product->name }}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>{{ $product->price }} TK</h2>
                        <p>{{ $product->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>{{ $product->brand_name }}</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div>
    </div>
</div>
@endforeach