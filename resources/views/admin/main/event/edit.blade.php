@extends('admin.layouts.master')
@section('title', 'Edit Event')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Edit Event</h4>

                        </div>
                        <div>
                            <a href="{{ route('events') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> Event List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.event', $event->id) }}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <label for="event-name" class="col-md-4">Event Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="event-name" name="name"
                                        value="{{ old('name', $event->name) }}" class="form-control" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="event-datetime" class="col-md-4">Date and Time <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="datetime-local" id="event-datetime" name="datetime"
                                        value="{{ old('datetime', \Carbon\Carbon::parse($event->datetime)->format('Y-m-d\TH:i')) }}"
                                        class="form-control" required />
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