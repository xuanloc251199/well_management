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
                    <form class="p-4 bg-primary text-white rounded"
                        action="{{ route('admin.water_quality.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="ph_level" class="form-label">Mức độ pH</label>
                            <input type="text" class="form-control" name="ph_level" id="ph_level"
                                value="{{ old('ph_level', $item->ph_level) }}">
                            @error('ph_level')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tds" class="form-label">Tổng chất rắn hòa tan</label>
                            <input type="text" class="form-control" name="tds" id="tds"
                                value="{{ old('tds', $item->tds) }}">
                            @error('tds')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contamination" class="form-label">Loại chất gây ô nhiễm</label>
                            <input type="text" class="form-control" name="contamination" id="contamination"
                                value="{{ old('contamination', $item->contamination) }}">
                            @error('contamination')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="measured_at" class="form-label">Thời gian đo lường</label>
                            <input type="datetime-local" class="form-control" name="measured_at" id="measured_at"
                                value="{{ old('measured_at', $item->measured_at) }}">
                            @error('measured_at')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="well_id" class="form-label">Giếng nước</label>
                            <select id="well_id" class="form-select" name="well_id">
                                <option value="{{ $well->id }}" selected>{{ $well->name }}</option>
                                @foreach ($wells as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('well_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-light">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
