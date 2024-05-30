<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Event;
use App\Models\EventRegister;
use App\Models\Review;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\User;


class IndexController extends Controller
{

    public function index()
    {
        if (auth()->user()->can('admin-panel')) {
            $totalUsers = User::count();
            $registrations = EventRegister::latest()->limit(5)->get();
            $totalRegistration = EventRegister::count();
            $totalPayment = EventRegister::where('status', 1)->count();

            $totalStudent = EventRegister::count();
            $totalGuest = EventRegister::sum('guest');
            $totalAttendee = $totalStudent + $totalGuest;

            $totalRegAmount = EventRegister::where('status', 1)->sum('amount');
            $totalDonAmount = Donation::sum('amount');
            $totalAmountReceived = $totalRegAmount + $totalDonAmount;

            $event = Event::first();
            $totalReviewrs = Review::count();
            $totalTeamMembers = Team::count();

            return view('admin.main.index', compact('registrations', 'totalRegistration', 'totalPayment', 'event', 'totalReviewrs', 'totalTeamMembers', 'totalStudent', 'totalGuest', 'totalAttendee', 'totalRegAmount', 'totalDonAmount', 'totalAmountReceived'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to go to admin panel.');
        }
    }

    public function login(){
        $general =  generalSettings();
        return view('admin.main.users.admin_login', compact('general'));
    }
}
