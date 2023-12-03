<div class=" text-blue-500">{{ auth()->user()->name }}</div>
<div class=" text-red-500">{{ auth()->user()->avatar }}</div>



<section>

    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
           Avatar Imformation
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Update your account's avatar information.
        </p>
    </header>

    <img src="{{ "storage/$user->avatar" }}"  alt="" srcset="">

    <form method="post" action="{{ route('profile.avatar.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="avatar" value="avatar" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)"  autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>


    </form>
    @if (session('message'))
    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
        {{ session('message') }}
    </p>
@endif
</section>
