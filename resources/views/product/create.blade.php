@extends('layouts.master')

@section('title', 'Product Add')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-1">Product Add</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="productid">Product ID</label>
                    <input type="text" id="productid" name="productid" class="form-control @error('productid') is-invalid @enderror">
                    @error('productid')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Product Category</label>
                    <input type="text" id="category" name="category" class="form-control @error('category') is-invalid @enderror">
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">

                    </textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success">
                        SAVE
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection