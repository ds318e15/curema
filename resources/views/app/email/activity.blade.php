@foreach($email->changes as $change)
    <div class="activity">
        <div>
            <a href="{{ route('app.employee.show', $change->user_id) }}">{{ $change->user->name }}</a>

            @if($change->type == "update")
                updated
            @elseif($change->type == "create")
                created
            @elseif($change->type == "delete")
                deleted
            @elseif($change->type == "restore")
                restored
            @else
                changed
            @endif

            this email.
        </div>
        <small>{{ $change->created_at }}</small>
    </div>
@endforeach