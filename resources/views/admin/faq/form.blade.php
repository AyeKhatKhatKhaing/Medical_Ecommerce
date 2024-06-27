<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Edit Faq
                @else
                    Add New Faq
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/faq') }}" title="Back"><button type="button"
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
                                <div class="form-group mb-5{{ $errors->has('name_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('name_' . $attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::text(
                                        'name_' . $attr,
                                        null,
                                        'required' == 'required' ? ['class' => 'form-control limit'] : ['class' => 'form-control limit'],
                                    ) !!}
                                    {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('content_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('content_' . $attr, 'Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                    {!! Form::textarea(
                                        'content_' . $attr,
                                        null,
                                        'required' == 'required' ? ['class' => 'form-control limit editor'] : ['class' => 'form-control limit editor'],
                                    ) !!}
                                    {!! $errors->first('content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                @if ($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox"
                                            {{ isset($faq->is_translate) && $faq->is_translate == 1 ? 'checked' : '' }}
                                            name="is_translate" id="auto_translate" value="1">
                                        <label class="form-check-label ms-2" for="auto_translate">
                                            Auto translate to chinese
                                        </label>

                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h2>Faq Category</h2>
                </div>
            </div>
            <div class="card-body pt-5">
                {{-- @if (count($categories) > 0)
                    @foreach ($categories as $item)
                        <div class="form-check mb-5">
                            <input class="form-check-input form-check-input page-radio category_id" type="radio"
                                name="category_id" value="{{ $item->id }}" id="category_id{{ $item->id }}" onclick="category([])"
                                {{ isset($faq) && $faq->category_id == $item->id ? 'checked' : '' }}>
                            <label class="form-check-label" for="category_id{{ $item->id }}">
                                {{ $item->name_en }}
                            </label>
                        </div>
                        @if (count($item->subCategory) > 0)
                            @foreach ($item->subCategory as $sub_item)
                                <div class="form-check mb-3 {{ $loop->last == true ? 'mb-5' : '' }}"
                                    style="margin-left: 18px;">
                                    <input class="form-check-input form-check-input page-radio sub_category_id"
                                        type="radio" name="sub_category_id" value="{{ $sub_item->id }}"
                                        id="sub_category_id{{ $sub_item->id }}"
                                        {{ isset($faq) && $faq->sub_category_id == $sub_item->id ? 'checked' : '' }}
                                        disabled>
                                    <label class="form-check-label" for="sub_category_id{{ $sub_item->id }}">
                                        {{ $sub_item->sub_name_en }} 
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                @endif --}}
                @if (count($categories) > 0)
                    @foreach ($categories as $item)
                        <div class="form-check mb-5">
                            <input class="form-check-input category_id" type="radio" name="category_id"
                                value="{{ $item->id }}" id="category_id" onclick="category([])"
                                {{ isset($faq) && $faq->category_id == $item->id ? 'checked' : '' }}>
                            <label class="form-check-label" for="category_id{{ $item->id }}">
                                {{ $item->name_en }}
                            </label>
                        </div>
                        @if (count($item->subCategory) > 0)
                            @foreach ($item->subCategory as $sub_item)
                                <div class="form-check mb-3 {{ $loop->last == true ? 'mb-5' : '' }}"
                                    style="margin-left: 18px;">
                                    <input class="form-check-input sub_category_id" type="radio" required
                                        name="sub_category_id" value="{{ $sub_item->id }}"
                                        id="sub_category_id{{ $sub_item->id }}"
                                        {{ isset($faq) && $faq->sub_category_id == $sub_item->id ? 'checked' : '' }}
                                        disabled>
                                    <label class="form-check-label" for="sub_category_id{{ $sub_item->id }}">
                                        {{ $sub_item->sub_name_en }}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                @endif
            </div>
            {{-- <div class="card-body pt-5">
                @if ($formMode === 'edit')
                <div class="overflow">
                    <div class="overflow-hidden">
                        @foreach ($faqcategory as $category)
                            <div class="form-check mb-5"><input type="radio" name="category_id" class="form-check-input page-radio"
                                style="margin-top: 0;"
                                    {{ $category->id == $faq->category_id ? 'checked' : '' }} value="{{ $category['id'] }}"/>
                                {{ $category->name_en }}</div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="overflow">
                    <div class="overflow-hidden">
                        @foreach ($faqcategory as $category)
                            <div class="form-check mb-5"><input type="radio" name="category_id" class="form-check-input page-radio"
                                style="margin-top: 0;"
                                    value="{{ $category->id }}" /> {{ $category->name_en }}</div>
                        @endforeach
                    </div>
                    {!! $errors->first('category_id', '<p class="help-block text-danger">:message</p>') !!}
                </div>
                @endif
            </div> --}}
        </div>
        {{-- <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">IS PUBLISHED?</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published"
                            @if (isset($faq) && $faq->is_published == '1') checked @elseif (!isset($faq)) checked @endif
                            value="{{ isset($faq) ? $faq->is_published : 1 }}">
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="is_published" style="font-size: 13px;">IS PUBLISHED?</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published"
                            @if (isset($faq) && $faq->is_published == '1') checked @elseif (!isset($faq)) checked @endif
                            value="4">
                    </div>
                </div>
            </div>
        </div>
        


        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">IS POPULAR?</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_popular" id="is_popular"
                            @if (isset($faq) && $faq->is_popular == '1') checked @elseif (!isset($faq)) checked @endif
                            value="{{ isset($faq) ? $faq->is_popular : 0 }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">IS POPULAR?</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_popular" id="is_popular"
                            @if (isset($faq) && $faq->is_popular == '1') checked @elseif (!isset($faq)) checked @endif
                            value="{{ isset($faq) ? $faq->is_popular : 1 }}">
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('order_by', 'Order By', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('order_by') ? 'has-error' : '' }}">
                    {!! Form::number(
                        'order_by',
                        null,
                        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                    ) !!}
                    {!! $errors->first('order_by', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
