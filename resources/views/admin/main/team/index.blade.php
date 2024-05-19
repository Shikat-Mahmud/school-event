@extends('admin.layouts.master')
@section('title', 'Team List')
@push('styles')
    <style>
        .desc-box {
            max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        }
    </style>
@endpush
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            Team Member List
                        </div>
                        <div>
                            <a href="{{ route('create.team') }}" class="btn btn-primary btn-sm">Create new member </a>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="example"  style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>Member Name</th>
                                        <th>Role</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $member)
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->role }}</td>
                                        <td>
                                            @if ($member->photo)
                                            <img src="{{ asset('storage/' . $member->photo) }}" alt="Member photo"
                                                style="height: 50px; border-radius: 6px;">
                                            @else
                                            <img src="https://placehold.co/400" alt="Default photo"
                                                style="height: 50px; border-radius: 6px;">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-secondary btn-sm me-2"
                                                    href="{{ route('members.show', $member->id) }}">View</a>

                                                <a class="btn btn-info btn-sm me-2"
                                                    href="{{ route('members.edit', $member->id) }}">Edit</a>

                                                <form class="deleteForm"
                                                    action="{{ route('members.destroy', $member->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm btnDelete">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection