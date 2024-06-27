@if ($data->lastPage() > 1)
<div class="row mt-3">
    <div class="col-md-9">
        {{-- @if ($data->total() == $count)
         <h5> {{config('zh.total_number')}} : {{$count}} </h5>
        @else 
         <h5> {{config('zh.result_number')}}  :  {{$data->total()}}/{{$count}} </h5>
        @endif --}}
    </div>
    <div class="col-md-3 float-right">
        @php
            $currentPage = Request::get('page') ? Request::get('page') : 1;

            
        @endphp
        <div style="display: grid;grid-template-columns: 2fr 1fr 1fr 1fr;grid-gap:5px;">
            <form action="" method="get" id="pageForm">
                <input type="hidden" name="type" value="{{Request::get('type')}}">
                <input type="hidden" name="alphabet" value="{{Request::get('alphabet')}}">
                <input type="hidden" name="search" value="{{Request::get('search')}}">
                <input type="hidden" name="showing" value="{{Request::get('showing') ?? 10}}">
                @if(Request::segment(2) == "users" || Request::segment(2) == "children")
                <input type="hidden" name="gender" value="{{Request::get('gender')}}">
                <input type="hidden" name="age" value="{{Request::get('age') }}">
                @endif
                @if(Request::segment(2) == "users" || Request::segment(2) == "article")
                <input type="hidden" name="status" value="{{Request::get('status')}}">
                @endif
                @if(Request::segment(2) == "users")
                <input type="hidden" name="noofchildren" value="{{Request::get('noofchildren')}}">
                @endif
                @if(Request::segment(2) == "forum")
                <input type="hidden" name="status" value="{{Request::get('status')}}">
                <input type="hidden" name="age_classification" value="{{Request::get('age_classification')}}">
                @endif
                @if(Request::segment(2) == "event")
                <input type="hidden" name="status" value="{{Request::get('status')}}">
                <input type="hidden" name="category" value="{{Request::get('category')}}">
                @endif
                @if(Request::segment(2) == "pages")
                <input type="hidden" name="status" value="{{Request::get('status')}}">
                <input type="hidden" name="is_menu" value="{{Request::get('is_menu')}}">
                @endif
                @if(Request::segment(2) == "article")
                <input type="hidden" name="category" value="{{Request::get('category')}}">
                <input type="hidden" name="age_classification" value="{{Request::get('age_classification')}}">
                <input type="hidden" name="media_type" value="{{Request::get('media_type')}}">
                @endif
                @if(Request::segment(2) == "quiz-results" || Request::segment(2) == "questions-by-month-quiz")
                <input type="hidden" name="quiz_id" value="{{Request::get('quiz_id')}}">
                @endif
                @if(Request::segment(2) == "media-report")
                <input type="hidden" name="media_type" value="{{Request::get('media_type')}}">
                @endif

                <input type="number" min="1" max="{{$data->lastPage()}}" name="page" id="currentPage" value="{{$currentPage}}" class="form-control">
            </form>
            <span style="align-self:center">of <b>{{$data->lastPage()}}</b></span>
            <button class="btn btn-sm btn-primary" type="button" onclick="changePage({{$currentPage == 1 ? 0 : $currentPage-1}})"><i class="fas fa-chevron-left"></i></button>
            <button class="btn btn-sm btn-primary" type="button" onclick="changePage({{$currentPage == $data->lastPage() ? 0 : $currentPage+1 }})"><i class="fas fa-chevron-right"></i></button>
        </div>
     </div>
    </div>
@endif