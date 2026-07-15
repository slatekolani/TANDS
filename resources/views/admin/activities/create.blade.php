@extends('admin.layout')

@section('title', 'Add Activity')

@section('content')
<div class="card shadow-sm" style="max-width:560px">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.activities.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.activities._form')
            <button type="submit" class="btn btn-primary mt-3">Add Activity</button>
        </form>
    </div>
</div>
@endsection
