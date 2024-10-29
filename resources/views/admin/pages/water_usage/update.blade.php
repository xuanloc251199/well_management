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
                    <form class="p-4 bg-primary text-white rounded" action="{{ route('admin.water_usage.update', $item->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="volume_used" class="form-label">Khối lượng nước sử dụng</label>
                            <input type="text" class="form-control" name="volume_used" id="volume_used"
                                value="{!! $item->volume_used !!}">
                        </div>
                        <div class="mb-3">
                            <label for="usage_date" class="form-label">Ngày sử dụng</label>
                            <input type="datetime-local" class="form-control" name="usage_date" id="usage_date"
                                value="{{ $item->usage_date }}">
                        </div>
                        <div class="mb-3">
                            <label for="well_id" class="form-label">Giếng nước</label>
                            <select id="well_id" class="form-select" name="well_id">
                                <option value="{!!$well->id!!}" selected>{!!$well->name!!}</option>
                                @foreach ($wells as $item)
                                    <option value="{!!$item->id!!}">{!!$item->name!!}</option>
                                @endforeach
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
