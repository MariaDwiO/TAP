@extends('admin.layout')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h5>Users</h5>
                </div>

                <div class="card-body">

                    @include('admin.partials.flash')

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Created At</th>

                                @can('edit_categories', 'delete_categories')
                                <th>Action</th>
                                @endcan
                            <tr>
                        </thead>

                        <tbody>
                            @php $no=1; @endphp
                            @forelse ($users as $user)
                                <tr>    
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->implode('name', ', ') }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                    @if (!$user->hasRole('Admin'))

                                        @can('edit_categories')
                                            <a href="{{ url('admin/users/'. $user->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                        @endcan

                                        @can('delete_categories')
                                            {!! Form::open(['url' => 'admin/users/'. $user->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        @endcan

                                    @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No records found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $users->links('vendor.pagination.custom') }}
                </div>

                @can('add_users')
                    <div class="card-footer text-right">
                        <a href="{{ url('admin/users/create') }}" class="btn btn-primary">Add New</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection