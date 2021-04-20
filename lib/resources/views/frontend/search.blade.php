@extends('frontend.master')
@section('title','Kết quả tìm kiếm')
@section('main')
<link rel="stylesheet" href="css/search.css">	
<div id="wrap-inner">
	<div class="products">
		<h3>Tìm kiếm với từ khóa:  <span>{{$keyword}}</span></h3>
		<div class="product-list row">
			@foreach($searchResult as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img height='150x 'src="{{asset('lib/storage/app/avatar/' . $item->pro_img)}}"></a>
				<p><a href="#">{{$item->pro_name}}</a></p>
				<p class="price">{{number_format($item->pro_price,0,',','.')}}</p>	  
				<div class="marsk">
					<a href="{{asset('details/'. $item->pro_id . '/' . $item->pro_slug . '.html')}}">Xem chi tiết</a>
				</div>                                    
			</div>
			@endforeach
		</div>    
		{{$searchResult->appends(['keyword' => $keyword])}}            	                	
	</div>
</div>
@stop
					
			