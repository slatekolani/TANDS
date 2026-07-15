@extends('admin.layout')

@section('title', 'Add Team Member')

@section('content')
<div class="card shadow-sm" style="max-width:560px">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.team.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.team._form')
            <button type="submit" class="btn btn-primary mt-3">Add Team Member</button>
        </form>
    </div>
</div>
@endsection
