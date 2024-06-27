<aside class="product-sidebar xl:max-w-[18.75rem] w-full mr-5 text-darkgray side-bar-new">
    @include('frontend.product_listings.category_brand')
</aside>
<main class="product-content flex-1 overflow-x-hidden product-list">
    @include('frontend.product_listings.product-list')
</main>

@push('scripts')


@endpush