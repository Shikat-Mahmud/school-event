@extends('frontend.master')
@section('title', 'Event')
@section('content')

<!-- BREADCRUMB SECTION START -->
<section class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('assets/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30" 
style="background-image: url('{{asset('/')}}frontend/img/upcomng-events-bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
        <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Event Details</h1>
        <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
            <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">Home</a></li>
            <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
            <li class="current-page">Event Details</li>
        </ul>
    </div>
</section>
<!-- BREADCRUMB SECTION END -->

        <!-- main content -->
        <div class="et-event-details-content py-[130px] lg:py-[80px] md:py-[60px]">
            <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
                <div class="flex gap-[30px] lg:gap-[20px] md:flex-col md:items-center">
                    <!-- left content -->
                    <div class="left">
                        <!-- img -->
                        <div class="relative rounded-[8px] overflow-hidden">
                            <img src="assets/img/event-details-img.jpg" alt="event-details-img">
                            <!-- hall number tag -->
                            <span class="absolute top-[20px] left-[20px] bg-etBlue rounded-[6px] text-white px-[12px] py-[5px] inline-block font-normal text-[16px]">Hall No: 59</span>
                        </div>

                        <!-- txt -->
                        <div>
                            <h4 class="text-[30px] xs:text-[25px] xxs:text-[22px] font-medium text-etBlack mb-[11px] mt-[27px]">Indoor Concerts</h4>

                            <p class="font-light text-[16px] text-etGray mb-[15px]">Consectetur adipisicing elit, sed do eiusmod tempor is incididunt ut labore et dolore of magna aliqua. Ut enim ad minim veniam, made of owl the quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea dolor commodo consequat. Duis aute irure and dolor in reprehenderit.</p>

                            <p class="font-light text-[16px] text-etGray">The is ipsum dolor sit amet consectetur adipiscing elit. Fusce eleifend porta arcu In hac augu ehabitasse the is platea augue thelorem turpoi dictumst. In lacus libero faucibus at malesuada sagittis placerat eros sed istincidunt augue ac ante rutrum sed the is sodales augue consequat.</p>

                            <h4 class="text-[30px] xs:text-[25px] xxs:text-[22px] font-medium text-etBlack mb-[11px] mt-[19px]">Requirements for the event</h4>

                            <p class="font-light text-[16px] text-etGray mb-[21px]">Nulla facilisi. Vestibulum tristique sem in eros eleifend imperdiet. Donec quis convallis neque. In id lacus pulvinar lacus, eget vulputate lectus. Ut viverra bibendum lorem, at tempus nibh mattis in. Sed a massa eget lacus consequat auctor.</p>

                            <ul class="et-event-details-requirements-list font-light text-[16px] text-etGray grid grid-cols-2 xxs:grid-cols-1 gap-[20px] xxs:gap-[10px]">
                                <li>Ut viverra bibendum lorem, at tempus nibh</li>
                                <li>Duis aute irure and dolor in reprehenderit.</li>
                                <li>quis nostrud exercitation ullamco laboris nisi</li>
                                <li>ante rutrum sed the is sodales augue</li>
                            </ul>

                            <div class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px] mt-[38px] mb-[33px]">
                                <img src="assets/img/event-detailsimg-2.jpg" alt="event-details-img" class="max-h-[306px] w-full object-cover rounded-[8px]">
                                <img src="assets/img/event-detailsimg-3.jpg" alt="event-details-img" class="max-h-[306px] w-full object-cover rounded-[8px]">
                            </div>

                            <p class="font-light text-[16px] text-etGray mb-[43px]">Consectetur adipisicing elit, sed do eiusmod tempor is incididunt ut labore et dolore of magna aliqua. Ut enim ad minim veniam, made of owl the quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea dolor commodo consequat. Duis aute irure and dolor in reprehenderit.</p>
                        </div>


                        <!-- actions -->
                        <div class="border-y border-[#d9d9d9] py-[24px] flex items-center xxs:flex-col gap-[20px]">
                            <a href="#" class="inline-flex items-center h-[50px] rounded-full bg-etBlue px-[20px] text-[17px] font-medium text-white gap-[10px] hover:bg-etGray">Register Yourself <i class="fa-arrow-right-long fa-solid"></i></a>
                            <div class="flex gap-[12px]">
                                <span class="icon bg-etBlue w-[50px] aspect-square rounded-full outline-[2px] outline outline-white -outline-offset-[3px] flex items-center justify-center">
                                    <img src="assets/img/call-icon.svg" alt="call icon">
                                </span>

                                <span class="txt font-semibold text-etBlack">
                                    <span class="block text-[14px] mb-[2px]">Call Us Now</span>
                                    <a href="tel:+208-555-0112" class="text-[18px] hover:text-etBlue">+208-555-0112</a>
                                </span>
                            </div>
                        </div>

                        <!-- artists -->
                        <div class="mt-[50px]">
                            <h3 class="text-[30px] xs:text-[25px] font-semibold text-etBlack mb-[30px] xs:mb-[15px]">Event Artists</h3>

                            <!-- single artist -->
                            <div class="border border-[#d9d9d9] rounded-[12px] p-[30px] lg:p-[20px] flex xs:flex-col gap-x-[25px] gap-y-[10px] mb-[30px]">
                                <!-- img -->
                                <div class="rounded-[6px] overflow-hidden shrink-0">
                                    <img src="assets/img/artist-4.jpg" alt="Artist Image" class="w-[168px] aspect-square">
                                </div>

                                <!-- txt -->
                                <div class="grow">
                                    <!-- heading  -->
                                    <div class="flex flex-wrap items-center justify-between gap-[10px] border-b border-[#d9d9d9] pb-[15px]">
                                        <div>
                                            <h5 class="font-semibold text-[20px] text-etBlack"><a href="#" class="hover:text-etBlue">Ronald Richards</a></h5>
                                            <span class="inline-block text-etGray2 text-[16px]">Singer</span>
                                        </div>

                                        <!-- socials -->
                                        <div class="flex gap-[15px] text-[16px]">
                                            <a href="#" class="text-[#757277] hover:text-etBlue"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="#" class="text-[#757277] hover:text-etBlue"><i class="fa-brands fa-twitter"></i></a>
                                            <a href="#" class="text-[#757277] hover:text-etBlue"><i class="fa-brands fa-linkedin-in"></i></a>
                                            <a href="#" class="text-[#757277] hover:text-etBlue"><i class="fa-brands fa-youtube"></i></a>
                                        </div>
                                    </div>

                                    <!-- description -->
                                    <p class="font-light text-etGray2 pt-[20px] text-[16px]">Pellentesque pretium, mi in viverra faucibus, justo nunc dapibus lacus, sit amet consequat diam nisi eu mi. Integer diam erat, accumsan eget nisl eu, maximus feugiat odio. Proin eleifend.</p>
                                </div>
                            </div>

                            <!-- single artist -->
                            <div class="border border-[#d9d9d9] rounded-[12px] p-[30px] lg:p-[20px] flex xs:flex-col gap-x-[25px] gap-y-[10px] mb-[30px]">
                                <!-- img -->
                                <div class="rounded-[6px] overflow-hidden shrink-0">
                                    <img src="assets/img/artist-5.jpg" alt="Artist Image" class="w-[168px] aspect-square">
                                </div>

                                <!-- txt -->
                                <div class="grow">
                                    <!-- heading  -->
                                    <div class="flex flex-wrap items-center justify-between gap-[10px] border-b border-[#d9d9d9] pb-[15px]">
                                        <div>
                                            <h5 class="font-semibold text-[20px] text-etBlack"><a href="#" class="hover:text-etBlue">Leslie Alexander</a></h5>
                                            <span class="inline-block text-etGray2 text-[16px]">Singer</span>
                                        </div>

                                        <!-- socials -->
                                        <div class="flex gap-[15px] text-[16px]">
                                            <a href="#" class="text-[#757277] hover:text-etBlue"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="#" class="text-[#757277] hover:text-etBlue"><i class="fa-brands fa-twitter"></i></a>
                                            <a href="#" class="text-[#757277] hover:text-etBlue"><i class="fa-brands fa-linkedin-in"></i></a>
                                            <a href="#" class="text-[#757277] hover:text-etBlue"><i class="fa-brands fa-youtube"></i></a>
                                        </div>
                                    </div>

                                    <!-- description -->
                                    <p class="font-light text-etGray2 pt-[20px] text-[16px]">Pellentesque pretium, mi in viverra faucibus, justo nunc dapibus lacus, sit amet consequat diam nisi eu mi. Integer diam erat, accumsan eget nisl eu, maximus feugiat odio. Proin eleifend.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection