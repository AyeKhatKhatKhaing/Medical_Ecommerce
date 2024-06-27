<div class="card mt-4 rows faq inputVariationsRow{{$index}}" data-index="{{$index}}">
    <div class="card-body bg-light-success">
        <div class="d-flex p-3 justify-content-between mt-2 align-items-start gap-3 " id="month-row">
            <input type="hidden" name="attr" value="{{ $attr }}" >
            <div class="rounded p-3 w-100">
                <div class="">
                    @php
                        $question="faq_question_".$attr;
                        $answer="faq_answer_".$attr;
                    @endphp
                    <div class="form-group mb-5">
                        <label for="">Question {{$attr}}</label>
                        <input type="text" class="form-control" id="name{{$index}}_{{$attr}}" name="question_{{$attr}}[]" value="{{ isset($extFeature) && isset(json_decode($extFeature->$question)[$key]) ? json_decode($extFeature->$question)[$key] : ''}}">
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Answer {{$attr}}</label>
                        <textarea id="answer_{{$attr}}_{{$index}}" class="form-control editor" name="answer_{{$attr}}[]" cols="40" rows="5" >{{ isset($extFeature) && isset(json_decode($extFeature->$answer)[$key]) ? json_decode($extFeature->$answer)[$key]:''}}</textarea>
                    </div>
                </div>
            </div>
            @if($index !== 0)
            <button id="removeNewFaqBtn" type="button" class="removeNewFaqBtn{{$index}} btn btn-danger btn-sm d-flex justify-content-center align-items-center" style="width:30px;height:30px">-</button>
            @endif
        </div>
    </div>
</div>



