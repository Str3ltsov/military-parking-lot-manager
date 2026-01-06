<div>
    <!-- Vehicle table -->
    <div>
        <table>
            <thead>
                <tr>
                    <th>Order No.</th>
                    <th>Department</th>
                    <th>Brand</th>
                    <th>Number</th>
                    <th>Assigned</th>
                    <th>Condition</th>
                    <th>Location</th>
                    <th>Expected to return (DateTime)</th>
                    <th>Status</th>
                    <th>Notes/Problems</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $vehicle->department->name }}</td>
                        <td>{{ $vehicle->reproduction->nameWithBrand() }}</td>
                        <td>{{ $vehicle->plate_number }}</td>
                        <td>{{ $vehicle->soldier->fullNameWithRank() }}</td>
                        <td>{{ $vehicle->condition }}</td>
                        <td>{{ $vehicle->location->name }}</td>
                        <td>{{ $vehicle->expected_to_return_at ?? '-' }}</td>
                        <td>{{ $vehicle->status }}</td>
                        <td>{{ $vehicle->notes_problems ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">No vehicles have been found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Vehicle table pagination -->
    <div>
        {{ $vehicles->links() }}
    </div>
</div>