@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

                {{--<div class="owl-carousel owl-theme mt-5">--}}
                    <div class="row m-2" data-hash="1">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="text-center">Text #1</h2>
                                    <socketchat-component></socketchat-component>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="row m-2" data-hash="2">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="card">--}}
                                {{--<div class="card-body">--}}
                                    {{--<h2 class="text-center">Text #2</h2>--}}
                                    {{--<prop-component :urldata="{{ json_encode($url_data) }}"></prop-component>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

        </div>
    </div>
</div>
@endsection
