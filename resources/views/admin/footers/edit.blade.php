@extends('admin.layouts.master')
@section('title', 'Edit Footer')
@section('breadcrumb', 'Footer')
@section('breadcrumb-info', 'Edit Footer')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($footer, [
                    'method' => 'POST',
                    'url' => ['/admin/footer'],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.footers.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        $('#lfm-meta-image').filemanager('file');

        $(document).on('change','#auto_translate',function() {

            let val = $(this).prop('checked') ? '1' : '0';

            if (val==1){
                let about_content = tinymce.get("about_content_tc").getContent({format : 'text'});
                let service_content = tinymce.get("service_content_tc").getContent({format : 'text'});
                let membership_content = tinymce.get("membership_content_tc").getContent({format : 'text'});
                let payment_content = tinymce.get("payment_content_tc").getContent({format : 'text'});
                let transaction_content = tinymce.get("transaction_content_tc").getContent({format : 'text'});
                let content = tinymce.get("content_tc").getContent({format : 'text'});

                $.ajax({
                    url: "{{ url('/admin/footer-auto-translate') }}",
                    data: {'val': val, 'cont': content, 'about_content': about_content, 'service_content': service_content, 'membership_content': membership_content, 'payment_content': payment_content, 'transaction_content': transaction_content,'cont': content},
                    type: 'get',
                    success: function (response) {
                        response['about_content']!==''?tinymce.get("about_content_sc").setContent(response['about_content']):alert('About Content field must be less than 5000 characters')
                        response['service_content']!==''?tinymce.get("service_content_sc").setContent(response['service_content']):alert('Service Content field must be less than 5000 characters')
                        response['membership_content']!==''?tinymce.get("membership_content_sc").setContent(response['membership_content']):alert('Membership Content field must be less than 5000 characters')
                        response['payment_content']!==''?tinymce.get("payment_content_sc").setContent(response['payment_content']):alert('Payment Channels field must be less than 5000 characters')
                        response['transaction_content']!==''?tinymce.get("transaction_content_sc").setContent(response['transaction_content']):alert('Easy Transaction Content field must be less than 5000 characters')
                        response['content']!==''?tinymce.get("content_sc").setContent(response['content']):alert('Content field must be less than 5000 characters')
                    }
                });
            }
            else {
                tinymce.get("content_sc").setContent('')
            }

        });

    </script>
@endpush
