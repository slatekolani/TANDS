@extends('admin.layout')

@section('title', 'Add Partner')

@section('content')
<div class="card shadow-sm" style="max-width:560px">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.partners.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.partners._form')
            <button type="submit" class="btn btn-primary mt-3">Add Partner</button>
        </form>
    </div>
</div>
@endsection
