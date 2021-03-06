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
                    <a href="{{ route('app.account.index') }}" class="button">Back</a>

                    @if($account->trashed())
                        <form method="POST" action="{{ route('app.account.restore', $account->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="button-group">
                                <button type="submit">Restore</button>
                                <a href="{{ route('app.account.edit', $account->id) }}" class="button">Edit</a>
                            </div>
                        </form>
                    @else
                        <a href="{{ route('app.account.edit', $account->id) }}" class="button">Edit</a>
                    @endif
                </header>

                <div class="input">
                    Name
                    <div>{{ $account->name }}</div>
                </div>

                <div class="input">
                    Owner
                    <div>{{ $account->user->name }}</div>
                </div>

                <div class="input">
                    Address
                    <div>
                        {{ $account->street_name}}
                        {{ $account->street_number }}, {{ $account->zip }}
                        {{ $account->city }} {{ $account->country }}
                    </div>
                </div>

                <div class="input">
                    CVR
                    <div>{{ $account->cvr }}</div>
                </div>

                <div class="input">
                    Phone:
                    <div>{{ $account->phone }}</div>
                </div>

                <div class="input">
                    Email
                    <div>{{ $account->email }}</div>
                </div>

                <div class="input">
                    Website
                    <div><a href="//{{ $account->website }}">{{ $account->website }}</a></div>
                </div>
            </div>
        </section>

        <section class="col-xs-4">
            <div class="panel activities">
                <header>
                    <h1>Activities</h1>
                    <a href="{{ route('app.account.activities', $account->id) }}" class="button">Show all</a>
                </header>

                @include('app.account.activity')
            </div>
        </section>
    </div>

@endsection