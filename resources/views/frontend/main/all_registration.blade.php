@extends('frontend.master')
@section('title', 'All Registration')
@push('styles')
    <style>
        /* Style for tab buttons start */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
        }

        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        .tab button:hover {
            background-color: #ddd;
        }

        .tab button.active {
            background-color: #1260FE;
            border-radius: 6px;
            color: #fff;
        }

        .tabcontent {
            display: none;
            padding: 6px 12px;
        }
        /* Style for tab buttons end */
    </style>
@endpush

@section('content')
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
    <div class="tab text-[12px]" style="padding: 6px;">
        <button class="tablinks active" onclick="openTab(event, 'all')" id="defaultOpen">All</button>
        @if (isset($batchs))
            @foreach ($batchs as $batch)
                <button class="tablinks" onclick="openTab(event, '{{ $batch }}')">{{ $batch }}</button>
            @endforeach
        @endif
        <button style="border: 2px solid #54cea7; border-radius: 7px; margin-left: 3px;" class="tablinks" onclick="openTab(event, 'teachers')">Teachers</button>
        <button style="border: 2px solid #54cea7; border-radius: 7px; margin-left: 3px;" class="tablinks" onclick="openTab(event, 'staff')">Staffs</button>
    </div>

    <div id="all" class="tabcontent" style="display: block;">
        <h3 class="text-[24px] py-[16px]">All Registered Students</h3>
        <div class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[30px] gap-y-[20px] mb-[30px]">
            @foreach ($registrations as $student)
                <!-- single artist -->
                <div class="gap-[10px] pb-[15px] flex justify-center rounded-[12px] p-[30px] relative" style="background-color: #d3deff;">
                    <div class="w-[168px]">
                        <div class="overflow-hidden">
                            @if (isset($student->photo))
                                <img src="{{ asset('storage/' . $student->photo) }}" alt="Guest Image" class="rounded-[6px] w-[168px] aspect-square" style="object-fit: cover;">
                            @else
                                <img src="{{ asset('/') }}frontend/img/team_member_avatar.jpg" alt="Guest Image" class="rounded-[6px] w-[168px] aspect-square">
                            @endif
                        </div>
                        <h5 class="font-semibold text-[20px] pt-[10px] text-etBlack">{{ $student->name }}</h5>
                        @if (isset($student->batch))
                            <span class="inline-block text-etGray2 text-[16px]">Batch {{ $student->batch }}</span>
                        @elseif($student->batch == null)
                            @if ($student->suggestion === 'staff')
                                <span class="inline-block text-etGray2 text-[16px]">Staff</span>
                            @else
                                <span class="inline-block text-etGray2 text-[16px]">Teacher</span>
                            @endif
                        @endif
                    </div>
                    @if ($student->status === 1)
                        <span style="background-color: #057A55; border-radius: 6px 0 0 6px;" class="text-white px-[10px] text-[12px] py-[2px] absolute bottom-0 right-0 mb-[15px] mr-[10px]">Paid</span>
                    @else
                        <span style="background-color: #4B5563; border-radius: 6px 0 0 6px;" class="text-white px-[10px] text-[12px] py-[2px] absolute bottom-0 right-0 mb-[15px] mr-[10px]">Unpaid</span>
                    @endif
                </div>
            @endforeach
        </div>
        
        <!-- Render pagination links for the main registrations -->
        <div class="font-kanit mt-[10px]" style="text-align: center;">
            {{ $registrations->links('pagination::pagination_view') }}
        </div>
    </div>

    @if (isset($registrationsByBatch))
        @foreach ($registrationsByBatch as $batch => $students)
            <div id="{{ $batch }}" class="tabcontent">
                <h3 class="text-[24px] py-[16px]">Registered Students Of {{ $batch }} Batch (Total {{ $registrationsByBatchCount[$batch] }})</h3>
                <div class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[30px] gap-y-[20px] mb-[30px]">
                    @if ($students->isNotEmpty())
                        @foreach ($students as $student)
                            <!-- single artist -->
                            <div class="gap-[10px] pb-[15px] flex justify-center rounded-[12px] p-[30px] relative" style="background-color: #d3deff;">
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
                                @if ($student->status === 1)
                                    <span style="background-color: #057A55; border-radius: 6px 0 0 6px;" class="text-white px-[10px] text-[12px] py-[2px] absolute bottom-0 right-0 mb-[15px] mr-[10px]">Paid</span>
                                @else
                                    <span style="background-color: #4B5563; border-radius: 6px 0 0 6px;" class="text-white px-[10px] text-[12px] py-[2px] absolute bottom-0 right-0 mb-[15px] mr-[10px]">Unpaid</span>
                                @endif
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

    @if (isset($teachers))
        <div id="teachers" class="tabcontent">
            <h3 class="text-[24px] py-[16px]">Registered Teachers (Total {{$teachersCount}})</h3>
            <div class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[30px] gap-y-[20px] mb-[30px]">
                @if ($teachers->isNotEmpty())
                    @foreach ($teachers as $teacher)
                        <!-- single artist -->
                        <div class="gap-[10px] pb-[15px] flex justify-center rounded-[12px] p-[30px] relative" style="background-color: #d3deff;">
                            <div class="w-[168px]">
                                <div class="overflow-hidden">
                                    @if (isset($teacher->photo))
                                        <img src="{{ asset('storage/' . $teacher->photo) }}" alt="Teacher Image" class="rounded-[6px] w-[168px] aspect-square" style="object-fit: cover;">
                                    @else
                                        <img src="{{ asset('/') }}frontend/img/team_member_avatar.jpg" alt="Teacher Image" class="rounded-[6px] w-[168px] aspect-square">
                                    @endif
                                </div>
                                <h5 class="font-semibold text-[20px] pt-[10px] text-etBlack">{{ $teacher->name }}</h5>
                                <span class="inline-block text-etGray2 text-[16px]">Teacher</span>
                            </div>
                            @if ($teacher->status === 1)
                                <span style="background-color: #057A55; border-radius: 6px 0 0 6px;" class="text-white px-[10px] text-[12px] py-[2px] absolute bottom-0 right-0 mb-[15px] mr-[10px]">Paid</span>
                            @else
                                <span style="background-color: #4B5563; border-radius: 6px 0 0 6px;" class="text-white px-[10px] text-[12px] py-[2px] absolute bottom-0 right-0 mb-[15px] mr-[10px]">Unpaid</span>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="text-center w-full">
                        <h3 class="text-[16px] text-[#757277]">No registered teachers! &#128532;</h3>
                    </div>
                @endif
            </div>
        </div>
    @endif

    @if (isset($staff))
        <div id="staff" class="tabcontent">
            <h3 class="text-[24px] py-[16px]">Registered Staff (Total {{$staffCount}})</h3>
            <div class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[30px] gap-y-[20px] mb-[30px]">
                @if ($staff->isNotEmpty())
                    @foreach ($staff as $person)
                        <!-- single artist -->
                        <div class="gap-[10px] pb-[15px] flex justify-center rounded-[12px] p-[30px] relative" style="background-color: #d3deff;">
                            <div class="w-[168px]">
                                <div class="overflow-hidden">
                                    @if (isset($person->photo))
                                        <img src="{{ asset('storage/' . $person->photo) }}" alt="Staff Image" class="rounded-[6px] w-[168px] aspect-square" style="object-fit: cover;">
                                    @else
                                        <img src="{{ asset('/') }}frontend/img/team_member_avatar.jpg" alt="Staff Image" class="rounded-[6px] w-[168px] aspect-square">
                                    @endif
                                </div>
                                <h5 class="font-semibold text-[20px] pt-[10px] text-etBlack">{{ $person->name }}</h5>
                                <span class="inline-block text-etGray2 text-[16px]">Staff</span>
                            </div>
                            @if ($person->status === 1)
                                <span style="background-color: #057A55; border-radius: 6px 0 0 6px;" class="text-white px-[10px] text-[12px] py-[2px] absolute bottom-0 right-0 mb-[15px] mr-[10px]">Paid</span>
                            @else
                                <span style="background-color: #4B5563; border-radius: 6px 0 0 6px;" class="text-white px-[10px] text-[12px] py-[2px] absolute bottom-0 right-0 mb-[15px] mr-[10px]">Unpaid</span>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="text-center w-full">
                        <h3 class="text-[16px] text-[#757277]">No registered staff! &#128532;</h3>
                    </div>
                @endif
            </div>
        </div>
    @endif
    @else
        <div class="flex flex-col justify-center items-center">
            <h3 class="text-center text-[2.4rem] text-[#757277]">There is no data of student registrations!</h3>
            <img src="{{ asset('/') }}images/empty.jpg" alt="Photo" class="w-[350px] my-[30px]">
        </div>
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
