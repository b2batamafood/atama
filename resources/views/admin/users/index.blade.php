<x-admin.layouts.app>
    <div class="card w-full p-6 bg-base-100 shadow-xl mt-2">
        <div class="text-xl font-semibold inline-block capitalize">Member
            <div class="inline-block float-right">
                <div class="inline-block float-right">
                    <button class="btn px-6 btn-sm bg-primary text-white capitalize" onclick="add_modal.showModal()">add
                        new member</button>
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
                            <th>Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Zipcode</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Tax ID</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="capitalize font-bold">{{ $user->firstname . ' ' . $user->lastname }}</td>
                                <td class="">{{ $user->company }}</td>
                                <td class="">{{ $user->email }}</td>
                                <td class="">{{ $user->country }}</td>
                                <td class="">{{ $user->state }}</td>
                                <td class="">{{ $user->city }}</td>
                                <td class="">{{ $user->zipcode }}</td>
                                <td class="">{{ $user->address }}</td>
                                <td class="">{{ $user->phone }}</td>
                                <td class="">{{ $user->tax_id }}</td>
                                <td class="">
                                    <div class="badge badge-primary capitalize text-white">Admin</div>
                                </td>
                                <td class="text-start">
                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                        class="data-delete-item text-white font-medium rounded-lg text-sm text-center"
                                        type="button">
                                        <i class="ri-delete-bin-5-line text-xl text-red-500 hover:text-red-700"></i>
                                    </button>
                                </td>
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
        <div class="modal-box w-11/12 max-w-3xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg capitalize text-center mb-7">Add New Member</h3>

            <form action="" method="post" autocomplete="on" enctype="multipart/form-data">
                @csrf
                <div class="space-y-2">
                    <div class="flex">
                        <div class="w-1/2 mr-4">
                            <label for="company"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Company<span
                                    class="text-red-500">*</span></label>
                            <input type="company" name="company" id="company" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Company name" required>
                        </div>
                        <div class="w-1/2 ml-4">
                            <label for="email"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Email<span
                                    class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="youremail.@domain.com" required>
                            @error('email')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                        class="font-medium">Oh, snapp!</span> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/3 mr-4">
                            <label for="firstname"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">First
                                name<span class="text-red-500">*</span></label>
                            <input type="text" name="firstname" id="firstname" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="First Name" required>
                        </div>
                        <div class="w-1/3 mx-4">
                            <label for="lastname"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Last
                                name<span class="text-red-500">*</span></label>
                            <input type="text" name="lastname" id="lastname" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Last Name" required>
                        </div>
                        <div class="w-1/3 ml-4">
                            <label for="role"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Role<span
                                    class="text-red-500">*</span></label>
                            <select class="select select-bordered w-full max-w-xs" required>
                                <option disabled selected>Role</option>
                                <option>Admin</option>
                                <option>Customer</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/2 mr-4">
                            <label for="address"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Address<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="address" id="address" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Enter your address" required>
                        </div>
                        <div class="w-1/2 ml-4">
                            <label for="phone"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Phone<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="phone" id="phone" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Phone number" required>
                        </div>
                    </div>

                    <div class="flex pt-2">
                        <div class="w-1/4 mr-2">
                            {{-- <select id="country" name="country"
                                class="w-full px-2 py-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 text-sm"
                                disabled>
                                <option id="country" value="" selected>Loading...</option>
                            </select> --}}
                            <input type="text" name="country" id="country" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Country">
                        </div>
                        <div class="w-1/4 mx-2">
                            <input type="text" name="state" id="state" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="State">
                        </div>
                        <div class="w-1/4 mx-2">
                            <input type="text" name="city" id="city" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="City">
                        </div>
                        <div class="w-1/4 ml-2">
                            <input type="text" name="zipcode" id="zipcode" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Zipcode" required>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/2 mr-4">
                            <label for="tax_id"
                                class="text-gray-600 mb-1 sm:mb-2 block font-semibold text-sm sm:text-base">Tax ID,
                                Seller
                                Permit<span class="text-red-500">*</span></label>
                            <input type="text" name="tax_id" id="tax_id" value=""
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="Tax ID, Seller Permit" required>
                        </div>
                        <div class="w-1/2 ml-4">
                            <!-- File Input -->
                            <label for="file"
                                class="block text-gray-600 text-sm sm:text-base font-semibold mb-1 sm:mb-2">Document</label>
                            <input type="file" id="file" name="document" accept=".zip,.pdf"
                                class="border w-full rounded-md text-sm relative">
                            <p class="text-sm text-gray-400">Compressed file: Licenses, State permits, IDs.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="agreement"
                            class="text-primary focus:ring-0 rounded-sm cursor-pointer" required>
                        <label for="agreement" class="text-gray-600 ml-3 cursor-pointer">Check here to indicate that
                            you have read and agree to our <a href="#" class="text-primary capitalize">terms &
                                conditions</a></label>
                    </div>
                </div>
                <div class="mt-4">
                    <input type="submit" value="Submit"
                        class="btn bg-primary border border-primary hover:bg-transparent hover:text-primary text-white uppercase" />
                </div>
            </form>
        </div>
    </dialog>
</x-admin.layouts.app>
