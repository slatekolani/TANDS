@extends('admin.layout')

@section('title', 'Add Program')

@section('content')
<div class="card shadow-sm" style="max-width:560px">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.programs.store') }}">
            @csrf
            @include('admin.programs._form')
            <button type="submit" class="btn btn-primary mt-3">Add Program</button>
        </form>
    </div>
</div>
@endsection
