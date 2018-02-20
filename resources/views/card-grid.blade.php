<div class="container">
    <button
            data-rigId="{{ $rig->id }}"
            data-toggle="tooltip"
            data-placement="top"
            title="Re-check rig"
            type="button"
            class="re-check btn btn-primary fa fa-refresh"></button>
    <button
            data-toggle="tooltip"
            data-placement="top"
            title="Reboot rig"
            type="button"
            class="btn btn-danger fa fa-undo"></button>
    <button
            data-toggle="tooltip"
            data-placement="top"
            title="Power off rig"
            type="button"
            class="btn btn-danger fa fa-power-off"></button>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Fan Speed (%)</th>
                <th>Power Limit (watt)</th>
                <th>Temperature (&deg; C)</th>
                <th>Memory overclock (MHz)</th>
                <th>Core overclock (MHz)</th>
                <th>Current memory frequency (MHz)</th>
                <th>Current core frequency (MHz)</th>
                <th>Last check</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody data-rigId="{{ $rig->id }}">
            @foreach($cards as $card)
                <tr
                        data-cardId="{{ $card->id_on_rig }}"
                        class="@if ($card->temperature >= $temp_treshold) danger @else info @endif">
                    <td>{{ $card->name }}</td>
                    <td>
                        <input
                                data-value="{{ $card->fan_speed }}"
                                name="fan_speed"
                                type="text"
                                value="{{ $card->fan_speed }}">
                    </td>
                    <td>
                        <input
                                data-value="{{ $card->power_limit }}"
                                name="power_limit"
                                type="text"
                                value="{{ $card->power_limit }}">
                    </td>
                    <td>{{ $card->temperature }}</td>
                    <td>
                        <input
                                data-value="{{ $card->memory_overclock }}"
                                name="memory_overclock"
                                type="text"
                                value="{{ $card->memory_overclock }}">
                    </td>
                    <td>
                        <input
                                data-value="{{ $card->core_overclock }}"
                                name="core_overclock"
                                type="text"
                                value="{{ $card->core_overclock }}">
                    </td>
                    <td>{{ $card->current_memory_freq }}</td>
                    <td>{{ $card->current_gpu_freq }}</td>
                    <td>{{ $card->last_check }}</td>
                    <td>
                        <a class="set-config fa fa-check" href="javascript:void(0)"></a>
                        <a class="reset-form fa fa-close" href="javascript:void(0)"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript" src="{!! asset('js/rig-control.js') !!}"></script>
<script>
    jQuery(document).on('ready pjax:end', function () {
        RigControl.init({{ $rig->id }});
    });
</script>