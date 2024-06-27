<div class="card mt-4 rows inputVariationsRow{{$index}}">
    <div class="card-body bg-light-success">
        <div class="d-flex p-3 justify-content-between mt-2 align-items-start gap-3 " id="month-row">
            <input type="hidden" name="attr" value="{{ $attr }}" >
            <div class="rounded p-3 w-100">
                <div class="">
                    <div class="row">
                        <div class="col-3 form-group mb-5{{ $errors->has('month_'.$attr) ? 'has-error' : ''}}">
                            <label for="">Month {{$attr}}</label>
                            @php
                                $months="month_".$attr;
                                $title="title_".$attr;
                                $description="description_".$attr;
                            @endphp
                            <select class="form-select month month{{$index}}" data-index="{{$index}}" aria-label="Default select example" name="month_{{$attr}}[]" id="month{{$index}}_{{$attr}}">
                                @if($attr=='en')
                                    @foreach(config('mediq.month_en') as $key => $month)
                                        <option value="{{$key}}" {{isset($detail)?$detail->month_en==$key?'selected':'':''}}>{{$month}}</option>
                                    @endforeach
                                @elseif($attr=='tc')
                                    @foreach(config('mediq.month_zh-hk') as $key => $month)
                                        <option value="{{$key}}" {{isset($detail)?$detail->month_en==$key?'selected':'':''}}>{{$month}}</option>
                                    @endforeach
                                @else
                                    @foreach(config('mediq.month_zh-cn') as $key => $month)
                                        <option value="{{$key}}" {{isset($detail)?$detail->month_en==$key?'selected':'':''}}>{{$month}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-9 form-group mb-5{{ $errors->has('title_'.$attr) ? 'has-error' : ''}}">
                            <label for="">Title {{$attr}}</label>
                            <input type="text" class="form-control" id="name{{$index}}_{{$attr}}" name="title_{{$attr}}[]" value="{{isset($detail)?$detail->$title:''}}">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Description {{$attr}}</label>
                        <textarea name="milestone_description{{$attr}}[]" id="content{{$index}}_{{$attr}}" class="form-control editor"  cols="40" rows="5" >{{isset($detail)?$detail->$description:''}}</textarea>
                    </div>
                </div>
            </div>
            @if($index !== 0)
            <button id="removeNewMonthBtn" type="button" class="removeNewMonthBtn{{$index}} btn btn-danger btn-sm d-flex justify-content-center align-items-center" style="width:30px;height:30px">-</button>
            @endif
        </div>
    </div>
</div>
