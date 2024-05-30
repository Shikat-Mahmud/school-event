<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegister;
use App\Models\Review;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\ApplicationSetting;




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
            $totalAmountReceived = EventRegister::where('status', 1)->sum('amount');

            $event = Event::first();
            $totalReviewrs = Review::count();
            $totalTeamMembers = Team::count();

            return view('admin.main.index', compact('registrations', 'totalRegistration', 'totalPayment', 'event', 'totalReviewrs', 'totalTeamMembers', 'totalStudent', 'totalGuest', 'totalAttendee', 'totalAmountReceived'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to go to admin panel.');
        }
    }

    public function login(){
        $general =  generalSettings();
        return view('admin.main.users.admin_login', compact('general'));
    }
}
