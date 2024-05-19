<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventRegister;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\ApplicationSetting;




class IndexController extends Controller
{

    public function index()
    {
        if (auth()->user()->can('admin-panel')) {
            $totalUsers = User::count();
            $totalCategory = Category::count();
            $totalProduct = Product::count();
            $registrations = EventRegister::latest()->limit(5)->get();
            $totalRegistration = EventRegister::count();
            $totalPayment = EventRegister::where('status', 1)->count();

            return view('admin.main.index', compact('registrations', 'totalRegistration', 'totalPayment'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to go to admin panel.');
        }
    }

    public function login(){
        $general =  generalSettings();
        return view('admin.main.users.admin_login', compact('general'));
    }
}
