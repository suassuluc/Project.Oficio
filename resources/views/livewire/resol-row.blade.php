<tr>
    <td class="text-center">{{ $oficio->numeroFormatado }}</td>
    <td class="text-center">{{ $oficio->numero_processo }}</td>
    <td class="text-center">{{ $oficio->assunto }}</td>
    <td class="text-center">{{ $oficio->destino }}</td>
    <td class="text-center">{{ $oficio->data->format('d/m/Y') }}</td>
    @if ($oficio->arquivos)
    <td class= "text-center">
        <a class= "text-center" href="{{ asset('storage/' . $oficio->arquivos) }}" class="btn btn-sm btn-primary" target="_blank">
            <i class="fas fa-download"></i>
        </a>
    </td>
    @else
    @endif
    <td class="text-center">{{ $oficio->role }}</td>
    <td class="text-center">{{ $oficio->autorizado }}</td>
    @if (auth()->user()->can('Jurídico'))
        <td class="text-center">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input"
                    id="{{ $oficio->id }}"
                    wire:model.live='ichecked'
                    wire:click="processMark({{ $oficio->id }})" >
                <label class="custom-control-label"
                    for="{{ $oficio->id }}"></label>
            </div>
        </td>
    @endif

</tr>
