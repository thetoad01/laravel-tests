<div>    
    @if ($url && $vehicle)
        <div wire:poll>
            <div>{{ $url }}</div>
            <div>Result: {{ $http_response_code }}</div>
            <div class="font-weight-bold">{{ $vehicle['dealer'] }}</div>
            <div>
                VIN:
                @if (isset($vehicle['vin']) && $vehicle['vin'] != '')
                    {{ $vehicle['vin'] }}
                @else
                    <span class="text-danger">No VIN, vehicle was not saved to DB!</span>
                @endif
            </div>
            <div>
                Vehicle:
                {{ $vehicle['year'] ?? '' }}
                {{ $vehicle['make'] ?? '' }}
                {{ $vehicle['model'] ?? '' }}
                {{ $vehicle['trim'] ?? '' }}
            </div>
            <div>Color: {{ $vehicle['exterior_color'] ?? '' }}</div>
            <div>Stock #: {{ $vehicle['stock_number'] ?? '' }}</div>
        </div>
    @elseif (!$vehicle)
        <div wire:poll.15s>
            <div>{{ $url }}</div>
            <div>Result: {{ $http_response_code }}</div>
            <h1>We have no vehicle</h1>
        </div>
    @else
        <div class="pb-4">{{ $url }}</div>
        <div class="h5 text-danger">Result: {{ $http_response_code }}</div>
        <div class="h5 text-danger">Houston we have a problem!</div>
    @endif
</div>
