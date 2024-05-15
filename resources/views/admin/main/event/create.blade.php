@extends('admin.layouts.master')
@section('title', 'Add Event')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Add Event</h4>
                        </div>
                        <div>
                            <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> Category List</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('store.event') }}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Event Name <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" placeholder="Event Name"
                                        value="{{ old('name') }}" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Date and Time <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="datetime-local" name="datetime" class="form-control" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4"></label>
                                <div class="col-md-4">
                                    <input type="submit" value="Create" class="btn btn-success">
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