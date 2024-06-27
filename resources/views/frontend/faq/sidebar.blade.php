<div class="my-5 pb-5 border-b border-b-mee4 last:border-none">
    <div class="flex justify-between faq-sidebar-title cursor-pointer active">
        <h2 class="font-bold me-body20 text-darkgray">{{ langbind($category, 'name') }}</h2>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path
                    d="M24.9181 19.9541C24.7775 20.2572 24.4244 20.3947 24.1088 20.2666C24.0244 20.2322 23.0244 19.2478 20.4869 16.6978L16.9775 13.1728L13.4713 16.6978C10.9275 19.251 9.93064 20.2322 9.84626 20.2666C9.78064 20.2916 9.67126 20.3135 9.60251 20.3135C9.15251 20.3135 8.84939 19.8572 9.03689 19.4541C9.12126 19.276 16.5369 11.826 16.7119 11.7478C16.8713 11.6728 17.0838 11.6728 17.2431 11.7478C17.4181 11.826 24.8338 19.276 24.9181 19.4541C24.9931 19.6135 24.9931 19.7947 24.9181 19.9541Z"
                    fill="#333333" />
            </svg>
        </div>
    </div>

    <div class="faq-sidebar-content">
        <div component-name="faq-sidebar-list" class="faq-sidebar-list-container">
            @if (count($category->subCategory) > 0)
                @foreach ($category->subCategory as $subcategory)
                    <ul>
                        <li class="font-normal me-body18 text-darkgray mb-3 ">
                            {{-- @if(isset($subcategory_id)) --}}
                            <a 
                                href="{{ langlink('helpcenter-category?subCategory=' . $subcategory->id) }}"
                                class="@if(isset($subcategory_id) && $subcategory_id == $subcategory->id ) text-orangeMediq @elseif (isset($faq) && $faq->sub_category_id == $subcategory->id) text-orangeMediq  @endif">{{ langbind($subcategory, 'sub_name') }} 
                            </a>
                            {{-- @endif --}}
                        </li>
                    </ul>
                @endforeach
            @endif
        </div>
    </div>
</div>
