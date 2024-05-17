@extends('frontend.master')
@section('title', 'Review Form')
@section('content')

<!-- CONTACT SECTION START -->
<div class="py-[120px] xl:py-[80px] md:py-[120px]">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full mt-[19px]">
        <div class="grid grid-cols-1 justify-items-center gap-[60px] xl:gap-[40px] items-center">

            <!-- right side contact form -->
            <div>
                <h2 class="text-[40px] md:text-[35px] sm:text-[30px] xxs:text-[28px] font-medium text-etBlack mb-[7px]">
                    Talk About The Event</h2>
                <p class="text-etGray font-light text-[16px] mb-[38px]">We're excited about our upcoming event! Please share your expectations and any suggestions to help us make it a success.</p>

                @if (session('success'))
                    <div class="alert alert-success font-light text-[16px] mb-[10px]" style="color: #009e5c;">
                        {{ session('success') }} <i class="fa-solid fa-check"></i>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger font-light text-[16px] mb-[10px]" style="color: #ad3c3c;">
                        {{ session('error') }} <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                @endif

                <form action="" method="post" class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="et-contact-name" class="font-lato font-semibold text-etBlack block mb-[12px]">Your
                            Name*</label>
                        <input type="text" name="name" id="et-contact-name" placeholder="Your Name"
                            class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                    </div>
                    <div>
                        <label for="et-contact-batch" class="font-lato font-semibold text-etBlack block mb-[12px]">
                            Your Batch
                        </label>
                        <select name="batch" id="et-contact-batch" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                            <option value="" disabled selected>Your Batch</option>
                            @foreach ($batchs as $batch)
                            <option value="{{$batch}}">{{$batch}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 xxs:col-span-1">
                        <label for="et-contact-photo" class="font-lato font-semibold text-etBlack block mb-[12px]">
                            Your Photo
                        </label>
                        <input type="file" name="photo" id="et-contact-photo" accept="image/*" 
                            class="border border-[#ECECEC] h-[55px] p-[20px] rounded-[4px] w-full focus:outline-none">
                    </div>
                    <div class="col-span-2 xxs:col-span-1">
                        <label for="et-contact-message"
                            class="font-lato font-semibold text-etBlack block mb-[12px]">Your Message*</label>
                        <textarea name="message" id="et-contact-message" placeholder="Your Message"
                            class="border border-[#ECECEC] h-[145px] p-[20px] rounded-[4px] w-full focus:outline-none"></textarea>
                    </div>
                    <div>
                        <button type="submit"
                            class="bg-etBlue h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-etBlack">Send
                            Message <span class="icon pl-[10px]"><i
                                    class="fa-solid fa-arrow-right-long"></i></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- CONTACT SECTION END -->
@endsection