 {{-- <a {{ $attributes }}>{{ $slot }}</a> --}}

 <a {{ $attributes->merge(['class' => 'nav-link']) }}>
    {{ $slot }}
</a>
