@php $editing = isset($content) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="page"
            label="Page"
            :value="old('page', ($editing ? $content->page : ''))"
            maxlength="255"
            placeholder="Page"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="key"
            label="Key"
            :value="old('key', ($editing ? $content->key : ''))"
            maxlength="255"
            placeholder="Key"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="value" label="Value" maxlength="255" required
            >{{ old('value', ($editing ? $content->value : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="section"
            label="Section"
            :value="old('section', ($editing ? $content->section : ''))"
            maxlength="255"
            placeholder="Section"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="type"
            label="Type"
            :value="old('type', ($editing ? $content->type : ''))"
            max="255"
            placeholder="Type"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
