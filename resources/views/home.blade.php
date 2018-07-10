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
                                    @if(Auth::check())
                                        <h4 class="text-center">Пользователь {{ Auth::user()->email }}</h4>
                                        <socket-private-component :users="{{ json_encode(App\User::select('email', 'id')->where('id', '!=', Auth::id())->get()) }}" :user="{{ Auth::user() }}"></socket-private-component>
                                    @endif
                                    {{--<prop-component :urldata="{{ json_encode($url_data) }}"></prop-component>--}}

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
{{--<script>--}}
    {{--import SocketChatComponent from "../assets/js/components/SocketChatComponent";--}}
    {{--export default {--}}
        {{--components: {SocketChatComponent}--}}
    {{--}--}}
{{--</script>--}}