<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('posts.update', $post)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea class="bg-transparent border border-gray-300 @error('message')
                            border-red-600
                        @enderror rounded-lg p-4 w-full
                         resize-none" name="message" id="" cols="30" rows="5"
                         placeholder="{{ __('What are you thinking?')}}">{{ old('message', $post->message)}}</textarea>
                         {{--@error('message')
                         {{ $message }}
                         @enderror--}}
                         <x-input-error :messages="$errors->get('message')" class="mt-1 mb-1"/>
                        <x-primary-button class="mt-2">{{__('Postear')}}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
