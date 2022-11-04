<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 my-1">
                    @if ($apps)
                        You have {{ $apps->count() }} appointment{{ $apps->count() == 1 ? '' : 's' }}

                        <ul class="list-disc mb-2 list-inside">
                            @foreach ($apps as $app)
                                <li> {{ $app->date }} at {{ $app->expected_time }} by {{ $app->doc()->name }}.</li>
                            @endforeach
                        </ul>
                    @else
                        You have no appointments.
                    @endif
                </div>

                @if ($today_apps_count)
                    <div class="p-6 bg-white border-b border-gray-200 my-1">
                        You have got {{ count($today_apps_count) }} appointments for today.
                        @foreach ($today_apps_count as $doctor => $count)
                            <p>{{ $count }} pending users in the queue for doctor {{ $doctor }}.</p>
                        @endforeach
                    </div>
                @endif
                <div class="p-6 bg-white border-b border-gray-200 my-1">
                    <u>
                        <h1>Appointment</h1>
                    </u>
                    <br>
                    <h3 style="font-size:20px;">Request an appointment</h3>
                    <br>
                    <form method="GET" action="{{ route('availability') }}">

                        <b>Date</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date"
                            min="{{ now()->addDays(1)->toDateString() }}" max="{{ now()->addDays(8)->toDateString() }}"
                            name="date">



                        <br><br>
                        <b>Department</b> &nbsp;&nbsp;
                        <select
                            class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="dept_id" aria-label="Default select example" name="department">
                            <option selected>Open this select menu</option>
                            @foreach ($depts as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->name }} </option>
                            @endforeach
                        </select>
                        <br><br>
                        <button
                            class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
