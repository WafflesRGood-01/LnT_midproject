<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    
    <input type="text" name="name" placeholder="Name">
    <input type="number" name="age" placeholder="Age">
    <input type="text" name="address" placeholder="Address">
    <input type="text" name="phone" placeholder="Phone">

    <button type="submit">Save</button>
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif