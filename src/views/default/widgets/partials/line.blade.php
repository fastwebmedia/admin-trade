<canvas id="{{$stat['id']}}" style="max-width: 100%;"></canvas>

<script>
var ctx = document.getElementById("{{$stat['id']}}").getContext("2d");

var data = {
    labels: [
        @foreach ($stat['labels'] as $label )
            "{{$label}}",
        @endforeach
    ],
    datasets: [
        @foreach ($stat['data'] as $label => $line )
            {
                label: "{{$label}}",
                fillColor: "rgba({{$line['rgb'] or '220,220,220'}}, 0.2)",
                strokeColor: "rgba({{$line['rgb'] or '220,220,220'}}, 1)",
                pointColor: "rgba({{$line['rgb'] or '220,220,220'}}, 1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba({{$line['rgb'] or '220,220,220'}}, 1)",
                data: [
                    @foreach ($line['data'] as $plot )
                        "{{$plot}}",
                    @endforeach
                ]
            },
        @endforeach
    ]
};

var myLineChart = new Chart(ctx).Line(data, {
    maintainAspectRatio: false,
    responsive: true,
    tooltipTemplate: "<%if (datasetLabel){%><%=datasetLabel%>: <%}%><%= value %>",
    multiTooltipTemplate: "<%if (datasetLabel){%><%=datasetLabel%>: <%}%><%= value %>"
});
</script>
