@extends('admin.layouts.master')
@section('title', 'Admin Panel')
@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-primary order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total User Registration</h6>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-users-three float-start"></i><span>{{ $totalRegistration }}</span>
                            </h2>
                            <p class="m-b-0">Payment Received<span class="float-end">{{ $totalPayment }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-success order-card">
                        <div class="card-body">
                            <h6 class="text-white">Event Date</h6>
                            <h2 class="text-end text-white"><i class="ph ph-calendar float-start"></i><span>{{ \Carbon\Carbon::parse($event->datetime)->format('d M Y') }}</span>
                            </h2>
                            <p class="m-b-0">Start From<span class="float-end">{{ \Carbon\Carbon::parse($event->datetime)->format('g:i A') }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-warning order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Reviewers</h6>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-chat float-start"></i><span>{{ $totalReviewrs }}</span></h2>
                            <!-- <p class="m-b-0">This Month<span class="float-end">$5,032</span></p> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-danger order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Team Members</h6>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-users float-start"></i><span>{{ $totalTeamMembers }}</span></h2>
                            <!-- <p class="m-b-0">This Month<span class="float-end">$542</span></p> -->
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>Recent Student Registration</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Photo</th>
                                        <th>Payment Status</th>
                                        <th>Amount</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrations as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if ($item->photo)
                                                    <img src="{{ asset('storage/' . $item->photo) }}" alt="Reviewer Image"
                                                        style="height: 50px; border-radius: 6px;">
                                                @else
                                                    <img src="{{ asset('/assets/images/user/avatar-2.jpg') }}" alt="Default Image"
                                                        style="height: 50px; border-radius: 6px;">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == '1')
                                                    <span class="badge bg-success">Paid</span>
                                                @elseif($item->status == '0')
                                                    <span class="badge bg-danger">Unpaid</span>
                                                @endif
                                            </td>
                                            <td>&#2547; {{ $item->amount }}</td>
                                            <td>{{ $item->phone }}</td>
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
    </div>
@endsection
