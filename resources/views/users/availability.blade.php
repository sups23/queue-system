<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Appointments availability
        </h2>
    </x-slot>
    <div class="flex flex-col justify-center  text-center border-solid ">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 p-10">
            <div class="inline-block min-w-full sm:px-6 lg:px-8 flex flex-col justify-center items-center"
                style="max-width: 800px">
                <div class="p-6 bg-white border-b border-gray-200 my-1 min-w-full">
                    @if ($packed)
                        <p>You already have two appointments for this date. Please select a different date.</p>
                    @endif
                    <p><a class="text-blue-500 hover:text-blue-700" href="{{ route('dashboard') }} ">Check</a> availability on a different date.</p>
                </div>
                <table class="min-w-100 mt-10 rounded">
                    <thead class="bg-white ">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-8 py-4 text-left">
                                #
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-12 py-4 text-left">
                                <b> Doctors</b>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-12 py-4 text-left">
                                <b>Time</b>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-12 py-4 text-left">
                                <b>Availability</b>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-12 py-4 text-left">
                                <b></b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors_data as $data)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $loop->index + 1 }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $data['name'] }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $data['start'] }} - {{ $data['end'] }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    @if ($data['expected_time'])
                                        Available on {{ $data['date'] }} at {{ $data['expected_time'] }}
                                    @else
                                        Not Available
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('app.store') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="doctor_id" value="{{ $data['id'] }}">
                                        <input type="hidden" name="date" value="{{ $data['date'] }}">
                                        <input type="hidden" name="expected_time"
                                            value="{{ $data['expected_time'] }}">
                                        <button class="rounded pill px-4 py-2 bg-blue-300 text-gray-700 hover:text-gray-800 hover:bg-blue-400 disabled:bg-gray-300 disabled:cursor-not-allowed" {{ $packed || is_null($data['expected_time']) ? 'disabled' : ''}} type="submit">Select</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
