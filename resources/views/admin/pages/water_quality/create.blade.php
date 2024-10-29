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
                    <form class="p-4 bg-primary text-white rounded" action="{{ route('admin.water_quality.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="ph_level" class="form-label">Mức độ pH</label>
                            <input type="text" class="form-control @error('ph_level') is-invalid @enderror" name="ph_level" id="ph_level"
                                placeholder="Mức độ pH" value="{{ old('ph_level') }}">
                            @error('ph_level')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tds" class="form-label">Tổng chất rắn hòa tan</label>
                            <input type="text" class="form-control @error('tds') is-invalid @enderror" name="tds" id="tds"
                                placeholder="Tổng chất rắn hòa tan (mg/L)" value="{{ old('tds') }}">
                            @error('tds')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="contamination" class="form-label">Loại chất gây ô nhiễm</label>
                            <input type="text" class="form-control @error('contamination') is-invalid @enderror" name="contamination" id="contamination"
                                placeholder="Loại chất gây ô nhiễm" value="{{ old('contamination') }}">
                            @error('contamination')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="measured_at" class="form-label">Thời gian đo lường</label>
                            <input type="datetime-local" class="form-control @error('measured_at') is-invalid @enderror" name="measured_at" id="measured_at"
                                placeholder="Thời gian đo lường" value="{{ old('measured_at') }}">
                            @error('measured_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="well_id" class="form-label">Giếng nước</label>
                            <select id="well_id" class="form-select @error('well_id') is-invalid @enderror" name="well_id">
                                <option value="">Chọn giếng nước</option>
                                @foreach ($wells as $item)
                                    <option value="{{ $item->id }}" {{ old('well_id') == $item->id ? 'selected' : '' }}>{!! $item->name !!}</option>
                                @endforeach
                            </select>
                            @error('well_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-light">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
