@extends('admin.layout')

@section('title', 'Add Gallery Image')

@section('content')
<div class="card shadow-sm" style="max-width:560px">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.gallery._form')
            <button type="submit" class="btn btn-primary mt-3">Add Image</button>
        </form>
    </div>
</div>
@endsection
