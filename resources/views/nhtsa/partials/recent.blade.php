<table class="table table-sm table-hover">
    <thead>
        <tr>
            <th>VIN</th>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Series</th>
            <th>Trim</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($recents as $recent)
            <tr>
                <td>{{ $recent->VIN }}</td>
                <td>{{ $recent->ModelYear }}</td>
                <td>{{ $recent->Make }}</td>
                <td>{{ $recent->Model }}</td>
                <td>{{ $recent->Series }}</td>
                <td>{{ $recent->Trim }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
