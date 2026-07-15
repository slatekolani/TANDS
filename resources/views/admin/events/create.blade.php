@extends('admin.layout')

@section('title', 'New Event')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.events._form')
            <button type="submit" class="btn btn-primary mt-3">Create Event</button>
        </form>
    </div>
</div>
@endsection
