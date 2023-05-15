@php $editing = isset($order) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $order->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="contact_email"
            label="Contact Email"
            :value="old('contact_email', ($editing ? $order->contact_email : ''))"
            maxlength="255"
            placeholder="Contact Email"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="contact_phone"
            label="Contact Phone"
            :value="old('contact_phone', ($editing ? $order->contact_phone : ''))"
            maxlength="255"
            placeholder="Contact Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $order->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="payment_ref"
            label="Payment Ref"
            :value="old('payment_ref', ($editing ? $order->payment_ref : ''))"
            maxlength="255"
            placeholder="Payment Ref"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="transaction_id"
            label="Transaction Id"
            :value="old('transaction_id', ($editing ? $order->transaction_id : ''))"
            maxlength="255"
            placeholder="Transaction Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="address_line_1"
            label="Address Line 1"
            maxlength="255"
            required
            >{{ old('address_line_1', ($editing ? $order->address_line_1 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="address_line_2"
            label="Address Line 2"
            maxlength="255"
            >{{ old('address_line_2', ($editing ? $order->address_line_2 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="state"
            label="State"
            :value="old('state', ($editing ? $order->state : ''))"
            maxlength="255"
            placeholder="State"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="city"
            label="City"
            :value="old('city', ($editing ? $order->city : ''))"
            maxlength="255"
            placeholder="City"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="country"
            label="Country"
            :value="old('country', ($editing ? $order->country : ''))"
            maxlength="255"
            placeholder="Country"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="sub_total"
            label="Sub Total"
            :value="old('sub_total', ($editing ? $order->sub_total : ''))"
            max="255"
            step="0.01"
            placeholder="Sub Total"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="discount"
            label="Discount"
            :value="old('discount', ($editing ? $order->discount : ''))"
            max="255"
            step="0.01"
            placeholder="Discount"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="shipping_total"
            label="Shipping Total"
            :value="old('shipping_total', ($editing ? $order->shipping_total : ''))"
            max="255"
            step="0.01"
            placeholder="Shipping Total"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="order_status"
            label="Order Status"
            :value="old('order_status', ($editing ? $order->order_status : ''))"
            maxlength="255"
            placeholder="Order Status"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="payment_status"
            label="Payment Status"
            :value="old('payment_status', ($editing ? $order->payment_status : ''))"
            maxlength="255"
            placeholder="Payment Status"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="payment_response"
            label="Payment Response"
            maxlength="255"
            required
            >{{ old('payment_response', ($editing ? $order->payment_response :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
