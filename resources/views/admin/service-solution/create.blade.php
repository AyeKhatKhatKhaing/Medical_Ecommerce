@extends('admin.layouts.master')
@section('title', 'Create Service Solution')
@section('breadcrumb', 'Service Solution')
@section('breadcrumb-info', 'Create Service Solution')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                <form method="POST" action="{{ url('/admin/service-solution') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.service-solution.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        $(document).on('change','#auto_translate',function() {

let val = $(this).prop('checked') ? '1' : '0';
let simplified_main_title=$('#main_title_sc');
let simplified_main_sub_title=$('#main_sub_title_sc');
let simplified_title=$('#title_sc');
let simplified_sub_title=$('#sub_title_sc');
let simplified_desctiption=$('#desctiption_sc');

if (val==1){
    let main_title = $('#main_title_tc').val();
    let description = tinymce.get("description_tc").getContent({format : 'text'});
    let main_sub_title = $('#main_sub_title_tc').val();
    let title = $('#title_tc').val();
    let sub_title = $('#sub_title_tc').val();
    $.ajax({
        url: "{{ url('/admin/service-solution-auto-translate') }}",
        data: {'val': val, 'main_title': main_title, 'description': description,'main_sub_title': main_sub_title,'title': title,'sub_title': sub_title},
        type: 'get',
        success: function (response) {
            response['main_title']!==''?simplified_main_title.val(response['main_title']):alert('Main Title field must be less than 5000 characters')
            response['main_sub_title']!==''?simplified_main_sub_title.val(response['main_sub_title']):alert('Main Sub Title field must be less than 5000 characters')
            response['title']!==''?simplified_title.val(response['title']):alert('Title field must be less than 5000 characters')
            response['sub_title']!==''?simplified_sub_title.val(response['sub_title']):alert('Sub Title field must be less than 5000 characters')
            response['description']!==''?tinymce.get("description_sc").setContent(response['description']):alert('Description field must be less than 5000 characters')
        }
    });
}
else {
    simplified_main_title.val('')
    simplified_main_sub_title.val('')
    simplified_title.val('')
    simplified_sub_title.val('')
    tinymce.get("description_sc").setContent('')
}

});
    </script>
@endpush


