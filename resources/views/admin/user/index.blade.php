@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1><strong>Danh sach nguoi dung</strong></h1>

        @if(session('message'))
            <div class="alert alert-danger">
                {{ session('message')}}
            </div>
        @elseif (session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr >
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $us)
                <tr>
                    <td>{{ $us->id }}</td>
                    <td>{{ $us->name }}</td>
                    <td>{{ $us->email}}</td>
                    <td>
                        @if($us->is_admin == 1)
                        {{"Admin"}}
                        @else
                        {{"Member"}}
                        @endif
                    </td>
                    <td class="center">
                        <form action="{{ url('admin/user/' . $us->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash-o  fa-fw"></i>Delete
                            </button>
                        </form>
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/user/' . $us->id) . '/edit' }}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div align="center">{!! $user->links() !!}</div>
    </div>
</div>
@stop
