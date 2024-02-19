<span @class([
    'badge',
    \App\Enums\DefaultStatus::tryFrom($status)->badge()
])>{{ \App\Enums\DefaultStatus::getDescription($status) }}</span>