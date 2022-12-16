<div class="p-6 text-gray-900">
                <p class="text-2xl text-gray-600 font-bold-mb-6 underline">Subscribers</p>

                <div class="px-8">

                    <x-text-input
                     type="text"
                     class="rounded-lg border float-right border-gray-300 mb-4 pl-8 w-1/3"
                     placeholder="Search"
                     wire:model="search"
                    ></x-text-input>

                @if ($subscribers->isEmpty())
                    <div class="flex w-full bg-red-100 p-5 rounded-lg">
                        <p class="text-red-400">No subscribers found</p>
                    </div>
                    @else
                    <table class="w-full">
                        <thead class=" border-b-2 border-gray-300 text-gray-600">
                            <tr>
                                <th class="px-6 py-3 text-left">
                                    Email
                                </th>
                                <th class="px-6 py-3 text-left">
                                    Verified
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $subscribers as $subscriber)
                            <tr class="text-sm text-gray-900 border-b border-gray-400">
                                <td class="px-6 py-4">
                                    {{$subscriber->email}}
                                </td>
                                <td>
                                    {{optional($subscriber->email_verified_at)->diffForHumans() ?? 'N/A'}}
                                </td>
                                <td class="px-6 py-4">
                                    <x-primary-button class="border border-red-500 text-red-500 bg-red-50 hover:bg-red-100" wire:click="delete({{ $subscriber->id }})">Delete</x-primary-button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </ul>
            </div>
                </div>



