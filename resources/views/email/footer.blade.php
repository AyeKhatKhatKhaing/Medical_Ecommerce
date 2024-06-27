<div class="blue-div"  style="background-color: #2fa9b5;max-width: 640px;margin: 0 auto;padding-top:2px;">
    <div class="me-email-footer" style="padding:48px 36px;">  
        <p style="font-size: 14px;
        font-weight: normal;
        color: #fff;
        text-align: center;
        margin-top: 0;
        margin-bottom: 0;">
        Copyright © {{date('Y')}} mediQ. All Rights Reserved.</p>
        <div class="me-email-policy-div" style="margin-top:8px;text-align: center;color: white;">
            @if(isset($defaultLang))
            @php 
            $mediq = env("APP_URL")."/".$defaultLang."/";
            $faq = env("APP_URL")."/".$defaultLang."/helpcenter";
            $termofuse = env("APP_URL")."/".$defaultLang."/tnc";
            $privacy = env("APP_URL")."/".$defaultLang."/privacy";
            @endphp
            <a href="{{$mediq}}" style="font-size: 14px;color: white;
                font-weight: normal;
                margin: 0 8px;
                text-decoration: none;
                text-underline-offset: 1.1px;
                text-decoration-skip-ink: none;">@lang('labels.email.website')</a> |
            <a href="{{$faq}}" style="font-size: 14px;color: white;
                font-weight: normal;
                margin: 0 8px;
                text-decoration: none;
                text-underline-offset: 1.1px;
                text-decoration-skip-ink: none;">@lang('labels.product_detail.help_center')</a> |
            <a href="{{$termofuse}}" style="font-size: 14px;color: white;
                font-weight: normal;
                margin: 0 8px;
                text-decoration: none;
                text-underline-offset: 1.1px;
                text-decoration-skip-ink: none;">@lang('labels.footer.terms')</a> |
            <a href="{{$privacy}}" style="font-size: 14px;color: white;
                font-weight: normal;
                margin: 0 8px;
                text-decoration: none;
                text-underline-offset: 1.1px;
                text-decoration-skip-ink: none;">@lang('labels.email.policy')</a> 
            @else
            <a href="{{route('mediq')}}" style="font-size: 14px;color: white;
                font-weight: normal;
                margin: 0 8px;
                text-decoration: none;
                text-underline-offset: 1.1px;
                text-decoration-skip-ink: none;">@lang('labels.email.website')</a> |
            <a href="{{route('faq')}}" style="font-size: 14px;color: white;
                font-weight: normal;
                margin: 0 8px;
                text-decoration: none;
                text-underline-offset: 1.1px;
                text-decoration-skip-ink: none;">@lang('labels.product_detail.help_center')</a> |
            <a href="{{route('termofuse')}}" style="font-size: 14px;color: white;
                font-weight: normal;
                margin: 0 8px;
                text-decoration: none;
                text-underline-offset: 1.1px;
                text-decoration-skip-ink: none;">@lang('labels.footer.terms')</a> |
            <a href="{{route('privacy.policy')}}" style="font-size: 14px;color: white;
                font-weight: normal;
                margin: 0 8px;
                text-decoration: none;
                text-underline-offset: 1.1px;
                text-decoration-skip-ink: none;">@lang('labels.email.policy')</a> 
            @endif
        </div>
        <div style="margin-top: 8px;text-align: center;display: none;">
            <a href="https://www.facebook.com/mediqhongkong"><img src="{{asset('frontend/img/me-email-fb.png')}}" alt="facebook" /></a>
            <a href="https://instagram.com/mediqhongkong"><img src="{{asset('frontend/img/me-email-ig.png')}}" alt="instagram" /></a>
            <a href="https://www.youtube.com/@mediqhongkong"><img src="{{asset('frontend/img/me-email-youtube.png')}}" alt="youtube" /></a>
        </div>
    </div>
</div> 
