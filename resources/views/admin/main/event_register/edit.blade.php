@extends('admin.layouts.master')
@section('title', 'Edit Student Registration')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Edit Student Registration</h4>
                        </div>
                        <div>
                            <a href="{{ route('register.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Registraiton List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ticket.update', $student->id) }}" method="post" enctype="multipart/form-data" class="mt-3">
                            @csrf
                            <div class="row mt-3">
                                <label for="et-contact-name" class="col-md-4 font-lato font-semibold text-etBlack">Students Name: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" id="et-contact-name" placeholder="Students Name" value="{{ old('name', $student->name) }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="et-contact-batch" class="col-md-4 font-lato font-semibold text-etBlack">Students Batch: </label>
                                <div class="col-md-8">
                                    <select name="batch" id="et-contact-batch" class="form-control">
                                        <option value="" disabled selected>Students Batch</option>
                                        @foreach ($batchs as $batch)
                                            <option value="{{ $batch }}" {{ old('batch', $student->batch) == $batch ? 'selected' : '' }}>{{ $batch }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="et-contact-email" class="col-md-4 font-lato font-semibold text-etBlack">Email: </label>
                                <div class="col-md-8">
                                    <input type="email" name="email" id="et-contact-email" placeholder="Students Email" value="{{ old('email', $student->email) }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="et-contact-phone" class="col-md-4 font-lato font-semibold text-etBlack">Phone: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="tel" name="phone" id="et-contact-phone" placeholder="Students Phone No" value="{{ old('phone', $student->phone) }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="et-contact-guest" class="col-md-4 font-lato font-semibold text-etBlack">No of Guest: <span style="color: #707882; font-size: 12px;">(optional)</span></label>
                                <div class="col-md-8">
                                    <select id="et-contact-guest" name="guest" class="form-control">
                                        <option value="0" {{ old('guest', $student->guest) == 0 ? 'selected' : '' }}>0</option>
                                        @foreach ($guestNo as $guest)
                                            <option value="{{ $guest }}" {{ old('guest', $student->guest) == $guest ? 'selected' : '' }}>{{ $guest }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="et-contact-amount" class="col-md-4 font-lato font-semibold text-etBlack">Total Amount: </label>
                                <div class="col-md-8">
                                    @php
                                        $baseAmount = ($student->batch >= 2024) ? 500 : 1000;
                                        $totalAmount = $baseAmount + ($student->guest * 500);
                                    @endphp
                                    <input type="text" name="amount" id="et-contact-amount" value="{{ old('amount', $totalAmount) }}" readonly class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="et-contact-photo" class="col-md-4 font-lato font-semibold text-etBlack">Students Photo: </label>
                                <div class="col-md-8">
                                    <input type="file" name="photo" id="et-contact-photo" accept="image/*" class="form-control">
                                    @if($student->photo)
                                        <img class="p-t-10" src="{{ asset('storage/' . $student->photo) }}" alt="{{ $student->name }}" width="100" />
                                        <input type="hidden" name="old_photo" value="{{ $student->photo }}">
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-success">Update</button>
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
@push('scripts')
    <script>
        $(document).ready(function () {
            const batchSelect = $('#et-contact-batch');
            const guestSelect = $('#et-contact-guest');
            const amountInput = $('#et-contact-amount');

            function updateAmount() {
                const selectedBatch = parseInt(batchSelect.val(), 10);
                const guestCount = parseInt(guestSelect.val(), 10);
                let baseAmount = 1000;

                if (selectedBatch >= 2024) {
                    baseAmount = 500;
                }

                const totalAmount = baseAmount + guestCount * 500;
                amountInput.val(totalAmount);
            }

            batchSelect.on('change', updateAmount);
            guestSelect.on('change', updateAmount);

            updateAmount();
        });
    </script>
@endpush