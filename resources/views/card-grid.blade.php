<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Fan Speed(%)</th>
                <th>Power Limit(watt)</th>
                <th>Temperature(&deg; C)</th>
                <th>Memory overclock(MHz)</th>
                <th>Core overclock(MHz)</th>
                <th>Last check</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody data-rigId="{{ $rig->id }}">
            @foreach($cards as $card)
                <tr class="@if ($card->temperature >= $temp_treshold) danger @else info @endif">
                    <td>{{ $card->name }}</td>
                    <td>{{ $card->fan_speed }}</td>
                    <td>{{ $card->power_limit }}</td>
                    <td>{{ $card->temperature }}</td>
                    <td>{{ $card->memory_overclock }}</td>
                    <td>{{ $card->core_overclock }}</td>
                    <td>{{ $card->last_check }}</td>
                    <td>
                        <a class="fa fa-check" href="javascript:void(0)"></a>
                        <a class="fa fa-close" href="javascript:void(0)"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>