<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach(['zh-hk','zh-cn','en'] as $lang)
        <url>
            <loc>{{ url('/'.$lang) }}</loc>
            <lastmod>{{$home->updated_at->format('Y-m-d\TH:i:sP')}}</lastmod>
        </url>
        <url>
            <loc>{{ url($lang.'/contact-us') }}</loc>
            <lastmod>{{$contact_us->updated_at->format('Y-m-d\TH:i:sP')}}</lastmod>
        </url>
        <url>
            <loc>{{ url($lang.'/about-us') }}</loc>
            <lastmod>{{$about->updated_at->format('Y-m-d\TH:i:sP')}}</lastmod>
        </url>
        <url>
            <loc>{{ url($lang.'/service-guarantee') }}</loc>
            <lastmod>{{isset($best_price) ? $best_price->updated_at->format('Y-m-d\TH:i:sP') : ''}}</lastmod>
        </url>
        <url>
            <loc>{{ url($lang.'/partner') }}</loc>
            <lastmod>{{isset($partnership) ? $partnership->updated_at->format('Y-m-d\TH:i:sP') : ''}}</lastmod>
        </url>
        <url>
            <loc>{{ url($lang.'/steps-to-book') }}</loc>
            <lastmod>{{isset($booking_page) ? $booking_page->updated_at->format('Y-m-d\TH:i:sP') : ''}}</lastmod>
        </url>
        <url>
            <loc>{{ url($lang.'/guide') }}</loc>
            <lastmod>{{isset($quick_start_page) ? $quick_start_page->updated_at->format('Y-m-d\TH:i:sP') : ''}}</lastmod>
        </url>
        <url>
            <loc>{{ url($lang.'/career') }}</loc>
        </url>
        @if(count($carriers) > 0)
        @foreach($carriers as $carrer)
        <url>
            <loc>{{ url($lang.'/career/'.$carrer->id) }}</loc>
            <lastmod>{{$carrer->updated_at->format('Y-m-d\TH:i:sP')}}</lastmod>
        </url>
        
        @endforeach
        @endif

        <url>
            <loc>{{ url($lang.'/helpcenter') }}</loc>
            <lastmod>{{isset($faq_page) ? $faq_page->updated_at->format('Y-m-d\TH:i:sP') : ''}}</lastmod>
        </url>

        @if(count($faqs) > 0)
        @foreach($faqs as $faq)
        <url>
            <loc>{{ url($lang.'/helpcenter-detail/'.$faq->id) }}</loc>
            <lastmod>{{$faq->updated_at->format('Y-m-d\TH:i:sP')}}</lastmod>
        </url>
        
        @endforeach
        @endif


        @if(count($products) > 0)
        @foreach($products as $product)
        <url>
            <loc>{{ url($lang.'/product/'.str_replace(' ','-',$product->category->name_en).'/'.$product->slug_en) }}</loc>
            <lastmod>{{$product->updated_at->format('Y-m-d\TH:i:sP')}}</lastmod>
        </url>
        @endforeach
        @endif

        <url>
            <loc>{{ url($lang.'/privacy/') }}</loc>
            <lastmod>{{isset($privacy) ? $privacy->updated_at->format('Y-m-d\TH:i:sP') : ''}}</lastmod>
        </url> 
        <url>
            <loc>{{ url($lang.'/tnc') }}</loc>
            <lastmod>{{isset($term) ? $term->updated_at->format('Y-m-d\TH:i:sP') : ''}}</lastmod>
        </url>
        <url>
            <loc>{{ url($lang.'/coupon-terms-of-use') }}</loc>
            <lastmod>{{isset($terms_coupon) ? $terms_coupon->updated_at->format('Y-m-d\TH:i:sP') : ''}}</lastmod>
        </url>
        <url>
            <loc>{{ url($lang.'/blog') }}</loc>
            <lastmod>{{isset($blogPage) ? $blogPage->updated_at->format('Y-m-d\TH:i:sP') : ''}}</lastmod>
        </url>

        @if(count($blogCategories) > 0 )
        @foreach($blogCategories as $category)
            <url>
                <loc>{{ url($lang.'/blog/'.$category->name_en) }}</loc>
                <lastmod>{{$category->updated_at->format('Y-m-d\TH:i:sP')}}</lastmod>
            </url>
        @endforeach 
        @endif
        @if(count($blogs) > 0 )
        @foreach($blogs as $blog)
            <url>
                <loc>{{ url($lang.'/blog/'.$blog->blogCategory->name_en.'/'.$blog->slug_en) }}</loc>
                <lastmod>{{$blog->updated_at->format('Y-m-d\TH:i:sP')}}</lastmod>
            </url>
        @endforeach 
        @endif

        <url>
            <loc>{{ url($lang.'/coupon-list') }}</loc>
            <lastmod>{{isset($coupon_list) ? $coupon_list->updated_at->format('Y-m-d\TH:i:sP') : ''}}</lastmod>
        </url>

    @endforeach
</urlset>
