@php $editing = isset($product) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text name="name" label="Name" :value="old('name', ($editing ? $product->name : ''))" maxlength="255"
            placeholder="Name" required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="category_id" label="Category">
            @php $selected = old('category_id', ($editing ? $product->category_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Category</option>
            @foreach($categories as $value => $label)
            <option value="{{ $value }}" {{ $selected==$value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number name="quantity" label="Quantity" :value="old('quantity', ($editing ? $product->quantity : ''))"
            placeholder="Quantity" required></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        @if($editing)
        <x-inputs.image name="thumbnail" id="thumbnail" label="Thumbnail" maxlength="255">{{ old('thumbnail', ($editing
            ? $product->thumbnail : ''))
            }}</x-inputs.image>

        @else
        <x-inputs.image name="thumbnail" id="thumbnail" label="Thumbnail" maxlength="255" requred>{{ old('thumbnail',
            ($editing ? $product->thumbnail : ''))
            }}</x-inputs.image>
        @endif
    </x-inputs.group>

    <x-inputs.group class="w-full">
        @if($editing)
        <x-inputs.image id="image" name="image" label="Image">{{ old('image', ($editing ? $product->image : ''))
            }}</x-inputs.image>
        @else
        <x-inputs.image id="image" name="image" label="Image" required>{{ old('image', ($editing ? $product->image :
            ''))
            }}</x-inputs.image>
        @endif
    </x-inputs.group>



    <x-inputs.group class="w-full">
        <x-inputs.image id="image_2" name="image_2" label="Alternate Image">{{ old('image_2', ($editing ?
            $product->image_2 : ''))
            }}</x-inputs.image>
    </x-inputs.group>


    <x-inputs.group class="w-full">
        <x-inputs.number name="weight" label="Weight" :value="old('weight', ($editing ? $product->weight : 0))"
            max="255" step="0.01" placeholder="Weight" required></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number name="height" label="Height" :value="old('height', ($editing ? $product->height : 0))"
            max="255" step="0.01" placeholder="Height" required></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number name="length" label="Length" :value="old('length', ($editing ? $product->length : 0))"
            max="255" step="0.01" placeholder="Length" required></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number name="price" label="Price" :value="old('price', ($editing ? $product->price : 0))" step="0.01"
            placeholder="Price" required></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number name="sale_price" label="Sale Price"
            :value="old('sale_price', ($editing ? $product->sale_price : 0))" step="0.01" placeholder="Sale Price">
        </x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date name="sale_start" label="Sale Start"
            value="{{ old('sale_start', ($editing ? optional($product->sale_start)->format('Y-m-d') : '')) }}"
            max="255"></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date name="sale_end" label="Sale End"
            value="{{ old('sale_end', ($editing ? optional($product->sale_end)->format('Y-m-d') : '')) }}" max="255">
        </x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="description" label="Description" required>{{ old('description', ($editing ?
            $product->description : ''))
            }}</x-inputs.textarea>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="short_description" label="Short Description" required>{{ old('short_description',
            ($editing ? $product->short_description
            : '')) }}</x-inputs.textarea>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="type" label="Product Type" required>
            @php $selected = old('type', ($editing ? $product->type : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Type</option>
            @foreach($types as $value => $label)
            <option value="{{ $value }}" {{ $selected==$value ? 'selected' : 1 }}>{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number name="shipping_price" label="Shipping Price"
            :value="old('shipping_price', ($editing ? $product->shipping_price : 0))" step="0.01"
            placeholder="Shipping Price" required></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.basic type="file" name="download_link" label="Please upload File for virtual product">{{
            old('download_link', ($editing ? $product->download_link : ''))
            }}</x-inputs.basic>
    </x-inputs.group>
</div>