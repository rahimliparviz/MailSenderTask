@extends('layout.app')

@section('content')

        <script>document.getElementById('receiver').classList.add("active")

        </script>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Receivers</h4>

                            <div class="create-admin">
                                <a href="{{ route('createReceiver') }}">
                                    <button>Add new receiver </button>
                                </a>
                            </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Name
                                </th>

                                <th>
                                    Email
                                </th>

                                <th class="text-right">
                                    Actions
                                </th>
                                </thead>
                                <tbody class="newstable">
                                @if(count($receivers) == 0)
                                    There are not any receiver yet.
                                @else
                                    @foreach($receivers as $receiver)
                                        <tr>

                                            <td>
                                                {{ $receiver->name }}
                                            </td>

                                            <td>
                                                {{ $receiver->email }}
                                            </td>

                                            <td class="text-right icon-holder" style="padding-right: 0;">
                                                <div class="width-6">
                                                    <a class="edit" href="{{ route('editReceiver', [$receiver->id]) }}">
                                                        <i class="now-ui-icons ui-2_settings-90"></i>
                                                    </a>
                                                    <a class="edit" href="{{ route('deleteReceiver', [$receiver->id]) }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection