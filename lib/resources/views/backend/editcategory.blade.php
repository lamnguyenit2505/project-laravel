@extends('backend.master')
@section('title','Sua danh sach san pham')
@section('main')
		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Sửa danh mục
						</div>
						<form action="" method="post">
							<div class="panel-body">
								@include('error.note')
								<div class="form-group">
									<label>Tên danh mục:</label>
	    							<input type="text" name="name" class="form-control" placeholder="Tên danh mục..." value="{{$cate->cate_name}}">
								</div>
							</div>
							<input type="submit" name="" class="btn btn-primary" value="Sủa danh mục sản phẩm ">
							<a href="{{asset('admin/category')}}" class="btn btn-danger">Hủy bỏ</a>

							{{csrf_field()}}
						</form>
					</div>
			</div>
		</div><!--/.row-->
</div>	<!--/.main-->
@stop