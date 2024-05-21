@extends('frontend.master')
@section('title', 'Get Ticket')
@section('content')

<!-- BREADCRUMB SECTION START -->
<section class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('assets/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30" 
style="background-image: url('{{asset('/')}}frontend/img/upcomng-events-bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
        <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Get Ticket</h1>
        <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
            <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">Home</a></li>
            <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
            <li class="current-page">Get Ticket</li>
        </ul>
    </div>
</section>
<!-- BREADCRUMB SECTION END -->

<!-- TICKET SECTION START -->
<div class="py-[120px] xl:py-[80px] md:py-[60px]">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
        <div class="grid grid-cols-1 justify-items-center gap-[60px] xl:gap-[40px] items-center">
            <div>
                
                @if (session('success'))
                    <div class="alert alert-success font-light text-[16px] mb-[10px] p-[16px]" style="color: #009e5c; background-color: #c4ffdf;">
                        {{ session('success') }} <i class="fa-solid fa-check"></i>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger font-light text-[16px] mb-[10px] p-[16px]" style="color: #ad3c3c; background-color: #ffd6d6;">
                        {{ session('error') }} <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                @endif
                
                @if (session('warning'))
                    <div class="alert alert-danger font-light text-[16px] mb-[10px] p-[16px]" style="color: #d68917; background-color: #ffdead;">
                        {{ session('warning') }} <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                @endif

                <h2 class="text-[40px] md:text-[35px] sm:text-[30px] xxs:text-[28px] font-medium text-etBlack mb-[7px]">Register For The Event </h2>
                <p class="text-etGray font-light text-[16px] mb-[38px]">Register now to join our school get-together event and reconnect with friends while enjoying a memorable day!</p>

                <form action="{{ route('ticket.post') }}" method="post" class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="et-contact-name" class="font-lato font-semibold text-etBlack block mb-[12px]">Your Name: *</label>
                        <input type="text" name="name" id="et-contact-name" placeholder="Your Name"
                            class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none" required>
                    </div>
                    <div>
                        <label for="et-contact-batch" class="font-lato font-semibold text-etBlack block mb-[12px]">Your Batch: </label>
                        <select name="batch" id="et-contact-batch" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                            <option value="" disabled selected>Your Batch</option>
                            @foreach ($batchs as $batch)
                            <option value="{{$batch}}">{{$batch}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="et-contact-email" class="font-lato font-semibold text-etBlack block mb-[12px]">Email: </label>
                        <input type="email" name="email" id="et-contact-email" placeholder="Your Email"
                            class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                    </div>
                    <div>
                        <label for="et-contact-phone" class="font-lato font-semibold text-etBlack block mb-[12px]">Phone: *</label>
                        <input type="tel" name="phone" id="et-contact-phone" placeholder="Your Phone No"
                            class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none" required>
                    </div>
                    <div>
                        <label for="et-contact-guest" class="font-lato font-semibold text-etBlack block mb-[12px]">No of Guest: <span class="text-[#707882] text-[12px]">(optional)</span></label>
                        <div class="flex items-center">
                            <button type="button" id="decrease-guest" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] focus:outline-none bg-etBlue text-[30px] text-white">-</button>
                            <input type="number" name="guest" id="et-contact-guest" value="0" min="0" readonly
                                class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none text-center">
                            <button type="button" id="increase-guest" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] focus:outline-none bg-etBlue text-[30px] text-white">+</button>
                        </div>
                    </div>
                    <div>
                        <label for="et-contact-amount" class="font-lato font-semibold text-etBlack block mb-[12px]">Total Amount: </label>
                        <input type="text" name="amount" id="et-contact-amount" value="1000" readonly
                            class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                    </div>
                    <div class="col-span-2 xxs:col-span-1">
                        <label for="et-contact-photo" class="font-lato font-semibold text-etBlack block mb-[12px]">Your Photo: </label>
                        <input type="file" name="photo" id="et-contact-photo" accept="image/*" 
                            class="border border-[#ECECEC] h-[55px] p-[20px] rounded-[4px] w-full focus:outline-none">
                    </div>
                    <div class="col-span-2 xxs:col-span-1">
                        <label for="et-contact-suggestion" class="font-lato font-semibold text-etBlack block mb-[12px]">Your Suggestion: <span class="text-[#707882] text-[12px]">(optional)</span></label>
                        <textarea name="suggestion" id="et-contact-suggestion" placeholder="Write your suggestion here."
                            class="border border-[#ECECEC] h-[145px] p-[20px] rounded-[4px] w-full focus:outline-none"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="bg-etBlue h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-etBlack">Submit <span class="icon pl-[10px]">
                            <i class="fa-solid fa-arrow-right-long"></i></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- TICKET SECTION END -->
@endsection
@push('scripts')
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const guestInput = document.getElementById('et-contact-guest');
            const amountInput = document.getElementById('et-contact-amount');
            const decreaseButton = document.getElementById('decrease-guest');
            const increaseButton = document.getElementById('increase-guest');

            function updateAmount() {
                const guestCount = parseInt(guestInput.value, 10);
                const totalAmount = 1000 + guestCount * 500;
                amountInput.value = totalAmount;
            }

            decreaseButton.addEventListener('click', function () {
                let currentValue = parseInt(guestInput.value, 10);
                if (currentValue > 0) {
                    guestInput.value = currentValue - 1;
                    updateAmount();
                }
            });

            increaseButton.addEventListener('click', function () {
                let currentValue = parseInt(guestInput.value, 10);
                guestInput.value = currentValue + 1;
                updateAmount();
            });
        });
    </script>
@endpush