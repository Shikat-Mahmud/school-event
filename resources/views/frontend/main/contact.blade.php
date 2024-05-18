@extends('frontend.master')
@section('title', 'Contact')
@section('content')

<!-- BREADCRUMB SECTION START -->
<section class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('assets/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
        <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Contact Us</h1>
        <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
            <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">Home</a></li>
            <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
            <li class="current-page">Contact Us</li>
        </ul>
    </div>
</section>
<!-- BREADCRUMB SECTION END -->

        <!-- CONTACT SECTION START -->
        <div class="py-[120px] xl:py-[80px] md:py-[60px]">
            <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
                <div class="grid grid-cols-2 md:grid-cols-1 gap-[60px] xl:gap-[40px] items-center">
                    <!-- left side contact infos -->
                    <div>
                        <div class="bg-etBlue p-[40px] sm:p-[30px] space-y-[24px] text-[16px]">
                            <!-- single contact info -->
                            <div class="flex flex-wrap items-center gap-[20px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                <span class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                    <img src="assets/img/call-msg.svg" alt="icon">
                                </span>

                                <div class="txt">
                                    <span class="font-light">Call Us 7/24</span>
                                    <h4 class="font-semibold text-[24px]"><a href="tel:+208-555-0112">+208-555-0112</a></h4>
                                </div>
                            </div>

                            <!-- single contact info -->
                            <div class="flex flex-wrap items-center gap-[20px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                <span class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                    <img src="assets/img/mail.svg" alt="icon">
                                </span>

                                <div class="txt">
                                    <span class="font-light">Make a Quote</span>
                                    <h4 class="font-semibold text-[24px]"><a href="mailto:eventek@gmail.com">eventek@gmail.com</a></h4>
                                </div>
                            </div>

                            <!-- single contact info -->
                            <div class="flex flex-wrap items-center gap-[20px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                <span class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                    <img src="assets/img/location-dot-circle.svg" alt="icon">
                                </span>

                                <div class="txt">
                                    <span class="font-light">Location</span>
                                    <h4 class="font-semibold text-[24px]">4517 Washington ave.</h4>
                                </div>
                            </div>
                        </div>

                        <!-- video cover -->
                        <div class="relative">
                            <img src="assets/img/contact-video-cover.jpg" alt="video cover" class="w-full">
                            <a href="https://youtu.be/6KmuL6RcdNA?si=s1RJZZwk6XcqZAwX" data-fslightbox class="video-btn-shadow w-[58px] aspect-square rounded-full bg-white text-[18px] text-etBlue flex items-center justify-center absolute top-[50%] left-[50%] -translate-y-[50%] -translate-x-[50%]">
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div>
                    </div>

                    <!-- right side contact form -->
                    <div>
                        <h2 class="text-[40px] md:text-[35px] sm:text-[30px] xxs:text-[28px] font-medium text-etBlack mb-[7px]">Ready to Get Started?</h2>
                        <p class="text-etGray font-light text-[16px] mb-[38px]">Nullam varius, erat quis iaculis dictum, eros urna varius eros, ut blandit felis odio in turpis. Quisque rhoncus, eros in auctor ultrices,</p>

                        <form action="#" class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]">
                            <div>
                                <label for="et-contact-name" class="font-lato font-semibold text-etBlack block mb-[12px]">Your Name*</label>
                                <input type="text" name="name" id="et-contact-name" placeholder="Your Name" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                            </div>
                            <div>
                                <label for="et-contact-email" class="font-lato font-semibold text-etBlack block mb-[12px]">Your Email*</label>
                                <input type="email" name="email" id="et-contact-email" placeholder="Your Email" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                            </div>
                            <div class="col-span-2 xxs:col-span-1">
                                <label for="et-contact-message" class="font-lato font-semibold text-etBlack block mb-[12px]">Your Message*</label>
                                <textarea name="message" id="et-contact-message" placeholder="Your Message" class="border border-[#ECECEC] h-[145px] p-[20px] rounded-[4px] w-full focus:outline-none"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="bg-etBlue h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-etBlack">Send Message <span class="icon pl-[10px]"><i class="fa-solid fa-arrow-right-long"></i></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTACT SECTION END -->
@endsection