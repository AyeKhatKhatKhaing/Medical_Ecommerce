@extends('admin.layouts.master')
@section('title', 'Create About')
@section('breadcrumb', 'About')
@section('breadcrumb-info', 'Create About')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                <form method="POST" action="{{ url('/admin/about') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.about.form', ['formMode' => 'create'])
                </form>
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
            let simplified_banner_title=$('#banner_title_sc');
            let simplified_cooperation_title=$('#cooperation_title_sc');
            let simplified_group_title=$('#group_title_sc');
            let simplified_meta_title=$('#meta_title_sc');
            let simplified_meta_description=$('#meta_description_sc');

            if (val==1){

                let banner_title=$('#banner_title_tc').val();
                let banner_description=tinymce.get("banner_description_tc").getContent({format : 'text'});
                let cooperation_title=$('#cooperation_title_tc').val();
                let cooperation_description=tinymce.get("cooperation_description_tc").getContent({format : 'text'});
                let group_title=$('#group_title_tc').val();
                let group_description=tinymce.get("group_description_tc").getContent({format : 'text'});
                let mission_and_vision_description=tinymce.get("mission_and_vision_description_tc").getContent({format : 'text'});
                let meta_title=$('#meta_title_tc').val();
                let meta_description=$('#meta_description_tc').val();

                $.ajax({
                    url: "{{ url('/admin/about-auto-translate') }}",
                    data: {'val': val, 'banner_title':banner_title , 'banner_description':banner_description, 'cooperation_title':cooperation_title, 'group_title':group_title, 'group_description':group_description, 'mission_and_vision_description':mission_and_vision_description,'cooperation_description':cooperation_description,'meta_title': meta_title,'meta_description': meta_description},
                    type: 'get',
                    success: function (response) {
                        console.log(response)
                        response['banner_title']!==''?simplified_banner_title.val(response['banner_title']):alert('Banner Title field must be less than 5000 characters')
                        response['banner_description']!==''?tinymce.get("banner_description_sc").setContent(response['banner_description']):alert('Banner Description field must be less than 5000 characters')
                        response['cooperation_title']!==''?simplified_cooperation_title.val(response['cooperation_title']):alert('Cooperation Title field must be less than 5000 characters')
                        response['cooperation_description']!==''?tinymce.get("cooperation_description_sc").setContent(response['cooperation_description']):alert('Cooperation Description field must be less than 5000 characters')
                        response['group_title']!==''?simplified_group_title.val(response['group_title']):alert('Group Title field must be less than 5000 characters')
                        response['group_description']!==''?tinymce.get("group_description_sc").setContent(response['group_description']):alert('Group Description field must be less than 5000 characters')
                        response['mission_and_vision_description']!==''?tinymce.get("mission_and_vision_description_sc").setContent(response['mission_and_vision_description']):alert('Group Description field must be less than 5000 characters')
                        response['meta_title']!==''?simplified_meta_title.val(response['meta_title']):alert('Meta title field must be less than 5000 characters')
                        response['meta_description']!==''?simplified_meta_description.val(response['meta_description']):alert('Meta description field must be less than 5000 characters')
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

