<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pricing Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <x-jet-application-logo class="block h-12 w-auto"/>
                    </div>

                    <div class="mt-8 text-2xl">
                        <p>Play with your pricing.</p>
                    </div>

                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <p class="mt-1 text-sm text-gray-600">
                                    Add or remove new budget pricing for the bidding process.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form wire:submit.prevent="submit">
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="actual_cost" class="block text-sm font-medium text-gray-700">Actual
                                                Cost</label>
                                            <input type="number" wire:model="actual_cost" name="actual_cost"
                                                   id="actual_cost" autocomplete="actual_cost"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @error('actual_cost') <span
                                                class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="bid_cost" class="block text-sm font-medium text-gray-700">Bid
                                                Cost</label>
                                            <input type="number" wire:model="bid_cost" name="bid_cost" id="bid_cost"
                                                   autocomplete="bid_cost"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @error('bid_cost') <span
                                                class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <x-jet-button class="ml-4" wire:loading.class="disabled">
                                            {{ __('Save') }}
                                        </x-jet-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="flex flex-col" wire:init="loadCosts">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Avatar
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Actual Cost
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Bidding Cost
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Remove</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($costs as $cost)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full"
                                                                 src="{{ asset('img/logo.png') }}"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div
                                                        class="text-sm text-gray-900">{{ number_format($cost->actual_cost,2) }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div
                                                        class="text-sm text-gray-900">{{ number_format($cost->bid_cost,2) }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Active
                </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="#" wire:click="remove('{{ $cost->id }}')"
                                                       wire:loading.class="disabled"
                                                       class="text-red-500 hover:text-indigo-900">Remove</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- More items... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
