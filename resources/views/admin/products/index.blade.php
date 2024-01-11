<x-admin.layouts.app>

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
                                    <img src="{{ $item->photo_url }}" alt="{{ $item->name }}" class="max-w-10 sm:max-w-[70px] h-16">
                                </td>
                                <td class="">{{ $item->category->name }}</td>
                                <td class="">{{ $item->brand->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- TABLE END --}}
    </div>


    {{-- Add Member Modal --}}
    <dialog id="add_modal" class="modal">
        <div class="modal-box w-11/12">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg capitalize text-center mb-7">Add New Product</h3>

            <form action="" method="post" autocomplete="on" enctype="multipart/form-data">
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
                            <input type="text" name="price" id="price" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Price" required>
                        </div>

                        <div class="w-1/3 mx-2">
                            <label for="cost"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Cost<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="cost" id="cost" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Cost" required>
                        </div>

                        <div class="w-1/3 ml-2">
                            <label for="tax"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Tax<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="tax" id="tax" value=""
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
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Category<span
                                    class="text-red-500">*</span></label>
                            <select class="select select-bordered w-full max-w-xs">
                                <option disabled selected>Categories</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->category->name }}">{{ $item->category->name }}</option>
                                @endforeach
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="w-1/2 ml-2">
                            <label for="brand"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Brand<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="brand" id="brand" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Brand" required>
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
