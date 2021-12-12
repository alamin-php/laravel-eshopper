@extends('layouts.frontend.app')
@section('title','Cart')
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{'/'}}">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<?php 
				$contents = Cart::content();
			?>
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($contents as $content)
					<tr>
						<td class="cart_product">
						@if($content->options->image)
						<img width="80px" src="{{ asset($content->options->image) }}" alt="" />
						@else
						<img width="80px" src="{{ asset('upload/default.png') }}" alt="" />
						@endif
						</td>
						<td class="cart_description">
							<h4><a href="">{{ $content->name }}</a></h4>
							<p>Size: {{ $content->options->size }}</p>
						</td>
						<td class="cart_price">
							<p>{{ $content->price }} Tk</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{ route('product.updateCart') }}" method="POST">
									@csrf
									<input class="cart_quantity_input" type="text" name="qty" value="{{ $content->qty }}" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="{{ $content->rowId }}">
									<button type="submit" class="btn btn-default btn-sm cart-update-btn">Update</button>
								</form>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">{{ $content->total }} Tk</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{ route('product.removeCart', $content->rowId) }}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</section>


<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{ Cart::subtotal() }}</span></li>
							<li>Eco Tax <span>{{ Cart::tax() }}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{ Cart::total() }}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>

@endsection