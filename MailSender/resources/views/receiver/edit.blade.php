@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Update receiver info</h5>
                </div>
                <div class="card-body">
                    <form method="POST"  action="{{ route('updateReceiver',['id'=>$receiver->id]) }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 px-10">
                                <div class="form-group">
                                    <label for="type">Name</label>
                                    <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{$receiver->name}}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 px-10">
                                <div class="form-group">
                                    <label for="type">Email</label>
                                    <input id="email" name="email" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{$receiver->email}}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="submit">
                            <input type="submit" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection