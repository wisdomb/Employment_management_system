@extends('layouts.app')

@section('content')
    <h1>Employees</h1>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Groups</th>
                <th>Active</th>
                <th>Started Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->surname }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->group }}</td>
                    <td>
                        @foreach ($employee->groups as $group)
                            {{ $group->name }}@if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>{{ $employee->active ? 'Yes' : 'No' }}</td>
                    <td>{{ $employee->start_date->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('employees.create') }}">Add Employee</a>
@endsection