<div class="row">
    <div class="col">
        <b><label>Logo do cabeçalho dos PDF's</label></b>
        <br>

        @if ($logo && in_array($logo->extension(), ['jpg', 'jpeg', 'png']))
            <img src="{{ $logo->temporaryUrl() }}" width="150">
        @else 
            <img src="{{ asset('storage/images/' . $settingsLogo) }}" width="150">
        @endif
        <br>

        @error('logo')
            <div class="alert alert-danger mt-2 w-100">{{ $message }}</div>
        @enderror

        <input type="file" name="logo" wire:model="logo" class="mt-2">

    </div>
</div>
