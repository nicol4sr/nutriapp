@props(['id', 'classes'])

<button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#{{ $id }}">
    {{ $slot }}
</button>
