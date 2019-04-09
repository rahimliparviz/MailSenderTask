@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="create-admin">
                        <div class="question">Are you sure you want to delete this receiver?</div>
                        <h1>{{ $receiver->name }}</h1>
                        <form method="POST" action="{{ route('destroyReceiver',['id'=>$receiver->id]) }}">
                           {{ csrf_field() }}

                            <div class="submit delete">
                                <input type="submit" value="delete">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection