@extends('layouts.app')

@push('css')

@endpush

@push('js')

@endpush

@section('content')

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Roles</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard.index') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard.roles.index') }}">Roles</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                Create <small>Roles</small>
            </h3>
        </div>
        <div class="block-content block-content-full">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                        - {{ $message }}
                    @endforeach
                </div>
            @endif

            <form action="{{ route('dashboard.roles.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('dashboard.roles._form', [
                    'button' => 'Create'
                ])
            </form>

        </div>
    </div>
</div>
@endsection

