@extends('admin.layout')

@section('title', 'Add Hero Slide')

@section('content')
<div class="card shadow-sm" style="max-width:560px">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.hero-slides.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.hero-slides._form')
            <button type="submit" class="btn btn-primary mt-3">Add Slide</button>
        </form>
    </div>
</div>
@endsection
