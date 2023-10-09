@props(['eventData'])

<div class="mx-4 my-8 flex flex-col gap-4">
    <button class="rounded-md bg-white py-4 px-4">Add Data</button>
    <table class="w-full">
        <thead>
            <tr class="text-white text-center">
                <td>Events</td>
                <td>Description</td>
                <td>Held At</td>
                @if (auth()->user()->role == 'Manager')
                    <td>Employee Attended</td>
                @endif
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventData as $event)
                <tr class="text-white text-center">
                    <td>{{$event->subject}}</td>
                    <td>{{$event->desc_text}}</td>
                    <td>{{$event->held_at}}</td>
                    @if (auth()->user()->role == 'Manager')
                        <td>{{$event->user_attend}}</td>
                        <td><button>Delete</button></td>
                    @endif
                    @if (auth()->user()->role == 'Employee')
                        <td><button>Attend</button></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>