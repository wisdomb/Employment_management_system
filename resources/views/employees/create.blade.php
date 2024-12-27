<!-- File used to create/add an employee to our database
using Blade Directives 
-->
@extends('layouts.app')

@section('content')
    <h1>Add Employee</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('employees.store') }}" method="POST" id="addEmployeeForm">
        @csrf
        <label for="first_name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="surname">Surname:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="groups">Groups:</label>
        <select multiple id="groups" name="groups[]">
            @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
        </select>
        
        <label for="is_active">Active:</label>
        <input type="checkbox" id="active" name="active" value="1">
        
        <button type="submit">Add Employee</button>
    </form>
@endsection