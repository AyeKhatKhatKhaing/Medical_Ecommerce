@php
            $recommendTags=\App\Models\RecommendTag::select('id','name_en','name_sc','name_tc')->get();
            // $keyItemTags=\App\Models\KeyItemTag::select('id','name_en','name_sc','name_tc')->get();
            $vaccineFactoryTags=\App\Models\VaccineFactoryTag::select('id','name_en','name_sc','name_tc')->get();
            $highlightTags=\App\Models\HighlightTag::select('id','name_en','name_sc','name_tc')->get();
            $check_up_groups = \App\Models\CheckUpGroup::whereNull('deleted_at')->whereIsPublished(true)->get();
            $key_items = \App\Models\KeyItemTag::whereNull('deleted_at')->whereIsPublished(true)->get();
            $sub_categories = \App\Models\SubCategory::whereNull('deleted_at')->whereIsPublished(true)->get();

@endphp

<div class="accordion inputVariationsRow{{$index}}" id="accordionExample{{ $index }}">
    <div class="accordion-item mb-5">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                Checking Items
            </button>
        </h2>
        <div id="collapse{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample{{ $index }}">
            <div class="accordion-body">
                <div class="card mt-4 rows ">
                    <div class="card-body bg-light-success">
                        <div class="d-flex p-3 justify-content-between mt-2 align-items-start gap-3 ">
                            <div class="rounded p-3 w-100">
                                <div class="form-group mb-5{{ $errors->has('title_en') ? 'has-error' : ''}}">
                                    <label for="">Title (en)</label>
                                    <input type="text" data-id="{{$index}}" class="form-control" name="checking_item_title_en[]" value="{{isset($detail)?$detail->title_en:''}}" id="title_en">
                                </div>
                                <div class="form-group mb-5{{ $errors->has('title_tc') ? 'has-error' : ''}}">
                                    <label for="">Title (tc)</label>
                                    <input type="text" data-id="{{$index}}" class="form-control" name="checking_item_title_tc[]" value="{{isset($detail)?$detail->title_tc:''}}" id="title_tc">
                                </div>
                                <div class="form-group mb-5{{ $errors->has('title_sc') ? 'has-error' : ''}}">
                                    <label for="">Title (sc)</label>
                                    <input type="text" data-id="{{$index}}" class="form-control" name="checking_item_title_sc[]" value="{{isset($detail)?$detail->title_sc:''}}" id="title_sc">
                                </div>

                                <div class="">
                                    <div class="form-group mb-5{{ $errors->has('key_item_tag_') ? 'has-error' : ''}}">
                                        <label for="">Key Item tags </label>
                                        <input type="hidden" data-id="{{$index}}" class="indices" name="indices[]" value="{{$index}}" id="indices">

                                        @if(count($key_items)>0)
                                        <select  name="key_item_tag{{$index}}[]" class="form-select key_item_tag{{$index}} form-select-lg form-select-tag" data-index="{{$index}}" aria-label="Default select example" name="key_item_tag[]" id="key_item_tag{{$index}}" data-placeholder="Select an option" data-allow-clear="true" multiple>
                                            @foreach ($key_items as $key => $tag)

                                            <option value="{{$tag['id']}}" {{isset($detail) && in_array($tag['id'],(array)json_decode($detail->key_item_tag))?'selected':'' }}>{{ $tag['name_en'] }}</option>
                                                @endforeach
                                        </select>
                                        @endif


                                    </div>
                                    {{-- <div class="form-group mb-5{{ $errors->has('key_item_tag_') ? 'has-error' : ''}}">
                                        <label for="">Key Item tags </label>
                                        <input type="hidden" data-id="{{$index}}" class="indices" name="indices[]" value="{{$index}}" id="indices">

                                        @php
                                            $months="filter_tag_";
                                            $content="content_";
                                        @endphp
                                        <select  name="key_item_tag{{$index}}[]" class="form-select key_item_tag{{$index}} form-select-lg form-select-tag" data-index="{{$index}}" aria-label="Default select example" name="key_item_tag[]" id="key_item_tag{{$index}}" data-placeholder="Select an option" data-allow-clear="true" multiple>
                                            @foreach ($keyItemTags as $key => $tag)
                                            <option value="{{$tag['id']}}" {{isset($detail) && in_array($tag['id'],(array)json_decode($detail->key_item_tag))?'selected':'' }}>{{ $tag['name_en'] }}</option>
                                                @endforeach
                                        </select>

                                    </div> --}}

                                    {{-- <div class="form-group mb-5{{ $errors->has('vaccine_factory_tag_') ? 'has-error' : ''}}">
                                        <label for="">Vaccine factory tags </label>

                                        <select  name="vaccine_factory_tag{{$index}}[]" class="form-select vaccine_factory_tag{{$index}} form-select-lg form-select-tag" data-index="{{$index}}" aria-label="Default select example" name="vaccine_factory_tag[]" id="vaccine_factory_tag{{$index}}" data-placeholder="Select an option" data-allow-clear="true" multiple>
                                            @foreach ($vaccineFactoryTags as $key => $tag)

                                            <option  value="{{$tag['id']}}" {{isset($detail) && in_array($tag['id'],(array)json_decode($detail->vaccine_factory_tag))?'selected':'' }}>{{ $tag['name_en'] }}</option>
                                                @endforeach
                                        </select>

                                    </div> --}}
                                    <div class="form-group mb-5{{ $errors->has('highlight_tag_') ? 'has-error' : ''}}">
                                        <label for="">highlight tags </label>
                                        @php
                                            $months="filter_tag_";
                                            $content="content_";
                                        @endphp
                                        <select  name="highlight_tag{{$index}}[]" class="form-select highlight_tag{{$index}} form-select-lg form-select-tag" data-index="{{$index}}" aria-label="Default select example" name="highlight_tag[]" id="highlight_tag{{$index}}" data-placeholder="Select an option" data-allow-clear="true" multiple>
                                                @foreach ($highlightTags as $key => $tag)
                                                <option value="{{$tag['id']}}" {{isset($detail) && in_array($tag['id'],(array)json_decode($detail->highlight_tag))?'selected':'' }}>{{ $tag['name_en'] }}</option>
                                                    @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group mb-5{{ $errors->has('sub_category') ? 'has-error' : ''}}">
                                        <label for="">Sub categories</label>
                                        @php
                                            $months="filter_tag_";
                                            $content="content_";
                                        @endphp
                                        <select  name="sub_category{{$index}}[]" class="form-select sub_category{{$index}} form-select-lg form-select-tag" data-index="{{$index}}" aria-label="Default select example" name="sub_category[]" id="sub_category{{$index}}" data-placeholder="Select an option" data-allow-clear="true" multiple>
                                                @foreach ($sub_categories as $key => $tag)
                                                <option value="{{$tag['id']}}" {{isset($detail) && in_array($tag['id'],(array)json_decode($detail->sub_category))?'selected':'' }}>{{ $tag['name_en'] }}</option>
                                                    @endforeach
                                        </select>

                                    </div>
                                    {{-- <div class="form-group mb-5{{ $errors->has('recommend_tag_') ? 'has-error' : ''}}">
                                        <label for="">Recommend tags </label>

                                        <select  name="recommend_tag{{$index}}[]" class="form-select recommend_tag{{$index}} form-select-lg form-select-tag" data-index="{{$index}}" aria-label="Default select example" name="recommend_tag[]" id="recommend_tag{{$index}}" data-placeholder="Select an option" data-allow-clear="true" multiple>
                                            @foreach ($recommendTags as $key => $tag)
                                            <option value="{{$tag['id']}}" {{isset($detail) && in_array($tag['id'],(array)json_decode($detail->recommend_tag))?'selected':'' }}>{{ $tag['name_en'] }}</option>
                                                @endforeach
                                        </select>

                                    </div> --}}

                                    </div>

                                    <div class="form-group mb-5">
                                        <label for="">Content en </label>
                                        <textarea name="content_en[]" id="content{{$index}}" class="form-control editor"  cols="40" rows="5" >{{isset($detail)?$detail->content_en:''}}</textarea>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="">Content tc </label>
                                        <textarea name="content_tc[]" id="content{{$index}}" class="form-control editor"  cols="40" rows="5" >{{isset($detail)?$detail->content_tc:''}}</textarea>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="">Content sc</label>
                                        <textarea name="content_sc[]" id="content{{$index}}" class="form-control editor"  cols="40" rows="5" >{{isset($detail)?$detail->content_sc:''}}</textarea>
                                    </div>

                                    <div class=" form-group mb-5{{ $errors->has('url') ? 'has-error' : ''}}">
                                        <label for="">URL</label>
                                        <input type="text" class="form-control" id="name{{$index}}" name="url{{ $index }}" value="{{isset($detail)?$detail->url:''}}">
                                    </div>
                                </div>
                                @if($index !== 0)
                                <button id="removeNewCheckingItemBtn" type="button" class="removeNewCheckingItemBtn{{$index}} btn btn-danger btn-sm d-flex justify-content-center align-items-center" style="width:30px;height:30px">-</button>
                                @endif
                            {{-- </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

