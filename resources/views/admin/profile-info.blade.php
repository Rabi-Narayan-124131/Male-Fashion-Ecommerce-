<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Information</title>

    <style>
        .max-w-7xl {
    max-width: 80rem/* 1280px */;
}
.mx-auto {
    margin-left: auto;
    margin-right: auto;
}
.py-10 {
    padding-top: 2.5rem/* 40px */;
    padding-bottom: 2.5rem/* 40px */;
}
@media (min-width: 640px) {
    .sm\:px-6 {
        padding-left: 1.5rem/* 24px */;
        padding-right: 1.5rem/* 24px */;
    }
}
@media (min-width: 1024px) {
    .lg\:px-8 {
        padding-left: 2rem/* 32px */;
        padding-right: 2rem/* 32px */;
    }
}
    </style>

</head>
<body>
    <div class="container-fluid">
        <main>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')

                    <x-section-border />
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.update-password-form')
                    </div>

                    <x-section-border />
                @endif

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.two-factor-authentication-form')
                    </div>

                    <x-section-border />
                @endif

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <x-section-border />

                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            </div>


            <div class = 'md:grid md:grid-cols-3 md:gap-6'>
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>

                        <p class="mt-1 text-sm text-gray-600">
                            Update your account\'s profile information and email address.
                        </p>
                    </div>

                    <div class="px-4 sm:px-0">

                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form wire:submit="">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md sm:rounded-md">
                            <div class="grid grid-cols-6 gap-6">

                            </div>
                        </div>


                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

                            </div>

                    </form>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
