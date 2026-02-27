<h2>Edit Employee</h2>

<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $employee->name }}">
    <input type="number" name="age" value="{{ $employee->age }}">
    <input type="text" name="address" value="{{ $employee->address }}">
    <input type="text" name="phone" value="{{ $employee->phone }}">

    <button type="submit">Update</button>
</form>