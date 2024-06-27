@extends('admin.layouts.master')
@section('title', 'Edit Product')
@section('breadcrumb', 'Product')
@section('breadcrumb-info', 'Edit Product')
@section('content')
<style>
    /* .dragGroup{
        padding: 0px;
      }
      .draggable {
        will-change: transform;
        font-family: "Raleway", sans-serif;
        font-weight: 800;
        height: 50px;
        list-style-type: none;
        margin: 10px;
        background-color: white;
        color: #212121;
        width: 250px;
        line-height: 3.2;
        padding-left: 10px;
        cursor: move;
        transition: all 200ms;
        user-select: none;
        margin: 10px auto;
        position: relative;
        display:inline;
      }

      .draggable:hover:after {
        opacity: 1;
        transform: translate(0);
      }
      .over {
        transform: scale(1.1, 1.1);
      }
      .dragIcon {
        cursor: pointer;
      } */
</style>
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
            {!! Form::model($product, [
            'method' => 'PATCH',
            'url' => ['/admin/products', $product->id],
            'class' => 'form-horizontal'
            ]) !!}

            @include ('admin.products.form', ['formMode' => 'edit'])

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script>
    new Vue({
        el: '#variableProduct',
        data: {
            variable: {
                id: "",
                product_code: "",
                name_en: "",
                name_tc: "",
                name_sc: "",
                sku: "",
                original_price: "",
                discount_price: "",
                promotion_price: "",
                // avg_price: "",
                stock: "",
                number_of_dose: "",

            },
            variables: <?= json_encode(old('productsVariations', $product->productsVariations))?>,
        },
        // created(){
        //     this.addVariable();
        // },
        methods: {
            addVariable: function() {
                this.variables.push(Object.assign({}, this.variable));
            },
            removeVariable: function(index) {
                this.variables.splice(index, 1)
            },
            inputName: function(index, property) {
                return "variables[" + index + "][" + property + "]";

            },
        }
    });
    $(document).ready(function() {
        $('#lfm-img').filemanager('file');
        $('#lfm-meta-image').filemanager('file');
        $('#lfm-img-gallery').filemanager('file');
        $('.add_on').removeAttr('hidden')
        var categories = $(".category_id:checked").map(function() {
            return this.value
        }).get()
        var cval = categories.toString()
        if (cval == 2) {
            $('.control-label-dose').html('Number Of Dose');
            //$('.number_of_dose').attr('hidden',false)
        } else {
            $('.control-label-dose').html('Number Of Item');
            //$('.number_of_dose').attr('hidden',true)
        }
        var subCategories = <?= json_encode($subCategories)?>;
        subCategories.forEach(function(item, key) {
            if (cval == item.category_id) {
                $('#sub_category_id' + item.id).removeAttr('disabled');
            } else {
                $('#sub_category_id' + item.id).prop("disabled", true);
            }
        })

        var merchant_id = $(".merchant_id").val();
        var planProcess = <?= json_encode($planProcess)?>;
        var planDescription = <?= json_encode($planDescription)?>;
        var merchantLocations = <?= json_encode($merchantLocations) ?>;

        planProcess.forEach(function(item, key) {
            if (merchant_id == item.merchant_id) {
                $('.plan_process' + item.merchant_id).removeAttr('hidden');
            } else {
                $('.plan_process' + item.merchant_id).prop("hidden", true);
            }
        })
        planDescription.forEach(function(item, key) {
            if (merchant_id == item.merchant_id) {
                $('.plan_description' + item.merchant_id).removeAttr('hidden');
            } else {
                $('.plan_description' + item.merchant_id).prop("hidden", true);
            }
        })
        merchantLocations.forEach(function(item, key) {
            // $('.merchant_locations' + item.merchant_id + " #merchant_locations"+item.id).prop('checked',false);

            if (merchant_id == item.merchant_id) {
                $('.merchant_locations' + item.merchant_id).removeAttr('hidden');
            } else {
                $('.merchant_locations' + item.merchant_id).prop("hidden", true);
            }
        })
        $('.plan').removeAttr('hidden')


        var packages = <?= json_encode($packages)?>;
        var addOnItems = <?= json_encode($addOnItems)?>;
        packages.forEach(function(item, key) {
            if (merchant_id == item.merchant_id) {
                $('.package' + item.merchant_id).removeAttr('hidden');
            } else {
                $('.package' + item.merchant_id).prop("hidden", true);
            }
        })
        addOnItems.forEach(function(item, key) {
            if (merchant_id == item.merchant) {
                console.log('3wrewr',merchant_id,item.merchant)
                $('.addon' + item.merchant).removeAttr('hidden');
            } else {
                $('.addon' + item.merchant).prop("hidden", true);
            }
        })

    })

    function merchant() {
        let merchant_id = $('.merchant_id').val();
        var planProcess = <?= json_encode($planProcess)?>;
        var planDescription = <?= json_encode($planDescription)?>;
        var packages = <?= json_encode($packages)?>;
        var addOnItems = <?= json_encode($addOnItems)?>;
        var merchantLocations = <?= json_encode($merchantLocations) ?>;
        planProcess.forEach(function(item, key) {
            if (merchant_id == item.merchant_id) {
                $('.plan_process' + item.merchant_id).removeAttr('hidden');
            } else {
                $('.plan_process' + item.merchant_id).prop("hidden", true);
            }
        })
        planDescription.forEach(function(item, key) {
            if (merchant_id == item.merchant_id) {
                $('.plan_description' + item.merchant_id).removeAttr('hidden');
            } else {
                $('.plan_description' + item.merchant_id).prop("hidden", true);
            }
        })

        packages.forEach(function(item, key) {
            if (merchant_id == item.merchant_id) {
                $('.package' + item.merchant_id).removeAttr('hidden');
            } else {
                $('.package' + item.merchant_id).prop("hidden", true);
                $('.package' + item.merchant_id).prop("selected", false);
            }
        })
        addOnItems.forEach(function(item, key) {
            if (merchant_id == item.merchant) {
                $('.addon' + item.merchant).removeAttr('hidden');
            } else {
                $('.addon' + item.merchant).prop("hidden", true);
            }
        })
        merchantLocations.forEach(function(item, key) {

            $('.merchant_locations' + item.merchant_id + " #merchant_locations"+item.id).prop('checked',false);

            if (merchant_id == item.merchant_id) {
                $('.merchant_locations' + item.merchant_id).removeAttr('hidden');
            } else {
                $('.merchant_locations' + item.merchant_id).prop("hidden", true);
            }
        })

        $('.plan').removeAttr('hidden')
        $('.add_on').removeAttr('hidden')
    }

    $('.category_id').click(function() {
        var cval = $(this).val();
        if (cval == 2) {
            $('.control-label-dose').html('Number Of Dose');
            //$('.number_of_dose').attr('hidden',false)
        } else {
            $('.control-label-dose').html('Number Of Item');
           // $('.number_of_dose').attr('hidden',true)
        }
        $('.sub_category_id').prop('checked', false);
        var subCategories = <?= json_encode($subCategories)?>;
        subCategories.forEach(function(item, key) {
            if (cval == item.category_id) {
                $('#sub_category_id' + item.id).removeAttr('disabled');
            } else {
                $('#sub_category_id' + item.id).prop("disabled", true);
            }
        })
    })

    function inArray(cate, sub_cate) {
        var a = false;
        for (var i = 0; i < sub_cate.length; i++) {
            console.log(sub_cate)
            if (cate == sub_cate[i]) {
                a = true;
                break;
            }
        }
        return a;
    }

    function removeImages(image_id, product_id) {
        Swal.fire({
                html: `Are you sure want to delete?`,
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
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin/products/removeImg",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'image_id': image_id,
                            'product_id': product_id
                        },
                        success: function(response) {
                            location.reload(true);
                        }
                    })
                } else {}
            })
    }

    var btn = document.querySelector('.add');
    var remove = document.querySelector('.draggable');

    function dragStart(e) {
        dragSrcEl = this;
        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML);
    };

    function dragEnter(e) {
        this.classList.add('over');
    }

    function dragLeave(e) {
        e.stopPropagation();
        this.classList.remove('over');
    }

    function dragOver(e) {
        e.preventDefault();
        e.dataTransfer.dropEffect = 'move';
        return false;
    }

    function dragDrop(e) {
        if (dragSrcEl != this) {
            dragSrcEl.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData('text/html');
        }
        return false;
    }

    function dragEnd(e) {
        var listItens = document.querySelectorAll('.draggable');
        [].forEach.call(listItens, function(item) {
            item.classList.remove('over');
            item.style.opacity = '1';
        });

    }

    function addEventsDragAndDrop(el) {
        el.addEventListener('dragstart', dragStart, false);
        el.addEventListener('dragenter', dragEnter, false);
        el.addEventListener('dragover', dragOver, false);
        el.addEventListener('dragleave', dragLeave, false);
        el.addEventListener('drop', dragDrop, false);
        el.addEventListener('dragend', dragEnd, false);
    }

    var listItens = document.querySelectorAll('.draggable');
    [].forEach.call(listItens, function(item) {
        addEventsDragAndDrop(item);
    });
</script>
@endpush
