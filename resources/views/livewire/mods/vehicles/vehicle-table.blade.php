<div>
    <!-- Vehicle table -->
    <div wire:loading.remove>
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
                        <td>{{ $vehicles->firstItem() + $loop->index }}</td>
                        <td>{{ $vehicle->department->name }}</td>
                        <td>{{ $vehicle->reproduction->nameWithBrand() }}</td>
                        <td>{{ $vehicle->plate_number }}</td>
                        <td>{{ $vehicle->soldier->fullNameWithRank() }}</td>
                        <td>{{ $vehicle->condition->label() }}</td>
                        <td>{{ $vehicle->location->name }}</td>
                        <td>{{ $vehicle->expected_to_return_at ?? '-' }}</td>
                        <td>{{ $vehicle->status->label() }}</td>
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
    <div wire:loading.remove>
        {{ $vehicles->links() }}
    </div>

    <!-- Loading -->
    <div wire:loading> 
        <p>Loading...</p>
    </div>
</div>