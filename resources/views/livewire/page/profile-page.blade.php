@section('title', 'Profile')

<div class="custom__container py-4 md:py-6 space-y-6 lg:space-y-8">
    <x-user.profile-banner />
    <x-card class="!p-0">
        <livewire:components.choose-preferred-categories :profile="true" />
    </x-card>

    <x-card class="!p-0">
        <livewire:components.choose-preferred-subscriptions-profile />
    </x-card>
</div>
