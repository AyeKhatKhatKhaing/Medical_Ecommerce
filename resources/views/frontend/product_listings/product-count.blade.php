@if (app()->getLocale() == 'en')
    <p class="helvetica results">
        @if ($products->total() != 0)
            {{ $products->total() }}
            {{ $products->total() <= 1 ? 'Product' : 'Products' }}
            Found
        @else
            No product found
        @endif

    </p>
@elseif (app()->getLocale() == 'zh-hk')
    <p class="helvetica results">
        @if ($products->total() != 0)
            找到 {{ $products->total() }}
            {{ $products->total() == 1 ? '產品' : '個產品' }}
        @else
            未找到相關產品
        @endif
    </p>
@elseif (app()->getLocale() == 'zh-cn')
    <p class="helvetica results">
        @if ($products->total() != 0)
            找到 {{ $products->total() }}
            {{ $products->total() == 1 ? '產品' : '个产品' }}
        @else
            未找到相关产品
        @endif
    </p>
@endif
