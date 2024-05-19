@extends('admin.layouts.master')
@section('title', 'Registration List')
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
                            Student Registration List
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="example" style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Photo</th>
                                        <th>Payment Status</th>
                                        <th>Batch</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
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
                                                    <img src="https://placehold.co/400" alt="Default Image"
                                                        style="height: 50px; border-radius: 6px;">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == '1')
                                                    <span class="btn btn-success btn-sm me-2">Paid</span>
                                                @elseif($item->status == '0')
                                                    <span class="btn btn-danger btn-sm me-2">Unpaid</span>
                                                @endif
                                            </td>
                                            @if (isset($item->batch))
                                                <td>{{ $item->batch }}</td>
                                            @else
                                                <td>--</td>
                                            @endif
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form action="{{ route('payment.status.change', $item->id) }}" method="post" class="me-2">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary btn-sm">Change Status</button>
                                                    </form>
                                                    <a class="btn btn-info btn-sm" href="{{ route('products.show', $item->id) }}">View</a>
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