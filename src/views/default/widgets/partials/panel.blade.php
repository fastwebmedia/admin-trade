@foreach ($stat['data'] as $panel )
  <div id="{{$stat['id']}}" class="{{$panel['col-class'] or 'col-xs-6 col-lg-3'}}">
      <!-- small box -->
      <div class="small-box bg-{{$panel['colour'] or 'aqua'}}">
          <div class="inner">
              <h3>{{$panel['count'] or 'n/a'}}</h3>
              <p>{{$panel['title'] or 'n/a'}}</p>
          </div>
          <div class="icon">
              <i class="fa {{$panel['icon'] or 'fa-bar-chart-o'}}"></i>
          </div>
          @if (isset ($panel['link']) )
            <a href="{{$panel['link']}}" class="small-box-footer">{{$panel['link_title'] or 'View'}} <i class="fa {{$panel['link_icon'] or 'fa-arrow-circle-right'}}"></i></a>
          @else
            <div class="small-box-footer"><span><i class="fa fa-bar-chart-o"></i></span></div>
          @endif
      </div>
  </div>
@endforeach
