@props(['submitEvent'])

@if (auth()->user()->role == "Manager")
<div class="flex flex-col m-4">
    <form method="POST" action="{{route('submitEvent')}}" class="text-white flex gap-4 flex-col p-6">
        @csrf
        <label for="namaevent">Nama Event</label>
        <input type="text" name="subject" class="text-black rounded-md">
        <label for="deskripsievent">Deskripsi Event</label>
        <input type="text" name="desc_text" class="text-black rounded-md">
        <label for="tanggalevent">Tanggal Event</label>
        <input type="date" name="held_at" class="text-black rounded-md">
        <button type="submit" class="w-full rounded-lg bg-white text-black px-2 py-3 mt-4">Tambah Event</button>
    </form>
</div>
@endif