<div class="m-4">
    <table>
        <thead>
            <tr class="text-white text-center">
                <td>Events</td>
                <td>Description</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{$event->subject}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>