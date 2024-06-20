@extends('frontend.master')
@section('title', 'All Registration')
@section('content')
@push('styles')
    <style>
        /* Style the tab buttons */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #1260FE;
            border-radius: 6px;
            color: #fff;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
        }
    </style>
@endpush
<!-- BREADCRUMB SECTION START -->
<section
    class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:opacity-30"
    style="background-image: url('{{asset('/')}}frontend/img/banner-bg-3.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
        <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">All Registration</h1>
        <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
            <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">Home</a></li>
            <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
            <li class="current-page">All Registration</li>
        </ul>
    </div>
</section>
<!-- BREADCRUMB SECTION END -->

<!-- REGISTRATION SECTION START -->
<div class="py-[130px] xl:py-[80px] md:py-[60px] mx-[25px]">
    @if ($registrations->isNotEmpty())
    <div class="tab" style="padding: 6px;">
        <button class="tablinks active" onclick="openTab(event, 'all')" id="defaultOpen">All</button>
        @if (isset($batchs))
            @foreach ($batchs as $batch)
                <button class="tablinks" onclick="openTab(event, '{{ $batch }}')">{{ $batch }}</button>
            @endforeach
        @endif
    </div>

    <div id="all" class="tabcontent" style="display: block;">
        <h3 class="text-[24px] py-[16px]">All Registered Students</h3>
        <div class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[25px] gap-y-[10px] mb-[30px]">
            @foreach ($registrations as $student)
                <!-- single artist -->
                <div class="gap-[10px] pb-[15px] flex justify-center border border-[#d9d9d9] rounded-[12px] p-[30px]">
                    <div class="w-[168px]">
                        <div class="overflow-hidden">
                            @if (isset($student->photo))
                                <img src="{{ asset('storage/' . $student->photo) }}" alt="Guest Image" class="rounded-[6px] w-[168px] aspect-square" style="object-fit: cover;">
                            @else
                                <img src="{{ asset('/') }}frontend/img/team_member_avatar.jpg" alt="Guest Image" class="rounded-[6px] w-[168px] aspect-square">
                            @endif
                        </div>
                        <h5 class="font-semibold text-[20px] pt-[10px] text-etBlack">{{ $student->name }}</h5>
                        <span class="inline-block text-etGray2 text-[16px]">Batch {{ $student->batch }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @else
        <div class="flex flex-col justify-center items-center">
            <h3 class="text-center text-[2.4rem] text-[#757277]">There is no data of student registrations!</h3>
            <img src="{{ asset('/') }}images/empty.jpg" alt="Photo" class="w-[350px] my-[30px]">
        </div>
    @endif

    @if (isset($registrationsByBatch))
        @foreach ($registrationsByBatch as $batch => $students)
            <div id="{{ $batch }}" class="tabcontent">
                <h3 class="text-[24px] py-[16px]">Registered Students Of {{ $batch }} Batch</h3>
                <div class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[25px] gap-y-[10px] mb-[30px]">
                    @if (count($students) > 0)
                        @foreach ($students as $student)
                            <!-- single artist -->
                            <div class="gap-[10px] pb-[15px] flex justify-center border border-[#d9d9d9] rounded-[12px] p-[30px]">
                                <div class="w-[168px]">
                                    <div class="overflow-hidden">
                                        @if (isset($student->photo))
                                            <img src="{{ asset('storage/' . $student->photo) }}" alt="Students Image" class="rounded-[6px] w-[168px] aspect-square" style="object-fit: cover;">
                                        @else
                                            <img src="{{ asset('/') }}frontend/img/team_member_avatar.jpg" alt="Students Image" class="rounded-[6px] w-[168px] aspect-square">
                                        @endif
                                    </div>
                                    <h5 class="font-semibold text-[20px] pt-[10px] text-etBlack">{{ $student->name }}</h5>
                                    <span class="inline-block text-etGray2 text-[16px]">Batch {{ $student->batch }}</span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center w-full">
                            <h3 class="text-[16px] text-[#757277]">No students found for batch {{ $batch }}! &#128532;</h3>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @endif

</div>
<!-- REGISTRATION SECTION END -->

@endsection
@push('scripts')
    <script>
        function openTab(evt, tabName) {
            // Get all elements with class="tabcontent" and hide them
            var tabcontent = document.getElementsByClassName("tabcontent");
            for (var i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            var tablinks = document.getElementsByClassName("tablinks");
            for (var i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Set the default active tab
        document.getElementById("defaultOpen").click();
    </script>
@endpush
