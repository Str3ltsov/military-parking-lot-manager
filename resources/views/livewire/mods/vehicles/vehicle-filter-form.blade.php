<div class="flex">
    <!-- Department filter select -->
    <div>
        <label for="department">Department</label>
        <select
            wire:model.live.debounce.300ms="department"
            id="department"
        >
            <option value="">---</option>
            @foreach ($departments as $departmentOption)
                <option value="{{ (string) $departmentOption->name }}">{{ $departmentOption->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Brand (Reproduction) filter input -->
    <div>
        <label for="brand">Brand</label>
        <input
            type="text"
            wire:model.live.debounce.300ms="brand"
            id="brand"
        />
    </div>

    <!-- Number filter input -->
    <div>
        <label for="department">Number</label>
        <input
            type="text"
            wire:model.live.debounce.300ms="number"
            id="number"
        />
    </div>

    <!-- Assigned (Soldier) filter input -->
    <div>
        <label for="assigned">Assigned</label>
        <input
            type="text"
            wire:model.live.debounce.300ms="assigned"
            id="assigned"
        />
    </div>

    <!-- Condition filter select -->
    <div>
        <label for="condition">Condition</label>
        <select
            wire:model.live.debounce.300ms="condition"
            id="condition"
        >
            <option value="">---</option>
            @foreach ($conditions as $conditionOption)
                <option value="{{ (string) $conditionOption->value }}">{{ $conditionOption->label() }}</option>
            @endforeach
        </select>
    </div>

    <!-- Location filter input -->
    <div>
        <label for="location">Location</label>
        <input
            type="text"
            wire:model.live.debounce.300ms="location"
            id="location"
        />
    </div>

    <!-- Expected to return filter input -->
    <div>
        <label for="expected_to_return">Expected to return</label>
        <input
            type="datetime-local"
            wire:model.live.debounce.300ms="expected_to_return"
            id="expected_to_return"
        />
    </div>

    <!-- Status filter select -->
    <div>
        <label for="status">Status</label>
        <select
            wire:model.live.debounce.300ms="status"
            id="status"
        >
            <option value="">---</option>
            @foreach ($statuses as $statusOption)
                <option value="{{ (string) $statusOption->value }}">{{ $statusOption->label() }}</option>
            @endforeach
        </select>
    </div>

    <!-- Clear all filters button -->
    <div>
        <button type="button">Clear</button>
    </div>
</div>

@script
    {{-- Dispatch on initial load to sync with URL parameters --}}
    <script>
        $wire.call('dispatchToVehicleTable')
    </script>
@endscript