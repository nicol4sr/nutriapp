@props(['id', 'title', 'route'])

<div class="modal fade" id="{{ $id }}" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">{{ $title }}</h4>
                <div class="mt-3 row justify-content-center">
                    @if (isset($route))
                        <form action="{{ $route }}" method="POST">
                            @csrf
                            {{ $slot }}
                        </form>
                    @else
                        {{ $slot }}
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
