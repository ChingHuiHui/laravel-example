<div {{ $attributes -> merge(['class' =>'flex items-center px-6 py-4 rounded ' . $typeClass()]) }}>
    This is message : 
    {{ $slot }}

    {{ $message }}
</div>