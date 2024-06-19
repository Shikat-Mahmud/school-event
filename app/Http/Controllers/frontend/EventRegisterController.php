<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\EventRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class EventRegisterController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->hasAnyPermission(['edit-register', 'show-register'])) {
            $registrations = EventRegister::all();
            return view('admin.main.event_register.index', compact('registrations'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to see registration.');
        }
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
                'name' => 'required|string|max:255',
                'batch' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'required|string|max:15|unique:event_registers,phone',
                'guest' => 'nullable|integer|min:0',
                'amount' => 'required|numeric|min:0',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'suggestion' => 'nullable|string',
            ], [
                'phone.unique' => 'You have already registered for the event.',
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
            $messages = $e->validator->errors()->getMessages();
            if (isset($messages['phone']) && in_array('You have already registered for the event.', $messages['phone'])) {
                return redirect()->back()->withInput()->with('warning', 'You have already registered for the event.');
            }
            return redirect()->back()->withInput()->withErrors($e->validator->errors());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        if (auth()->user()->can('edit-register')) {
            $student = EventRegister::find($id);
            $batchs = range(2000, 2024);
            $guestNo = range(1, 10);
            return view('admin.main.event_register.edit', compact('batchs', 'student', 'guestNo'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to edit registrations.');
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'batch' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'required|string|max:15',
                'guest' => 'nullable|integer|min:0',
                'amount' => 'required|numeric|min:0',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $register = EventRegister::findOrFail($id);

            $register->name = $request->input('name');
            $register->batch = $request->input('batch');
            $register->email = $request->input('email');
            $register->phone = $request->input('phone');
            $register->guest = $request->input('guest');
            $register->amount = $request->input('amount');
            if ($request->hasFile('photo')) {
                // Delete old image if it exists
                if ($register->photo) {
                    Storage::delete('public/' . $register->photo);
                }
                // Store the new image
                $register->photo = $request->file('photo')->store('event_registers', 'public');
            }

            $register->save();

            return redirect()->route('register.list')->with('success', 'Registration information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function showStudentDetail(string $id)
    {
        if (auth()->user()->can('show-register')) {
            $student = EventRegister::findOrFail($id);
            return view('admin.main.event_register.show', compact('student'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to see student detail.');
        }
    }

    public function changeStatus(EventRegister $eventRegister)
    {
        if (auth()->user()->can('edit-register')) {
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
        } else {
            return redirect()->back()->with('error', 'You do not have permission to change payment status.');
        }
    }

    public function allReg()
    {
        $registrations = EventRegister::all();
        $batchs = range(2000, 2024);

        $registrationsByBatch = [];
        foreach ($batchs as $batch) {
            $registrationsByBatch[$batch] = EventRegister::where('batch', $batch)->get();
        }

        return view('frontend.main.all_registration', compact('registrations', 'batchs', 'registrationsByBatch'));
    }

}
