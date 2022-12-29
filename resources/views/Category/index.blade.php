@extends('layouts.app')
@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 9 CRUD Example Tutorial</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create Category</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Category Name</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>

                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{ route('category.destroy',$category->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $categories->links() !!}
</div>

@endsection
