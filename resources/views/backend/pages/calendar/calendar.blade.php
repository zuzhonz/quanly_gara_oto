@extends('backend.layout.master')
@section('page-title', 'Bảng Lịch')
@section('page-content')

    {{-- <div class="card">
        <div class="card-body">
            <div id="calendar" class="app-fullcalendar"></div>
        </div>
    </div> --}}

    <!-- BEGIN MODAL -->
    {{-- <div class="modal fade none-border" id="event-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Add New Event</strong></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                        event</button>

                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid">

        <!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Calendar') }}</h1>
                </div>
            </div>
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>


        <!-- Content Row -->

    </div>
@endsection







<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
{{-- <script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        events = {!! json_encode($events) !!};

        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events: events,
            defaultView: 'agendaWeek'
        })
    })
</script> --}}
