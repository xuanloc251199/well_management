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
        <div class="content-show bg-white rounded p-3">
          <div class="card-content p-2">
            <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
              <div class="h4">Tên : </div>
              <div class="h5 text-danger">{{$user->name}}</div>
            </div>
            <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
              <div class="h4">Email : </div>
              <div class="h5 text-danger">{{$user->email}}</div>
            </div>
            <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
              <div class="h4">Username : </div>
              <div class="h5 text-danger">{{$user->username}}</div>
            </div>
            <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
              <div class="h4">Vai trò : </div>
              <div class="h5 text-danger">{{$user->role}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection