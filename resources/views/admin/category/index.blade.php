@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('message'))
        <div class="alert alert-danger">
            {{ session('message')}}
        </div>
    @elseif (session('success'))
        <div class="alert alert-success">
            {{ session('success')}}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1><strong>Categories list</strong></h1>
            <a href="{{ url('/admin/category/create') }}" class="btn btn-primary right">Create category</a>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td class="center">
                                    <a href="{{ url('admin/category/' . $category->id . '/edit') }}" class="btn btn-default">
                                        <i class="fa fa-pencil fa-fw"></i>Edit
                                    </a>
                                </td>
                                <td class="center">
                                    <form action="{{ url('admin/category/' . $category->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash-o  fa-fw"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div align="center">{!! $categories->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
