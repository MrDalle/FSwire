@extends('layouts.oneui')


@section('content')

    <!-- Page Header -->
    <div class="bg-image overflow-hidden" style="background-image: url('assets/img/photos/bg.png'); ">
        <div class="bg-black-op">
            <div class="content content-narrow">
                <div class="block block-transparent">
                    <div class="block-content block-content-full">
                        <h1 class="h1 font-w600 text-white animated fadeInDown push-50-t push-5">Dashboard</h1>
                        <h2 class="h4 font-w400 text-white-op animated fadeInUp">
                            Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content content-narrow">
        <!-- Stats -->
        <div class="row text-uppercase">
            <div class="col-xs-6 col-md-3 col-lg-3">

                <div class="block draggable-item block-rounded  animated pulse">
                    <div class="block-content block-content-full">

                        <div class="text-muted">

                            <small><i class="si si-clock"></i> all time</small>
                        </div>
                        <div class="font-s12 font-w700 ">Hours Flown</div>

                        <a class="h1 font-w600 text-primary" href="{{ url('/flightops/logbook') }}"
                        >{{$totalflightime }}</a>
                    </div>
                </div>

            </div>

            <div class="col-xs-6 col-md-3 col-lg-3">
                <div class="block block-rounded  animated pulse">

                    <div class="block-content block-content-full ">
                        <div class="text-muted">
                            <small><i class="si si-plane"></i> all time</small>
                        </div>
                        <div class="font-s12 font-w700">Flights</div>
                        <a class="h1 font-w600 text-primary" href="{{ url('/flightops/logbook') }}"
                        >{{ \App\PIREP::where('user_id', Auth::user()->id)->count() }}</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3">
                <div class="block block-rounded  animated pulse">
                    <div class="block-content block-content-full">
                        <div class="text-muted">
                            <small><i class="si si-calendar"></i> all time</small>
                        </div>
                        <div class="font-s12 font-w700">Miles Flown</div>
                        <a class="h1 font-w600 text-primary" href="base_comp_charts.html">0</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 ">
                <div class="block block-rounded  animated pulse">
                    <div class="block-content block-content-full">
                        <div class="text-muted">
                            <small><i class="si si-calendar"></i> all pireps</small>
                        </div>
                        <div class="font-s12 font-w700">AVG LDG RTE</div>
                        <a class="h1 font-w600 text-primary" href="{{ url('/flightops/logbook') }}"

                        >{{ (int) \App\PIREP::where('user_id', Auth::user()->id)->avg('landingrate') }} FPM</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- END Stats -->

        <!-- Dashboard Charts -->
        <div class="row">
            <div class="col-xs-8 col-md-6 col-lg-3">
                <a class="block block-link-hover2  animated pulse"
                   href="{{ url('/flightops/profile/'.Auth::user()->id) }}">
                    <div class="block-content ">

                        <div class="block-content block-content-full text-center">
                            <div>
                                <img class="img-avatar img-avatar96" src="{{ Auth::user()->avatar_url }}"
                                     onerror="this.src='http://identicon.org?t={{ Auth::user()->username }}&s=400'">
                            </div>
                            <div class="h5 push-15-t push-5">{{ Auth::user()->username }}</div>
                        </div>
                        <div class="block-content block-content-mini block-content-full bg-gray-lighter">
                            <div class="text-center text-muted">Pilot Rank <h3> Pilot</h3></div>
                        </div>
                        <div class="block-content-full progress active">
                            <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
                                 aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 100%">75% for next rank | 20 Hours left
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="row items-push text-center">
                                <div class="col-xs-6">
                                    <div class="push-5"><i class="si si-badge fa-2x"></i></div>
                                    <div class="h5 font-w300 text-muted">0 Badges</div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="push-5"><i class="si si-wallet fa-2x"></i></div>
                                    <div class="h5 font-w300 text-muted">$ 0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>


            </div>


            <!-- Dashboard Cards -->
            <div class="col-xs-4 col-lg-2 col-md-2">
                <a class="block block-link-hover2 text-center   animated pulse" href="{{ url('/flightops/schedule') }}">
                    <div class="block-content block-content-full bg-modern">
                        <i class="si si-settings fa-4x text-white"></i>
                        <div class="font-w600 text-white-op push-15-t">Bid Flight</div>
                    </div>
                </a>


                <a class="block block-link-hover2 text-center animated pulse" href="{{ url('/map') }}">
                    <div class="block-content block-content-full bg-city">
                        <i class="si si-map fa-4x text-white"></i>
                        <div class="font-w600 text-white-op push-15-t">RADAR</div>
                    </div>
                </a>

                <a class="block block-link-hover2 text-center  animated pulse" href="{{ url('/flightops/logbook') }}">
                    <div class="block-content block-content-full bg-flat">
                        <i class="si si-book-open fa-4x text-white"></i>
                        <div class="font-w600 text-white-op push-15-t">Logbook</div>
                    </div>
                </a>
            </div>

            <div class="col-xs-12  col-md-4 col-lg-4">

                <!-- Notifications Widget -->
                <div class="block block-bordered animated pulse">

                    <div class="block-header">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option"
                                        data-action="fullscreen_toggle"></button>
                            </li>
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle"
                                        data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                            <li>
                                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                            </li>
                            <li>
                                <span class="draggable-handler text-gray"><i class="si si-cursor-move"></i></span>
                            </li>
                        </ul>
                        <h3 class="block-title">Notifications</h3>
                    </div>
                    <div class="block-content animated fadeIn">
                        <div class="pull-r-l pull-t push">
                            <table class="block-table text-center bg-gray-lighter border-b">
                                <tbody>
                                <tr>
                                    <td class="border-r" style="width: 50%;">
                                        <div class="h1 font-w700">2</div>
                                        <div class="h5 text-muted text-uppercase push-5-t">New Notifications</div>
                                    </td>
                                    <td>
                                        <div class="push-30 push-30-t">
                                            <i class="si si-plane fa-3x text-black-op"></i>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="fa fa-check"></i><a class="alert-link"
                                                             href="javascript:void(0)">FSWire</a> was updated
                                successfully to V1.0! </p>
                        </div>
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="fa fa-info-circle"></i> Feel free to post any bugs or questions in <a
                                        class="alert-link" href="{{ url('/forum') }}">our forum!</a>!</p>
                        </div>

                    </div>
                </div>

                <!-- END Notifications Widget -->
            </div>


            <div class="col-xs-6 col-lg-3 ">
                <!-- Crystal on Background Color -->
                <div class="block animated pulse">
                    <a class="block block-link-hover2" href="{{ url('/flightops/logbook') }}">
                        <div class="block-content block-content-full bg-primary ribbon ribbon-modern ribbon-crystal">
                            <div class="ribbon-box font-w600 text-uppercase">
                                @if($newpirep != null)
                                @if($newpirep->status === 1)
                                    APPROVED
                                @elseif($newpirep->status === 2)
                                    PENDING
                                @else
                                    DENIED
                                @endif
                                @endif
                            </div>
                            <div class="text-center push-50-t push-50">
                                <h3 class="text-white-op">Latest PIREP</h3>
                                @if($newpirep != null)
                                    {{$newpirep->depapt->name}}
                                    {{$newpirep->arapt->name}}
                                    @endif
                            </div>
                        </div>

                    </a></div>
                    <div class="block animated pulse">
                        <a class="block block-link-hover2" href="{{ url('/flightops/logbook') }}">
                            <div class="block-content block-content-full bg-primary ribbon ribbon-modern ribbon-crystal">
                                <div class="ribbon-box font-w600 text-uppercase">
                                    @if($newpirep != null)
                                    @if($newpirep->status === 1)
                                        APPROVED
                                    @elseif($newpirep->status === 2)
                                        PENDING
                                    @else
                                        DENIED
                                    @endif
                                    @endif
                                </div>
                                <div class="text-center push-50-t push-50">
                                    <h3 class="text-white-op">Latest Location</h3>
                                    @if($newpirep != null)
                                        {{$newpirep->depapt->icao}}

                                        @endif
                                </div>
                            </div>

                        </a></div>
                    <iframe class="animated pulse"src="https://discordapp.com/widget?id=347110168405999618&theme=dark" width="370" height="400" allowtransparency="true" frameborder="0"></iframe>

            <!-- END Row 1 -->
        </div>

        <div class="block animated pulse">
        </div>


    </div>


    <!-- END Page Content -->
    </div>
@endsection
@section('javascript')
    <!-- Page Plugins -->
    <script src="{{ URL::asset('assets/js/plugins/chartjs/Chart.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ URL::asset('assets/js/pages/base_pages_dashboard_v2.js') }}"></script>

    <script>
        jQuery(function () {
            // Init page helpers (CountTo plugin)
            App.initHelpers('appear-countTo');
        });
    </script>

    <script src="{{ URL::asset('assets/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page JS Code -->
    <script>
        jQuery(function () {
            // Init page helpers (jQueryUI)
            App.initHelpers('draggable-items');
        });
    </script>


@endsection
