<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Blade;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('groups')->orderBy('created_at', 'desc')->get();
        return view('/employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('employees.create', compact('groups'));
    }

    /**
     * Store a newly created employee in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'groups' => 'array',
            'is_active' => 'boolean',
            'start_date' => 'required|date',
        ]);

        // Create the employee
        $employee = Employee::create($validated);

        // Sync the groups
        $employee->groups()->sync($request->input('groups', []));

        // Redirect to the employees index page
        return redirect()->route('employees.index');


        Log::info('Store method triggered');
        Log::info('Request data: ', $request->all());

    // Create the employee
    $employee = Employee::create($validated);

    // Sync the groups
    $employee->groups()->sync($request->input('groups', []));

    // Redirect to the employees index page
    return redirect()->route('employees.index');

    }
}