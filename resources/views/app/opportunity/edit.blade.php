@extends('layouts.app')

@section('content')

    @if(Session::has('alert-success'))
        <div class="alert success">
            {{ Session::get('alert-success') }}
        </div>
    @endif

    <div class="panel">
        <header>
            <a href="{{ route('app.opportunity.show', $opportunity->id) }}" class="button">Back</a>
            @if($opportunity->trashed())
                <form method="POST" action="{{ route('app.opportunity.restore', $opportunity->id) }}">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <button type="submit">Restore</button>
                </form>
            @else
                <form method="post" action="{{ route('app.opportunity.destroy', $opportunity->id) }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}

                    <button type="submit">Delete</button>
                </form>
            @endif
        </header>

        <form method="POST" action="{{ route('app.opportunity.update', $opportunity->id) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="row">
                <fieldset class="col-xs-12">
                    <label>
                        Name*
                        <input type="text" name="name" value="{{ old('name', $opportunity->name) }}">
                        @if($errors->has('name'))
                            <small class="error">{{ $errors->first('name') }}</small>
                        @endif
                    </label>
                </fieldset>
            </div>

            <div class="row">
                <fieldset class="col-xs-12">
                    <label>
                        Amount
                        <input type="text" name="amount" value="{{ old('amount', $opportunity->amount) }}">
                        @if($errors->has('amount'))
                            <small class="error">{{ $errors->first('amount') }}</small>
                        @endif
                    </label>
                </fieldset>
            </div>

            <div class="row">
                <fieldset class="col-xs-6">
                    <label>
                        Account*
                        <select name="account_id">
                            @foreach($accounts as $account)
                                @if($account->id == old('account_id', $opportunity->account_id))
                                    <option value="{{ $account->id }}" selected>{{ $account->name }}</option>
                                @else
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('account_id'))
                            <small class="error">{{ $errors->first('account_id') }}</small>
                        @endif
                    </label>
                </fieldset>

                <fieldset class="col-xs-6">
                    <label>
                        Owner*
                        <select name="user_id">
                            @foreach($users as $user)
                                @if($user->id == old('user_id', $opportunity->user_id))
                                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                @else
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('user_id'))
                            <small class="error">{{ $errors->first('user_id') }}</small>
                        @endif
                    </label>
                </fieldset>
            </div>

            <br>

            <button type="submit" class="submit">Update</button>
        </form>
    </div>
@endsection