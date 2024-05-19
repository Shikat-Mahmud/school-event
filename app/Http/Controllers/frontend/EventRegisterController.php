<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\EventRegister;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventRegisterController extends Controller
{
    public function index()
    {
        $registrations = EventRegister::all();
        return view('admin.main.event_register.index', compact('registrations'));
    }

    public function create()
    {
        $batchs = range(2000, 2024);
        return view('frontend.main.event_register', compact('batchs'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:event_registers,name',
                'batch' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'required|string|max:15',
                'guest' => 'nullable|integer|min:0',
                'amount' => 'required|numeric|min:0',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'suggestion' => 'nullable|string',
            ]);

            $inputs = $request->all();
            if ($request->hasFile('photo')) {
                $imagePath = $request->file('photo')->store('event_registers', 'public');
                $inputs['photo'] = $imagePath;
            }

            $register = new EventRegister();
            $register->fill($inputs);
            $register->save();

            return redirect()->back()->with('success', 'Registration successful.');
        } catch (ValidationException $e) {
            if ($e->validator->fails()) {
                $messages = $e->validator->errors()->getMessages();
                if (isset($messages['name']) && in_array('The name has already been taken.', $messages['name'])) {
                    return redirect()->back()->withInput()->with('warning', 'You have already registered for the event.');
                }
            }
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function changeStatus(EventRegister $eventRegister)
    {
        try {
            $eventRegister->status = $eventRegister->status == 1 ? 0 : 1;
            $eventRegister->save();

            return redirect()->back()->with('message', 'Payment Status Changed Successfully');
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error changing payment status: ' . $e->getMessage());

            // Return an error message or handle it as needed
            return redirect()->back()->with('error', 'Error changing payment status');
        }
    }

}
