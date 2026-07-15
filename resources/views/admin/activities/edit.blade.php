@extends('admin.layout')

@section('title', 'Edit Activity')

@section('content')
<div class="card shadow-sm" style="max-width:560px">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.activities.update', $activity) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.activities._form')
            <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
        </form>
    </div>
</div>
@endsection
