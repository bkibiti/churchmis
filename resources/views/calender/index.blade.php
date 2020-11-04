@extends("layouts.master")

@section('page_css')
 <!-- fullCalendar -->
 <link rel="stylesheet" href="{{asset("plugins/fullcalendar/main.min.css")}}">
 <link rel="stylesheet" href="{{asset("plugins/fullcalendar-daygrid/main.min.css")}}">
 <link rel="stylesheet" href="{{asset("plugins/fullcalendar-timegrid/main.min.css")}}">
 <link rel="stylesheet" href="{{asset("plugins/fullcalendar-bootstrap/main.min.css")}}">
@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Calendar</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Calendar</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container-fluid">

  <div class="row">
      <div class="col-md-3">
        <div class="sticky-top mb-3">
   
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Event Types</h3>
            </div>
            <div class="card-body">
              <i class="fas fa-square text-warning"></i> Birthday <br>
              <i class="fas fa-square text-success"></i> Anniversary <br>
                @foreach ($etype as $event)
                  <span style ="color: {{$event->color}}" >
                      <i class="fas fa-square" ></i>  
                  </span> {{$event->name}} <br>
                @endforeach
            </div>
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card card-primary">
          <div class="card-body p-0">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
</div>
<!-- /.row -->
 
</div><!-- /.container-fluid -->
@endsection

@push("page_scripts")

@include('partials.notification')

<!-- fullCalendar 2.2.5 -->
<script src="{{asset("plugins/fullcalendar/main.min.js")}}"></script>
<script src="{{asset("plugins/fullcalendar-daygrid/main.min.js")}}"></script>
<script src="{{asset("plugins/fullcalendar-timegrid/main.min.js")}}"></script>
<script src="{{asset("plugins/fullcalendar-interaction/main.min.js")}}"></script>
<script src="{{asset("plugins/fullcalendar-bootstrap/main.min.js")}}"></script>

<script>
$(function () {



var date = new Date()
var y    = date.getFullYear()

var Calendar = FullCalendar.Calendar;
var calendarEl = document.getElementById('calendar');



  var events = [];

    //birthdays
    $.each(@json($bdays), function(index, value) { 
      var url = '{{ route("people.show", ":id") }}';
      url = url.replace(':id', value.id);
      var month = parseInt(value.month)-1;
      events.push(
          {
            title          : value.name,
            start          : new Date(y, month, value.day),
            end            : new Date(y, month, value.day),
            url            : url,
            backgroundColor: '#f39c12', //yellow
            borderColor    : '#f39c12' //yellow
          },
      )
    });

    //wedding anniversaries 
    $.each(@json($anniversary), function(index, value) { 
      var url = '{{ route("family.show", ":id") }}';
      url = url.replace(':id', value.id);
      var month = parseInt(value.month)-1;
    
      events.push(
          {
            title          : value.name,
            start          : new Date(y, month, value.day),
            end            : new Date(y, month, value.day),
            url            : url,
            backgroundColor: '#00a65a', 
            borderColor    : '#00a65a' 
          },
      )
    });
  //events
    $.each(@json($events), function(index, value) { 
        //get color of event type
        var color = '#3c8dbc';
        $.each(@json($etype), function(index, val) { 
            if (val.id == value.type_id) {
              color = val.color;
            }
        });//end get color
        events.push(
            {
              title          : value.title,
              start          : new Date(value.start),
              end            : new Date(value.end),
              backgroundColor: color, 
              borderColor    : color 
            },
        )
    });


var calendar = new Calendar(calendarEl, {
  plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
  header    : {
    left  : 'prev,next today',
    center: 'title',
    right : 'dayGridMonth,timeGridWeek,timeGridDay'
  },
  'themeSystem': 'bootstrap',
 
  events    : events,

  editable  : true,

});

calendar.render();
// $('#calendar').fullCalendar()

})

</script>

@endpush
