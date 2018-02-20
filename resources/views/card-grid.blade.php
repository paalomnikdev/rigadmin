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
<div id="chartContainer"></div>
<script type="text/javascript" src="{!! asset('js/rig-control.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/canvasjs.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery.canvasjs.min.js') !!}"></script>
<script>
    jQuery(document).on('ready pjax:end', function () {
        RigControl.init({{ $rig->id }});
    });

    window.onload = function () {

        var options = {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Temperature statistics"
            },
            axisX:{
                valueFormatString: "DD MMM hh:mm TT"
            },
            axisY: {
                title: "Temperature"
            },
            toolTip:{
                shared:true
            },
            legend:{
                cursor:"pointer",
                verticalAlign: "bottom",
                horizontalAlign: "left",
                dockInsidePlotArea: true,
                itemclick: toogleDataSeries
            },
            data: [{
                type: "line",
                showInLegend: true,
                name: "Lowest temperature",
                xValueFormatString: "DD MMM hh:mm TT",
                color: "blue",
                dataPoints: [
                    { x: new Date(2017, 10, 1, 23, 12), y: 63 },
                    { x: new Date(2017, 10, 2, 23, 13), y: 69 },
                    { x: new Date(2017, 10, 3, 23, 14), y: 65 },
                    { x: new Date(2017, 10, 4), y: 70 },
                    { x: new Date(2017, 10, 5), y: 71 },
                    { x: new Date(2017, 10, 6), y: 65 },
                    { x: new Date(2017, 10, 7), y: 73 },
                    { x: new Date(2017, 10, 8), y: 96 },
                    { x: new Date(2017, 10, 9), y: 84 },
                    { x: new Date(2017, 10, 10), y: 85 },
                    { x: new Date(2017, 10, 11), y: 86 },
                    { x: new Date(2017, 10, 12), y: 94 },
                    { x: new Date(2017, 10, 13), y: 97 },
                    { x: new Date(2017, 10, 14), y: 86 },
                    { x: new Date(2017, 10, 15), y: 89 }
                ]
            },
                {
                    type: "line",
                    showInLegend: true,
                    name: "Highest Temperature",
                    lineDashType: "dash",
                    color: 'red',
                    yValueFormatString: "#,##0K",
                    dataPoints: [
                        { x: new Date(2017, 10, 1), y: 60 },
                        { x: new Date(2017, 10, 2), y: 57 },
                        { x: new Date(2017, 10, 3), y: 51 },
                        { x: new Date(2017, 10, 4), y: 56 },
                        { x: new Date(2017, 10, 5), y: 54 },
                        { x: new Date(2017, 10, 6), y: 55 },
                        { x: new Date(2017, 10, 7), y: 54 },
                        { x: new Date(2017, 10, 8), y: 69 },
                        { x: new Date(2017, 10, 9), y: 65 },
                        { x: new Date(2017, 10, 10), y: 66 },
                        { x: new Date(2017, 10, 11), y: 63 },
                        { x: new Date(2017, 10, 12), y: 67 },
                        { x: new Date(2017, 10, 13), y: 66 },
                        { x: new Date(2017, 10, 14), y: 56 },
                        { x: new Date(2017, 10, 15), y: 64 }
                    ]
                }]
        };
        $("#chartContainer").CanvasJSChart(options);

        function toogleDataSeries(e){
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else{
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }

    }
</script>