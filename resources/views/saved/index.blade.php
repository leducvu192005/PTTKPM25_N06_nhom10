@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Tin đã lưu</h2>

    @if($saved->isEmpty())
        <p>Bạn chưa lưu tin nào.</p>
    @else
        <div class="row">
            @foreach($saved as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $item->room->image_path ? asset('storage/' . $item->room->image_path) : asset('images/default-room.jpg') }}"
                             class="card-img-top" style="height:200px; object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->room->title }}</h5>
                            <p class="card-text text-muted">{{ $item->room->address }}</p>

                            <a href="{{ route('rooms.show', $item->room->id) }}" class="btn btn-primary btn-sm">Xem chi tiết</a>

                            <form action="{{ route('saved.destroy', $item->room->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Bỏ lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
