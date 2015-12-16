@extends('layouts.app')

@section('content')

    @if(Session::has('alert-success'))
        <div class="alert success">
            {{ Session::get('alert-success') }}
        </div>
    @endif

    <div class="row">
        <section class="col-xs-8">
            <div class="panel">
                <header>
                    <a href="{{ route('app.employee.index') }}" class="button">Back</a>
                </header>

                <div class="input">
                    Name:
                    <div>{{ $employee->name }}</div>
                </div>

                <div class="input">
                    Title:
                    <div>{{ $employee->title }}</div>
                </div>

                <div class="input">
                    Address:
                    <div>
                        {{ $employee->street_name}}
                        {{ $employee->street_number }}, {{ $employee->zip }}
                        {{ $employee->city }} {{ $employee->country }}
                    </div>
                </div>

                <div class="input">
                    Phone:
                    <div>{{ $employee->phone }}</div>
                </div>

                <div class="input">
                    Email:
                    <div>{{ $employee->email }}</div>
                </div>
            </div>
        </section>

        <section class="col-xs-4">
            <div class="panel activities">
                <header>
                    <h1>Activities</h1>
                </header>
                @foreach($employee->changes as $change)
                    <div class="activity">
                        <p>
                            <a href="{{ route('app.employee.show', $change->user_id) }}">{{ $change->user->name }}</a>
                            @if($change->type == "create")
                                created this employee.
                            @elseif($change->type == "update")
                                updated this employee.
                            @elseif($change->type == "destroy")
                                destroyed this employee.
                            @elseif($change->type == "restore")
                                restored this employee.
                            @endif
                        </p>
                        <small>{{ $change->created_at }}</small>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

@endsection