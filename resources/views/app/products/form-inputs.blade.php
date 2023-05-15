@php $editing = isset($product) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $product->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="category_id"
            label="Category Id"
            :value="old('category_id', ($editing ? $product->category_id : ''))"
            maxlength="255"
            placeholder="Category Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="quantity"
            label="Quantity"
            :value="old('quantity', ($editing ? $product->quantity : ''))"
            max="255"
            placeholder="Quantity"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="image" label="Image" maxlength="255" required
            >{{ old('image', ($editing ? $product->image : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="image_2" label="Image 2" maxlength="255"
            >{{ old('image_2', ($editing ? $product->image_2 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="thumbnail"
            label="Thumbnail"
            maxlength="255"
            required
            >{{ old('thumbnail', ($editing ? $product->thumbnail : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="slug"
            label="Slug"
            :value="old('slug', ($editing ? $product->slug : ''))"
            maxlength="255"
            placeholder="Slug"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="weight"
            label="Weight"
            :value="old('weight', ($editing ? $product->weight : ''))"
            max="255"
            step="0.01"
            placeholder="Weight"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="height"
            label="Height"
            :value="old('height', ($editing ? $product->height : ''))"
            max="255"
            step="0.01"
            placeholder="Height"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="length"
            label="Length"
            :value="old('length', ($editing ? $product->length : ''))"
            max="255"
            step="0.01"
            placeholder="Length"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="price"
            label="Price"
            :value="old('price', ($editing ? $product->price : ''))"
            max="255"
            step="0.01"
            placeholder="Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="sale_price"
            label="Sale Price"
            :value="old('sale_price', ($editing ? $product->sale_price : ''))"
            max="255"
            step="0.01"
            placeholder="Sale Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="sale_start"
            label="Sale Start"
            value="{{ old('sale_start', ($editing ? optional($product->sale_start)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="sale_end"
            label="Sale End"
            value="{{ old('sale_end', ($editing ? optional($product->sale_end)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $product->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="short_description"
            label="Short Description"
            maxlength="255"
            required
            >{{ old('short_description', ($editing ? $product->short_description
            : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="type"
            label="Type"
            :value="old('type', ($editing ? $product->type : ''))"
            maxlength="255"
            placeholder="Type"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="shipping_price"
            label="Shipping Price"
            :value="old('shipping_price', ($editing ? $product->shipping_price : ''))"
            max="255"
            step="0.01"
            placeholder="Shipping Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="download_link"
            label="Download Link"
            maxlength="255"
            required
            >{{ old('download_link', ($editing ? $product->download_link : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
