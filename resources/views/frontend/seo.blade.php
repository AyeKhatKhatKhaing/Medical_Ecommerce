@section('title')
{{-- {{ dd($seo) }} --}}
{{ langbind($seo,'meta_title') ?? 'mediQ'}}
@stop
@section('meta')
<!-- Primary Meta Tags -->
@php 
$seoLang = null; $url = null; $seoTitle = null;
if(lang() == "en"){
    $seoTitle = isset($seo->name_en) ? $seo->name_en : 'mediQ';
    $seoLang = "en-HK";
}elseif(lang() == "zh-hk"){
    $seoTitle = isset($seo->name_tc) ? $seo->name_tc : 'mediQ';
    $seoLang = "zh-HK";
}elseif(lang() == "zh-cn"){
    $seoTitle = isset($seo->name_sc) ? $seo->name_sc : 'mediQ';
    $seoLang = "zh-CN";
}

if(lang() == "en" && isset($seo->url_en)){
    $url = $seo->url_en;
}elseif(lang() == "zh-hk" && isset($seo->url_tc)){
    $url = $seo->url_tc;
}elseif(lang() == "zh-cn" && isset($seo->url_sc)){
    $url = $seo->url_sc;
}
@endphp
<meta name="title" content="{{ langbind($seo,'meta_title') ?? $seoTitle}}" />
<meta name="description" content="{{ langbind($seo,'meta_description') ?? $seoTitle }}" />

<!-- Open Graph / Facebook -->
<meta property="og:site_name" content="mediQ" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ $url != null ? langbind($seo,'url') : url()->current()}}" />
<meta property="og:title" content="{{ langbind($seo,'meta_title') ?? $seoTitle}}" />
<meta property="og:description" content="{{ langbind($seo,'meta_description') ?? $seoTitle }}" />
<meta property="og:image" content="{{isset($seo->meta_image) ? asset($seo->meta_image) : asset('/frontend/img/Logotype_mediq.png')}}" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $url != null ? langbind($seo,'url') : url()->current() }}" />
<meta property="twitter:title" content="{{ langbind($seo,'meta_title') ?? $seoTitle}}" />
<meta property="twitter:description" content="{{ langbind($seo,'meta_description') ?? $seoTitle }}" />
<meta property="twitter:image" content="{{isset($seo->meta_image) ? asset($seo->meta_image) : asset('/frontend/img/Logotype_mediq.png')}}" />

<link rel="alternate" hreflang="{{$seoLang}}" href="{{ $url != null ? langbind($seo,'url') : url()->current() }}" >
@if(lang() == 'en')
<link rel="alternate" hrefLang="x-default" href="{{ $url != null ? langbind($seo,'url') : url()->current() }}" />
@endif

<link rel="canonical" href="{{ $url != null ? langbind($seo,'url') : url()->current() }}" />
<!-- Meta Tags Generated with https://metatags.io -->
@stop
