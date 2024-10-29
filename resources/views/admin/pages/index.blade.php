@extends('admin.master')
@section('content')
<div class="card-heading py-5">
  <div class="container">
    <div class="heading-title text-white text-center mx-auto mb-3">
      {{$title}}
    </div>
    <div class="heading-detail text-white text-center mb-3">
      {{$details}}
    </div>
    <div class="heading-controller text-center mb-3">
      <a href="#" class="btn btn-light">Tìm hiểu thêm</a>
    </div>
  </div>
</div>
<div class="card-content py-5">
  <div class="container">
    <div class="content-title text-white text-center h2 mb-lg-4 mb-sm-3">
      Tính năng chính
    </div>
    <div class="list-content-action">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="card bg-primary text-white text-center p-lg-4 p-md-3">
            <div class="card-icon text-center h1 mb-0">
              <i class="fa-solid fa-water"></i>
            </div>
            <div class="card-body pt-0">
              <div class="card-title h4 mb-2">Giám sát chất lượng nước</div>
              <p class="card-text">Theo dõi và phân tích chất lượng nước ngầm theo thời gian thực.</p>
              <a href="{{ route('admin.wells.index') }}" class="btn btn-light card-link">Xem số liệu chất lượng
                nước</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="card bg-primary text-white text-center p-lg-4 p-md-3">
            <div class="card-icon text-center h1 mb-0">
              <i class="fa-solid fa-chart-line"></i>
            </div>
            <div class="card-body pt-0">
              <div class="card-title h4 mb-2">Báo cáo thống kê</div>
              <p class="card-text">Cung cấp báo cáo chi tiết về tình hình nước ngầm.</p>
              <a href="{{ route('admin.reports.index') }}" class="btn btn-light card-link">Xem báo cáo</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="card bg-primary text-white text-center p-lg-4 p-md-3">
            <div class="card-icon text-center h1 mb-0">
              <i class="fa-solid fa-users"></i>
            </div>
            <div class="card-body pt-0">
              <div class="card-title h4 mb-2">Thông tin người dùng</div>
              <p class="card-text">Quản lý thông tin người dùng quyền truy cập.</p>
              <a href="{{ route('admin.users.index') }}" class="btn btn-light card-link">Xem thông tin</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection