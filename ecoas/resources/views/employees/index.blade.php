<h2>Employee List</h2>

<a href="{{ route('employees.create') }}">Add Employee</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    @foreach($employees as $employee)
    <tr>
        <td>{{ $employee->name }}</td>
        <td>{{ $employee->age }}</td>
        <td>{{ $employee->address }}</td>
        <td>{{ $employee->phone }}</td>
        <td>
            <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>

            <form action="{{ route('employees.destroy', $employee->id) }}" 
                  method="POST" 
                  style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>