<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Param Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" wire:init="loadParams">
                <div class="p-6 sm:px-20 bg-white border-b">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <x-jet-application-logo class="block h-12 w-auto"/>
                    </div>

                    <div class="mt-8 text-2xl">
                        <p>Play with your params.</p>
                    </div>
                </div>

                <div class="bg-gray-50">

                    <div class="text-center" style="padding-top:10px!important"><b><u>SERVICE PARAMS</u></b>
                    </div>
                    <div class="grid grid-cols-3 gap-4" style="padding:30px!important">
                        @foreach($services as $service)
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" wire:click="services('{{ $service->id }}')"
                                           class="form-checkbox" {{ $service->is_allowed ? 'checked' : '' }}>
                                    <span class="ml-2">{{ $service->name }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="text-center" style="padding-top:10px!important"><b><u>DISCIPLINE PARAMS</u></b>
                    </div>
                    <div class="grid grid-cols-3" style="padding:30px!important">
                        @foreach($disciplines as $discipline)
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" wire:click="disciplines('{{ $discipline->id }}')"
                                           class="form-checkbox" {{ $discipline->is_allowed ? 'checked' : '' }}>
                                    <span class="ml-2">{{ $discipline->name }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="text-center" style="padding-top:10px!important"><b><u>DEADLINES PARAMS</u></b>
                    </div>
                    <div class="grid grid-cols-3 gap-4" style="padding:30px!important">
                        @foreach($deadlines as $deadline)
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" wire:click="deadlines('{{ $deadline->id }}')"
                                           class="form-checkbox" {{ $deadline->is_allowed ? 'checked' : '' }}>
                                    <span
                                        class="ml-2">{{ $deadline->from }} - {{ $deadline->to }} {{ $deadline->metric }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="text-center" style="padding-top:10px!important"><b><u>PAGES PARAMS</u></b>
                    </div>
                    <div class="grid grid-cols-3 gap-4" style="padding:30px!important">
                        @foreach($pages as $page)
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" wire:click="pages('{{ $page->id }}')"
                                           class="form-checkbox" {{ $page->is_allowed ? 'checked' : '' }}>
                                    <span
                                        class="ml-2">{{ $page->from }} - {{ $page->to }} {{ $page->metric }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
