@extends('admin.layouts.master')
@section('title', 'Gallery Images')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            Gallery Images
                        </div>
                        <div>
                            <a href="{{ route('create.guest') }}" class="btn btn-primary btn-sm">Add new photo</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-start">
                            @if (isset($galleries) && count($galleries) > 0)
                                @foreach ($galleries as $gallery)
                                    <div class="position-relative m-2" style="width: 150px; height: 150px;">
                                        <img src="{{ asset('storage/' . $gallery->photo) }}" alt="Photo" class="img-thumbnail" style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">
                                        <form class="deleteForm" action="{{ route('destroy.guest', $gallery->id) }}" method="post" style="position: absolute; top: 5px; right: 5px;">
                                            @csrf
                                            <button type="button" class="btn btn-danger btn-sm btnDelete">Delete</button>
                                        </form>
                                    </div>
                                @endforeach
                            @else
                                <p>There is no photo in your gallery.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
