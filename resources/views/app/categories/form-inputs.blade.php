@php $editing = isset($category) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $category->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="position"
            label="Position"
            :value="old('position', ($editing ? $category->position : ''))"
            maxlength="255"
            placeholder="Position"
        ></x-inputs.text>
    </x-inputs.group>

    {{-- <x-inputs.group class="w-full">
        <x-inputs.number
            name="parent_id"
            label="Parent Id"
            :value="old('parent_id', ($editing ? $category->parent_id : ''))"
            max="255"
            placeholder="Parent Id"
            required
        ></x-inputs.number>
    </x-inputs.group> --}}

    {{-- <x-inputs.group class="w-full">
        <x-inputs.select name="product_id" label="Product" required>
            @php $selected = old('product_id', ($editing ? $category->product_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Product</option>
            @foreach($products as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group> --}}
</div>
