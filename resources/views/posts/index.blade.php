<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('posts.store')}}" method="POST">
                        @csrf
                        <textarea class="bg-transparent border border-gray-300 @error('message')
                            border-red-600
                        @enderror rounded-lg p-4 w-full
                         resize-none" name="message" id="" cols="30" rows="5"
                         placeholder="{{ __('What are you thinking?')}}">{{ old('message')}}</textarea>
                         {{--@error('message')
                         {{ $message }}
                         @enderror--}}
                         <x-input-error :messages="$errors->get('message')" class="mt-1 mb-1"/>
                        <x-primary-button class="mt-2">{{__('Postear')}}</x-primary-button>
                    </form>
                </div>
            </div>

            <div class="mt-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">

                @foreach ($posts as $post)

                <div class="p-6 flex space-x-2">
                    <svg class="h-6 w-6 text-gray-600 dark:text-gray-400 -scale-x-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                      </svg>
                      <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800 dark:text-gray-200">{{$post->user->name}}</span>
                                <small class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{$post->created_at->diffForHumans()}}</small>
                            </div>
                        </div>
                        <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">{{ $post->message}}</p>
                      </div>
                      <x-dropdown>
                        <x-slot name="trigger">
                            <button><svg class="w-5 h-5 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                              </svg>
                              </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('posts.edit', $post)">{{__('Edit Post')}}
                            </x-dropdown-link>
                        </x-slot>
                      </x-dropdown>


                </div>

                @endforeach


            </div>
        </div>
    </div>
</x-app-layout>
