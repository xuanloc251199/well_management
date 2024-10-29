@extends('admin.master')
@section('content')
    @if (session('success'))
        <div id="success-alert" class="alert alert-success position-fixed top-0 end-0 m-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card-heading py-3">
        <div class="container">
            <div class="heading-title text-white text-center mx-auto mb-3">
                {{ $title }}
            </div>
            <div class="heading-detail text-white text-center mb-3">
                {{ $details }}
            </div>
        </div>
    </div>
    <div class="card-content">
        <div class="container-fluid mx-0 ps-0">
            <div class="row">
                <div class="bg-white col-lg-2">
                    @include('admin.pages._sidebar')
                </div>
                <div class="bg-white col-lg-10 pt-2">
                    <div class="button-action mb-3">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Thêm mới</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white" scope="col">#</th>
                                <th class="bg-primary text-white" scope="col">Tên</th>
                                <th class="bg-primary text-white" scope="col">Username</th>
                                <th class="bg-primary text-white" scope="col">Email</th>
                                <th class="bg-primary text-white" scope="col">Quyền</th>
                                <th class="bg-primary text-white" scope="col">Thời gian tạo</th>
                                <th class="bg-primary text-white" colspan="3" scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td><a href="{{ route('admin.users.show', $user->id) }}"
                                            class="btn btn-outline-success"><i class="fa-solid fa-circle-info"></i></a></td>
                                    <td><a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></a></td>
                                    <td>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE') <!-- Create phương thức DELETE -->
                                            <button class="btn btn-outline-danger" type="submit"
                                                style=" cursor: pointer;"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
