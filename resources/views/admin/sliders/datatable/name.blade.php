@if(auth('admin')->user()->isSuperAdmin())
    <x-link :href="route('admin.slider.edit', $id)" :title="$name"/>
@endif