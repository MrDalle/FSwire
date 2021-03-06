@extends('layouts.oneui')

@section('content')
    <div class="content content-boxed">
        <div class="bg-primary-dark">
            <section class="content content-full content-boxed">
                <!-- Section Content -->
                <div class="push-100-t push-50 text-center">
                    <h1 class="h1 font-size-70 font-w700 text-white push-10 animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">{{ $p->depapt->icao }} - {{ $p->arrapt->icao }}</h1>
                    <h2 class="h5 text-white-op animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">{{ $p->depapt->name }} - {{ $p->arrapt->name }}</h2>
                </div>
                <!-- END Section Content -->
            </section>
        </div>
        <div class="bg-white">
            <section class="content content-mini content-mini-full content-boxed overflow-hidden">
                <ol class="breadcrumb">
                    <li><a class="text-primary-dark" href="{{ url('flightops/bids') }}">Logbook</a></li>

                    <li><a href="">{{ $p->airline->icao }}{{ $p->flightnum }}</a></li>
                </ol>
            </section>
        </div>


        <div class="block">
            <!-- Stats -->
            <div class="block-content text-center bg-gray-lighter">
                <div class="row items-push text-uppercase">
                    <div class="col-xs-6 col-sm-3">
                        <div class="font-w700 text-gray-darker animated fadeIn">Time</div>
                        <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">{{ $p->flighttime }}</a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="font-w700 text-gray-darker animated fadeIn">Distance (NM)</div>
                        <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">{{ $p->distance }}</a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="font-w700 text-gray-darker animated fadeIn">Fuel</div>
                        <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">{{ $p->fuel_used }}</a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="font-w700 text-gray-darker animated fadeIn">LDG RTE</div>
                        <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">{{ $p->landingrate }}</a>
                    </div>
                </div>
            </div>
            <!-- END Stats -->

        </div>



        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <a class="block block-link-hover2 text-center" href="javascript:void(0)">
                    <div class="block-header">
                        <h3 class="block-title">Crew Information</h3>
                    </div>
                    <div class="block-content block-content-full bg-warning">
                        <div class="h1 font-w700 text-white push-10">{{ $p->user->username }}</div>
                        <div class="h5 font-w300 text-white-op">{{ $p->user->pilotid }}</div>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-condensed">
                            <tbody>
                            <tr>
                                <td><strong>Name</strong> {{ $p->user->first_name }} {{ $p->user->last_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>AVG LDG</strong> {{ \App\PIREP::where('user_id', $p->user->id)->avg('landingrate') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Total Hours</strong> {{ \App\PIREP::where('user_id', $p->user->id)->sum('flighttime') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Join Date</strong> {{ date('d/m/Y', strtotime($p->user->created_at)) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </a>
            </div>


            <div class="col-sm-6 col-lg-4">
                <a class="block block-link-hover2 text-center" href="javascript:void(0)">
                    <div class="block-header">
                        <h3 class="block-title">Airplane Information</h3>
                    </div>
                    <div class="block-content block-content-full bg-primary">
                        <div class="h1 font-w700 text-white push-10">{{ $p->aircraft->name }}</div>
                        <div class="h5 font-w300 text-white-op">{{ $p->aircraft->registration }}</div>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-condensed">
                            <tbody>
                            <tr>
                                <td><strong>Owner</strong> {{ $p->airline->icao }}</td>
                            </tr>
                            <tr>
                                <td><strong>Flight Time</strong> {{ $p->flighttime }}</td>
                            </tr>
                            <tr>
                                <td><strong>Fuel used</strong> {{ $p->fuel_used }}</td>
                            </tr>
                            <tr>
                                <td><strong>LDG RTE</strong> {{ $p->landingrate }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </a>
            </div>


            <div class="col-sm-6 col-lg-4">
                <a class="block block-link-hover2 text-center" href="javascript:void(0)">
                    <div class="block-header">
                        <h3 class="block-title">VA Information</h3>
                    </div>
                    <div class="block-content block-content-full bg-success">
                        <div class="h1 font-w700 text-white push-10">{{ $p->airline->name }}</div>
                        <div class="h5 font-w300 text-white-op">{{ $p->airline->icao }}{{ $p->flightnum }}</div>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-condensed">
                            <tbody>
                            <tr>
                                <td><strong>HUB</strong> </td>

                            </tr>
                            <tr>
                                <td><strong>Pilots</strong> </td>

                            </tr>


                            </tbody>
                        </table>
                    </div>

                </a>
            </div>

        </div>


        @if($log['type'] != 'UNKNOWN')
            <h2 class="h3 font-w600 push-50-t push animated pulse">LOG FILES</h2>
            <div id="faq2" class="panel-group animated pulse">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#log" href="#log">Detailed ACARS LOG from {{ $log['type'] }} for {{ $p->airline->icao }}{{ $p->flightnum }} <h2 class=" font-xs badge bg-success">click to view </h2></a>
                        </h3>
                    </div>
                    <div id="log" class="panel-collapse collapse">
                        <div class="panel-body" id="log">
                            <div class="sclogtab">
                                <ul class="scLogs" class="collection with-header">
                                    @foreach($log['logs'] as $item)
                                        <li class="collection-item"><div>{{ $item }}</div></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($log['type'] === 'SIMACARS')
                <div id="faq3" class="panel-group animated pulse">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#log2" href="#log2">Critical Events from {{ $log['type'] }} on {{ $p->airline->icao }}{{ $p->flightnum }} <h2 class=" font-xs badge ">click to view </h2></a>
                            </h3>
                        </div>
                        <div id="log2" class="panel-collapse collapse">
                            <div class="panel-body" id="log2">
                                <div class="sclogtab">
                                    <ul class="scLogs" class="collection with-header">
                                        @foreach($log['events'] as $item)
                                            <li class="collection-item"><div>{{ $item }}</div></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif



    </div>




@endsection