<div class="flex">
    <div>
        <label for="department">Department</label>
        <select
            wire:model.live.debounce.300ms="department"
            id="department"
        >
            <option value="">---</option>
        </select>
    </div>
    <div>
        <label for="brand">Brand</label>
        <input
            type="text"
            wire:model.live.debounce.300ms="brand"
            id="brand"
        />
    </div>
    <div>
        <label for="department">Number</label>
        <input
            type="text"
            wire:model.live.debounce.300ms="number"
            id="number"
        />
    </div>
    <div>
        <label for="assigned">Assigned</label>
        <input
            type="text"
            wire:model.live.debounce.300ms="assigned"
            id="assigned"
        />
    </div>
    <div>
        <label for="condition">Condition</label>
        <select
            wire:model.live.debounce.300ms="condition"
            id="condition"
        >
            <option value="">---</option>
            @foreach ($conditions as $condition)
                <option value="{{ $condition->value }}">{{ $condition->label() }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="location">Location</label>
        <input
            type="text"
            wire:model.live.debounce.300ms="location"
            id="location"
        />
    </div>
    <div>
        <label for="expected_to_return">Expected to return</label>
        <input
            type="datetime-local"
            wire:model.live.debounce.300ms="expected_to_return"
            id="expected_to_return"
        />
    </div>
    <div>
        <label for="status">Status</label>
        <select
            wire:model.live.debounce.300ms="status"
            id="status"
        >
            <option value="">---</option>
            @foreach ($statuses as $status)
                <option value="{{ $status->value }}">{{ $status->label() }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="button">Clear</button>
    </div>
</div>
