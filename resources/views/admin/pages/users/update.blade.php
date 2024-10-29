@extends('admin.master')
@section('content')
<div class="card-heading py-3">
  <div class="container">
    <div class="heading-title text-white text-center mx-auto mb-3">
      {{$title}}
    </div>
    <div class="heading-detail text-white text-center mb-3">
      {{$details}}
    </div>
  </div>
</div>
<div class="card-content pb-3">
  <div class="container-fluid mx-0 ps-0">
    <div class="row">
      <div class="col-lg-2">
        @include('admin.pages._sidebar')
      </div>
      <div class="bg-white col-lg-10 pt-2">
        <form class="p-4 bg-primary text-white rounded" action="{{route('admin.users.update', $user->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{$user->name}}">
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" value="{{$user->username}}">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password New</label>
            <input type="password" class="form-control" id="password" name="password_new" aria-describedby="emailHelp" placeholder="Enter new password if necessary!">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{$user->email}}">
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Quyền</label>
            <select id="role" class="form-select" name="role">
              <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>user</option>
              <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin</option>
            </select>
          </div>
          <button type="submit" class="btn btn-light">Cập nhật</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection