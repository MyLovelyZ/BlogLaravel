@props(['href', 'current' => false, 'ariaCurrent' => null])

@php
    $underlineBase = '
        relative
        after:content-[""]
        after:absolute
        after:left-0
        after:-bottom-1
        after:h-[2px]
        after:w-full
        after:bg-white
        after:origin-left
        after:transition-transform
        after:duration-300
    ';

    if ($current) {
        $classes = 'bg-gray-900 text-white ' 
                   . $underlineBase . 
                   ' after:scale-x-100';
        $ariaCurrent = 'page';
    } else {
        $classes = 'text-gray-300 hover:bg-white/5 hover:text-white ' 
                   . $underlineBase . 
                   ' after:scale-x-0 hover:after:scale-x-100';
    }
@endphp

<a href="{{ $href }}"
   {{ $attributes->merge([
        'class' => 'rounded-md px-3 py-2 text-sm font-medium ' . $classes,
        'aria-current' => $ariaCurrent
   ]) }}>
    {{ $slot }}
</a>