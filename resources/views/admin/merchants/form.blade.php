<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Edit {{ Str::upper($user_type) }}
                @else
                    Add New {{ Str::upper($user_type) }}
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ route('users.list', $user_type) }}" title="Back"><button type="button"
                            class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i>
                            Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="card mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between nopadding">
            <label for="" style="font-size: 13px;">IS PUBLISHED?</label>
            <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_published" id="is_published" @if(isset($user)) @if($user->is_published == '1')checked @endif @else checked @endif>
            </div>
        </div>
    </div>
</div> --}}
<input type="hidden" name="roles[]" value="merchant">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="card-body content-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mt-4{{ $errors->has('name_en') ? ' has-error' : '' }}">
                                <div class="list-title mb-3">
                                    {!! Form::label('name', 'Name (EN): ', ['class' => 'control-label required']) !!}
                                </div>
                                {!! Form::text('name_en', null, ['class' => 'form-control', 'tabindex' => 1]) !!}
                                {!! $errors->first('name_en', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>

                      

                        <div class="col-4">
                            <div class="form-group mt-4{{ $errors->has('name_tc') ? ' has-error' : '' }}">
                                <div class="list-title mb-3">
                                    {!! Form::label('name', 'Name (TC): ', ['class' => 'control-label required']) !!}
                                </div>
                                {!! Form::text('name_tc', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('name_tc', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group mt-4{{ $errors->has('name_sc') ? ' has-error' : '' }}">
                                <div class="list-title mb-3">
                                    {!! Form::label('name', 'Name (SC): ', ['class' => 'control-label required']) !!}
                                </div>
                                {!! Form::text('name_sc', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('name_sc', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-4{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="list-title mb-3">
                            {!! Form::label('email', 'Email: ', ['class' => 'control-label required']) !!}
                        </div>
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group mt-4{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <div class="list-title mb-3">
                            {!! Form::label('phone', 'Phone: ', ['class' => 'control-label']) !!}
                        </div>
                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group mt-4{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="list-title mb-3">
                            {!! Form::label('password', 'Password: ', ['class' => 'control-label']) !!}
                        </div>
                        @php
                            $passwordOptions = ['class' => 'form-control'];
                            if ($formMode === 'create') {
                                $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
                            }
                        @endphp
                        {!! Form::password('password', $passwordOptions) !!}
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    </div>
                    <input type="hidden" class="form-control" value="{{ $user_type }}" name="user_type">
                    <input type="hidden" class="form-control" name="is_merchant">

                    <!-- <div class="form-group mt-4{{ $errors->has('roles') ? ' has-error' : '' }}">
                        {!! Form::label('role', 'Role :', ['class' => 'control-label mb-3']) !!}<br>
                        {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control']) !!}
                    </div> -->
                </div>
            </div>
        </div>
        <div class="card mt-4">
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
                                    class="form-group mb-5{{ $errors->has('introduction_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('introduction_' . $attr, 'Introduction' . ' (' . $lngcode . ')', [
                                        'class' => 'form-label',
                                    ]) !!}
                                    {!! Form::text(
                                        'introduction_' . $attr,
                                        null,
                                        'required' == '' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                    ) !!}
                                    {!! $errors->first('introduction_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <!-- <div class="form-group mb-5{{ $errors->has('mrt_station_name_' . $attr) ? 'has-error' : '' }}">
                                {!! Form::label('mrt_station_name_' . $attr, 'Mrt Station Name' . ' (' . $lngcode . ')', [
                                    'class' => 'form-label required',
                                ]) !!}
                                {!! Form::text(
                                    'mrt_station_name_' . $attr,
                                    null,
                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                ) !!}
                                {!! $errors->first('mrt_station_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('mrt_station_exit_' . $attr) ? 'has-error' : '' }}">
                                {!! Form::label('mrt_station_exit_' . $attr, 'Mrt Station Exit' . ' (' . $lngcode . ')', [
                                    'class' => 'form-label required',
                                ]) !!}
                                {!! Form::text(
                                    'mrt_station_exit_' . $attr,
                                    null,
                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                ) !!}
                                {!! $errors->first('mrt_station_exit_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div> -->
                                <div
                                    class="form-group mb-5{{ $errors->has('announcement_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('announcement_' . $attr, 'Announcement' . ' (' . $lngcode . ')', [
                                        'class' => 'form-label',
                                    ]) !!}
                                    {!! Form::text(
                                        'announcement_' . $attr,
                                        null,
                                        'required' == '' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                    ) !!}
                                    {!! $errors->first('announcement_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <!-- <div class="form-group mb-5{{ $errors->has('address_' . $attr) ? 'has-error' : '' }}">
                                {!! Form::label('address_' . $attr, 'Address' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                {!! Form::text(
                                    'address_' . $attr,
                                    null,
                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                ) !!}
                                {!! $errors->first('address_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div> -->
                                  <!-- start:plan_description -->
                                  <div class="mb-3 row-1">
                                    {{-- <div class="row mt-4">
                                        <div class="col-md-8">
                                            {!! Form::label('plan_description_' . $attr, 'Plan Description' . ' (' . $lngcode . ')', [
                                                'class' => 'form-label required',
                                            ]) !!}
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <button data-attr="{{ $attr }}"
                                                data-lngcode="{{ $lngcode }}" type="button"
                                                class="addNewPlanDescription btn btn-success"
                                                style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+</button>
                                        </div>
                                    </div> --}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_2">

                                            <button class="accordion-button fs-4 fw-bold collapsed " type="button"
                                                data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2"
                                                aria-expanded="false" aria-controls="kt_accordion_1_body_2">
                                                {!! Form::label('plan_description_' . $attr, 'Plan Description' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label',
                                                ]) !!}
                                            </button>
                                        </h2>
                                        <div id="kt_accordion_1_body_2" class="accordion-collapse collapse show"
                                            aria-labelledby="kt_accordion_1_header_2"
                                            data-bs-parent="#kt_accordion_1">
                                            <div class="accordion-body">
                                                <div class="col-md-12 text-end" style="margin-left:-5%">
                                                    <button data-attr="{{ $attr }}"
                                                        data-lngcode="{{ $lngcode }}" type="button"
                                                        class="addNewPlanDescription btn btn-success mb-4"
                                                        style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+</button>
                                                </div>
                                                @if (isset($plan_description) && count($plan_description) > 0)
                                                    @foreach ($plan_description as $key => $plan)
                                                        @php
                                                            $key++;
                                                            $content = 'content_' . $attr;
                                                        @endphp
                                                        <div
                                                            class="card mt-4 border new-plan-description-input{{ $key }}">
                                                            <div class="card-body" style="background-color: #f5f8fa;">
                                                                <div class="row">
                                                                    <div class="col-md-12 text-end">
                                                                        <button data-attr="{{ $attr }}"
                                                                            type="button"
                                                                            class="removePlanDescription{{ $key }} btn btn-danger"
                                                                            style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group mt-4 mb-5{{ $errors->has('plan_description_name_' . $attr) ? 'has-error' : '' }}">
                                                                    {!! Form::label('plan_description_name_' . $attr, 'Name' . ' (' . $lngcode . ')', [
                                                                        'class' => 'form-label',
                                                                    ]) !!}
                                                                    @if ($attr == 'en')
                                                                        {!! Form::text(
                                                                            'plan_description_name_en[]',
                                                                            $plan->name_en,
                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                        ) !!}
                                                                        <input type="text"
                                                                            name="plan_description_ids_en[]"
                                                                            value="{{ $plan->id }}" hidden>
                                                                    @elseif($attr == 'sc')
                                                                        {!! Form::text(
                                                                            'plan_description_name_sc[]',
                                                                            $plan->name_sc,
                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                        ) !!}
                                                                    @elseif($attr == 'tc')
                                                                        {!! Form::text(
                                                                            'plan_description_name_tc[]',
                                                                            $plan->name_tc,
                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                        ) !!}
                                                                    @endif
                                                                    {!! $errors->first('plan_description_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                </div>
                                                                <div
                                                                    class="form-group mt-4 mb-5{{ $errors->has('plan_description_' . $attr) ? 'has-error' : '' }}">
                                                                    {!! Form::label('plan_description_' . $attr, 'Description' . ' (' . $lngcode . ')', [
                                                                        'class' => 'form-label',
                                                                    ]) !!}
                                                                    @if ($attr == 'en')
                                                                        {!! Form::textarea(
                                                                            'plan_description_en[]',
                                                                            $plan->content_en,
                                                                            'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                        ) !!}
                                                                    @elseif($attr == 'sc')
                                                                        {!! Form::textarea(
                                                                            'plan_description_sc[]',
                                                                            $plan->content_sc,
                                                                            'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                        ) !!}
                                                                    @elseif($attr == 'tc')
                                                                        {!! Form::textarea(
                                                                            'plan_description_tc[]',
                                                                            $plan->content_tc,
                                                                            'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                        ) !!}
                                                                    @endif
                                                                    {{-- <textarea name="plan_description_{{ $attr }}[]" class="form-control editor" id="plan_description_{{ $attr }}{{ $key }}" cols="30" rows="10">{{ isset($plan) ? $plan->content : '' }}</textarea> --}}
                                                                    {{-- {!! Form::textarea('plan_description_'.$attr.'[]', $plan->content_.$attr, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!} --}}
                                                                    {!! $errors->first('plan_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('plan_description_name_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('plan_description_name_' . $attr, 'Name' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::text(
                                                            'plan_description_name_' . $attr . '[]',
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                        ) !!}
                                                        {!! $errors->first('plan_description_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                    <div
                                                        class="form-group new-plan-process-input mt-4 mb-5{{ $errors->has('plan_description_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('plam_description_' . $attr, 'Description' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::textarea(
                                                            'plan_description_' . $attr . '[]',
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                        ) !!}
                                                        {!! $errors->first('plan_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                @endif

                                                <div id="{{ $attr }}_get-new-plan-description"></div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- end:plan_description -->

                                <div class="mb-5">
                                    <div class="">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                                <div class="">
                                                    <button class="accordion-button fs-4 fw-bold" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#kt_accordion_1_body_1" aria-expanded="true"
                                                        aria-controls="kt_accordion_1_body_1">
                                                        <div class="col-md-8">
                                                            {!! Form::label('plan_process_' . $attr, 'Plan Process' . ' (' . $lngcode . ')', [
                                                                'class' => 'form-label',
                                                            ]) !!}

                                                        </div>

                                                    </button>
                                                </div>

                                            </h2>
                                            <div id="kt_accordion_1_body_1" class="accordion-collapse collapse"
                                                aria-labelledby="kt_accordion_1_header_1"
                                                data-bs-parent="#kt_accordion_1">
                                                <div class="accordion-body">
                                                    <div class="col-md-12 text-end" style="margin-left:-4%">
                                                        <button data-attr="{{ $attr }}"
                                                            data-lngcode="{{ $lngcode }}" type="button"
                                                            class="addNewPlanProcess btn btn-success mb-3"
                                                            style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+
                                                        </button>
                                                    </div>
                                                    @if (isset($plan_processes) && count($plan_processes) > 0)
                                                        @foreach ($plan_processes as $key => $plan)
                                                            @php
                                                                $key++;
                                                                $content = 'content_' . $attr;
                                                            @endphp
                                                            <div
                                                                class="card mt-4 border new-plan-process-input{{ $key }}">
                                                                <div class="card-body"
                                                                    style="background-color: #f5f8fa;">
                                                                    <div class="row">

                                                                        <div class="col-md-12 text-end">
                                                                            <button data-attr="{{ $attr }}"
                                                                                type="button"
                                                                                class="removePlanProcess{{ $key }} btn btn-danger"
                                                                                style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="form-group mt-4 mb-5{{ $errors->has('plan_process_name_' . $attr) ? 'has-error' : '' }}">
                                                                        {!! Form::label('plan_process_name_' . $attr, 'Name' . ' (' . $lngcode . ')', [
                                                                            'class' => 'form-label',
                                                                        ]) !!}
                                                                        @if ($attr == 'en')
                                                                            {!! Form::text(
                                                                                'plan_process_name_en[]',
                                                                                $plan->name_en,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                             <input type="text"
                                                                             name="plan_process_ids_en[]"
                                                                             value="{{ $plan->id }}" hidden>
                                                                        @elseif($attr == 'sc')
                                                                            {!! Form::text(
                                                                                'plan_process_name_sc[]',
                                                                                $plan->name_sc,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @elseif($attr == 'tc')
                                                                            {!! Form::text(
                                                                                'plan_process_name_tc[]',
                                                                                $plan->name_tc,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @endif
                                                                        {!! $errors->first('plan_process_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                    </div>
                                                                    <div
                                                                        class="form-group mt-4 mb-5{{ $errors->has('plan_process_' . $attr) ? 'has-error' : '' }}">
                                                                        {!! Form::label('plan_process_description_' . $attr, 'Description' . ' (' . $lngcode . ')', [
                                                                            'class' => 'form-label',
                                                                        ]) !!}
                                                                        @if ($attr == 'en')
                                                                            {!! Form::textarea(
                                                                                'plan_process_en[]',
                                                                                $plan->content_en,
                                                                                'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                            ) !!}
                                                                        @elseif($attr == 'sc')
                                                                            {!! Form::textarea(
                                                                                'plan_process_sc[]',
                                                                                $plan->content_sc,
                                                                                'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                            ) !!}
                                                                        @elseif($attr == 'tc')
                                                                            {!! Form::textarea(
                                                                                'plan_process_tc[]',
                                                                                $plan->content_tc,
                                                                                'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                            ) !!}
                                                                        @endif
                                                                       
                                                                        {{-- <textarea name="plan_process_{{ $attr }}[]" class="form-control editor" id="plan_process_{{ $attr }}{{ $key }}" cols="30" rows="10">{{ isset($plan) ? $plan->content : '' }}</textarea> --}}
                                                                        {{-- {!! Form::textarea('plan_process_'.$attr.'[]', $plan->content_.$attr, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!} --}}
                                                                        {!! $errors->first('plan_process_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div
                                                            class="form-group mb-5{{ $errors->has('plan_process_name_' . $attr) ? 'has-error' : '' }}">
                                                            {!! Form::label('plan_process_name_' . $attr, 'Name' . ' (' . $lngcode . ')', [
                                                                'class' => 'form-label',
                                                            ]) !!}
                                                            {!! Form::text(
                                                                'plan_process_name_' . $attr . '[]',
                                                                null,
                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                            ) !!}
                                                            {!! $errors->first('plan_process_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                        </div>
                                                        <div
                                                            class="form-group new-plan-process-input mt-4 mb-5{{ $errors->has('plan_process_' . $attr) ? 'has-error' : '' }}">
                                                            {!! Form::label('description' . $attr, 'Description' . ' (' . $lngcode . ')', [
                                                                'class' => 'form-label',
                                                            ]) !!}
                                                            {!! Form::textarea(
                                                                'plan_process_' . $attr . '[]',
                                                                null,
                                                                'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                            ) !!}
                                                            {!! $errors->first('plan_process_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                        </div>
                                                    @endif
                                                    <div id="{{ $attr }}_get-new-plan-process"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- <div class="col-md-8">
                                    {!! Form::label('plan_process_'.$attr, 'Plan Process' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                </div>
                                <div class="col-md-4 text-end">
                                    <button data-attr="{{ $attr }}" data-lngcode="{{ $lngcode }}" type="button" class="addNewPlanProcess btn btn-success" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+</button>
                                </div> --}}
                                </div>

                              
                            </div>
                        @endforeach
                        <input type="hidden" name="plan_process_row">
                        <input type="hidden" name="plan_description_row">

                        <!-- <div class="form-group mt-4{{ $errors->has('latitude') ? ' has-error' : '' }}">
                            <div class="list-title mb-3">
                                {!! Form::label('latitude', 'Latitude: ', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('latitude', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mt-4{{ $errors->has('longitude') ? ' has-error' : '' }}">
                            <div class="list-title mb-3">
                                {!! Form::label('longitude', 'Longitude: ', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('longitude', null, ['class' => 'form-control ']) !!}
                            {!! $errors->first('longitude', '<p class="help-block">:message</p>') !!}
                        </div> -->
                        <!-- <div class="form-group mt-4{{ $errors->has('opening_hour') ? ' has-error' : '' }}">
                            <div class="list-title mb-3">
                                {!! Form::label('opening_hour', 'Opning Hour: ', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('opening_hour', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('opening_hour', '<p class="help-block">:message</p>') !!}
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <!-- start:Banner_Image -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Banner Image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-img">
                            @if (!empty($user->banner_img))
                                <div class='lfmimage-container imglfmc0 mb-5'>
                                    <img src="{{ asset($user->banner_img) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('img',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-5">
                            <span class="input-group-btn">
                                <a data-input="img" data-preview="holder-img"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="img" class="form-control" type="text" name="banner_img"
                                value="{{ isset($user) ? $user->banner_img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:Banner_Image -->

        <!-- start:Icon -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Icon</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-i-img">
                            @if (!empty($user->icon))
                                <div class='lfmimage-container icon-imglfmc0 mb-5'>
                                    <img src="{{ asset($user->icon) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('icon-img',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-5">
                            <span class="input-group-btn">
                                <a data-input="icon-img" data-preview="holder-i-img"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="icon-img" class="form-control" type="text" name="icon"
                                value="{{ isset($user) ? $user->icon : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:Icon -->

        <!-- start:common-area | holder4-->
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Common Area</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <ul class="dragGroup" id="holder4">
                            @if (isset($productsImages->common_area))
                                @foreach ($productsImages->common_area as $key => $img)
                                    <li class="draggable w-100 draggableItem0 thumbnail4lfmc0" draggable="true">
                                        <input type="hidden" name="holder4[]'" value="{{ $img }}"
                                            id="galleryImage0">
                                        <img src="{{ $img }}" class="lfmimage w-100">
                                        <div>
                                            <button type="button" onclick="removeGImage(this)"
                                                class="btn btn-sm btn-danger w-100"
                                                style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                    class="img-thumbnail feature-img">
                            @endif
                        </ul>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-pro" data-input="thumbnail4" data-ptype="g" data-preview="holder4"
                                    class="lfm-pro lfm-img btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail4" class="form-control" type="text" name="commom_area[]"
                                multiple="" readonly="">
                        </div>
                    </div>
                    <span class="">Can upload multiple image</span>
                </div>
            </div>
        </div>
        <!-- end:common-area -->

        <!-- start:service-facilities | holder5 -->
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Services Facilities</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group{{ $errors->has('services_facilities') ? 'has-error' : '' }}">
                        <ul class="dragGroup" id="holder5">
                            @if (isset($productsImages->services_facilities))
                                @foreach ($productsImages->services_facilities as $key => $img)
                                    <li class="draggable w-100 draggableItem0 thumbnail4lfmc0" draggable="true">
                                        <input type="hidden" name="holder5[]'" value="{{ $img }}"
                                            id="galleryImage0">
                                        <img src="{{ $img }}" class="lfmimage w-100">
                                        <div>
                                            <button type="button" onclick="removeGImage(this)"
                                                class="btn btn-sm btn-danger w-100"
                                                style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                    class="img-thumbnail feature-img">
                            @endif
                        </ul>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-pro" data-input="thumbnail5" data-preview="holder5" data-ptype="g"
                                    class="lfm-pro lfm-img btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail5" class="form-control" type="text" name="services_facilities[]"
                                multiple>
                        </div>
                        {!! $errors->first('services_facilities', '<p class="help-block">:message</p>') !!}
                    </div>
                    <span>Can upload multiple image</span>
                </div>
            </div>
        </div>
        <!-- end:service-facilities -->

        <!-- start:other | holder6 -->
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Other</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group{{ $errors->has('other') ? 'has-error' : '' }}">
                        <ul class="dragGroup" id="holder6">
                            @if (isset($productsImages->other))
                                @foreach ($productsImages->other as $key => $img)
                                    <li class="draggable w-100 draggableItem0 thumbnail4lfmc0" draggable="true">
                                        <input type="hidden" name="holder6[]'" value="{{ $img }}"
                                            id="galleryImage0">
                                        <img src="{{ $img }}" class="lfmimage w-100">
                                        <div>
                                            <button type="button" onclick="removeGImage(this)"
                                                class="btn btn-sm btn-danger w-100"
                                                style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                    class="img-thumbnail feature-img">
                            @endif
                        </ul>

                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-pro" data-input="thumbnail6" data-preview="holder6" data-ptype="g"
                                    class="lfm-pro lfm-img btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail6" class="form-control" type="text" name="other[]" multiple>
                        </div>
                        {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
                    </div>
                    <span>Can upload multiple image</span>
                </div>
            </div>
        </div>
        <!-- end:other -->

        <!-- start:video |holder7 -->
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Video</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group{{ $errors->has('video') ? 'has-error' : '' }}">
                        <ul class="dragGroup" id="holder7">
                            @if (isset($productsImages->video))
                                @foreach ($productsImages->video as $key => $img)
                                    <li class="draggable w-100 draggableItem0 thumbnail4lfmc0" draggable="true">
                                        <input type="hidden" name="holder7[]'" value="{{ $img }}"
                                            id="galleryImage0">
                                        <video src="{{ $img }}" class="lfmimage w-100">
                                        <div>
                                            <button type="button" onclick="removeGImage(this)"
                                                class="btn btn-sm btn-danger w-100"
                                                style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                    class="img-thumbnail feature-img">
                            @endif
                        </ul>

                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-pro" data-input="thumbnail7" data-preview="holder7" data-ptype="g"
                                    class="lfm-pro lfm-img btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail7" class="form-control" type="text" name="video[]" multiple>
                        </div>
                        {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
                    </div>
                    <span>Can upload multiple image</span>
                </div>
            </div>
        </div>
        <!-- end:video -->

        {{-- <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">IS PUBLISHED?</label>
                    <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" @if(isset($user)) @if($user->is_published == '1')checked @endif @else checked @endif>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <div class="col-12">
        <!-- start:Area -->
        <div class="card mt-4">
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title">Areas</h4>
                    <a class="btn btn-success" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;"
                        onclick="addArea()">+</a>
                </div>
                <div id="area-panel" class="card-body content-body">
                    @foreach ($merchant_locations as $key => $m_location)
                        <div class="border border-outlin-dashed p-4 mb-3 row-{{ $key }}">

                            <div class="row">
                                <div class="col-12 text-end">
                                    <button type="button" onclick="removeAreaPlan('{{ $key }}')"
                                        class="btn btn-sm btn-danger text-end">-</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="fw-bold fs-6 mb-5 {{ $errors->has('area_id') ? ' has-error' : '' }}">
                                        {!! Form::label('label', 'Select Area', ['class' => 'fw-bold fs-6 mb-2']) !!}
                                        <select class="form-select form-select-solid form-select-lg"
                                            data-control="select2" name="area_id[]"
                                            data-placeholder="Select an option">
                                            @foreach ($areas as $key => $area)
                                                @if (isset($m_location) && $m_location->area_id == $area->id)
                                                    <option value="{{ $area->id }}"
                                                        {{ $m_location->area_id == $area->id ? 'selected' : '' }}>
                                                        {{ $area->name_en }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="fv-row mb-7 {{ $errors->has('latitude') ? ' has-error' : '' }}">
                                        {!! Form::label('name', 'Latitude', ['class' => 'fw-bold fs-6 mb-2']) !!}
                                        {!! Form::text('latitude[]', isset($m_location) ? $m_location->latitude : '', [
                                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                                            'placeholder' => 'Latitude',
                                        ]) !!}
                                        {!! $errors->first('latitude', '<p class="invalid-feedback">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="fv-row mb-7 {{ $errors->has('longitude') ? ' has-error' : '' }}">
                                        {!! Form::label('name', 'Longitude', ['class' => 'fw-bold fs-6 mb-2']) !!}
                                        {!! Form::text('longitude[]', isset($m_location) ? $m_location->longitude : '', [
                                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                                            'placeholder' => 'Longitude',
                                        ]) !!}
                                        {!! $errors->first('longitude', '<p class="invalid-feedback">:message</p>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach (config('lng.attr') as $lngcode => $attr)
                                    @php
                                        $station_value = 'station_name_' . $attr;
                                    @endphp
                                    <div class="col-4">
                                        <div
                                            class="fv-row mb-7 {{ $errors->has('station_name_en') ? ' has-error' : '' }}">
                                            {!! Form::label('name', 'Station Name (' . $lngcode . ')', ['class' => 'fw-bold fs-6 mb-2']) !!}
                                            {!! Form::text('station_names[' . $attr . '][]', isset($m_location) ? $m_location->$station_value : '', [
                                                'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                                                'placeholder' => 'Station Name',
                                            ]) !!}
                                            {!! $errors->first('station_name_en', '<p class="invalid-feedback">:message</p>') !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row">
                                @foreach (config('lng.attr') as $lngcode => $attr)
                                    @php
                                        $address_value = 'full_address_' . $attr;
                                    @endphp
                                    <div class="col-4">
                                        <div
                                            class="fv-row mb-7 {{ $errors->has('full_address') ? ' has-error' : '' }}">
                                            {!! Form::label('name', 'Full Address (' . $lngcode . ')', ['class' => 'fw-bold fs-6 mb-2']) !!}
                                            {!! Form::text('full_addresses[' . $attr . '][]', isset($m_location) ? $m_location->$address_value : '', [
                                                'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                                                'placeholder' => 'Full Address',
                                            ]) !!}
                                            {!! $errors->first('full_address', '<p class="invalid-feedback">:message</p>') !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end:Area -->
        <!-- start:Faq -->
        <div class="card mt-4">
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title">FAQ</h4>
                    <a class="btn btn-success" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;"
                        onclick="addFAQ()">+</a>
                </div>
                <div id="faq-panel" class="card-body content-body">
                    @foreach ($merchant_faq as $key => $m_faq)
                        @php
                            // dd($m_faq);
                        @endphp
                        <input class="text hidden" placeholder="Question" name="faq_indexes[]" type="text"
                            value="">

                        <div class="border border-outlin-dashed p-4 mb-3 row-{{ $key }}">

                            <div class="row">
                                <div class="col-12 text-end">
                                    <button type="button" onclick="removeFaqPlan('{{ $key }}')"
                                        class="btn btn-sm btn-danger text-end">-</button>
                                </div>
                            </div>
                            <div class="row">
                                @foreach (config('lng.attr') as $lngcode => $attr)
                                    @php
                                        $question = 'question_' . $attr;
                                    @endphp
                                    <div class="col-4">
                                        <div
                                            class="fv-row mb-7 {{ $errors->has('question_en') ? ' has-error' : '' }}">
                                            {!! Form::label('Question', 'Question (' . $lngcode . ')', ['class' => 'fw-bold fs-6 mb-2']) !!}
                                            {!! Form::text('question_[' . $attr . '][]', isset($m_faq) ? $m_faq->$question : '', [
                                                'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                                                'placeholder' => 'Station Name',
                                            ]) !!}
                                            {!! $errors->first('question_en', '<p class="invalid-feedback">:message</p>') !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row">
                                @foreach (config('lng.attr') as $lngcode => $attr)
                                    @php
                                        $answer = 'answer_' . $attr;
                                    @endphp
                                    <div class="col-4">
                                        <div class="fv-row mb-7 {{ $errors->has('answer_en') ? ' has-error' : '' }}">
                                            {!! Form::label('Answer', 'Answer (' . $lngcode . ')', ['class' => 'fw-bold fs-6 mb-2']) !!}
                                            {!! Form::text(
                                                'answer_[' . $attr . '][]',
                                                isset($m_faq) ? $m_faq->$answer : '',
                                                'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                            ) !!}
                                            {!! $errors->first('answer_en', '<p class="invalid-feedback">:message</p>') !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end:faq -->
    </div>

</div>
@push('scripts')
    <script>
        var count = 0;
        let areas = <?= json_encode($areas) ?>;
        let selected_areas = <?= json_encode($merchant_locations) ?>;
        // filter selected areas
        if (selected_areas.length > 0) {
            selected_areas.forEach(selectArea => {
                areas = areas.filter(function(obj) {
                    return obj.id != selectArea.area_id;
                });
            })
        }



        function addArea() {
            let options = "";
            if (areas.length < 1) {
                alert('No more areas to add location!')
                return
            }
            areas.forEach((area, index) => {
                var selectoption = index == 0 ? 'selected' : '';
                options += `<option value="${area.id}" ${selectoption}>${area.name_en}</option>`;
            })
            count++;
            let element = `<div class="border border-outlin-dashed p-4 mb-3 row-${count}">
            <div class="row">
                <div class="col-12 text-end">
                    <button type="button" onclick="removeAreaPlan(${count})" class="btn btn-sm btn-danger text-end">-</button>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="fw-bold fs-6 mb-5 ">
                        <label for="label" class="required fw-bold fs-6 mb-2">Select Area</label>
                        <select class="form-select form-select-solid form-select-lg" data-control="select2" name="area_id[] data-placeholder="Select an option"">
                        ${options}
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Latitude</label>
                        <input class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Latitude" name="latitude[]" type="text" value="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Longitude</label>
                        <input class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Longitude" name="longitude[]" type="text" value="" id="longitude">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Station Name (EN)</label>
                        <input class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Station Name" name="station_names[en][]" type="text" value="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Station Name (TC)</label>
                        <input class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Station Name" name="station_names[tc][]" type="text" value="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Station Name (CN)</label>
                        <input class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Station Name" name="station_names[sc][]" type="text" value="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Full Address (EN)</label>
                        <input class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full Address" name="full_addresses[en][]" type="text" value="">

                    </div>
                </div>
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Full Address (TC)</label>
                        <input class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full Address" name="full_addresses[tc][]" type="text" value="">

                    </div>
                </div>
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Full Address (CN)</label>
                        <input class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full Address" name="full_addresses[sc][]" type="text" value="">
                    </div>
                </div>
             </div>

            </div>`;
            $('#area-panel').append(element)
        };

        function removeAreaPlan(count) {
            // console.log('Remove count ...', count)
            $(`#area-panel .row-${count}`).remove();
        }

        function addFAQ() {
            count++;
            let element = `<div class="border border-outlin-dashed p-4 mb-3 row-${count}">
            <div class="row">
                <div class="col-12 text-end">
                    <button type="button" onclick="removeFaqPlan(${count})" class="btn btn-sm btn-danger text-end">-</button>
                </div>
            </div>
            <div class="row">
                <input class="text hidden" placeholder="Question" name="faq_indexes[]" type="text" value="">
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Question (EN)</label>
                        <input class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Question" name="question_[en][]" type="text" value="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Question(TC)</label>
                        <input class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Question" name="question_[tc][]" type="text" value="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Question (CN)</label>
                        <input class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Question" name="question_[sc][]" type="text" value="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Answer(EN)</label>
                        <textarea  class="form-control  editor" placeholder="Answer" name="answer_[en][]" type="text" value="">
                        </textarea>
                    </div>
                </div>
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Answer(TC)</label>
                        <textarea  class="form-control  editor" placeholder="Answer" name="answer_[tc][]" type="text" value="">
                        </textarea>
                    </div>
                </div>
                <div class="col-4">
                    <div class="fv-row mb-7 ">
                        <label for="name" class="fw-bold fs-6 mb-2">Answer(CN)</label>
                        <textarea  class="form-control editor" placeholder="Answer" name="answer_[sc][]" type="text" value="">
                        </textarea>
                        </div>
                </div>
             </div>

            </div>`;
            $('#faq-panel').append(element);
            tinymce.init(editor_config)
        };

        function removeFaqPlan(count) {
            // console.log('Remove count ...', count)
            $(`#faq-panel .row-${count}`).remove();
        }


        $('#lfm-pro').filemanager('gallery');
        $('.lfm-img').filemanager('gallery');

        $(document).ready(() => {
            localStorage.removeItem('plan_process_row');
            $('.addNewPlanProcess').on('click', function() {
                var plan_process_row = localStorage.getItem('plan_process_row');

                plan_process_row++;

                $('input[name="plan_process_row"]').val(plan_process_row);

                localStorage.setItem('plan_process_row', plan_process_row);
                var attr = $(this).data('attr');
                var lngcode = $(this).data('lngcode');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.get-plan-process') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        plan_process_row: plan_process_row,
                        attr: attr,
                        lngcode: lngcode,
                    },
                    datatype: 'json',
                    success: function(json) {
                        console.log(json);
                        $('#en_get-new-plan-process').append(json[0]);
                        $('#tc_get-new-plan-process').append(json[1]);
                        $('#sc_get-new-plan-process').append(json[2]);
                        tinymce.init(editor_config)

                    }
                });
            })
        });

        var row = $('input[name="plan_process_row"]').val();
        for (let i = 1; i < 100; i++) {
            $(document).on('click', `.removePlanProcess${i}`, function() {
                $(`.new-plan-process-input${i}`).remove();
            });
        }
    </script>
    <script>
        $(document).ready(() => {
            localStorage.removeItem('plan_description_row');
            $('.addNewPlanDescription').on('click', function() {
                var plan_description_row = localStorage.getItem('plan_description_row');

                plan_description_row++;

                $('input[name="plan_description_row"]').val(plan_description_row);

                localStorage.setItem('plan_description_row', plan_description_row);
                var attr = $(this).data('attr');
                var lngcode = $(this).data('lngcode');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.get-plan-description') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        plan_description_row: plan_description_row,
                        attr: attr,
                        lngcode: lngcode,
                    },
                    datatype: 'json',
                    success: function(json) {
                        console.log(json);
                        $('#en_get-new-plan-description').append(json[0]);
                        $('#tc_get-new-plan-description').append(json[1]);
                        $('#sc_get-new-plan-description').append(json[2]);
                        tinymce.init(editor_config)

                    }
                });
            })
        });

        var row = $('input[name="plan_description_row"]').val();
        for (let i = 1; i < 100; i++) {
            $(document).on('click', `.removePlanDescription${i}`, function() {
                $(`.new-plan-description-input${i}`).remove();
            });
        }
    </script>
@endpush
