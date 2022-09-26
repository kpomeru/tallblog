@props(['user', 'badgeClass' => ''])

<a href="#" title="Show user">
    <x-badge :class="$badgeClass">{{ $user->username }}</x-badge>
</a>
