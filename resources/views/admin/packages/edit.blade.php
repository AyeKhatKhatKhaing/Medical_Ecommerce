@extends('admin.layouts.master')
@section('title', 'Edit Package')
@section('breadcrumb', 'Package')
@section('breadcrumb-info', 'Edit Package')
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
                {!! Form::model($package, [
                    'method' => 'PATCH',
                    'url' => ['/admin/packages', $package->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.packages.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script>
        $('#cat-image').filemanager('file');

        $(document).on('change','#auto_translate',function() {

            let val = $(this).prop('checked') ? '1' : '0';
            let simplified_name=$('#name_sc');
            if (val==1){
                let name = $('#name_tc').val();
                let content = tinymce.get("content_tc").getContent({format : 'text'});
                $.ajax({
                    url: "{{ url('/admin/package-translate') }}",
                    data: {'val': val, 'name': name,'cont':content},
                    type: 'get',
                    success: function (response) {
                        response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
                        response['content']!==''?tinymce.get("content_sc").setContent(response['content']):alert('Content field must be less than 5000 characters')
                    }
                });
            }
            else {
                simplified_name.val('')
                tinymce.get("content_sc").setContent('')

            }

        });
        new Vue({
            el: '#plan_details',
            data: {
                header: {
                    header_en: "",
                    header_tc: "",
                    header_sc: "",
                },
                col: {
                        col_name_en: "",
                        col_name_tc: "",
                        col_name_sc: "",
                    },
                title: {
                    title_en: "",
                    title_tc: "",
                    title_sc: "",
                    tableColumns: [{
                        col_name_en: "",
                        col_name_tc: "",
                        col_name_sc: "",
                    }],
                    
                },
                tableTitles: <?= json_encode($ptitleCols)?>,
                tableHeaders: <?= json_encode($package->tableHeaders)?>,
            },
            // created() {
                // console.log(this.tableColumns);
                // this.addHeader();
                // this.addTitle();
                // this.addColumn();
            // },
            methods: {

                addHeader: function() {
                    this.tableHeaders.push(Object.assign({}, this.header));

                },

                addTitle: function() {
                    this.tableTitles.push(Object.assign({},this.title));
                },

                addColumn: function(index) {
                    this.tableTitles[index].tableColumns.push(JSON.parse(JSON.stringify(this.col)));
                },

                removeHeader: function(index) {
                    this.tableHeaders.splice(index, 1)
                },

                removeTitle: function(index) {
                    this.tableTitles.splice(index, 1)
                },

                removeColumn: function(cindex,index) {
                    this.tableTitles[index].tableColumns.splice(cindex, 1)
                },

                inputName: function(index, property) {
                    return "tableHeaders[" + index + "][" + property + "]";

                },

                tinputName: function(index, property) {
                    return "tableTitles[" + index + "][" + property + "]";

                },
                
                cinputName: function(tindex,cindex, property) {
                    return "tableTitles["+tindex+"][tableColumns]["+cindex+"]["+property+"]";

                    // return "tableColumns[" + index + "][" + property + "]";

                },
            }
        });

        $(function(){
            let val = $('input[name="is_table"]:checked').val();
            if(val == 1){
                $('.card_name').prop('hidden',false)
                $('#tableHeader').prop('hidden',true)
            }else{
                $('.card_name').prop('hidden',true)
                $('#tableHeader').prop('hidden',false)
            }
        })
    </script>
@endpush