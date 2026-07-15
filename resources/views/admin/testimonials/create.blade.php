@extends('admin.layout')

@section('title', 'Add Testimonial')

@section('content')
<div class="card shadow-sm" style="max-width:560px">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.testimonials.store') }}">
            @csrf
            @include('admin.testimonials._form')
            <button type="submit" class="btn btn-primary mt-3">Add Testimonial</button>
        </form>
    </div>
</div>
@endsection
