@props([
    'name',
    'label',
    'value',
    'id'
])

<x-inputs.basic 
    type="file" 
    :name="$name" 
    :id="$id"
    label="{{ $label ?? ''}}" 
    :value="$value ?? ''" 
    accept="image/*"
    :attributes="$attributes"></x-inputs.basic>

   @if (empty($slot))
        <div>
            {{$slot}}
            <img height="50" width="50" src="{{$slot}}" />
        </div>
       
   @endif 

   <script>
        document.getElementById(" {{$id}} ")
                .addEventListener('change', (e) => {
                    console.log('e.target.files :>> ', e.target.files);
                })
   </script>