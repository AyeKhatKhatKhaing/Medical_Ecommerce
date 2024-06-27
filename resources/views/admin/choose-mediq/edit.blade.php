@extends('admin.layouts.master')
@section('title', 'Edit ChooseMediq')
@section('breadcrumb', 'ChooseMediq')
@section('breadcrumb-info', 'Edit ChooseMediq')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::model($choosemediq, [
                    'method' => 'POST',
                    'url' => ['/admin/choose-mediq'],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.choose-mediq.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        $(document).on('change','#auto_translate',function() {

        let val = $(this).prop('checked') ? '1' : '0';
        let simplified_main_title    =$('#main_title_sc');
        let simplified_shopping_guide_title=$('#shopping_guide_title_sc');
        let simplified_quick_start_guide_title=$('#quick_start_guide_title_sc');
        let simplified_booking_title=$('#booking_title_sc');

        if (val==1){

            let main_title=$('#main_title_tc').val();
            let main_content=tinymce.get("main_content_tc").getContent({format : 'text'});
            let shopping_guide_title=$('#shopping_guide_title_tc').val();
            let quick_start_guide_title=$('#quick_start_guide_title_tc').val();
            let quick_start_guide_content=tinymce.get("quick_start_guide_content_tc").getContent({format : 'text'});
            let booking_title=$('#booking_title_tc').val();
            let booking_content=tinymce.get("booking_content_tc").getContent({format : 'text'});

            $.ajax({
                url: "{{ url('/admin/choose-mediq-translate') }}",
                data: {'val': val, 'main_title':main_title , 'main_content':main_content, 'shopping_guide_title':shopping_guide_title, 'quick_start_guide_title':quick_start_guide_title, 'quick_start_guide_content':quick_start_guide_content,'booking_title':booking_title,'booking_content': booking_content},
                type: 'get',
                success: function (response) {
                    console.log(response)
                    response['main_title']!==''?simplified_main_title.val(response['main_title']):alert('Main Title field must be less than 5000 characters')
                    response['main_content']!==''?tinymce.get("main_content_sc").setContent(response['main_content']):alert('Main Content field must be less than 5000 characters')
                    response['shopping_guide_title']!==''?simplified_shopping_guide_title.val(response['shopping_guide_title']):alert('Shopping Guide Title field must be less than 5000 characters')
                    response['quick_start_guide_title']!==''?simplified_quick_start_guide_title.val(response['quick_start_guide_title']):alert('Quick Start Guide Title field must be less than 5000 characters')
                    response['quick_start_guide_content']!==''?tinymce.get("quick_start_guide_content_sc").setContent(response['quick_start_guide_content']):alert('Quick Start Guide Content field must be less than 5000 characters')
                    response['booking_title']!==''?simplified_booking_title.val(response['booking_title']):alert('Booking Title field must be less than 5000 characters')
                    response['booking_content']!==''?tinymce.get("booking_content_sc").setContent(response['booking_content']):alert('Booking Content field must be less than 5000 characters')
                }
            });
        }
        else {
            simplified_main_title.val('');
            simplified_shopping_guide_title.val('');
            simplified_quick_start_guide_title.val('');
            simplified_booking_title.val('');
            tinymce.get("main_content_sc").setContent('')
            tinymce.get("quick_start_guide_content_sc").setContent('')
            tinymce.get("booking_content_sc").setContent('')

        }

        });
    </script>
@endpush
