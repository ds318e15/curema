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
                    <a href="{{ route('app.lead.index') }}" class="button">Back</a>

                    @if($lead->trashed())
                        <form method="POST" action="{{ route('app.lead.restore', $lead->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="button-group">
                                <button type="submit">Restore</button>
                                <a href="{{ route('app.lead.edit', $lead->id) }}" class="button">Edit</a>
                            </div>
                        </form>
                    @else
                        <div class="button-group">
                            <a href="{{ route('app.lead.conversion', $lead->id) }}" class="button">Convert</a>
                            <a href="{{ route('app.lead.edit', $lead->id) }}" class="button">Edit</a>
                        </div>
                    @endif
                </header>

                <div class="input">
                    Name:
                    <div>{{ $lead->name }}</div>
                </div>

                <div class="input">
                    Title:
                    <div>{{ $lead->title }}</div>
                </div>

                <div class="input">
                    Company:
                    <div>{{ $lead->company }}</div>
                </div>

                <div class="input">
                    Phone:
                    <div>{{ $lead->phone }}</div>
                </div>

                <div class="input">
                    Email:
                    <div>{{ $lead->email }}</div>
                </div>

                <div class="input">
                    Address:
                    <div>
                        {{ $lead->street_name}}
                        {{ $lead->street_number }}, {{ $lead->zip }}
                        {{ $lead->city }} {{ $lead->country }}
                    </div>
                </div>

                <div class="input">
                    Owner:
                    <div><a href="{{ route('app.employee.show', $lead->user->id) }}">{{ $lead->user->name }}</a></div>
                </div>
            </div>
        </section>

        <section class="col-xs-4">
            <div class="panel activities">
                <header>
                    <h1>Activities</h1>
                    <a href="{{ route('app.lead.activities', $lead->id) }}" class="button">Show all</a>
                </header>
                @include('app.lead.activity')
            </div>
        </section>
    </div>

@endsection