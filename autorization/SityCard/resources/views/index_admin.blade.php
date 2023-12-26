@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                    <div class="mt-3 mb-3 float-right">
                        <a href="{{ route('create_ticket') }}" class="btn btn-primary">Створити</a>
                    </div>

                    @foreach($ticket_type as $ticket)
                    <div class="card border mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ticket->bus_type }}</h5>

                            <p class="card-text">Cost: {{ $ticket->cost }}</p>
                            <p class="card-text">City: {{ $ticket->City }}</p>

                            <form action="{{ route('update_ticket', ['id' => $ticket->id]) }}" method="post" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-primary btn-sm">Змінити</button>
                            </form>

                            <form action="{{ route('delete_ticket', ['id' => $ticket->id]) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                            </form>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
