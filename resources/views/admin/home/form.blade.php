<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Edit Home
                @else
                    Add New Home
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/home') }}" title="Back"><button type="button"
                            class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i>
                            Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div style="border-bottom: 1px solid #E5EAEE;">
                <ul class="nav nav-tabs bg-white">
                    @foreach (config('lng.lng') as $lngcode => $lng)
                        <li class="nav-item">
                            <a onclick="showHideDescription('{{ strtolower($lngcode) }}')"
                                class="nav-link {{ $lngcode == 'EN' ? 'active' : '' }} nav_link" data-bs-toggle="tab"
                                href="#{{ strtolower($lngcode) }}-tab">
                                <span class="d-sm-none">{{ $lng }}</span>
                                <span class="d-sm-block d-none">{{ $lng }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body">
                <div class="card-body content-body">
                    <div class="tab-content">
                        @foreach (config('lng.attr') as $lngcode => $attr)
                            <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"
                                id="{{ strtolower($lngcode) }}-tab">
                                <div
                                    class="form-group mb-5{{ $errors->has('onsale_banner_title_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('onsale_banner_title_' . $attr, 'On Sale Banner Title' . ' (' . $lngcode . ')', [
                                        'class' => 'form-label required',
                                    ]) !!}
                                    {!! Form::text(
                                        'onsale_banner_title_' . $attr,
                                        null,
                                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                    ) !!}
                                    {!! $errors->first('onsale_banner_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div
                                    class="form-group mb-5{{ $errors->has('promotion_title_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('promotion_title_' . $attr, 'Season Promotion Title' . ' (' . $lngcode . ')', [
                                        'class' => 'form-label required',
                                    ]) !!}
                                    {!! Form::text(
                                        'promotion_title_' . $attr,
                                        null,
                                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                    ) !!}
                                    {!! $errors->first('promotion_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div
                                    class="form-group mb-5{{ $errors->has('member_reward_title_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('member_reward_title_' . $attr, 'Member Rewards Title' . ' (' . $lngcode . ')', [
                                        'class' => 'form-label required',
                                    ]) !!}
                                    {!! Form::text(
                                        'member_reward_title_' . $attr,
                                        null,
                                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                    ) !!}
                                    {!! $errors->first('member_reward_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div
                                    class="form-group mb-5{{ $errors->has('cookies_text_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('cookies_text_' . $attr, 'Cookies Text' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                    {!! Form::textarea(
                                        'cookies_text_' . $attr,
                                        null,
                                        'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                    ) !!}
                                    {!! $errors->first('cookies_text_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                @if ($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox"
                                            {{ isset($home->is_translate) && $home->is_translate == 1 ? 'checked' : '' }}
                                            name="is_translate" id="auto_translate" value="1">
                                        <label class="form-check-label ms-2" for="auto_translate">
                                            Auto translate to chinese
                                        </label>
                                    </div>
                                @endif
                                <div class="form-group col-md-8 mt-5">
                                    <div class="list-title mb-3">
                                        <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                            <h5>Pop Up Image ({{ $lngcode }}) </h5>
                                            {{-- <span style="color: #B5B5C3">Size(1200 x 630)px</span> --}}
                                        </label>
                                    </div>
                                    <div class="panel-block">
                                        <div class="form-group">
                                            <div id="holder-popup-image-{{ $attr }}">
                                                @php
                                                    $popup_img = 'popup_img_' . $attr;
                                                @endphp

                                                @if (!empty($home->$popup_img))
                                                    <div
                                                        class='lfmimage-container popup-image-{{ $attr }}lfmc0'>
                                                        <img src="{{ asset($home->$popup_img) }}"
                                                            class='lfmimage w-100' style="height: 20rem;">
                                                        <div>
                                                            <button type="button"
                                                                onclick="removeImage('popup-image-{{ $attr }}',0)"
                                                                class='btn btn-sm btn-danger w-100'>Remove</button>
                                                        </div>
                                                    </div>
                                                @else
                                                    <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                        class="img-thumbnail">
                                                @endif
                                            </div>
                                            <div class="input-group mt-3">
                                                <span class="input-group-btn">
                                                    <a id="lfm-popup-image-{{ $attr }}"
                                                        data-input="popup-image-{{ $attr }}"
                                                        data-preview="holder-popup-image-{{ $attr }}"
                                                        class="btn btn-primary text-white lfm-img">
                                                        <i class="bi bi-image-fill me-2"></i>Select File
                                                    </a>
                                                </span>
                                                <input id="popup-image-{{ $attr }}" class="form-control"
                                                    type="text" name="popup_img_{{ $attr }}"
                                                    value="{{ isset($home) ? $home->$popup_img : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-10">
                                    <div class="col-md-12">
                                        <h5>Member Rewards Images ({{ $lngcode }})</h5>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        {{-- <div class="card-body pt-0">
                                            <div class="list-title mb-3">
                                                <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                                    <span style="color: #B5B5C3">Image Size(1200 x 630)px</span>
                                                </label>
                                            </div>
                                            <div class="panel-block">
                                                <div class="form-group col-md-8">
                                                    <div id="holder-reward-image-{{ $attr}}" class="dragGroup">
                                                        @if (isset($home))
                                                            @php
                                                                $member_reward_img ="member_reward_img_".$attr;

                                                                if(isset($home->$member_reward_img)){
                                                                    $array = json_decode($home->$member_reward_img, true)?? [];
                                                                    $member_reward_img =explode(',',$array[0]);
                                                                }else{
                                                                    $member_reward_img = [];
                                                                }

                                                             @endphp

                                                            @if (!empty($member_reward_img) && count($member_reward_img) > 0)

                                                                @foreach ($member_reward_img as $key => $item)
                                                                    <div class='lfmimage-container meta-imagelfmc0 draggable draggableItem{{$key}}'>
                                                                        <img src="{{ asset($item) }}" class='lfmimage w-100' style="height: 20rem;">
                                                                        <div>
                                                                            <button type="button" onclick="homeremoveImage('member_reward_img_{{ $attr}}','{{ $key}}',{{ $home->id }})" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                                        </div>
                                                                    </div>

                                                                @endforeach
                                                            @else
                                                        <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                                            @endif
                                                        @else
                                                        <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                                        @endif
                                                    </div>
                                                    <div class="input-group mt-3">
                                                    <span class="input-group-btn">
                                                        <a id="lfm-meta-image" data-input="reward-image-{{ $attr}}" data-preview="holder-reward-image-{{ $attr}}" class="btn btn-primary text-white lfm-img">
                                                            <i class="bi bi-image-fill me-2"></i>Select File
                                                        </a>
                                                    </span>
                                                    @if (isset($home))
                                                        @php
                                                            $member_reward_img ="member_reward_img_".$attr;

                                                            if(isset($home->$member_reward_img)){
                                                                $member_reward_imgs = json_decode($home->$member_reward_img, true)?? [];

                                                            }else{
                                                                $member_reward_imgs[0] ='';
                                                            }

                                                        @endphp
                                                    <input id="reward-image-{{ $attr}}" class="form-control" type="text" name="member_reward_img_{{ $attr}}[]" value="{{isset($home) ? $member_reward_imgs[0]  : ''}}">

                                                    @else
                                                    <input id="reward-image-{{ $attr}}" class="form-control" type="text" name="member_reward_img_{{ $attr}}[]" >

                                                    @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div> --}}
                                        <div class="card-body">
                                            <div class="list-title mb-3">
                                                <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                                    <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                                                </label>
                                            </div>
                                            <div class="panel-block">
                                                <div class="form-group">
                                                    <ul class="dragGroup">
                                                        @php
                                                            if (isset($home)) {
                                                                $member_reward_img = 'member_reward_img_' . $attr;
                                                                if (isset($home->$member_reward_img)) {
                                                                    $member_reward_img = json_decode($home->$member_reward_img, true) ?? [];
                                                                } else {
                                                                    $member_reward_img = [];
                                                                }
                                                            }
                                                        @endphp
                                                        @if (!empty($member_reward_img) && count($member_reward_img) > 0)
                                                            @foreach ($member_reward_img as $key => $item)
                                                                <li class="draggable draggableItem{{ $key }}-{{ $attr }}"
                                                                    draggable="true" style="display:inline !important">
                                                                    <input type="hidden"
                                                                        name="reward_image_order_{{ $attr }}[]"
                                                                        value="{{ asset($item) }}"
                                                                        id="rewardImage{{ $key }}-{{ $attr }}">
                                                                    <img src="{{ asset($item) }}"
                                                                        style="width:20%;height:20% !important;"
                                                                        class="img-thumbnail mb-3"><a class="ml-1"
                                                                        style="cursor:pointer" href="javascript:;"><span
                                                                            onclick="homeremoveImage('member_reward_img_{{ $attr }}','{{ $key }}',{{ $home->id }})"
                                                                            style="color:red">x</span></a>
                                                                </li>
                                                            @endforeach
                                                    </ul>
                                                @else
                                                    <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                        class="img-thumbnail">
                        @endif
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-reward-image-{{ $attr }}"
                                    data-input="reward-image-{{ $attr }}"
                                    data-preview="holder-reward-image-{{ $attr }}"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>

                            <input id="reward-image-{{ $attr }}" class="form-control" type="text"
                                name="member_reward_img_{{ $attr }}[]">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="form-group col-md-8 mt-5">
        <div class="list-title mb-3">
            <label for="kt_ecommerce_add_product_store_template" class="form-label">
                <h5>Banner Image ({{ $lngcode }}) </h5>
                {{-- <span style="color: #B5B5C3">Size(1200 x 630)px</span> --}}
            </label>
        </div>
        <div class="panel-block">
            <div class="form-group">
                <div id="holder-banner-image-{{ $attr }}">
                    @php
                        $banner_img = 'banner_img_' . $attr;
                    @endphp

                    @if (!empty($home->$banner_img))
                        <div class='lfmimage-container banner-image-{{ $attr }}lfmc0'>
                            <img src="{{ asset($home->$banner_img) }}" class='lfmimage w-100'
                                style="height: 20rem;">
                            <div>
                                <button type="button" onclick="removeImage('banner-image-{{ $attr }}',0)"
                                    class='btn btn-sm btn-danger w-100'>Remove</button>
                            </div>
                        </div>
                    @else
                        <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                    @endif
                </div>
                <div class="input-group mt-3">
                    <span class="input-group-btn">
                        <a id="lfm-banner-image-{{ $attr }}" data-input="banner-image-{{ $attr }}"
                            data-preview="holder-banner-image-{{ $attr }}"
                            class="btn btn-primary text-white lfm-img">
                            <i class="bi bi-image-fill me-2"></i>Select File
                        </a>
                    </span>
                    <input id="banner-image-{{ $attr }}" class="form-control" type="text"
                        name="banner_img_{{ $attr }}" value="{{ isset($home) ? $home->$banner_img : '' }}">
                </div>
            </div>
        </div>
    </div>

</div>
@endforeach

</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
    <div class="form-group mb-5{{ $errors->has('banner_img_url') ? 'has-error' : '' }}">
        {!! Form::label('banner_img_url', 'Banner Image URL', ['class' => 'form-label']) !!}
        {!! Form::text(
            'banner_img_url',
            null,
            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('banner_img_url', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="form-group mb-5{{ $errors->has('popup_img_url') ? 'has-error' : '' }}">
        {!! Form::label('popup_img_url', 'Popup Image URL', ['class' => 'form-label']) !!}
        {!! Form::text(
            'popup_img_url',
            null,
            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
        ) !!}
        {!! $errors->first('popup_img_url', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="card-body pt-0">
        {{-- <div class="list-title mb-3">
                <label for="kt_ecommerce_add_product_store_template" class="form-label">
                    <span style="color: #B5B5C3">Banner Image Size(1200 x 630)px</span>
                </label>
            </div>
            <div class="panel-block">
                <div class="form-group">
                    <div id="holder-banner-image">
                        @if (!empty($home->banner_img))
                            <div class='lfmimage-container banner-imagelfmc0'>
                                <img src="{{ asset($home->banner_img) }}" class='lfmimage w-100' style="height: 20rem;">
                                <div>
                                    <button type="button" onclick="removeImage('banner-image',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                </div>
                            </div>
                        @else
                            <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                        @endif
                    </div>
                    <div class="input-group mt-3">
                    <span class="input-group-btn">
                        <a id="lfm-banner-image" data-input="banner-image" data-preview="holder-banner-image" class="btn btn-primary text-white lfm-img">
                            <i class="bi bi-image-fill me-2"></i>Select File
                        </a>
                    </span>
                        <input id="banner-image" class="form-control" type="text" name="banner_img" value="{{isset($home) ? $home->banner_img : ''}}">
                    </div>
                </div>
            </div> --}}
    </div>
    <div class="card-body pt-5">
        <div class="list-title mb-3">
            <label for="kt_ecommerce_add_product_store_template" class="form-label">
                <span style="color: #B5B5C3">OnSale Banner Image Size(1200 x 630)px</span>
            </label>
        </div>
        <div class="panel-block">
            <div class="form-group">
                <div id="holder-onsale-banner-image">
                    @if (!empty($home->onsale_banner_img))
                        <div class='lfmimage-container onsale-banner-imagelfmc0'>
                            <img src="{{ asset($home->onsale_banner_img) }}" class='lfmimage w-100'
                                style="height: 20rem;">
                            <div>
                                <button type="button" onclick="removeImage('onsale-banner-image',0)"
                                    class='btn btn-sm btn-danger w-100'>Remove</button>
                            </div>
                        </div>
                    @else
                        <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                    @endif
                </div>
                <div class="input-group mt-3">
                    <span class="input-group-btn">
                        <a id="lfm-onsale-banner-image" data-input="onsale-banner-image"
                            data-preview="holder-onsale-banner-image" class="btn btn-primary text-white lfm-img">
                            <i class="bi bi-image-fill me-2"></i>Select File
                        </a>
                    </span>
                    <input id="onsale-banner-image" class="form-control" type="text" name="onsale_banner_img"
                        value="{{ isset($home) ? $home->onsale_banner_img : '' }}">
                </div>
            </div>
        </div>
    </div>
    <div class="card-body pt-5">
        <div class="list-title mb-3">
            <label for="kt_ecommerce_add_product_store_template" class="form-label">
                <span style="color: #B5B5C3">Promotion Image Size(1200 x 630)px</span>
            </label>
        </div>
        <div class="panel-block">
            <div class="form-group">
                <div id="holder-promation-image">
                    @if (!empty($home->promotion_img))
                        <div class='lfmimage-container promotion-imglfmc0'>
                            <img src="{{ asset($home->promotion_img) }}" class='lfmimage w-100'
                                style="height: 20rem;">
                            <div>
                                <button type="button" onclick="removeImage('promotion-img',0)"
                                    class='btn btn-sm btn-danger w-100'>Remove</button>
                            </div>
                        </div>
                    @else
                        <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                    @endif
                </div>
                <div class="input-group mt-3">
                    <span class="input-group-btn">
                        <a id="lfm-promotion-img" data-input="promotion-img" data-preview="holder-promation-image"
                            class="btn btn-primary text-white lfm-img">
                            <i class="bi bi-image-fill me-2"></i>Select File
                        </a>
                    </span>
                    <input id="promotion-img" class="form-control" type="text" name="promotion_img"
                        value="{{ isset($home) ? $home->promotion_img : '' }}">
                </div>
            </div>
        </div>
    </div>
</div>

</div>
