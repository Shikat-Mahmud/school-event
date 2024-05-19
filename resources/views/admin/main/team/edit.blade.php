@extends('admin.layouts.master')
@section('title', 'Edit Team Member')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Edit Team Member</h4>

                        </div>
                        <div>
                            <a href="{{ route('team.list') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> Team Member List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.team', $team->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="team-name" class="col-md-4">Member Name: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="team-name" name="name" value="{{ old('name', $team->name) }}" class="form-control" placeholder="Member name" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="team-role" class="col-md-4">Role: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="team-role" name="role" value="{{ old('name', $team->role) }}" class="form-control" placeholder="Role" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="team-photo" class="col-md-4">Photo: </label>
                                <div class="col-md-8">
                                    <input type="file" id="team-photo" name="photo" class="form-control" />
                                    @if($team->photo)
                                        <img class="p-t-10" src="{{ asset('storage/' . $team->photo) }}" alt="{{ $team->name }}"
                                            width="100" />
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4"></label>
                                <div class="col-md-4">
                                    <input type="submit" value="Update" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection