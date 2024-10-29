@extends('admin.master')
@section('content')
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
    <div class="card-content pb-3">
        <div class="container-fluid mx-0 ps-0">
            <div class="row">
                <div class="bg-white col-lg-2">
                    @include('admin.pages._sidebar')
                </div>
                <div class="bg-white col-lg-10 pt-2">
                    <div class="content-show bg-white rounded p-3">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card-content p-2">
                                    <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
                                        <div class="h4">Tên giếng nước : </div>
                                        <div class="h5 text-danger">{!! $well->name !!}</div>
                                    </div>
                                    <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
                                        <div class="h4">Độ sâu giếng </div>
                                        <div class="h5 text-danger">{!! $well->depth !!}</div>
                                    </div>
                                    <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
                                        <div class="h4">Mức nước : </div>
                                        <div class="h5 text-danger">{!! $well->water_level !!}</div>
                                    </div>
                                    <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
                                        <div class="h4">Mức độ pH: </div>
                                        <div class="h5 text-danger">{!! $well->ph_level !!}</div>
                                    </div>
                                    <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
                                        <div class="h4">Tổng chất rắn hòa tan : </div>
                                        <div class="h5 text-danger">{!! $well->tds !!}</div>
                                    </div>
                                    <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
                                        <div class="h4">Loại chất gây ô nhiễm : </div>
                                        <div class="h5 text-danger">{!! $well->contamination !!}</div>
                                    </div>
                                    <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
                                        <div class="h4">Thời gian đo lường : </div>
                                        <div class="h5 text-danger">{!! $well->measured_at !!}</div>
                                    </div>
                                    <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
                                        <div class="h4">Khối lượng nước sử dụng : </div>
                                        <div class="h5 text-danger">{!! $well->volume_used !!} &#13221;</div>
                                    </div>
                                    <div class="d-flex align-items-end flex-wrap gap-2 mb-2">
                                        <div class="h4">Thời gian sử dụng : </div>
                                        <div class="h5 text-danger">{!! $well->created_at !!} </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="card-maps py-2">
                                    {!! $well->location !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
