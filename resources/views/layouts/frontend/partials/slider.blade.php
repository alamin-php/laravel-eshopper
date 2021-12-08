@php 
	$sliders = DB::table('sliders')->where('status', true)->get();
@endphp
<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@foreach($sliders as $slider)
							<li data-target="#slider-carousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
							@endforeach
						</ol>
						
						<div class="carousel-inner">
						@foreach($sliders as $slider)
							<div class="item {{ $loop->first ? 'active' : '' }}">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>{{ $slider->slider_title }}</h2>
									<p>{{ $slider->slider_description }}</p>
									<button type="button" class="btn btn-default get">{{ $slider->btn_title }}</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset($slider->image) }}" class="girl img-responsive" alt="" />
								</div>
							</div>
							@endforeach
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->