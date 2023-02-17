@extends('admin.index-layout')
@section('table')
<div class="row" style="width: 100%;margin: 0;">
@if(session('productDeleteSuccess'))
    <div class="alert alert-success">{{ session('productDeleteSuccess') }}</div>
@endif
@error('productDeleteError')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

@if(session('productUpdateSuccess'))
    <div class="alert alert-success">{{ session('productUpdateSuccess') }}</div>
@endif
@error('productUpdateError')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

@if(session('productCreated'))
  <div class="alert alert-success">{{ session('productCreated') }}</div>
@endif
@error('productCreateError')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="col-12 col-lg-8 col-xxl-9" style="width: 100%;padding: 0;">
	<div class="card flex-fill">
		<table class="table table-hover my-0">
			<thead>
				<tr>
					<th>Id</th>
					<th class="d-none d-xl-table-cell">Name</th>
					<th class="d-none d-xl-table-cell">Price</th>
					<th>Description</th>
					<th>Category</th>
					<th class="d-none d-md-table-cell">Created at</th>
					<th class="d-none d-md-table-cell">Delete</th>
					<th class="d-none d-md-table-cell">Edit</th>
				</tr>
			</thead>
			<tbody>
			    @foreach($products as $product)
				<tr>
				    <td>{{ $product->id }}</td>
					<td>{{ $product->name }}</td>
					<td class="d-none d-xl-table-cell">{{ $product->price }} $</td>
					<td class="d-none d-md-table-cell">{{ $product->description }}</td>
					<td class="d-none d-md-table-cell">{{ $product->category->name }}</td>
					<td class="d-none d-md-table-cell">{{ $product->created_at }}</td>
				    <td class="d-none d-md-table-cell"><a class="deleteButton" href="" data-toggle="modal" data-target="#deleteModal" data-type="product" data-url="{{ url('admin/product/' . $product->id) }}" data-name="{{ $product->name }}"><i class="ti-trash mr-2" style="color:red;"></i></a></td>
				    <td class="d-none d-md-table-cell"></td>
				    <td class="d-none d-md-table-cell"><a href="{{ url('admin/product/' . $product->id . '/edit') }}"><i class="ti-pencil mr-2" style="color:green;"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</div>
<a href="{{ url('admin/product/create') }}" class="btn btn-primary" style="margin-top: 10px;">New Product</a>
@endsection

@section('modals')
<!-- Delete Product Modal -->
<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post" id="deleteForm">
                @method('delete')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Delete product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border:0;background:transparent;">
                        <span class="ti-close" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Delete"></input>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ url('assets/js/review-delete-modal.js') }}"></script>
@endsection