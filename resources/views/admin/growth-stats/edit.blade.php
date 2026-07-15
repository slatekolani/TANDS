@extends('admin.layout')

@section('title', 'Edit Growth Stat')

@section('content')
<div class="card shadow-sm" style="max-width:560px">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.growth-stats.update', $stat) }}">
            @csrf
            @method('PUT')
            @include('admin.growth-stats._form')
            <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
        </form>
    </div>
</div>
@endsection
