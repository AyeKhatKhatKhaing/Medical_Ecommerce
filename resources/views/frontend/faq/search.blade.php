    <ul>
        @if (count($categories) > 0)
            @foreach ($categories as $key => $category)
                <li class="flex items-center py-2">
                    <div class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path
                                d="M16.6938 17.3258C17.0771 17.7091 17.6687 17.1174 17.2854 16.7424L14.1604 13.6091C15.2566 12.3962 15.8625 10.819 15.8604 9.18411C15.8604 5.52578 12.8854 2.55078 9.22708 2.55078C5.56875 2.55078 2.59375 5.52578 2.59375 9.18411C2.59375 12.8424 5.56875 15.8174 9.22708 15.8174C10.8771 15.8174 12.4021 15.2091 13.5688 14.2008L16.6938 17.3258ZM3.42625 9.18411C3.42625 5.98411 6.03458 3.38411 9.22625 3.38411C12.4263 3.38411 15.0263 5.98411 15.0263 9.18411C15.0263 12.3841 12.4263 14.9841 9.22625 14.9841C6.03458 14.9841 3.42625 12.3841 3.42625 9.18411Z"
                                fill="#66666A" />
                        </svg>
                    </div>
                    <a class="block text-center" href="{{ route('faq.category', $category->category_id) }}">

                    <span class="font-normal me-body18 text-countcolor"> {{ langbind($category, 'category_name') }}</span>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>

