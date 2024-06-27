@extends('admin.layouts.master')
@section('title', 'Edit Contact')
@section('breadcrumb', 'Contact')
@section('breadcrumb-info', 'Edit Contact')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($contact, [
                    'method' => 'POST',
                    'url' => ['/admin/contact',],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.contact.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        $('#lfm-meta-image').filemanager('file');

        for (let i=1;i<=3;i++)
        {
            $(document).on('keyup',`.link${i}`,function (){
                let link=$(this).val();
                $(`.link${i}`).val(link)
            })
            $(document).on('keyup',`.link${i}_text`,function (){
                let link_text=$(this).val();
                $(`.link${i}_text`).val(link_text)
            })
        }

        $(document).on('change','#auto_translate',function() {

            let val = $(this).prop('checked') ? '1' : '0';
            let simplified_help1_name=$('#help1_name_sc');
            let simplified_help2_name=$('#help2_name_sc');
            let simplified_help3_name=$('#help3_name_sc');
            let simplified_payment_method1_name=$('#payment_method1_name_sc');
            let simplified_payment_method2_name=$('#payment_method2_name_sc');

            let simplified_help1_description=$('#help1_description_sc');
            let simplified_help2_description=$('#help2_description_sc');
            let simplified_help3_description=$('#help3_description_sc');
            let simplified_payment_method1_description=$('#payment_method1_description_sc');
            let simplified_payment_method2_description=$('#payment_method2_description_sc');

            if (val==1){
                let help1_name=$('#help1_name_tc').val();
                let help2_name=$('#help2_name_tc').val();
                let help3_name=$('#help3_name_tc').val();
                let payment_method1_name=$('#payment_method1_name_tc').val();
                let payment_method2_name=$('#payment_method2_name_tc').val();

                let help1_description=tinymce.get("help1_description_tc").getContent({format : 'text'});
                let help2_description=tinymce.get("help2_description_tc").getContent({format : 'text'});
                let help3_description=tinymce.get("help3_description_tc").getContent({format : 'text'});
                let payment_method1_description=tinymce.get("payment_method1_description_tc").getContent({format : 'text'});
                let payment_method2_description=tinymce.get("payment_method2_description_tc").getContent({format : 'text'});

                $.ajax({
                    url: "{{ url('/admin/contact-auto-translate') }}",
                    data: {'val': val, 'help1_name':help1_name , 'help2_name':help2_name, 'help3_name':help3_name, 'payment_method1_name':payment_method1_name, 'payment_method2_name':payment_method2_name, 'help1_description':help1_description,'help2_description':help2_description,'help3_description': help3_description,'payment_method1_description': payment_method1_description,'payment_method2_description': payment_method2_description},
                    type: 'get',
                    success: function (response) {
                        console.log(response)
                        response['help1_name']!==''?simplified_help1_name.val(response['help1_name']):alert('Help Section One Name field must be less than 5000 characters')
                        response['help2_name']!==''?simplified_help2_name.val(response['help2_name']):alert('Help Section Two Name field must be less than 5000 characters')
                        response['help3_name']!==''?simplified_help1_name.val(response['help3_name']):alert('Help Section Three Name field must be less than 5000 characters')
                        response['payment_method1_name']!==''?simplified_payment_method1_name.val(response['payment_method1_name']):alert('Payment Method One Name field must be less than 5000 characters')
                        response['payment_method2_name']!==''?simplified_payment_method2_name.val(response['payment_method2_name']):alert('Payment Method Two Name field must be less than 5000 characters')
                        response['help1_description']!==''?tinymce.get("help1_description_sc").setContent(response['help1_description']):alert('Help One Description field must be less than 5000 characters')
                        response['help2_description']!==''?tinymce.get("help2_description_sc").setContent(response['help2_description']):alert('Help Two Description field must be less than 5000 characters')
                        response['help3_description']!==''?tinymce.get("help3_description_sc").setContent(response['help3_description']):alert('Help Three Description field must be less than 5000 characters')
                        response['payment_method1_description']!==''?tinymce.get("payment_method1_description_sc").setContent(response['payment_method1_description']):alert('Payment Method One Description field must be less than 5000 characters')
                        response['payment_method2_description']!==''?tinymce.get("payment_method2_description_sc").setContent(response['payment_method2_description']):alert('Payment Method Two Description field must be less than 5000 characters')
                    }
                });
            }
            else {
                simplified_banner_title.val('');
                simplified_cooperation_title.val('');
                simplified_group_title.val('');
                simplified_meta_title.val('');
                simplified_meta_description.val('');
                tinymce.get("banner_description_sc").setContent('')
                tinymce.get("cooperation_description_tc").setContent('')
                tinymce.get("group_description_sc").setContent('')
                tinymce.get("mission_and_vision_description_sc").setContent('')

            }

        });


    </script>
@endpush
