<div class="col-xs-4">
  <ul class="chart-legend clearfix">
    @foreach ($stat['data'] as $label => $stat_data )
    <li><i class="fa fa-circle-o" style="color: {{$stat_data['colour'] or ''}}"></i> {{$label}}</li>
    @endforeach
  </ul>
</div>

<div class="col-xs-8">
    <canvas id="{{$stat['id']}}"></canvas>
</div>

<script>
var ctx = document.getElementById("{{$stat['id']}}").getContext("2d");

var data = [
    @foreach ($stat['data'] as $label => $stat_data )
       {
       label: '{{$label}}', value: '{{$stat_data['count']}}', color: '{{$stat_data['colour'] or ''}}'
       },
    @endforeach
];

var myPieChart  = new Chart(ctx).Pie(data, {
    maintainAspectRatio: true,
    responsive: true
});
</script>