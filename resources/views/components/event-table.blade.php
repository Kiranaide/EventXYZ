@props(['events'])

<div class="m-4">
    <table class="w-full">
        <thead>
            <tr class="text-white text-center">
                <td>Events</td>
                <td>Description</td>
                <td>Held At</td>
                <td>Action</td>
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