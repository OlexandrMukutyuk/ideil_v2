@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>Історія поповнення коштів</h1>
                        @foreach($secondTableData as $data)
                        <p>+ {{ $data->amount }}</p>

                        @endforeach

                        <h1>Історія використаних коштів</h1>

                        @foreach($historyData as $data)
                        <p>- {{$data->ticket_type->cost}}</p>
                        @endforeach

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="text-right">
                <p class="display-6">Гаманець: {{ $user->purse }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
