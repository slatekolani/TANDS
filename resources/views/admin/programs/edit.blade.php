@extends('admin.layout')

@section('title', 'Edit Program')

@section('content')
<div class="card shadow-sm" style="max-width:560px">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.programs.update', $program) }}">
            @csrf
            @method('PUT')
            @include('admin.programs._form')
            <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
        </form>
    </div>
</div>
@endsection
