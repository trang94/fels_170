@extends('layouts.app')

@section('content')
<div class="container">
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
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{{ url('admin/category/' . $category->id . '/edit') }}">Edit</a>
                                </td>
                                <td class="center">
                                    <i class="fa fa-trash-o  fa-fw"></i>
                                    <a href="#">Delete</a>
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
