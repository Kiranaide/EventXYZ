<div>
    <table>
        <thead>
            <tr>
                <th>Event</th>
                <th>Description</th>
                <th>Held At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{$events->subject}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>