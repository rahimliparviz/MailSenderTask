@extends('layout.app')

@section('js')
    <script>
        $('#time').selectpicker();
        $('.selectpicker').selectpicker();
        $('#date').selectpicker();
    </script>

@endsection
@section('content')

    <script>document.getElementById('sendEmail').classList.add("active")

    </script>
    <div class="row mt-5 ml-5">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Send Email</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('createNotification') }}">
                        {{ csrf_field() }}
                        <div class="row">
                          
                            <div class="col-md-6 px-10">
                                <div class="form-group">

                                <label for="type" style="display:block">Hour</label>
                                <select  id="time" name="time" type="text" class="{{ $errors->has('time') ? 'is-invalid' : '' }}">
                                    <option  value="">Select time</option>

                                    @for($i=0;$i<25;$i++)
                                    <option  value="{{$i}}">{{$i}}:00</option>

                                        @endfor
                                </select>

                                @if ($errors->has('time'))
                                    <span style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;display:block" role="alert">
                                            <strong>{{ $errors->first('time') }}</strong>
                                        </span>
                                @endif

                                </div>

                            </div>


                                 <div class="col-md-6 px-10">
                                <div class="form-group">
                                    <label for="type">Subject</label>
                                    <input id="subject" name="subject" type="text" placeholder="Email subject" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" value="{{ old('subject') }}">
                                    @if ($errors->has('subject'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('subject') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="col-md-6 px-10">
                                <div class="form-group">
                                    <label for="receivers" style="display:block">Receivers</label>

                                    <select class="selectpicker  {{ $errors->has('receivers') ? 'is-invalid' : '' }}" multiple name="receivers[]">

                                        @foreach($receivers  as $receiver)

                                            <option value="{{$receiver->email}}">{{$receiver->email}}</option>

                                        @endforeach

                                    </select>

                                    @if ($errors->has('receivers'))
                                    <span style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;display:block" role="alert">
                                            <strong>{{ $errors->first('receivers') }}</strong>
                                    </span>
                            
                                    @endif
                                </div>
                            </div>

                              <div class="col-md-6 px-10">
                                <div class="form-group">
                                    <label for="type" style="display:block">Week Day</label>
                                    <select  id="date" name="date" type="text" class="{{ $errors->has('date') ? 'is-invalid' : '' }}">
                                        <option  value="">Select week day</option>
                                        <option  value="1">Monday</option>
                                        <option value="2">Tuesday</option>
                                        <option value="3">Wednesday</option>
                                        <option value="4">Thursday</option>
                                        <option value="5">Friday</option>
                                        <option value="6">Saturday</option>
                                        <option value="0">Sunday</option>
                                    </select>

                                    @if ($errors->has('date'))
                                    <span style="width: 100%;margin-top: .25rem;font-size: 80%;color: #dc3545;display:block" role="alert">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                       

                            <div class="col-md-12 px-10">
                                <div class="form-group">
                                    <label for="type">Email content</label>
                                    <textarea name="mail_content" style="border: 1px solid #E3E3E3" class="form-control {{ $errors->has('mail_content') ? 'is-invalid' : '' }}" id="mail_content"  cols="30" rows="10">{{ old('mail_content')}}</textarea>
                                    @if ($errors->has('mail_content'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mail_content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="submit">
                            <input type="submit" value="submit">
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success mt-3"><strong>Success!</strong>{{session('success')}}</div>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
