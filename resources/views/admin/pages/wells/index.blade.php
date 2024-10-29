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
    <div class="card-content">
        <div class="container-fluid mx-0 ps-0">
            <div class="row">
                <div class="bg-white col-lg-2">
                    @include('admin.pages._sidebar')
                </div>
                <div class="bg-white col-lg-10 pt-2">
                    <div class="button-action mb-3">
                        <a href="{{ route('admin.wells.create') }}" class="btn btn-primary">Thêm mới</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white" scope="col">#</th>
                                <th class="bg-primary text-white" scope="col">Tên</th>
                                <th class="bg-primary text-white" scope="col">Độ sâu</th>
                                <th class="bg-primary text-white" scope="col">Mức nước</th>
                                <th class="bg-primary text-white" scope="col">Trạng thái</th>
                                <th class="bg-primary text-white" scope="col">Thời gian tạo</th>
                                <th class="bg-primary text-white" colspan="3" scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wells as $key => $well)
                                <tr>
                                    <th scope="row">{!! $key + 1 !!}</th>
                                    <td>{!! $well->name !!}</td>
                                    <td>{!! $well->depth !!}</td>
                                    <td>{!! $well->water_level !!}</td>
                                    <td>{!! $well->status !!}</td>
                                    <td>{!! $well->created_at !!}</td>
                                    <td><a href="{{ route('admin.wells.show', $well->id) }}"
                                            class="btn btn-outline-success"><i class="fa-solid fa-circle-info"></i></a></td>
                                    <td><a href="{{ route('admin.wells.edit', $well->id) }}"
                                            class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></a></td>
                                    <td>
                                        <form action="{{ route('admin.wells.destroy', $well->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE') 
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
