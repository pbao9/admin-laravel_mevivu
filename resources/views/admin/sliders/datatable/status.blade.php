<span @class([
    'badge',
    App\Enums\DefaultStatus::from($status)->badge(),
])>{{ \App\Enums\DefaultStatus::getDescription($status) }}</span>