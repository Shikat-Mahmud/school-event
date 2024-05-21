@extends('admin.layouts.master')
@section('title', 'Registration Details')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>Student Registration Details</h4>
                            </div>
                            <div>
                                <a href="{{ route('register.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Student Registration List</a>
                            </div>
                        </div>
                        <div class="card-body text-dark">
                            <div class="p-2 text-center">
                                @if (isset($student->photo))
                                    <img src="{{ asset('storage/' . $student->photo) }}" alt="Photo"
                                        style="height: 200px; border-radius: 10px;">
                                @else
                                    <img src="{{ asset('/assets/images/user/avatar-2.jpg') }}" alt="Student Photo">
                                @endif
                            </div>
                            <br>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>Student Name: </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $student->name }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>Student Batch: </span></b>
                                </div>
                                <div class="col-md-8">
                                    @if (isset($student->batch))
                                        <p class="ml-3">{{ $student->batch }}</p>
                                    @else
                                        <p class="ml-3">--</p>
                                    @endif
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>Email: </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $student->email }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>Phone No: </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $student->phone }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>No of Guest: </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $student->guest }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>Payable Amount: </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">&#2547; {{ $student->amount }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>Payment Status: </span></b>
                                </div>
                                <div class="col-md-8">
                                    @if ($student->status == 1)
                                        <span class="ml-3 mb-3 badge bg-success">Paid</span>
                                    @else
                                        <span class="ml-3 mb-3 badge bg-danger">Unpaid</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>Suggestion: </span></b>
                                </div>
                                <div class="col-md-8">
                                    @if (isset($student->suggestion))
                                        <p class="ml-3">{!! $student->suggestion !!}</p>
                                    @else
                                        <p class="ml-3" style="color: #a5a5a5;">No suggestion from the student.</p>
                                    @endif
                                </div>
                            </div>

                            <br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
