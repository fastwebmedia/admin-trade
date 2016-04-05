@if (isset ($data['stats']) )
    <div class="row">
        @foreach ($data['stats'] as $heading => $stat )
            <div class="{{$stat['col-class'] or 'col-xs-12 '}}">
                <div id="box-{{$stat['id']}}" class="stats-container box {{$stat['box_colour'] or 'box-default'}} color-palette-box">
                    <div class="box-header with-border">
                      <h1 class="box-title"><i class="fa {{$stat['icon'] or 'fa-bar-chart-o'}}"></i> {{$heading}}</h1>
                    </div>
                    <div class="box-body">
                      <div class="row">
                        @if ($stat['type'] == 'panel')
                            @include(AdminTemplate::view('widgets.partials.panel'))
                        @endif
                        @if ($stat['type'] == 'line')
                            @include(AdminTemplate::view('widgets.partials.pie'))
                        @endif
                        @if ($stat['type'] == 'pie')
                            @include(AdminTemplate::view('widgets.partials.pie'))
                        @endif
                      </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endif