<div class="container">
    <button
            data-rigId="{{ $rig->id }}"
            data-toggle="tooltip"
            data-placement="top"
            title="Re-check rig"
            type="button"
            class="re-check btn btn-primary fa fa-refresh"></button>
    <button
            data-rigId="{{ $rig->id }}"
            data-toggle="tooltip"
            data-placement="top"
            title="Reboot rig"
            type="button"
            class="reboot btn btn-danger fa fa-undo"></button>
    <button
            data-rigId="{{ $rig->id }}"
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
                    <td>{{ $card->last_check }}</td>
                    <td>
                        <a class="set-config fa fa-check" href="javascript:void(0)"></a>
                        <a class="reset-form fa fa-close" href="javascript:void(0)"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr/>
    <h1>Mining</h1>
    <form class="miner-control-form">
        <label for="miner">Miner</label>
        <select id="miner" class="selectpicker">
            <option selected disabled></option>
            @foreach($miners as $miner)
                <option @if($miner->id == $rig->current_miner) selected @endif value="{{ $miner->id }}">{{ $miner->name }}</option>
            @endforeach
        </select>
        <label for="miner-command">Miner command</label>
        <input value="{{ $rig->miner_command }}" style="width: 50%;height: 32px" id="miner-command" type="text">
        <button id="start-miner" type="button" class="btn btn-primary">Start</button>
    </form>
    <hr/>
    @if(!empty($miner_stats_url)):
        <iframe style="width: 100%;height: 350px" src="{{ $miner_stats_url }}" frameborder="0"></iframe>
    @endif
    <hr/>
    <canvas id="myChart" width="400" height="100"></canvas>
</div>
<script type="text/javascript" src="{!! asset('js/rig-control.js') !!}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<script>
    jQuery(document).on('ready pjax:end', function () {
        RigControl.init({{ $rig->id }});
    });
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [@foreach($dates as $date) moment('{{ $date }}').format('DD MMM kk:mm:ss'), @endforeach],
            datasets: [
                {
                    label: 'Highest temperature',
                    data: [@foreach($max_temps as $temp) {{ $temp }}, @endforeach],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Lowest temperature',
                    data: [@foreach($min_temps as $temp) {{ $temp }}, @endforeach],
//                    data: [11, 18, 2, 4, 1, 2],
                    backgroundColor: [
                        'rgba(0, 0, 255, 0.2)',
                        'rgba(0, 0, 255, 0.2)',
                        'rgba(0, 0, 255, 0.2)',
                        'rgba(0, 0, 255, 0.2)',
                        'rgba(0, 0, 255, 0.2)',
                        'rgba(0, 0, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)',
                        'rgba(0, 0, 255, 1)'
                    ],
                    borderWidth: 1
                }
            ]
        }
    });
</script>