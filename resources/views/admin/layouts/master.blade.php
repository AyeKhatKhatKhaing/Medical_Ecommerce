<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>mediQ | @yield('title')</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('frontend/img/favicon.ico')}}" type="image/x-icon">
    <!--begin::Fonts-->
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('backend/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/custom_style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/form.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap5.min.css') }}">

    <link rel="shortcut icon" href="{{asset('frontend/img/Favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('frontend/img/Favicon.png')}}" type="image/x-icon">
    <!--end::Global Stylesheets Bundle-->
    <style>
        .hidden{
            display:none !important;
        }
    </style>
    @stack('style')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            @include('admin.layouts.sidebar')
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                @include('admin.layouts.header')
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="toolbar" id="kt_toolbar">
                        <!--begin::Container-->
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <!--begin::Page title-->
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <!--begin::Title-->
                                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">@yield('breadcrumb')
                                </h1>
                                <!--begin::Separator-->
                                <span class="h-20px border-gray-300 border-start mx-4"></span>
                                <!--end::Separator-->
                                <!--begin::Description-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        @yield('breadcrumb-info')
                                    </li>
                                </ul>
                                <!--end::Description-->
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!-- Main Content -->

                    @yield('content')
                </div>

                <!--end::Content-->
                <!--begin::Footer-->
                @include('admin.layouts.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('backend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/js/dataTables.bootstrap5.min.js') }}"></script> --}}
    <script src="{{ asset('backend/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('backend/js/custom/apps/customers/list/list.js') }}"></script>
    <script src="{{ asset('backend/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('backend/plugins/custom/draggable/draggable.bundle.js') }}"></script>

    <script src="{{ asset('backend/js/custom/apps/ecommerce/catalog/products.js') }}"></script>


    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('backend/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('backend/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('backend/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('backend/js/custom/utilities/modals/users-search.js') }}"></script>
    {{-- <script src="{{ asset('backend/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script> --}}
    <script src="{{asset('backend/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script src="{{asset('backend/plugins/custom/tinymce/jquery.tinymce.min.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.5/tinymce.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.5/jquery.tinymce.min.js"></script> --}}

{{--    <script src="{{asset('backend/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>--}}
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>--}}

    <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
		{{-- <script>
			$(document).ready(function(){
			tinymce.init({

				selector: ".editor",
				extended_valid_elements: 'span',
				menubar: false,
				toolbar: ["styleselect fontselect fontsizeselect",
					"undo redo | bold italic | link image | alignleft aligncenter alignright alignjustify",
					"bullist numlist | outdent indent | code"],
				relative_urls : true,
        		remove_script_host : false,
				convert_urls: false,
				valid_elements : "@[id|class|style|title|dir<ltr?rtl|lang|xml::lang|onclick|ondblclick|"
                    + "onmousedown|onmouseup|onmouseover|onmousemove|onmouseout|onkeypress|"
                    + "onkeydown|onkeyup],a[rel|rev|charset|hreflang|tabindex|accesskey|type|"
                    + "name|href|target|title|class|onfocus|onblur],strong/b,em/i,strike,u,"
                    + "#p,-ol[type|compact],-ul[type|compact],-li,br,img[longdesc|usemap|"
                    + "src|border|alt=|title|hspace|vspace|width|height|align],-sub,-sup,"
                    + "-blockquote,-table[border=0|cellspacing|cellpadding|width|frame|rules|"
                    + "height|align|summary|bgcolor|background|bordercolor],-tr[rowspan|width|"
                    + "height|align|valign|bgcolor|background|bordercolor],tbody,thead,tfoot,"
                    + "#td[colspan|rowspan|width|height|align|valign|bgcolor|background|bordercolor"
                    + "|scope],#th[colspan|rowspan|width|height|align|valign|scope],caption,-div,"
                    + "-span,-code,-pre,address,-h1,-h2,-h3,-h4,-h5,-h6,hr[size|noshade],-font[face"
                    + "|size|color],dd,dl,dt,cite,abbr,acronym,del[datetime|cite],ins[datetime|cite],"
                    + "object[classid|width|height|codebase|*],param[name|value|_value],embed[type|width"
                    + "|height|src|*],script[src|type],map[name],area[shape|coords|href|alt|target],bdo,"
                    + "button,col[align|char|charoff|span|valign|width],colgroup[align|char|charoff|span|"
                    + "valign|width],dfn,fieldset,form[action|accept|accept-charset|enctype|method],"
                    + "input[accept|alt|checked|disabled|maxlength|name|readonly|size|src|type|value],"
                    + "kbd,label[for],legend,noscript,optgroup[label|disabled],option[disabled|label|selected|value],"
                    + "q[cite],samp,select[disabled|multiple|name|size],small,"
                    + "textarea[cols|rows|disabled|name|readonly|maxlength],tt,var,big",

				images_upload_handler: function (blobInfo, success, failure) {
                        var xhr, formData;
                        xhr = new XMLHttpRequest();
                        xhr.withCredentials = false;
                        xhr.open('POST', '/admin/upload');
                        var token = '{{ csrf_token() }}';
                        xhr.setRequestHeader("X-CSRF-Token", token);
                        xhr.onload = function() {
                        var json;
                        if (xhr.status != 200) {
                            failure('HTTP Error: ' + xhr.status);
                            return;
                        }
                        json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location != 'string') {
                            failure('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                        success('{{url('')}}'+json.location);
                    };
                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    xhr.send(formData);
                },
                directionality: 'ltr',

                plugins: 'image code ',

                /* enable title field in the Image dialog*/
                image_title: true,
                /* enable automatic uploads of images represented by blob or data URIs*/
                automatic_uploads: true,
                /*
                URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                images_upload_url: 'postAcceptor.php',
                here we add custom filepicker only to Image dialog
                */
                file_picker_types: 'image',
                /* and here's our custom image picker*/

                });
            });
        </script> --}}
        {{-- <script>
            var editor = {
                path_absolute : "/",
                selector: ".editor",
                allow_html_in_named_anchor: false,
                plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime nonbreaking save table directionality",
                "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "fontsizeselect | forecolor backcolor | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                relative_urls: false,
                setup: function(ed) {
                    ed.on('keyup', function(e) {
                        var val = ed.getContent();
                        var div = document.createElement("div");
                        div.innerHTML = val;
                        var text = div.textContent || div.innerText || "";
                        var count = 100;
                        var result = text.slice(0, count) + (text.length > count ? "..." : "");
                        $('.meta_description_tc').val(result);
                    });
                },
                file_browser_callback : function(field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = editor.path_absolute + 'filemanager?field_name=' + field_name;
                    if (type == 'media') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.open({
                        file : cmsURL,
                        title : 'Filemanager',
                        width : x * 0.8,
                        height : y * 0.8,
                        resizable : "yes",
                        close_previous : "no"
                    });
                }
            };
            tinymce.init(editor);
        </script> --}}
        <script>
            var editor_config = {
                path_absolute : "/",
                selector: '.editor',
                relative_urls: false,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern wordcount",
                ],
                setup: function(editor) {
                    var max = 5000;
                    editor.on('keyup', function(event) {
                    var numChars = tinymce.activeEditor.plugins.wordcount.body.getCharacterCount();
                    if (numChars > max) {
                        alert("Only a maximum " + max + " characters are allowed.");
                        event.preventDefault();
                        return false;
                    }
                    });
                },
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                file_picker_callback (callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
                    let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight
                    var cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
                    tinymce.activeEditor.windowManager.openUrl({
                    url : cmsURL,
                    title : 'Laravel File manager',
                    width : x * 0.8,
                    height : y * 0.8,
                    onMessage: (api, message) => {
                        callback(message.content, { text: message.text })
                    }
                    })
                }
            };

            tinymce.init(editor_config)
        </script>

    {{-- <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script> --}}
    <script src="{{ asset('backend/js/stand-alone-button.js') }}"></script>
    <script src="{{ asset('backend/js/gallery.js') }}"></script>
    <script>
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "hide"
        };
        @if (session()->has('flash_message'))
            toastr.success("{{ session()->get('flash_message')}}")
        @endif
        @if (session()->has('danger'))
            toastr.error("{{ session()->get('danger')}}")
        @endif
    </script>
    <script>
        $('.requestDelete tbody').on('click', '.confirm_delete', function (e) {
            e.preventDefault();
            let form = $(this).parent();
            Swal.fire({
                html: `Are you sure you want to delete?`,
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Delete",
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if(result.isConfirmed){
                    form.submit();
                }
            })
        });
    </script>
    <script>
        function showHideDescription(tab){
                $('.nav-item a[href="#' + tab + '-tab"]').tab('show');
            };

        function statusChange(id,url) {
            Swal.fire({
                html: `Are you sure?`,
                icon: "question",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            })
            .then((result) => {
                if(result.isConfirmed){
                    $.ajax({
                    type: 'post',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id
                    },
                    success: function(response) {
                        let num = response.number;
                        if(response.success == true){
                            toastr.success('You have successfully changed Status');
                        }
                    },

                    })
                }else {
                    location.reload(true);
                }
            })
        }

        function updateChange(id,url,status) {
            if (confirm("Are you sure want to change this action?") == true) {
                $.ajax({
                    type: 'post',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        status: status,
                    },
                    success: function(response) {
                        window.location.reload();
                        if(response.success == true){
                            toastr.success('You have successfully changed.');
                        }

                    },

                })
            }else{
                toastr.warning('cancelled!');
            }
        }

        $('.confirm_reload').click(function(){
            if (confirm("Are you sure want to change this action?") == true) {
                return true;
            }else{
                toastr.warning('cancelled!');
                window.location.reload();
            }
        })
    </script>
    <script>
         $.fn.dataTable.ext.errMode = 'none';
        $(document).ajaxError(function (event, jqxhr, settings, exception) {
            if (exception == 'Unauthorized') {
                if (confirm("Session Expired!")) {
                    window.location = '/letadminin';
                }
            } else {
                $('.dataTable')
                    .on( 'error.dt', function ( e, settings, techNote, message ) {
                        console.log( 'An error has been reported by DataTables: ', message + new Date());
                        alert(message);
                    } )
                    .DataTable();
            }
        });
    </script>

    <script>

        $('#tc-tab').addClass('d-none')
        $('#cn-tab').addClass('d-none')
        function showHideDescription(tab){
            $('.nav-item a[href="#' + tab + '-tab"]').tab('show');
            if(tab == 'en')
            {
                $('#en-tab').removeClass('d-none')
                $('#tc-tab').addClass('d-none')
                $('#cn-tab').addClass('d-none')
            }
            else if(tab == 'tc')
            {
                $('#tc-tab').removeClass('d-none')
                $('#en-tab').addClass('d-none')
                $('#cn-tab').addClass('d-none')
            }
            else
            {
                $('#cn-tab').removeClass('d-none')
                $('#tc-tab').addClass('d-none')
                $('#en-tab').addClass('d-none')
            }
        };
    </script>

    <script>
        $(document).ready(function() {
            $('.input-group-btn').next('input').prop('readonly', true);
            $.fn.dataTable.defaults.order = [[ 0, 'desc' ]];
        });
    </script>
{{-- <script>
    $('.form-select-tag').select2()
</script> --}}

{{--    <script>--}}
{{--        if (val==1){--}}
{{--            let name = $('#name_tc').val();--}}
{{--            let content = tinymce.get("content_tc").getContent({format : 'text'});--}}
{{--            let meta_title = $('#meta_title_tc').val();--}}
{{--            let meta_des = $('#meta_description_tc').val();--}}
{{--            $.ajax({--}}
{{--                url: "{{ url('/admin/auto-translate') }}",--}}
{{--                data: {'val': val, 'name': name, 'cont': content,'meta_title': meta_title,'meta_des': meta_des},--}}
{{--                type: 'get',--}}
{{--                success: function (response) {--}}
{{--                    response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')--}}
{{--                    response['content']!==''?tinymce.get("content_sc").setContent(response['content']):alert('Content field must be less than 5000 characters')--}}
{{--                    response['meta_des']!==''?simplified_meta_description.val(response['meta_des']):alert('Meta description field must be less than 5000 characters')--}}
{{--                    response['meta_title']!==''?simplified_meta_title.val(response['meta_title']):alert('Meta title field must be less than 5000 characters')--}}

{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--        else {--}}
{{--            simplified_name.val('')--}}
{{--            tinymce.get("content_sc").setContent('')--}}
{{--            simplified_meta_title.val('')--}}
{{--            simplified_meta_description.val('')--}}
{{--        }--}}
{{--    </script>--}}

    @stack('scripts')
</body>
<!--end::Body-->

</html>
