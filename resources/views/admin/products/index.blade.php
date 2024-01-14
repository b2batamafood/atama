<x-admin.layouts.app>

    @if (session()->has('success'))
        <div id="alert-3"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    @if (session()->has('error'))
        <div id="alert-2"
            class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('error') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif


    <div class="card w-full p-6 bg-base-100 shadow-xl mt-2">
        <div class="text-xl font-semibold inline-block capitalize">Products
            <div class="inline-block float-right">
                <div class="inline-block float-right">
                    <button class="btn px-6 btn-sm bg-primary text-white capitalize" onclick="add_modal.showModal()">add
                        new product</button>
                </div>
            </div>
        </div>
        <div class="divider mt-2"></div>

        {{-- TABLE START --}}
        <div class="h-full w-full pb-6 bg-base-100">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr class="text-sm">
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Barcode</th>
                            <th>Price ($)</th>
                            <th>Cost ($)</th>
                            <th>Tax ($)</th>
                            <th>Photo</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td class="capitalize font-bold">{{ $item->code }}</td>
                                <td class="">{{ $item->name }}</td>
                                <td class="">{{ $item->description }}</td>
                                <td class="">{{ $item->barcode }}</td>
                                <td class="">{{ $item->price }}</td>
                                <td class="">{{ $item->cost }}</td>
                                <td class="">{{ $item->tax }}</td>
                                <td class="">
                                    <img src="{{ $item->photo_url }}" alt="{{ $item->name }}"
                                        class="max-w-10 sm:max-w-[70px] h-16">
                                </td>
                                @if ($item->category_id !== null)
                                    <td class="">{{ $item->category->name }}</td>
                                @else
                                    <td class="italic">null</td>
                                @endif

                                @if ($item->brand_id !== null)
                                    <td class="uppercase">{{ $item->brand->name }}</td>
                                @else
                                    <td class="italic">null</td>
                                @endif
                                <td><a onclick="edit_modal.showModal()"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- TABLE END --}}
    </div>


    {{-- Add Product Modal --}}
    <dialog id="add_modal" class="modal">
        <div class="modal-box w-11/12">
            <form method="dialog" action="">
                <button class="btn btn-md btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg capitalize text-center mb-7">Add New Product</h3>

            <form action="products/create" method="post" autocomplete="on" enctype="multipart/form-data">
                @csrf
                <div class="space-y-2">
                    <div class="flex">
                        <div class="w-1/2 mr-2">
                            <label for="code"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Code<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="code" id="code" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Code" required>
                        </div>

                        <div class="w-1/2 ml-2">
                            <label for="name"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Name<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Name" required>
                        </div>
                    </div>

                    <div class="w-full">
                        <label for="description"
                            class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Description<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="description" id="description" value=""
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                            placeholder="Description" required>
                    </div>

                    <div class="w-full">
                        <label for="barcode"
                            class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Barcode<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="barcode" id="barcode" value=""
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                            placeholder="Barcode" required>
                    </div>

                    <div class="flex">
                        <div class="w-1/3 mr-2">
                            <label for="price"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Price<span
                                    class="text-red-500">*</span></label>
                            <input type="number" step="any" name="price" id="price" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Price" required>
                            <div class="label">
                                <span class="label-text-alt">Use "." for float value</span>
                            </div>
                        </div>

                        <div class="w-1/3 mx-2">
                            <label for="cost"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Cost<span
                                    class="text-red-500">*</span></label>
                            <input type="number" step="any" name="cost" id="cost" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Cost" required>
                        </div>

                        <div class="w-1/3 ml-2">
                            <label for="tax"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Tax<span
                                    class="text-red-500">*</span></label>
                            <input type="number" step="any" name="tax" id="tax" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Tax" required>
                        </div>
                    </div>

                    <div class="w-full">
                        <label for="photo_url"
                            class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Photo
                            URL</label>
                        <input type="text" name="photo_url" id="photo_url" value=""
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                            placeholder="Photo URL">
                    </div>

                    <div class="flex">
                        <div class="w-1/2 mr-2">
                            <label for="category"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Category</label>
                            <select class="select select-bordered w-full max-w-xs capitalize" name="category_id"
                                id="category_id">
                                <option disabled selected>Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                                {{-- <option value="other">Other</option> --}}
                            </select>
                        </div>

                        <div class="w-1/2 ml-2">
                            <label for="brand"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Brand</label>
                            <input type="text" name="brand_id" id="brand_id" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Brand">
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <input type="submit" value="Submit"
                        class="btn bg-primary border border-primary hover:bg-transparent hover:text-primary text-white uppercase" />
                </div>
            </form>
        </div>
    </dialog>

    {{-- Edit Product Modal --}}
    <dialog id="edit_modal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box w-11/12">
            <form method="dialog" action="">
                <button class="btn btn-md btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg capitalize text-center mb-7">Edit Product</h3>
            <form action="products/edit" method="post" autocomplete="on" enctype="multipart/form-data">
                @csrf
                <div class="space-y-2">
                    <div class="flex">
                        <div class="w-1/2 mr-2">
                            <label for="code"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Code</label>
                            <input type="text" name="code" id="code" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Code">
                        </div>

                        <div class="w-1/2 ml-2">
                            <label for="name"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Name</label>
                            <input type="text" name="name" id="name" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Name">
                        </div>
                    </div>

                    <div class="w-full">
                        <label for="description"
                            class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Description</label>
                        <input type="text" name="description" id="description" value=""
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                            placeholder="Description">
                    </div>

                    <div class="w-full">
                        <label for="barcode"
                            class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Barcode</label>
                        <input type="text" name="barcode" id="barcode" value=""
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                            placeholder="Barcode">
                    </div>

                    <div class="flex">
                        <div class="w-1/3 mr-2">
                            <label for="price"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Price</label>
                            <input type="number" step="any" name="price" id="price" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Price">
                            <div class="label">
                                <span class="label-text-alt">Use "." for float value</span>
                            </div>
                        </div>

                        <div class="w-1/3 mx-2">
                            <label for="cost"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Cost</label>
                            <input type="number" step="any" name="cost" id="cost" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Cost">
                        </div>

                        <div class="w-1/3 ml-2">
                            <label for="tax"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Tax</label>
                            <input type="number" step="any" name="tax" id="tax" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Tax">
                        </div>
                    </div>

                    <div class="w-full">
                        <label for="photo_url"
                            class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Photo
                            URL</label>
                        <input type="text" name="photo_url" id="photo_url" value=""
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                            placeholder="Photo URL">
                    </div>

                    <div class="flex">
                        <div class="w-1/2 mr-2">
                            <label for="category"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Category</label>
                            <select class="select select-bordered w-full max-w-xs capitalize" name="category_id"
                                id="category_id">
                                <option disabled selected>Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                                {{-- <option value="other">Other</option> --}}
                            </select>
                        </div>

                        <div class="w-1/2 ml-2">
                            <label for="brand"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Brand</label>
                            <input type="text" name="brand_id" id="brand_id" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Brand">
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="mt-4">
                        <input type="submit" value="Save"
                            class="btn bg-primary border border-primary hover:bg-transparent hover:text-primary text-white uppercase"/>
                    </div>
                </div>
            </form>
        </div>
    </dialog>


    {{-- <form action="" method="POST">
        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
    </form>

    <h1 class="text-lg w-full flex justify-center uppercase">or</h1> --}}

    {{-- Upload File --}}
    {{-- <label class="form-control w-full max-w-xs cursor-pointer">
        <div class="label">
            <span class="label-text text-base">Upload file here</span>
        </div>
        <input type="file" class="file-input file-input-bordered w-full max-w-xs" />
        <div class="label">
            <span class="label-text-alt text-sm">Alt label</span>
        </div>
    </label> --}}

</x-admin.layouts.app>