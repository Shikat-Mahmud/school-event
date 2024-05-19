@php
    $setting = generalSettings();
@endphp
    <!-- FOOTER SECTION START -->
    <footer class="et-footer bg-etBlack relative z-[1] before:absolute before:-z-[1] before:inset-0 before:opacity-30 before:mix-blend-overlay text-white" style="background-color: #3F3F3F;">
        <div class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">

            <!-- footer top -->
            <div class="et-footer-top pt-[130px] xl:pt-[80px] pb-[60px]">
                <!-- contact infos -->
                <div class="bg-etBlue py-[35px] px-[40px] xl:px-[30px] rounded-[20px] mb-[60px] overflow-hidden relative z-[1] flex lg:flex-wrap justify-between lg:justify-center xs:justify-start items-center gap-[20px] before:absolute before:-z-[1] before:inset-0 before:opacity-40 before:mix-blend-multiply"
                style="background-image: url('{{asset('/')}}frontend/img/et-counter-bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                    <!-- single info -->
                    <div class="flex xxs:flex-col items-center xxs:items-start gap-[15px] xxs:gap-[10px]">
                        <!-- icon -->
                        <div class="icon border border-white/15 rounded-full w-[63px] aspect-square shrink-0 flex items-center justify-center">
                            <div class="w-[40px] aspect-square bg-white rounded-full flex items-center justify-center">
                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 0C4.40935 0.00211004 2.88445 0.634929 1.75969 1.75969C0.634929 2.88445 0.00211004 4.40935 0 6C0 10.3075 5.59 15.7025 5.8275 15.93C5.8737 15.9749 5.93558 16 6 16C6.06442 16 6.1263 15.9749 6.1725 15.93C6.41 15.7025 12 10.3075 12 6C11.9979 4.40935 11.3651 2.88445 10.2403 1.75969C9.11555 0.634929 7.59065 0.00211004 6 0ZM6 8.75C5.4561 8.75 4.92442 8.58871 4.47218 8.28654C4.01995 7.98437 3.66747 7.55488 3.45933 7.05238C3.25119 6.54988 3.19673 5.99695 3.30284 5.4635C3.40895 4.93005 3.67086 4.44005 4.05546 4.05546C4.44005 3.67086 4.93005 3.40895 5.4635 3.30284C5.99695 3.19673 6.54988 3.25119 7.05238 3.45933C7.55488 3.66747 7.98437 4.01995 8.28654 4.47218C8.58871 4.92442 8.75 5.4561 8.75 6C8.74956 6.72921 8.45969 7.42843 7.94406 7.94406C7.42843 8.45969 6.72921 8.74956 6 8.75Z" class="fill-etBlue" />
                                </svg>
                            </div>
                        </div>                        
                        <!-- txt -->
                        <div>
                            <span class="block font-medium text-[14px]">Event Venue</span>
                            @if (isset($event))
                                <h5 class="font-medium text-[20px]">{{ $event->location }}</h5>
                            @else
                                <h5 class="font-medium text-[20px]">4648 Rocky Road Philadelphia PA, 1920</h5>
                            @endif
                        </div>
                    </div>

                    <!-- single info -->
                    <div class="flex xxs:flex-col items-center xxs:items-start gap-[15px] xxs:gap-[10px]">
                        <!-- icon -->
                        <div class="icon border border-white/15 rounded-full w-[63px] aspect-square shrink-0 flex items-center justify-center">
                            <div class="w-[40px] aspect-square bg-white rounded-full flex items-center justify-center">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.8591 3.17969L11.0066 8.00091L15.8591 12.8221C15.9468 12.6388 16 12.4361 16 12.2197V3.78216C16 3.56569 15.9468 3.36303 15.8591 3.17969Z" fill="#1260FE" />
                                    <path d="M14.5937 2.375H1.40618C1.18971 2.375 0.987055 2.42822 0.803711 2.51594L7.00568 8.68666C7.55406 9.23503 8.4458 9.23503 8.99418 8.68666L15.1961 2.51594C15.0128 2.42822 14.8101 2.375 14.5937 2.375Z" fill="#1260FE" />
                                    <path d="M0.140938 3.17969C0.0532188 3.36303 0 3.56569 0 3.78216V12.2197C0 12.4361 0.0532188 12.6388 0.140938 12.8221L4.99341 8.00091L0.140938 3.17969Z" fill="#1260FE" />
                                    <path d="M10.3437 8.66211L9.65702 9.34877C8.7433 10.2625 7.25652 10.2625 6.3428 9.34877L5.65618 8.66211L0.803711 13.4833C0.987055 13.571 1.18971 13.6243 1.40618 13.6243H14.5937C14.8101 13.6243 15.0128 13.571 15.1961 13.4833L10.3437 8.66211Z" fill="#1260FE" />
                                </svg>
                            </div>
                        </div>
                        @if (isset($setting))
                        <!-- txt -->
                        <div>
                            <span class="block font-medium text-[14px]">Send Email</span>
                            <h5 class="font-medium text-[20px]"><a href="mailto:info@eventek.com">{{ $setting->business_email }}</a></h5>
                        </div>
                    </div>

                    <!-- single info -->
                    <div class="flex xxs:flex-col items-center xxs:items-start gap-[15px] xxs:gap-[10px]">
                        <!-- icon -->
                        <div class="icon border border-white/15 rounded-full w-[63px] aspect-square shrink-0 flex items-center justify-center">
                            <div class="w-[40px] aspect-square bg-white rounded-full flex items-center justify-center">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.1643 10.5834C11.6416 10.0673 10.989 10.0673 10.4696 10.5834C10.0734 10.9762 9.67723 11.3691 9.28769 11.7686C9.18114 11.8785 9.09125 11.9018 8.9614 11.8286C8.70503 11.6887 8.43202 11.5755 8.18564 11.4224C7.03698 10.6999 6.07477 9.77097 5.22243 8.72552C4.79959 8.20613 4.42336 7.65011 4.16033 7.02417C4.10706 6.89765 4.11705 6.81442 4.22026 6.7112C4.61647 6.32832 5.00268 5.93544 5.39223 5.54257C5.93493 4.99654 5.93493 4.35728 5.3889 3.80792C5.07926 3.49495 4.76962 3.18865 4.45998 2.87568C4.14036 2.55605 3.82406 2.23309 3.5011 1.9168C2.97838 1.40739 2.32581 1.40739 1.80641 1.92012C1.40688 2.313 1.02399 2.71586 0.617799 3.10208C0.241571 3.45833 0.0517928 3.89449 0.0118394 4.40389C-0.0514202 5.23293 0.151676 6.01535 0.438009 6.77779C1.02399 8.35595 1.91628 9.75765 2.99836 11.0428C4.45998 12.7808 6.20462 14.1559 8.24557 15.148C9.1645 15.5942 10.1167 15.9371 11.1522 15.9937C11.8647 16.0337 12.484 15.8539 12.98 15.2979C13.3196 14.9183 13.7025 14.572 14.0621 14.2091C14.5948 13.6698 14.5982 13.0172 14.0688 12.4845C13.4362 11.8485 12.8003 11.2159 12.1643 10.5834Z" fill="#1260FE" />
                                    <path d="M11.5283 7.92979L12.7569 7.72003C12.5638 6.59135 12.0311 5.56921 11.222 4.75682C10.3663 3.90116 9.28426 3.36178 8.09232 3.19531L7.91919 4.43054C8.84145 4.56039 9.68047 4.97657 10.343 5.63913C10.969 6.26506 11.3785 7.05747 11.5283 7.92979Z" fill="#1260FE" />
                                    <path d="M13.4496 2.59031C12.0312 1.17197 10.2367 0.276344 8.25565 0L8.08252 1.23523C9.79386 1.47495 11.3454 2.25071 12.5706 3.47262C13.7326 4.63459 14.495 6.10288 14.7714 7.71766L15.9999 7.50791C15.677 5.63676 14.7947 3.93874 13.4496 2.59031Z" fill="#1260FE" />
                                </svg>
                            </div>
                        </div>

                        <!-- txt -->
                        <div>
                            <span class="block font-medium text-[14px]">Call Emergency</span>
                            <h5 class="font-medium text-[20px]"><a href="tel:88012365499">{{ $setting->business_number }}</a></h5>
                            @if (isset($setting->business_whatsapp))
                                <h5 class="font-medium text-[20px]"><a href="tel:88012365499">{{ $setting->business_whatsapp }}</a></h5>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>

                <div class="flex md:flex-wrap xs:w-full gap-x-[65px] xxl:gap-x-[45px] xl:gap-[30px] gap-y-[25px] justify-between md:justify-center xxs:justify-start">
                    <!-- footer about -->
                    <div class="et-footer-about max-w-[295px] lg:max-w-none md:max-w-[300px] xs:max-w-full">
                        @if (isset($setting->logo))
                            <a href="{{ route('home') }}" class="mb-[25px] inline-block"><img src="{{asset('storage/' . $setting->logo )}}" alt="logo"></a>
                        @else
                            <a href="{{ route('home') }}" class="mb-[25px] inline-block"><img src="{{asset('/')}}frontend/img/logo-white.png" alt="logo"></a>
                        @endif
                        <p class="font-light text-[#f2f2f2] text-[16px] mb-[25px]">Lorem ipsum dolor sit amet consectetur adipiscing elit ut aliquam purus sit amet magna elemen facilisis</p>

                        <!-- social media -->
                        <!-- <div class="et-socials flex gap-[10px] text-[14px] *:border *:border-[#9EAACB] *:text-[#9EAACB] *:w-[40px] *:aspect-square *:shrink-0 *:inline-flex *:items-center *:justify-center *:rounded-full ">
                            <a href="#" class="hover:text-white hover:bg-etBlue hover:border-etBlue"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="hover:text-white hover:bg-etBlue hover:border-etBlue"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="hover:text-white hover:bg-etBlue hover:border-etBlue"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#" class="hover:text-white hover:bg-etBlue hover:border-etBlue"><i class="fa-brands fa-instagram"></i></a>
                        </div> -->
                    </div>

                    <!-- widget -->
                    <div class="et-footer-widget shrink-0 xs:grow">
                        <h5 class="text-[20px] font-semibold mb-[16px]">Useful <span class="text-etBlue">Links</span></h5>

                        <ul class="space-y-[17px] text-[16px] font-light text-[#f2f2f2]">
                            <li>
                                <a href="{{ route('event.detail') }}" class="flex items-center gap-[10px] hover:text-etBlue group">
                                    <span class="icon">
                                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 15.875V2.28125C0 1.51953 0.615234 0.875 1.40625 0.875H9.84375C10.6055 0.875 11.25 1.51953 11.25 2.28125V15.875L5.625 12.5938L0 15.875Z" class="fill-transparent stroke-white group-hover:stroke-etBlue group-hover:fill-etBlue transition" />
                                        </svg>
                                    </span>
                                    <span class="txt">Event</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-[10px] hover:text-etBlue group">
                                    <span class="icon">
                                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 15.875V2.28125C0 1.51953 0.615234 0.875 1.40625 0.875H9.84375C10.6055 0.875 11.25 1.51953 11.25 2.28125V15.875L5.625 12.5938L0 15.875Z" class="fill-transparent stroke-white group-hover:stroke-etBlue group-hover:fill-etBlue transition" />
                                        </svg>
                                    </span>
                                    <span class="txt">Gallery</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('team') }}" class="flex items-center gap-[10px] hover:text-etBlue group">
                                    <span class="icon">
                                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 15.875V2.28125C0 1.51953 0.615234 0.875 1.40625 0.875H9.84375C10.6055 0.875 11.25 1.51953 11.25 2.28125V15.875L5.625 12.5938L0 15.875Z" class="fill-transparent stroke-white group-hover:stroke-etBlue group-hover:fill-etBlue transition" />
                                        </svg>
                                    </span>
                                    <span class="txt">Team</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}" class="flex items-center gap-[10px] hover:text-etBlue group">
                                    <span class="icon">
                                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 15.875V2.28125C0 1.51953 0.615234 0.875 1.40625 0.875H9.84375C10.6055 0.875 11.25 1.51953 11.25 2.28125V15.875L5.625 12.5938L0 15.875Z" class="fill-transparent stroke-white group-hover:stroke-etBlue group-hover:fill-etBlue transition" />
                                        </svg>
                                    </span>
                                    <span class="txt">Contact</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- footer bottom -->
            <div class="et-footer-bottom border-t border-white/20 py-[34px]">
                <p class="font-light text-[#f2f2f2] text-center text-[16px]">&copy; 2024, <a class="text-etBlue" href="https://eftakharmahmud.com">Saikat Mahmud</a> All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END -->
