@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('update_ticket', ['id' => $ticketType->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="bus_type">Тип автобусу:</label>
                            <input type="text" class="form-control" id="bus_type" name="bus_type" value="{{ $ticketType->bus_type }}" required>
                        </div>

                        <div class="form-group">
                            <label for="cost">Вартість:</label>
                            <input type="text" class="form-control" id="cost" name="cost" value="{{ $ticketType->cost }}" required>
                        </div>

                        <div class="form-group">
                            <label for="City">Місто:</label>
                            <input type="text" class="form-control" id="City" name="City" value="{{ $ticketType->City }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Оновити</button>
                    </form>

                </div>
            </div>
        </div>


    </div>
</div>
@endsection
